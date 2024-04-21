<?php

namespace Modules\Translation\Models;

use Illuminate\Database\Eloquent\Model;

use Modules\Kh\Traits\HasSlug;

class TranslatorTranslation extends Model
{
    use HasSlug;
    protected $fillable = [
        'translator_language_id',
        'translator_page_id',
        'key',
        'value',
    ];

    /**
     * This model's relation to translator_languages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(TranslatorLanguage::class, 'translator_language_id', 'id');
    }

    /**
     * This model's relation to translator_pages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pages()
    {
        return $this->belongsTo(TranslatorPage::class, 'translator_page_id', 'id');
    }

    /**
     * Listening to events.
     */
    protected static function boot()
    {
        parent::boot();
    }
}
