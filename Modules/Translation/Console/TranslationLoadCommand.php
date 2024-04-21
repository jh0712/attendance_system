<?php

namespace Modules\Translation\Console;

use Illuminate\Console\Command;
use Illuminate\Foundation\Application;
use Modules\Translation\Contracts\TranslatorLanguageContract;
use Modules\Translation\Contracts\TranslatorTranslationContract;

class TranslationLoadCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'translation:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load translation from resources files.';

    /**
     * The translation object.
     *
     * @var unknown
     */
    protected $trans;

    /**
     * The file system.
     *
     * @var unknown
     */
    protected $files;

    /**
     * The default locale.
     *
     * @var unknown
     */
    protected $defaultLocale;

    /**
     * Available locales.
     *
     * @var unknown
     */
    protected $availableLocales;

    /**
     * The translator language.
     *
     * @var unknown
     */
    protected $transLanguages;

    /**
     * Create a new command instance.
     */
    public function __construct(Application $app, TranslatorTranslationContract $trans, TranslatorLanguageContract $languageContract)
    {
        $this->trans          = $trans;
        $this->files          = $app['files'];
        $this->defaultLocale  = $app['config']->get('app.locale');
        $this->transLanguages = $languageContract;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->availableLocales = $this->transLanguages->all()->pluck('id', 'code')->toArray();
        $path                   = storage_path('lang/');
        $this->loadLocaleDirectories($path);
    }

    /**
     *  Loads all locale directories in the given path (/en, /es, /fr) as long as the locale corresponds to a language in the database.
     *  If a vendor directory is found not inside another vendor directory, the files within it will be loaded with the corresponding namespace.
     *
     *  @param  string  $path           Full path to the root directory of the locale directories. Usually /path/to/laravel/resources/lang
     */
    public function loadLocaleDirectories($path)
    {
        $availableLocales = array_keys($this->availableLocales);
        $directories      = $this->files->directories($path);
        foreach ($directories as $directory) {
            $locale = basename($directory);
            if (in_array($locale, $availableLocales)) {
                $this->loadDirectory($directory, $locale);
            }
            if ($locale === 'vendor') {
                $this->loadVendor($directory);
            }

            if ($locale === 'default') {
                $this->loadDirectory($directory, null);
            }
        }
    }

    /**
     *  Load all vendor overriden localization packages. Calls loadLocaleDirectories with the appropriate namespace.
     *
     *  @param  string  $path   path to vendor locale root, usually /path/to/laravel/resources/lang/vendor
     *
     *  @see    http://laravel.com/docs/5.1/localization#overriding-vendor-language-files
     */
    public function loadVendor($path)
    {
        $directories = $this->files->directories($path);
        foreach ($directories as $directory) {
            $namespace = basename($directory);
            $this->loadLocaleDirectories($directory, $namespace);
        }
    }

    /**
     *  Load all files inside a locale directory and its subdirectories.
     *
     *  @param  string  $path       Path to locale root. Ex: /path/to/laravel/resources/lang/en
     *  @param  string  $locale     locale to apply when loading the localization files
     */
    public function loadDirectory($path, $locale)
    {
        // Load all files inside subdirectories:
        $directories = $this->files->directories($path);
        foreach ($directories as $directory) {
            $this->loadDirectory($directory, $locale);
        }

        // Load all files in root:
        $files = $this->files->files($path);
        foreach ($files as $file) {
            $this->loadFile($file, $locale);
        }
    }

    /**
     *  Loads the given file into the database.
     *
     *  @param  string  $locale
     * @param mixed $file
     */
    public function loadFile($file, $locale)
    {
        $availableLocales = array_keys($this->availableLocales);
        $group            = basename($file, '.php');
        if (is_null($locale)) {
            if (in_array($group, $availableLocales)) {
                $locale = $group;
                $group  = null;
            } else {
                $locale = $this->defaultLocale;
            }
        }

        $translations = $this->files->getRequire($file);
        $lines        = array_dot($translations);
        foreach ($lines as $item => $text) {
            if (is_string($text)) {
                $item = $group ? 's_'.$group.'.'.$item : $item;
                $this->trans->updateDefaultByKey($item, $text);
            }
        }
    }
}
