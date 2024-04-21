<?php

namespace Modules\Translation\Queries\Admin;

use Modules\Translation\Queries\TranslationQuery as BaseQuery;

class TranslationQuery extends BaseQuery
{
    /**
     * The filters
     * @var array
     */
    protected $filters = [
        'group_id' => [
            'filter' => 'select',
            'table'  => 'translator_groups',
            'column' => 'id'
        ],
        'page_id' => [
            'filter' => 'select',
            'table'  => 'translator_pages',
            'column' => 'id'
        ],
        'search' => [
            'filter'    => 'search_translation',
            'table'     => 'translator_translations',
            'namespace' => 'Modules\Translation\Queries\Filters',
        ],
    ];
}
