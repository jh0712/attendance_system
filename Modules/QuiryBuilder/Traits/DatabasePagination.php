<?php

namespace Modules\QuiryBuilder\Traits;

trait DatabasePagination
{
    /**
     * Attribute for sorting column
     * @var string
     */
    protected $sortAttribute = 'sort';

    /**
     * Attribute for ordering
     * @var string
     */
    protected $orderAttribute = 'order';

    /**
     * Default order
     * @var string
     */
    protected $defaultOrder = 'asc';

    /**
     * Attribute for limiter
     * @var string
     */
    protected $limitAttribute = 'limit';

    /**
     * Default limit
     * @var integer
     */
    protected $defaultLimit = 25;

    /**
     * The page name
     * @var string
     */
    protected $pageName = 'page';

    /**
     * Paginate records
     * @param $builder
     * @param number $limit
     * @return \Illuminate\Database\Query\Builder
     */
    public function paginate($builder, array $inputs, $select = ['*'])
    {
        if (isset($inputs[$this->sortAttribute])) {
            $order = isset($inputs[$this->orderAttribute]) ? $inputs[$this->orderAttribute] : $this->defaultOrder;
            $builder->orderBy($inputs[$this->sortAttribute], $order);
        }

        $limit     = isset($inputs[$this->limitAttribute]) ? $inputs[$this->limitAttribute] : $this->defaultLimit;
        $page      = isset($inputs[$this->pageName]) ? $inputs[$this->pageName] : 1;
        $paginated = $builder->paginate($limit, $select, $this->pageName, $page);

        if (!empty($inputs)) {
            $paginated->appends($inputs);
        }

        return $paginated;
    }
}
