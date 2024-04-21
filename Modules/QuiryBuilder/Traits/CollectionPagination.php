<?php

namespace Modules\QuiryBuilder\Traits;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

trait CollectionPagination
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
     * @param Builder $prepare
     * @param number $limit
     * @return \Illuminate\Database\Query\Builder
     */
    public function paginate($items, array $inputs)
    {
        $page            = Paginator::resolveCurrentPage($this->pageName) ?: 1;
        $items           = $items instanceof Collection ? $items : Collection::make($items);
        $options['path'] = Paginator::resolveCurrentPath();

        if (isset($inputs[$this->sortAttribute])) {
            $order = isset($inputs[$this->orderAttribute]) ? $inputs[$this->orderAttribute] : $this->defaultOrder;
            $items->sortBy($inputs[$this->sortAttribute], $order);
        }

        $limit     = isset($inputs[$this->limitAttribute]) ? $inputs[$this->limitAttribute] : $this->defaultLimit;
        $paginated = new LengthAwarePaginator($items->forPage($page, $limit), $items->count(), $limit, $page, $options);

        if (!empty($inputs)) {
            $paginated->appends($inputs);
        }

        return $paginated;
    }
}
