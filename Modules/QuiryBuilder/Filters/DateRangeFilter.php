<?php

namespace Modules\QuiryBuilder\Filters;

use Carbon\Carbon;

class DateRangeFilter extends DateFilter
{
    const WEEKS  = 'weeks';
    const MONTHS = 'months';
    const YEARS  = 'years';

    /**
     * Add filter to sql statement
     *
     * @param Illuminate\Database\Eloquent\Builder | Illuminate\Database\Query\Builder $builder
     * @return Illuminate\Database\Query\Builder
     */
    public function filter($builder)
    {
        $elName = $this->name;
        if (!$this->parameter->has($elName) || !$elName || !$this->parameter->get($elName)) {
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

        $column = $table . '.' . $colName;
        $value  = $this->parameter->get($elName);

        $range = $this->parseDate($value);

        $range[1] = isset($range[1]) ? $range[1] : $range[0];
        $from     = (new Carbon($range[0]))->startOfDay();
        $to       = (new Carbon($range[1]))->endOfDay();

        return $builder->whereBetween($column, [$from, $to]);
    }

    /**
     * Parse date
     * @param unknown $value
     * @return array
     */
    protected function parseDate($value)
    {
        return explode(config('qbuilder.filter.components.date_range.delimeter'), $value);
    }
}
