<?php

namespace Modules\Kh\Traits;

use Illuminate\Support\Facades\DB;

trait HasMultiCurd
{
    public function mysql_escape($inp)
    {
        if (is_array($inp)) {
            return array_map(__METHOD__, $inp);
        }

        if (!empty($inp) && is_string($inp)) {
            return str_replace(
                ['\\', "\0", "\n", "\r", "'", '"', "\x1a"],
                ['\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'],
                $inp
            );
        }

        return $inp;
    }

    /**
     * Update multiple rows
     * @param array $values
     * @param string $index
     *
     * @desc
     * Example
     * $value = [
     *     [
     *         'id' => 1,
     *         'status' => 'active',
     *         'nickname' => 'Mohammad'
     *     ] ,
     *     [
     *         'id' => 5,
     *         'status' => 'deactive',
     *         'nickname' => 'Ghanbari'
     *     ] ,
     * ];
     * $index = 'id';
     *
     * @return bool|int
     */
    public function multiUpdate(array $values, string $index = null, bool $raw = false)
    {
        // dd($values);
        $final = [];
        $ids   = [];

        if (!count($values)) {
            return false;
        }

        if (!isset($index) || empty($index)) {
            $index = $this->model->getKeyName();
        }

        foreach ($values as $key => $val) {
            $ids[] = $val[$index];
            foreach (array_keys($val) as $field) {
                if ($field !== $index) {
                    $finalField      = $raw ? $this->mysql_escape($val[$field]) : '"' . $this->mysql_escape($val[$field]) . '"';
                    $value           = (is_null($val[$field]) ? 'NULL' : $finalField);
                    $final[$field][] = 'WHEN `' . $index . '` = "' . $val[$index] . '" THEN ' . $value . ' ';
                }
            }
        }

        $cases = '';
        foreach ($final as $k => $v) {
            $cases .= '`' . $k . '` = (CASE ' . implode("\n", $v) . "\n"
                . 'ELSE `' . $k . '` END), ';
        }

        $query = "UPDATE `" . $this->model->getTable() . "` SET " . substr($cases, 0, -2) . " WHERE `$index` IN(" . '"' . implode('","', $ids) . '"' . ");";
        return DB::connection($this->model->getConnection()->getName())->update($query);
    }

}
