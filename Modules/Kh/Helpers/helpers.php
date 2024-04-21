<?php

use Illuminate\Support\Arr;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

if (!function_exists('array_add')) {
    /**
     * Add an element to an array using "dot" notation if it doesn't exist.
     *
     * @param  array   $array
     * @param  string  $key
     * @param  mixed   $value
     * @return array
     *
     * @deprecated Arr::add() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function array_add($array, $key, $value)
    {
        return Arr::add($array, $key, $value);
    }
}

if (!function_exists('array_collapse')) {
    /**
     * Collapse an array of arrays into a single array.
     *
     * @param  array  $array
     * @return array
     *
     * @deprecated Arr::collapse() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function array_collapse($array)
    {
        return Arr::collapse($array);
    }
}

if (!function_exists('array_divide')) {
    /**
     * Divide an array into two arrays. One with keys and the other with values.
     *
     * @param  array  $array
     * @return array
     *
     * @deprecated Arr::divide() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function array_divide($array)
    {
        return Arr::divide($array);
    }
}

if (!function_exists('array_dot')) {
    /**
     * Flatten a multi-dimensional associative array with dots.
     *
     * @param  array   $array
     * @param  string  $prepend
     * @return array
     *
     * @deprecated Arr::dot() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function array_dot($array, $prepend = '')
    {
        return Arr::dot($array, $prepend);
    }
}

if (!function_exists('array_except')) {
    /**
     * Get all of the given array except for a specified array of keys.
     *
     * @param  array  $array
     * @param  array|string  $keys
     * @return array
     *
     * @deprecated Arr::except() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function array_except($array, $keys)
    {
        return Arr::except($array, $keys);
    }
}

if (!function_exists('array_first')) {
    /**
     * Return the first element in an array passing a given truth test.
     *
     * @param  array  $array
     * @param  callable|null  $callback
     * @param  mixed  $default
     * @return mixed
     *
     * @deprecated Arr::first() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function array_first($array, callable $callback = null, $default = null)
    {
        return Arr::first($array, $callback, $default);
    }
}

if (!function_exists('array_flatten')) {
    /**
     * Flatten a multi-dimensional array into a single level.
     *
     * @param  array  $array
     * @param  int  $depth
     * @return array
     *
     * @deprecated Arr::flatten() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function array_flatten($array, $depth = INF)
    {
        return Arr::flatten($array, $depth);
    }
}

if (!function_exists('array_forget')) {
    /**
     * Remove one or many array items from a given array using "dot" notation.
     *
     * @param  array  $array
     * @param  array|string  $keys
     * @return void
     *
     * @deprecated Arr::forget() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function array_forget(&$array, $keys)
    {
        return Arr::forget($array, $keys);
    }
}

if (!function_exists('array_get')) {
    /**
     * Get an item from an array using "dot" notation.
     *
     * @param  \ArrayAccess|array  $array
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     *
     * @deprecated Arr::get() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function array_get($array, $key, $default = null)
    {
        return Arr::get($array, $key, $default);
    }
}

if (!function_exists('array_has')) {
    /**
     * Check if an item or items exist in an array using "dot" notation.
     *
     * @param  \ArrayAccess|array  $array
     * @param  string|array  $keys
     * @return bool
     *
     * @deprecated Arr::has() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function array_has($array, $keys)
    {
        return Arr::has($array, $keys);
    }
}

if (!function_exists('array_last')) {
    /**
     * Return the last element in an array passing a given truth test.
     *
     * @param  array  $array
     * @param  callable|null  $callback
     * @param  mixed  $default
     * @return mixed
     *
     * @deprecated Arr::last() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function array_last($array, callable $callback = null, $default = null)
    {
        return Arr::last($array, $callback, $default);
    }
}

if (!function_exists('array_only')) {
    /**
     * Get a subset of the items from the given array.
     *
     * @param  array  $array
     * @param  array|string  $keys
     * @return array
     *
     * @deprecated Arr::only() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function array_only($array, $keys)
    {
        return Arr::only($array, $keys);
    }
}

if (!function_exists('array_pluck')) {
    /**
     * Pluck an array of values from an array.
     *
     * @param  array   $array
     * @param  string|array  $value
     * @param  string|array|null  $key
     * @return array
     *
     * @deprecated Arr::pluck() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function array_pluck($array, $value, $key = null)
    {
        return Arr::pluck($array, $value, $key);
    }
}

if (!function_exists('array_prepend')) {
    /**
     * Push an item onto the beginning of an array.
     *
     * @param  array  $array
     * @param  mixed  $value
     * @param  mixed  $key
     * @return array
     *
     * @deprecated Arr::prepend() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function array_prepend($array, $value, $key = null)
    {
        return Arr::prepend($array, $value, $key);
    }
}

if (!function_exists('array_pull')) {
    /**
     * Get a value from the array, and remove it.
     *
     * @param  array   $array
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     *
     * @deprecated Arr::pull() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function array_pull(&$array, $key, $default = null)
    {
        return Arr::pull($array, $key, $default);
    }
}

if (!function_exists('array_random')) {
    /**
     * Get a random value from an array.
     *
     * @param  array  $array
     * @param  int|null  $num
     * @return mixed
     *
     * @deprecated Arr::random() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function array_random($array, $num = null)
    {
        return Arr::random($array, $num);
    }
}

if (!function_exists('array_set')) {
    /**
     * Set an array item to a given value using "dot" notation.
     *
     * If no key is given to the method, the entire array will be replaced.
     *
     * @param  array   $array
     * @param  string  $key
     * @param  mixed   $value
     * @return array
     *
     * @deprecated Arr::set() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function array_set(&$array, $key, $value)
    {
        return Arr::set($array, $key, $value);
    }
}

if (!function_exists('array_sort')) {
    /**
     * Sort the array by the given callback or attribute name.
     *
     * @param  array  $array
     * @param  callable|string|null  $callback
     * @return array
     *
     * @deprecated Arr::sort() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function array_sort($array, $callback = null)
    {
        return Arr::sort($array, $callback);
    }
}

if (!function_exists('array_sort_recursive')) {
    /**
     * Recursively sort an array by keys and values.
     *
     * @param  array  $array
     * @return array
     *
     * @deprecated Arr::sortRecursive() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function array_sort_recursive($array)
    {
        return Arr::sortRecursive($array);
    }
}

if (!function_exists('array_where')) {
    /**
     * Filter the array using the given callback.
     *
     * @param  array  $array
     * @param  callable  $callback
     * @return array
     *
     * @deprecated Arr::where() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function array_where($array, callable $callback)
    {
        return Arr::where($array, $callback);
    }
}

if (!function_exists('array_wrap')) {
    /**
     * If the given value is not an array, wrap it in one.
     *
     * @param  mixed  $value
     * @return array
     *
     * @deprecated Arr::wrap() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function array_wrap($value)
    {
        return Arr::wrap($value);
    }
}

if (!function_exists('snake_case')) {
    /**
     * Convert a string to snake case.
     *
     * @param  string  $value
     * @param  string  $delimiter
     * @return string
     *
     * @deprecated Str::snake() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function snake_case($value, $delimiter = '_')
    {
        return Str::snake($value, $delimiter);
    }
}

if (!function_exists('starts_with')) {
    /**
     * Determine if a given string starts with a given substring.
     *
     * @param  string  $haystack
     * @param  string|array  $needles
     * @return bool
     *
     * @deprecated Str::startsWith() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function starts_with($haystack, $needles)
    {
        return Str::startsWith($haystack, $needles);
    }
}

if (!function_exists('str_after')) {
    /**
     * Return the remainder of a string after a given value.
     *
     * @param  string  $subject
     * @param  string  $search
     * @return string
     *
     * @deprecated Str::after() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function str_after($subject, $search)
    {
        return Str::after($subject, $search);
    }
}

if (!function_exists('str_before')) {
    /**
     * Get the portion of a string before a given value.
     *
     * @param  string  $subject
     * @param  string  $search
     * @return string
     *
     * @deprecated Str::before() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function str_before($subject, $search)
    {
        return Str::before($subject, $search);
    }
}

if (!function_exists('str_contains')) {
    /**
     * Determine if a given string contains a given substring.
     *
     * @param  string  $haystack
     * @param  string|array  $needles
     * @return bool
     *
     * @deprecated Str::contains() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function str_contains($haystack, $needles)
    {
        return Str::contains($haystack, $needles);
    }
}

if (!function_exists('str_finish')) {
    /**
     * Cap a string with a single instance of a given value.
     *
     * @param  string  $value
     * @param  string  $cap
     * @return string
     *
     * @deprecated Str::finish() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function str_finish($value, $cap)
    {
        return Str::finish($value, $cap);
    }
}

if (!function_exists('str_is')) {
    /**
     * Determine if a given string matches a given pattern.
     *
     * @param  string|array  $pattern
     * @param  string  $value
     * @return bool
     *
     * @deprecated Str::is() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function str_is($pattern, $value)
    {
        return Str::is($pattern, $value);
    }
}

if (!function_exists('str_limit')) {
    /**
     * Limit the number of characters in a string.
     *
     * @param  string  $value
     * @param  int     $limit
     * @param  string  $end
     * @return string
     *
     * @deprecated Str::limit() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function str_limit($value, $limit = 100, $end = '...')
    {
        return Str::limit($value, $limit, $end);
    }
}

if (!function_exists('str_plural')) {
    /**
     * Get the plural form of an English word.
     *
     * @param  string  $value
     * @param  int     $count
     * @return string
     *
     * @deprecated Str::plural() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function str_plural($value, $count = 2)
    {
        return Str::plural($value, $count);
    }
}

if (!function_exists('str_random')) {
    /**
     * Generate a more truly "random" alpha-numeric string.
     *
     * @param  int  $length
     * @return string
     *
     * @throws \RuntimeException
     *
     * @deprecated Str::random() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function str_random($length = 16)
    {
        return Str::random($length);
    }
}

if (!function_exists('str_replace_array')) {
    /**
     * Replace a given value in the string sequentially with an array.
     *
     * @param  string  $search
     * @param  array   $replace
     * @param  string  $subject
     * @return string
     *
     * @deprecated Str::replaceArray() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function str_replace_array($search, array $replace, $subject)
    {
        return Str::replaceArray($search, $replace, $subject);
    }
}

if (!function_exists('str_replace_first')) {
    /**
     * Replace the first occurrence of a given value in the string.
     *
     * @param  string  $search
     * @param  string  $replace
     * @param  string  $subject
     * @return string
     *
     * @deprecated Str::replaceFirst() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function str_replace_first($search, $replace, $subject)
    {
        return Str::replaceFirst($search, $replace, $subject);
    }
}

if (!function_exists('str_replace_last')) {
    /**
     * Replace the last occurrence of a given value in the string.
     *
     * @param  string  $search
     * @param  string  $replace
     * @param  string  $subject
     * @return string
     *
     * @deprecated Str::replaceLast() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function str_replace_last($search, $replace, $subject)
    {
        return Str::replaceLast($search, $replace, $subject);
    }
}

if (!function_exists('str_singular')) {
    /**
     * Get the singular form of an English word.
     *
     * @param  string  $value
     * @return string
     *
     * @deprecated Str::singular() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function str_singular($value)
    {
        return Str::singular($value);
    }
}

if (!function_exists('str_slug')) {
    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string  $title
     * @param  string  $separator
     * @param  string  $language
     * @return string
     *
     * @deprecated Str::slug() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function str_slug($title, $separator = '-', $language = 'en')
    {
        return Str::slug($title, $separator, $language);
    }
}

if (!function_exists('str_start')) {
    /**
     * Begin a string with a single instance of a given value.
     *
     * @param  string  $value
     * @param  string  $prefix
     * @return string
     *
     * @deprecated Str::start() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function str_start($value, $prefix)
    {
        return Str::start($value, $prefix);
    }
}

if (!function_exists('studly_case')) {
    /**
     * Convert a value to studly caps case.
     *
     * @param  string  $value
     * @return string
     *
     * @deprecated Str::studly() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function studly_case($value)
    {
        return Str::studly($value);
    }
}

if (!function_exists('camel_case')) {
    /**
     * Convert a value to camel case.
     *
     * @param  string  $value
     * @return string
     *
     * @deprecated Str::camel() should be used directly instead. Will be removed in Laravel 5.9.
     */
    function camel_case($value)
    {
        return Str::camel($value);
    }
}

// Global helpers
if (!function_exists('amount_format')) {
    function amount_format($value, $precision = 2)
    {
        return number_format($value, $precision, '.', ',');
    }
}

if (!function_exists('decimal_point_cut_zero')) {
    function decimal_point_cut_zero($value)
    {
        $intval    = intval($value);
        $precision = $value - $intval;
        return number_format($value, $precision, '.', ',');
    }
}

if (!function_exists('mt4_price_format')) {
    function mt4_price_format($value, $precision = 5)
    {
        return number_format($value, $precision, '.', ',');
    }
}

if (!function_exists('lot_format')) {
    function lot_format($value, $precision = 3)
    {
        return number_format($value, $precision, '.', ',');
    }
}

if (!function_exists('percentage')) {
    function percentage($value, $precision = 2)
    {
        return bcdiv($value, 100, $precision);
    }
}

if (!function_exists('special_calc_comm')) {
    function special_calc_comm($amount, $percentage, $precision)
    {
        return special_ceil(bcmul($amount, $percentage, 10), $precision);
    }
}

if (!function_exists('special_ceil')) {
    function special_ceil($value, $precision = 0)
    {
        $ceil_value = 1 / (pow(10, $precision));
        $ceil_value = amount_format($ceil_value, $precision);

        $precise_value   = bcmul($value, 1, $precision);
        $extra_precision = bcsub($value, $precise_value, ($precision + 1));

        if ($extra_precision > 0) {
            return bcadd($precise_value, $ceil_value, $precision);
        }
        return bcmul($precise_value, 1, $precision);
    }
}

if (!function_exists('generate_ref')) {
    /**
     * Generate transaction code
     *
     * @param string $prefix
     */
    function generate_ref($prefix = 'TXN', $limit = null)
    {
        $code = $prefix . microtime(true) . sprintf("%06d", mt_rand(2, 999999));
        $code = str_replace('.', '', $code);

        if ($limit) {
            $code = substr($code, 0, $limit);
        }

        return $code;
    }
}

if (!function_exists('random_string')) {
    function random_string($length = 30, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $factory   = new RandomLib\Factory;
        $generator = $factory->getGenerator(new SecurityLib\Strength(SecurityLib\Strength::LOW));
        return $generator->generateString($length, $keyspace);
    }
}

// Translation Helpers
if (!function_exists('languages')) {

    /**
     * Get translator languages list.
     *
     * @return unknown
     */
    function languages()
    {
        $translatorLanguageRepository = resolve(Modules\Translation\Contracts\TranslatorLanguageContract::class);

        return $translatorLanguageRepository->getModel()->active()->get()->pluck('name', 'code');
    }
}

if (!function_exists('get_translatable_text')) {
    /**
     * Get translatable text
     *
     * @param  unknown $locale
     * @param  unknown $pageId
     * @param  unknown $key
     * @return unknown
     */
    function get_translatable_text($locale, $pageId, $key)
    {
        $translatorTranslationTransRepository = resolve(Modules\Translation\Contracts\TranslatorTranslationContract::class);

        $translation = $translatorTranslationTransRepository->findByKey($locale, $pageId, $key);

        if ($translation) {
            return $translation->value;
        }

        return;
    }
}

if (!function_exists('get_translator_language')) {
    /**
     * Get translator language
     *
     * @param  unknown $name
     * @return unknown
     */
    function get_translator_language($code)
    {
        $translatorLanguageRepository = resolve(Modules\Translation\Contracts\TranslatorLanguageContract::class);

        return $translatorLanguageRepository->findBySlug($code);
    }
}

if (!function_exists('get_translator_page')) {
    /**
     * Get translator page
     *
     * @param  unknown $name
     * @return unknown
     */
    function get_translator_page($name)
    {
        $translatorPageRepository = resolve(Modules\Translation\Contracts\TranslatorPageContract::class);

        return $translatorPageRepository->findBySlug($name);
    }
}

// RBAC Helpers
if (!function_exists('get_ability_category_id')) {
    /**
     * Get abiltity category id
     *
     * @param  unknown $name
     * @return unknown
     */
    function get_ability_category_id($name)
    {
        $abilityCategoryRepository = resolve(Modules\Rbac\Contracts\AbilityCategoryContract::class);

        $abilityCategory = $abilityCategoryRepository->findBySlug($name);

        if ($abilityCategory) {
            return $abilityCategory->id;
        }

        return;
    }
}

if (!function_exists('get_role_ids')) {
    function get_role_ids($is_admin = false)
    {
        $member_ids = [3, 4, 5, 6];

        if ($is_admin) {
            return \Modules\Rbac\Entities\Role::whereNotIn('id', $member_ids)->pluck('id')->toArray();
        }
        return $member_ids;
    }
}

if (!function_exists('form_token_field')) {
    /**
     * Generate a CSRF token form field.
     *
     * @return \Illuminate\Support\HtmlString
     */
    function form_token_field()
    {
        return new HtmlString('<input type="hidden" name="_form_token" value="' . form_token() . '">');
    }
}

if (!function_exists('form_token')) {
    function form_token()
    {
        $session = app('session');

        if (isset($session)) {
            $token = Str::random(32);
            $session->put('_form_token', $token);

            return $token;
        }

        throw new RuntimeException('Application session store not set.');
    }
}

# Program decimal
if (!function_exists('rateadd')) {
    function rateadd($firstValue, $secondValue, $precision = 2)
    {
        return bcadd($firstValue, $secondValue, $precision);
    }
}

if (!function_exists('ratesub')) {
    function ratesub($firstValue, $secondValue, $precision = 2)
    {
        return bcsub($firstValue, $secondValue, $precision) - 0;
    }
}

if (!function_exists('ratemul')) {
    function ratemul($firstValue, $secondValue, $precision = 2)
    {
        return bcmul($firstValue, $secondValue, $precision);
    }
}

if (!function_exists('ratediv')) {
    function ratediv($firstValue, $secondValue, $precision = 2)
    {
        return bcdiv($firstValue, $secondValue, $precision);
    }
}

// Remove 0 after decimal point
if (!function_exists('ratedisplay')) {
    function ratedisplay($value, $precision = 2)
    {
        return bcsub($value, 0, $precision);
    }
}

if (!function_exists('startOfThisMonth')) {
    function startOfThisMonth()
    {
        $date = new Carbon\Carbon('first day of this month');
        return $date->startOfMonth();
    }
}

if (!function_exists('endOfThisMonth')) {
    function endOfThisMonth()
    {
        $date = new Carbon\Carbon('last day of this month');
        return $date->endOfMonth();
    }
}

if (!function_exists('startOfLastMonth')) {
    function startOfLastMonth()
    {
        $date = new Carbon\Carbon('first day of last month');
        return $date->startOfMonth();
    }
}

if (!function_exists('endOfLastMonth')) {
    function endOfLastMonth()
    {
        $date = new Carbon\Carbon('last day of last month');
        return $date->endOfMonth();
    }
}

if (!function_exists('startOfNumberMonth')) {
    function startOfNumberMonth($number = 1)
    {
        $date = new Carbon\Carbon('first day of this month');
        return $date->subMonths($number)->startOfMonth();
    }
}

if (!function_exists('endOfNumberMonth')) {
    function endOfNumberMonth($number = 1)
    {
        $date = new Carbon\Carbon('last day of this month');
        return $date->subMonths($number)->endOfMonth();
    }
}
