<?php

namespace Modules\Translation\Console;

use Illuminate\Console\Command;
use Modules\Translation\Models\TranslatorLanguage;
use Modules\Translation\Models\TranslatorTranslation;
use Symfony\Component\Console\Input\InputArgument;

class NewLanguageCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'translation:new_language';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate english default translations for a new language.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $language = TranslatorLanguage::where('code', $this->argument('locale'))->first();
        if (!$language) {
            $this->error('Error: locale does not exist');

            return;
        }

        if (TranslatorTranslation::where('translator_language_id', $language->id)->first()) {
            $this->error('Error: locale already in translation database');

            return;
        }

        $defaultLanguage     = TranslatorLanguage::where('code', 'en')->first();
        $defaultTranslations = TranslatorTranslation::where('translator_language_id', $defaultLanguage->id)->get();

        $data = [];
        foreach ($defaultTranslations as $key => $defaultTranslation) {
            $defaultTranslation->translator_language_id = $language->id;
            $defaultTranslation->created_at             = now();
            $defaultTranslation->updated_at             = now();
            $data[]                                     = array_except($defaultTranslation->toArray(), ['id']);
        }

        TranslatorTranslation::insert($data);
        $this->call('translation:generate_files');
        $this->info('New language successfully added');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['locale', InputArgument::REQUIRED, 'The new language locale.'],
        ];
    }
}
