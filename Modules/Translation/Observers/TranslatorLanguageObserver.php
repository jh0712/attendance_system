<?php

namespace Modules\Translation\Observers;

use Illuminate\Support\Facades\Cache;
use Modules\Translation\Models\TranslatorLanguage;

/**
 * User observer.
 */
class TranslatorLanguageObserver
{
    // Mass Updates
    // When issuing a mass update via Eloquent, the saving, saved, updating,
    // and updated model events will not be fired for the updated models.
    // This is because the models are never actually
    // retrieved when issuing a mass update.
    public function saved(TranslatorLanguage $model) // whenever there's update or create of user, renew cached instance
    {
        $key = $model->getTableName();
        Cache::forget($key);
    }
}
