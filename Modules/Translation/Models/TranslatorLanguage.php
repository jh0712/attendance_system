<?php

namespace Modules\Translation\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Kh\Traits\HasActiveScope;
use Modules\Kh\Traits\HasCache;
use Modules\Kh\Traits\HistoryRelation;
use Modules\Kh\Traits\TableName;

class TranslatorLanguage extends Model
{
    use SoftDeletes;
    use HasActiveScope;
    use HasCache;
    use TableName;
    use HistoryRelation;

    const ZH_CN         = 'zh-cn';
    const ZH_TW         = 'zh-tw';
    const EN            = 'en';
    protected $fillable = ['code', 'name'];

    /**
     * This model's relation to translations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function translations()
    {
        return $this->hasMany(TranslatorTranslation::class, 'translator_language_id', 'id');
    }

    /**
     * Get the state id.
     *
     * @return mixed
     */
    public function getEntityId()
    {
        return $this->id;
    }

    /**
     * Get the foreign key.
     *
     * @return string
     */
    public function getForeignKey()
    {
        return 'translator_language_id';
    }

//    /**
//     * Listening to events.
//     *
//     * @throws Plus65Exception
//     */
//    protected static function boot()
//    {
//        parent::boot();
//        static::register_observer('Translation');
//    }
}
