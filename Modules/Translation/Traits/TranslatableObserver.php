<?php

namespace Modules\Translation\Traits;

use Modules\Translation\Contracts\TranslatorTranslationContract;

class TranslatableObserver
{
    /**
     *  Save translations when model is saved.
     *
     *  @param  Model $model
     *  @return void
     */
    public function saved($model)
    {
        $translationRepository = \App::make(TranslatorTranslationContract::class);

        foreach ($model->translatableAttributes() as $attribute) {
            // If the value of the translatable attribute has changed:
            if ($model->isDirty($attribute)) {
                $text = preg_replace('/_+/', ' ', trim($model->getRawAttribute($attribute)));

                $translationRepository->updateDefaultByKey($model->translationCodeFor($attribute), $text);
            }
        }
    }
}
