<?php

namespace Modules\QuiryBuilder\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

abstract class QueryFilter
{
    /**
     * Filter name
     * @var string
     */
    protected $name;

    /**
     * Set strict comparison
     * @var bool
     */
    protected $strict = false;

    /**
     * Set can hold multiple
     * @var bool
     */
    protected $multiple = false;

    /**
     * Set filter alias
     * @var string
     */
    protected $alias;

    /**
     * The parameters
     * @var string
     */
    protected $parameter;

    /**
     * Constructor
     *
     * @param string $name
     * @param string $alias
     * @param bool $strict
     * @param bool $multiple
     */
    public function __construct($name = null, $alias = null, $strict = false, $multiple = false)
    {
        $this->setName($name);
        $this->setAlias($alias);
        $this->setStrict($strict);
        $this->setMultiple($multiple);
        $this->parameter = collect();
    }

    /**
     * Set the parameters
     *
     * @param array $params
     * @return QueryBuilder\QueryFilter
     */
    public function setParmaters(array $params)
    {
        $this->parameter = collect($params);

        return $this;
    }

    /**
     * Get parameters
     *
     * @return array
     */
    public function getParameters()
    {
        return $this->parameter;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return QueryBuilder\QueryFilter
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set strict
     *
     * @param string $strict
     * @return QueryBuilder\QueryFilter
     */
    public function setStrict($strict)
    {
        $this->strict = $strict;

        return $this;
    }

    /**
     * Get strict
     *
     * @return bool
     */
    public function getStrict()
    {
        return $this->strict;
    }

    /**
     * Set multiple
     *
     * @param string $multiple
     * @return QueryBuilder\QueryFilter
     */
    public function setMultiple($multiple)
    {
        $this->multiple = $multiple;

        return $this;
    }

    /**
     * Get multiple
     *
     * @return bool
     */
    public function getMultiple()
    {
        return $this->multiple;
    }

    /**
     * Set alias
     *
     * @param string $alias
     * @return QueryBuilder\QueryFilter
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Get table name
     *
     * @param string $builder
     * @return string
     */
    public function getTableName($builder)
    {
        $table = '';
        if ($builder instanceof Model) {
            $column = $builder->getTable();
        } elseif ($builder instanceof Builder) {
            $table = $builder->from;
        } else {
            $table = $builder->getModel()->getTable();
        }
        return $table;
    }
}
