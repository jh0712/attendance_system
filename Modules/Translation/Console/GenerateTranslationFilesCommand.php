<?php

namespace Modules\Translation\Console;

use Illuminate\Console\Command;
use Illuminate\Foundation\Application;
use Modules\Translation\Contracts\TranslatorLanguageContract;
use Modules\Translation\Contracts\TranslatorTranslationContract;

class GenerateTranslationFilesCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'translation:generate_files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate translation files from database.';

    // The translatorTranslation
    protected $translatorTranslation;

    // The translatorLanguage
    protected $translatorLanguage;

    // The filesystem
    protected $fileSystem;

    /**
     * Create a new command instance.
     */
    public function __construct(Application $app, TranslatorTranslationContract $translatorTranslationContract, TranslatorLanguageContract $translatorLanguageContract)
    {
        $this->fileSystem            = $app['files'];
        $this->translatorTranslation = $translatorTranslationContract;
        $this->translatorLanguage    = $translatorLanguageContract;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $allLanguages = $this->translatorLanguage->all()->pluck('code', 'id');

        foreach ($allLanguages as $id => $locale) {
            $translatorTranslations = $this->translatorTranslation->loadSource($id);
            $mainPath               = storage_path('lang/');
            if (!\File::isDirectory($mainPath)) {
                \File::makeDirectory($mainPath, $mode = 0755, true, true);
            }
            $fullpath = $mainPath.$locale.'.json';

            $this->fileSystem->put($fullpath, $translatorTranslations->pluck('value', 'translation_key')->toJson(JSON_UNESCAPED_UNICODE));
        }
    }
}
