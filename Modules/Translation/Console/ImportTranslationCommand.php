<?php

namespace Modules\Translation\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Modules\Translation\Contracts\TranslatorLanguageContract;
use Modules\Translation\Contracts\TranslatorTranslationContract;
use Symfony\Component\Console\Input\InputArgument;

class ImportTranslationCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'translation:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import translation by key from csv';

    /*
     * The translatorTranslation
     */
    protected $translatorTranslation;

    /*
     * The translatorLanguage
     */
    protected $translatorLanguage;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(TranslatorLanguageContract $translatorLanguageContract, TranslatorTranslationContract $translatorTranslationContract)
    {
        $this->translatorLanguage    = $translatorLanguageContract;
        $this->translatorTranslation = $translatorTranslationContract;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $files  = $this->argument('file');
        $handle = fopen($files, 'r');
        $header = true;

        $availableLocales = $this->translatorLanguage->allActive()->pluck('id', 'code');

        DB::beginTransaction();

        while ($csvLine = fgetcsv($handle, 1000, ",")) {
            if ($header) {
                $header = false;
            } else {
                if (isset($availableLocales['en'])) {
                    $englishData = [
                        'language_id' => $availableLocales['en'],
                        'key'         => $csvLine[0],
                        'value'       => $csvLine[1],
                    ];

                    $this->translatorTranslation->updateTranslationByKey($englishData);
                }

                if (isset($availableLocales['zh-cn'])) {
                    $chineseData = [
                        'language_id' => $availableLocales['zh-cn'],
                        'key'         => $csvLine[0],
                        'value'       => $csvLine[2],
                    ];
                    $this->translatorTranslation->updateTranslationByKey($chineseData);
                }
            }
        }

        DB::commit();

        $this->call('translation:generate_files');
    }

    public function getFiles($path)
    {
        return new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(base_path($path), \RecursiveDirectoryIterator::SKIP_DOTS)
        );
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['file', InputArgument::REQUIRED, 'filename ending in .xlsx.'],
        ];
    }
}
