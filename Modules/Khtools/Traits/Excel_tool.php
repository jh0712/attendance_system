<?php

namespace Modules\Khtools\Traits;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical;
trait Excel_tool
{
    // 精确加法
    function excel_add($num1, $num2, $scale = 9)
    {
        return bcadd($num1, $num2, $scale);
    }
//    function add($num1, $num2, $scale = 9)
//    {
//        return bcadd($num1, $num2, $scale);
//    }
    // 精确减法
    function sub($num1, $num2, $scale = 9)
    {
        return bcsub($num1, $num2, $scale);
    }

    // 精确乘法
    function mul($num1, $num2, $scale = 9)
    {
        return bcmul($num1, $num2, $scale);
    }

    // 精确除法
    function div($num1, $num2, $scale = 9)
    {
        return bcdiv($num1, $num2, $scale);
    }

    // 求平均数
    function array_avg(array $nums)
    {
        return $this->div(array_sum($nums), count($nums));
    }

    // 求线性回归斜率
    function slope(array $y_ls, array $x_ls)
    {
        $avg_y = $this->array_avg($y_ls); // y的平均数
        $avg_x = $this->array_avg($x_ls); // x的平均数
        $E_top = 0;
        foreach ($x_ls as $i => $x) {
            $E_top = $this->excel_add($E_top, $this->mul($this->sub($x, $avg_x), $this->sub($y_ls[$i], $avg_y)));
        }
        $E_bottom = 0;
        foreach ($x_ls as $i => $x) {
            $tmp = $this->sub($x, $avg_x);
            $E_bottom = $this->excel_add($E_bottom, $this->mul($tmp, $tmp));
        }
        if ($E_bottom == 0) {
            return null;
        }
        return $this->div($E_top, $E_bottom);
    }

    // 求线性回归截距
    function intercept(array $y_ls, array $x_ls)
    {
        $avg_y = $this->array_avg($y_ls); // y的平均数
        $avg_x = $this->array_avg($x_ls); // x的平均数
        $rate = $this->slope($y_ls, $x_ls);
        return $this->sub($avg_y, $this->mul($rate, $avg_x), 7);
    }
    function stats_standard_deviation(array $a, $sample = false) {
        $n = count($a);
        if ($n === 0) {
            trigger_error("The array has zero elements", E_USER_WARNING);
            return false;
        }
        if ($sample && $n === 1) {
            trigger_error("The array has only 1 element", E_USER_WARNING);
            return false;
        }
        $mean = array_sum($a) / $n;
        $carry = 0.0;
        foreach ($a as $val) {
            $d = ((double) $val) - $mean;
            $carry += $d * $d;
        };
        if ($sample) {
            --$n;
        }
        return sqrt($carry / $n);
    }
    function excel_NORMINV($probability, $mean, $stdDev){
        #probability = 參數
        #mean = TL
        #stdDev = STD.DEVIATION
        return Statistical::NORMINV($probability, $mean, $stdDev);
    }
}
