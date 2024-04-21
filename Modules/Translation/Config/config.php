<?php

return [
    'name'     => 'Translation',
    'bindings' => [
        Modules\Translation\Contracts\TranslatorTranslationContract::class => Modules\Translation\Repositories\TranslatorTranslationRepository::class,
        Modules\Translation\Contracts\TranslatorPageContract::class        => Modules\Translation\Repositories\TranslatorPageRepository::class,
        Modules\Translation\Contracts\TranslatorLanguageContract::class    => Modules\Translation\Repositories\TranslatorLanguageRepository::class,
        Modules\Translation\Contracts\TranslatorGroupContract::class       => Modules\Translation\Repositories\TranslatorGroupRepository::class,
        Modules\Translation\Contracts\TranslatorInsertContract::class      => Modules\Translation\Repositories\TranslatorInsertRepository::class,
    ],
    'regex' => [
        'php' => "/__\\([\"|\\']\\s*([^)]+?)\\s*[\"|\\']/",
    ],

    'default_lang' => env('DEFAULT_LANGUAGE', 'en'),
];
