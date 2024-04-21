<?php

namespace Modules\QuiryBuilder\Filters;

use Carbon\Carbon;
use Modules\QuiryBuilder\Contracts\FilterableContract;
use Modules\QuiryBuilder\Repositories\QueryFilter;

class DateFilter extends QueryFilter implements FilterableContract
{
    const TODAY = 'today';

    /**
     * Add filter to sql statement
     *
     * @param Illuminate\Database\Eloquent\Builder | Illuminate\Database\Query\Builder $builder
     * @return Illuminate\Database\Query\Builder
     */
    public function filter($builder)
    {
        $elName  = $this->name;
        $default = $this->getConfigValue();
        if ((!$this->parameter->has($elName) || !$elName || !$this->parameter->get($elName)) && !$default) {
            return $builder;
        }

        if ($this->alias) {
            if (false !== strpos($this->alias, '.')) {
                [$table, $colName] = explode('.', $this->alias);
            } else {
                $colName = $this->alias;
                $table   = $this->getTableName($builder);
            }
        } else {
            $table   = $this->getTableName($builder);
            $colName = $elName;
        }

        if (!$table) {
            throw new \Exception('Unknown instance of builder');
        }

        $value  = $this->parameter->get($elName);
        $column = $table . '.' . $colName;

        if ($default && !$value) {
            $value = $default;
        }

        return $builder->where(\DB::raw('DATE(' . $column . ')'), $value);
    }

    /**
     * Get Config default value
     * @return NULL/string
     */
    protected function getConfigValue()
    {
        $value = config('base.filters.date');
        if ($value == self::TODAY) {
            return new Carbon();
        }

        return;
    }
}
