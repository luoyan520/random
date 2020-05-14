<?php
declare (strict_types=1);

namespace LuoYan;


class Random
{
    /**
     *
     * 生成随机字符串
     *
     * @param int $length 生成位数
     * @param int $numeric
     * @return string 随机字符串
     */
    public static function random(int $length, int $numeric = 0): string
    {
        //生成若干位随机字符串
        $seed = base_convert(md5(microtime() . mt_rand(100000, 999999)), 16, $numeric ? 10 : 35);
        $seed = $numeric ? (str_replace('0', '', $seed) . '012340567890') : ($seed . 'zZ' . strtoupper($seed));
        $hash = '';
        $max = strlen($seed) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $hash .= $seed[$rand];
        }
        return $hash;
    }

    /**
     *
     * 生成指定的随机字符串
     *
     * @param int $len 需要生成的长度
     * @param int $type 0为大小写均有，1为仅大写，2为仅小写
     * @return string 随机字符串
     */
    public static function get_rand_str(int $len = 12, int $type = 0): string
    {
        $str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $str_len = strlen($str);
        $rand_str = '';
        for ($i = 0; $i < $len; $i++) {
            $rand_str .= $str[mt_rand(0, $str_len - 1)];
        }
        if ($type == 1) {
            $rand_str = strtoupper($rand_str);
        } elseif ($type == 2) {
            $rand_str = strtolower($rand_str);
        }
        return $rand_str;
    }

    /**
     *
     * 生成指定长度的随机数
     *
     * @param int $len 需要的长度
     * @return string 生成的字符串
     */
    public static function get_num(int $len = 8): string
    {
        $str = '0123456789';
        $str_len = strlen($str);
        $rand_str = '';
        for ($i = 0; $i < $len; $i++) {
            $rand_str .= $str[mt_rand(0, $str_len - 1)];
        }
        return $rand_str;
    }

}