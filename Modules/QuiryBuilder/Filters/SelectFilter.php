<?php

namespace Modules\QuiryBuilder\Filters;

use Modules\QuiryBuilder\Repositories\QueryFilter;

class SelectFilter extends QueryFilter
{
    /**
     * Add filter to sql statement
     *
     * @param Illuminate\Database\Eloquent\Builder | Illuminate\Database\Query\Builder $builder
     * @return Illuminate\Database\Query\Builder
     */
    public function filter($builder)
    {
        $elName = $this->name;
        if (!$this->parameter->has($elName)
            || !$elName
            || !$this->parameter->get($elName)) {
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

        if ($this->multiple) {
            if (!is_array($value)) {
                $value = [$value];
            }
            return $builder->whereIn($column, $value);
        }

        return $builder->where($column, $value);
    }
}
