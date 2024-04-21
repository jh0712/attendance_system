<?php

namespace Modules\Translation\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Kh\Traits\HasDropDown;
use Modules\Translation\Traits\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class TranslatorGroup extends Model
{
    // use SoftDeletes, Translatable, HasDropDown;
    use Translatable;
    use SoftDeletes;
    const SYSTEM  = 'system';
    const MOBILE  = 'mobile';
    const ADMIN   = 'admin';
    const PARTNER = 'partner';
    const CLIENT  = 'client';

    protected $fillable = [
        'name',
        'name_translation',
    ];

    /**
     * Translatable columns.
     *
     * @var array
     */
    protected $translatableAttributes = ['name'];

    /**
     * This model's relation to translation_groups.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function translations()
    {
        return $this->hasMany(TranslatorTranslation::class, 'translator_group_id', 'id');
    }

    /**
     * Listening to events.
     */
    protected static function boot()
    {
        parent::boot();
    }
}
