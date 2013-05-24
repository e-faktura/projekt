<?php

    /**
    *
    * @copyright (c) 2010 Łukasz Rutkowski
    * @link http://blog.lukaszrutkowski.com/kwota-slownie/
    * @license http://creativecommons.org/licenses/by/3.0/pl/ Creative Commons Uznanie autorstwa 3.0
    *
    */
     
    class KwotaSlownie {
        private static $units = array(
            'zero',
            'jeden',
            'dwa',
            'trzy',
            'cztery',
            'pięć',
            'sześć',
            'siedem',
            'osiem',
            'dziewięć',
            'dziesięć',
            'jedenaście',
            'dwanaście',
            'trzynaście',
            'czternaście',
            'piętnaście',
            'szesnaście',
            'siedemnaście',
            'osiemnaście',
            'dziewiętnaście'
        );
        private static $tens = array(
            '',
            'dziesięć',
            'dwadzieścia',
            'trzydzieści',
            'czterdzieści',
            'pięćdziesiąt',
            'sześćdziesiąt',
            'siedemdziesiąt',
            'osiemdziesiąt',
            'dziewięćdziesiąt'
        );
        private static $hundreds = array(
            '',
            'sto',
            'dwieście',
            'trzysta',
            'czterysta',
            'pięćset',
            'sześćset',
            'siedemset',
            'osiemset',
            'dziewięćset'
        );
     
        private static $thousands = array(
            'tysiąc',
            'tysiące',
            'tysięcy'
        );
     
        private static $millions = array(
            'milion',
            'miliony',
            'milionów'
        );
     
        public static function getGr($amount)
        {
            $gr = ( $amount - floor($amount) ) * 100;
            return $gr;
        }
     
        public static function getZl($amount)
        {
            $str = '';
     
            $zl = floor($amount);
            $len = strlen($zl);
            if($len >= 7) {
                $million = substr($zl, -7, 1);
                $million2 = substr($zl, -7, 1);
                if($len >= 5) {
                    $million = substr($zl, -8, 1).$million;
                }
                if($len >= 6) {
                    $million = substr($zl, -9, 1).$million;
                }
                if($million != 1) {
                    $str .= self::getZl((float)$million).' ';
                }
                if($million2 == 1) {
                    $str .= self::$millions[0].' ';
                } elseif($million2 >= 2 AND $million2 <= 4) {
                    $str .= self::$millions[1].' ';
                } else {
                    $str .= self::$millions[2].' ';
                }
            }
     
            if($len >= 4) {
                $thousand = substr($zl, -4, 1);
                $thousand2 = substr($zl, -4, 1);
                if($len >= 5) {
                    $thousand = substr($zl, -5, 1).$thousand;
                }
                if($len >= 6) {
                    $thousand = substr($zl, -6, 1).$thousand;
                }
                if($thousand > 1) {
                    $str .= self::getZl((float)$thousand).' ';
                }
                if($thousand2 == 1) {
                    $str .= self::$thousands[0].' ';
                } elseif($thousand2 >= 2 AND $thousand2 <= 4) {
                    $str .= self::$thousands[1].' ';
                } elseif($thousand2 != 0) {
                    $str .= self::$thousands[2].' ';
                }
            }
     
            if($len >= 3) {
                $hundreds = substr($zl, -3, 1);
                if($hundreds != 0) {
                    $str .= self::$hundreds[$hundreds].' ';
                }
            }
            if($len >= 1) {
                if($len == 1) {
                    $to99 = substr($zl, -1, 1);
                } else {
                    $to99 = substr($zl, -2, 2);
                }
                if($to99 < 20) {
                    if(substr($to99, 0, 1) == '0') {
                        $to99 = substr($to99, 1, 1);
                    }
                    if($to99 != 0) {
                        $str .= self::$units[$to99].' ';
                    }
                } else {
                    $ten = substr($to99, 0, 1);
                    $str .= self::$tens[$ten].' ';
     
                    $unit = substr($to99, 1, 2);
                    if($unit != '0') {
                        $str .= ' '.self::$units[$unit].' ';
                    }
                }
            }
            if($zl == 0) {
                $str .= self::$units[0].' ';
            }
            return $str;
        }
     
        public static function get($amount)
        {
            $str = self::getZl($amount).'zł '.self::getGr($amount).'/100';
            return $str;
        }
    }
?>