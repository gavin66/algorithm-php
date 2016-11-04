<?php

/**
 * Created by PhpStorm.
 * User: Gavin
 * Date: 2016/11/1
 * Time: 21:49
 */
include '../tools.php';

// 获取命令行输入的参数
array_shift($argv); // 移除第一个参数 因为是文件名
if ( empty( $argv ) ) { // 如果数组还为空,赋予默认数组
    $argv = [ 5, 88, 1, 9, 762, 2739, 91237, 8364, 986, 98, 12, 33, 33, 12 ];
}


function bubbleSort( $arr ) {
    // 记录程序起始微妙时间
    $start = microtime();

    // 运行几趟 (n-1)
    for ( $i = 0; $i < count($arr) - 1; $i++ ) {
        // 交换的次数 每一次交换,都会把最大的值放到数组尾部,所有每一趟交换的次数都会减一次
        for ( $j = 0; $j < count($arr) - $i - 1; $j++ ) {
            if ( $arr[ $j ] > $arr[ $j + 1 ] )
                swap($arr[ $j ], $arr[ $j + 1 ]);
        }
    }

    // 记录程序结束微妙时间
    $end = microtime();

    // 程序运行的毫秒 (微妙 * 1000)
    $cost = ( $end - $start ) * 1000;


    $costStr = "------------冒泡排序----------" . PHP_EOL . "用时: $cost ms" . PHP_EOL;
    $sortStr = '排序后:' . implode(',', $arr) . PHP_EOL . '------------------------------' . PHP_EOL;

    return [
        'cost'    => $cost,
        'costStr' => $costStr,
        'sortArr' => $arr,
        'sortStr' => $sortStr,
        'content' => $costStr . $sortStr,
    ];
}

$arr = bubbleSort($argv);
echo $arr['content'];


