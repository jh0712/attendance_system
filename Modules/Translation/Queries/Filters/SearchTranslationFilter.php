<?php

namespace Modules\Translation\Queries\Filters;

use Modules\QuiryBuilder\Repositories\QueryFilter;

class SearchTranslationFilter extends QueryFilter
{
    /**
     *
     * {@inheritDoc}
     *
     * @see \QueryBuilder\Queries\QueryFilter::filter()
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

        return $builder->where(function ($builder) use ($table, $value) {
            $builder->where($table . '.key', 'like', '%' . $value . '%')
                ->orWhere($table . '.value', 'like', '%' . $value . '%');
        });
    }
}
