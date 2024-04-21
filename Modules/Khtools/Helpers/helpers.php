<?php
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
if (!function_exists('kitetesthelper')) {
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
    function kitetesthelper()
    {
        return 'test';
    }
}

//if (!function_exists('stats_standard_deviation')) {
//    /**
//     * C:\xampp\htdocs\attendance_system\Modules\Khtools\Traits\Excel_tool.php
//     * This user-land implementation follows the implementation quite strictly;
//     * it does not attempt to improve the code or algorithm in any way. It will
//     * raise a warning if you have fewer than 2 values in your array, just like
//     * the extension does (although as an E_USER_WARNING, not E_WARNING).
//     *
//     * @param array $a
//     * @param bool $sample [optional] Defaults to false
//     * @return float|bool The standard deviation or false on error.
//     */
//    function stats_standard_deviation(array $a, $sample = false) {
//        $n = count($a);
//        if ($n === 0) {
//            trigger_error("The array has zero elements", E_USER_WARNING);
//            return false;
//        }
//        if ($sample && $n === 1) {
//            trigger_error("The array has only 1 element", E_USER_WARNING);
//            return false;
//        }
//        $mean = array_sum($a) / $n;
//        $carry = 0.0;
//        foreach ($a as $val) {
//            $d = ((double) $val) - $mean;
//            $carry += $d * $d;
//        };
//        if ($sample) {
//            --$n;
//        }
//        return sqrt($carry / $n);
//    }
//}

