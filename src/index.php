<?php
/**
 * Created by PhpStorm.
 * User: Gavin
 * Date: 2016/11/9
 * Time: 11:36
 */

// 根目录
define('ROOT_PATH', dirname(__FILE__));

// 导入工具
require ROOT_PATH . '/tools.php';

$selectable = [
    1 => '桶排序',
    2 => '冒泡排序',
    3 => '快速排序',
];

foreach ( $selectable as $k => $v ) {
    echo $k . '.' . $v . PHP_EOL;
}

do {
    fwrite(STDOUT, '请选择排序类型：');
    $type = trim( fgets(STDIN) );
} while ( !array_key_exists($type,$selectable) );


switch ($type){
    case 1:
        require_once ROOT_PATH.'/sorting/BucketSort.php';
        break;
    case 2:
        require_once ROOT_PATH.'/sorting/BubbleSort.php';
        break;
    case 3:
        require_once ROOT_PATH.'/sorting/QuickSort.php';
        break;
    default:
        break;
}