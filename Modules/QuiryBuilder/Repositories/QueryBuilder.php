<?php

namespace Modules\QuiryBuilder\Repositories;

use Illuminate\Database\Query\Builder;
use Modules\Kh\Traits\DynamicAttribute;
use Modules\Kh\Traits\Macroable;
use Modules\QuiryBuilder\Contracts\QueryableContract;
use Modules\QuiryBuilder\Traits\DatabasePagination;

abstract class QueryBuilder implements QueryableContract
{
    use DynamicAttribute, Macroable;
    use DatabasePagination { paginate as protected DBPaginate; }

    /**
     * The query builder object
     *
     * @var Illuminate\Database\Query\Builder $builder
     */
    protected $builder;

    /**
     * The parameters
     *
     * @var array
     */
    protected $parameters;

    /**
     * The filters
     *
     * @var array
     */
    protected $filters = [

        /***
         * Example format
         *
         *  'created_at' => [
         *      'filter' => 'date_range',
         *      'table' => 'users',
         *      'column' => 'created_at' // refers to table column. If empty or not set the key will be used
         *  ]
         *
         */
    ];

    /**
     * The filter broker
     *
     * @var QueryBuilder\FilterBroker
     */
    protected $filterBroker;

    /**
     * Constructor
     *
     * @param FilterBroker $broker
     * @param array $parameters
     */
    public function __construct(FilterBroker $broker, array $parameters = [])
    {
        $this->parameters   = $parameters;
        $this->filterBroker = $broker->setParameters($parameters);
        $this->builder      = $this->query();
        $this->defaultLimit = config('qbuilder.query.page');
        $this->defaultOrder = config('qbuilder.query.sort');
    }

    /**
     * Process data before sleeping
     *
     * @return array
     */
    public function __sleep()
    {
        // PDO objects are unserializable, so needs to be unset
        $this->builder      = null;
        $this->filterBroker = null;

        return ['parameters', 'filters'];
    }

    /**
     * Inititalises data when waking up
     */
    public function __wakeup()
    {
        $this->builder      = $this->query();
        $this->filterBroker = resolve(FilterBroker::class)->setParameters($this->parameters);
    }

    /**
     * Set parameters
     *
     * @param array $params
     */
    public function setParameters(array $params)
    {
        $this->parameters = $params;

        $this->filterBroker->setParameters($params);

        return $this;
    }

    /**
     * Get the parameters
     * @return unknown
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Execute the query and get the first result.
     *
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function first($columns = ['*'])
    {
        return $this->getBuilder()->first($columns);
    }

    /**
     * Execute the query as a "select" statement.
     *
     * @param  array|string  $columns
     * @return \Illuminate\Support\Collection
     */
    public function get($columns = ['*'])
    {
        return $this->getBuilder()->get($columns);
    }

    /**
     * Gets the builder object
     *
     * @return Illuminate\Database\Query\Builder
     */
    public function getBuilder()
    {
        $this->build();

        return $this->builder;
    }

    /**
     * Paginate the given query into a simple paginator.
     *
     * @param  array  $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($columns = ['*'])
    {
        return $this->DBPaginate($this->getBuilder(), $this->parameters, $columns);
    }

    /**
     * Generates the base query
     * @return Builder
     */
    abstract public function query();

    /**
     * Adhoc processes before build
     */
    public function beforeBuild()
    {
        // Do extra process before building the query here
    }

    /**
     * Adhoc process after build
     */
    public function afterBuild()
    {
        // Do extra process after building the query here
    }

    /**
     *
     * {@inheritDoc}
     * @see \QueryBuilder\Contracts\QueryableContract::count()
     */
    public function count()
    {
        return $this->getBuilder()->count();
    }

    /**
     * Build the query builder
     */
    protected function build()
    {
        $this->beforeBuild();
        $this->compileFilters();
        $this->afterBuild();

        return $this;
    }

    /**
     * Compile the filters
     */
    protected function compileFilters()
    {
        foreach ($this->filters as $key => $value) {
            if (isset($this->parameters[$key])) {
                $column = isset($value['column']) ? $value['column'] : $key;
                $alias  = $value['table'] . '.' . $column;

                if (isset($value['namespace'])) {
                    $this->filterBroker
                    ->setDefaultNamespace($value['namespace'])
                    ->addCriteria(
                        $value['filter'],
                        $this->builder,
                        $key,
                        $alias
                    );
                } else {
                    $this->filterBroker->addCriteria(
                        $value['filter'],
                        $this->builder,
                        $key,
                        $alias
                    );
                }
            }
        }
    }
}
