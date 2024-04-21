<?php

namespace Modules\Translation\Queries;

use Illuminate\Support\Facades\DB;
use Modules\QuiryBuilder\Repositories\QueryBuilder;
use Modules\Translation\Models\TranslatorPage;

class TranslationQuery extends QueryBuilder
{
    /**
     * {@inheritDoc}
     *
     * @see \QueryBuilder\QueryBuilder::query()
     */
    public function query()
    {
        $query = TranslatorPage::join('translator_translations', 'translator_translations.translator_page_id', '=', 'translator_pages.id')
            ->join('translator_groups', 'translator_pages.translator_group_id', '=', 'translator_groups.id')
            ->select(
                [
                    'translator_translations.key',
                    'translator_pages.id as translator_page_id',
                    'translator_pages.name_translation',
                    'translator_pages.route_name',
                    DB::raw("CONCAT('s_translator_groups.' , translator_groups.name_translation) as group_name"),
                ]
            )
            ->groupBy('translator_translations.key', 'translator_pages.id', 'translator_pages.name_translation', 'translator_pages.route_name', 'translator_groups.name_translation');

        return $query;
    }
}
