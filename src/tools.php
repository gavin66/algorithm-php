<?php
/**
 * Created by PhpStorm.
 * User: Gavin
 * Date: 2016/11/3
 * Time: 17:57
 */

/**
 * 交换参数值
 * @param mixed $a
 * @param mixed $b
 */
function swap( &$a, &$b ) {
    $temp = $a;
    $a = $b;
    $b = $temp;
}