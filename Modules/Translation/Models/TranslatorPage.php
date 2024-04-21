<?php

namespace Modules\Translation\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Translation\Traits\Translatable;

class TranslatorPage extends Model
{
    use Translatable;
    use SoftDeletes;
    protected $fillable = ['name', 'name_translation', 'translator_group_id'];

    /**
     * Translatable columns.
     *
     * @var array
     */
    protected $translatableAttributes = ['name'];

    /**
     * This model's relation to translator_groups.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function groups()
    {
        return $this->belongsTo(TranslatorGroup::class, 'translator_group_id', 'id');
    }
}
