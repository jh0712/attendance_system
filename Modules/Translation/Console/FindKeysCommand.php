<?php

namespace Modules\Translation\Console;

use Illuminate\Console\Command;
use Illuminate\Foundation\Application;
use Modules\Translation\Contracts\TranslatorTranslationContract;
use Modules\Translation\Models\TranslatorGroup;
use Modules\Translation\Models\TranslatorLanguage;
use Modules\Translation\Models\TranslatorPage;
use Modules\Translation\Models\TranslatorTranslation;
use Symfony\Component\Console\Input\InputOption;

class FindKeysCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'translation:load_keys';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load all key and make it translatable';

    // The translatorTranslation
    protected $translatorTranslation;

    // The filesystem
    protected $fileSystem;

    // The translatorTranslation
    protected $config;

    /**
     * Create a new command instance.
     */
    public function __construct(Application $app, TranslatorTranslationContract $translatorTranslationContract)
    {
        $this->fileSystem            = $app['files'];
        $this->config                = $app['config'];
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
        $latestCommit       = $this->option('latest') ? false : true;
        $availableLocales   = TranslatorLanguage::active()->get();
        $localeTranslations = $this->translatorTranslation->loadSource($availableLocales[0]->id)
            ->pluck('translation_key', 'translation_key')
            ->toArray()
        ;
        $groups = TranslatorGroup::all()->keyBy('prefix');
        $pages  = TranslatorPage::all()->keyBy('rawname');

        $fullpath = base_path().DIRECTORY_SEPARATOR.'.translations_json.cache';

        if ($latestCommit) {
            $files = shell_exec('git ls-files');
            if ($this->fileSystem->exists($fullpath)) {
                $gitHash = $this->fileSystem->get($fullpath);
                if ($gitHash) {
                    $files = shell_exec("git diff --name-only {$gitHash} HEAD");
                }
            }
        } else {
            $files = shell_exec('git ls-files');
        }

        $newTranslations = [];
        foreach (explode("\n", $files) as $file) {
            $fileObject = new \SplFileInfo(base_path($file));
            if (in_array($fileObject->getExtension(), ['php'])) {
                if ($fileObject->getRealPath()) {
                    $contents = file_get_contents($fileObject->getRealPath());

                    preg_match_all($this->config->get('translation.regex.php'), $contents, $matches);

                    if (!empty($matches[1])) {
                        foreach ($matches[1] as $val) {
                            if (!isset($localeTranslations[$val])) {
                                foreach ($availableLocales as $key => $locale) {
                                    if (!array_key_exists($val.$locale->id, $newTranslations)) {
                                        $extractGroup = explode('.', $val);
                                        $this->line($val);
                                        if (count($extractGroup) < 2) {
                                            $groupId = 2;
                                            $pageId  = $pages['messages']->id;
                                            $value   = $extractGroup[0];
                                        } else {
                                            if ($extractGroup[0] == 'messages') {
                                                $groupId = 2;
                                            } else {
                                                $extractGroupPrefix = explode('_', $extractGroup[0]);
                                                $groupId            = $groups[$extractGroupPrefix[0]]->id;
                                            }

                                            if (isset($pages[$extractGroup[0]])) {
                                                $pageId = $pages[$extractGroup[0]]->id;
                                            } else {
                                                $newPage                      = new TranslatorPage();
                                                $newPage->translator_group_id = $groupId;
                                                $newPage->name                = $extractGroup[0];
                                                $newPage->save();
                                                $pages[$extractGroup[0]] = $newPage;
                                                $pageId                  = $newPage->id;
                                            }

                                            $value = $extractGroup[1];
                                        }

                                        $newTranslations[$val.$locale->id] = [
                                            'created_at'             => date('Y-m-d H:i:s'),
                                            'updated_at'             => date('Y-m-d H:i:s'),
                                            'translator_language_id' => $locale->id,
                                            'translator_page_id'     => $pageId,
                                            'key'                    => $value,
                                            'value'                  => $value,
                                        ];
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $gitHash = shell_exec('git rev-parse HEAD');
        $this->fileSystem->put($fullpath, str_replace("\n", '', $gitHash));

        if (!empty($newTranslations)) {
            TranslatorTranslation::insert($newTranslations);
            $this->call('translation:generate_files');
        }
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
    protected function getOptions()
    {
        return [
            ['latest', null, InputOption::VALUE_OPTIONAL, ' Always take from last commit files, default to true. else it will be false', null],
        ];
    }
}
