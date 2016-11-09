<?php

/**
 * Created by PhpStorm.
 * User: Gavin
 * Date: 2016/11/1
 * Time: 21:49
 */

/**
 * 冒泡排序
 *
 * @param array $inArr
 *
 * @return array
 */
function bubbleSort( array $inArr ) {
    // 定义排序后的数组
    $sortedSetArr = $inArr;

    // 数组个数
    $count = count($sortedSetArr);

    // 记录程序起始微妙时间
    $start = microtime();

    // 循环运行 n-1 趟
    for ( $i = 1; $i < $count; $i++ ) {
        // 交换的次数 每一次交换,都会把最大的值放到数组尾部,所有每一趟交换的次数都会减一次
        for ( $j = 0; $j < $count - $i; $j++ ) {
            if ( $sortedSetArr[ $j ] > $sortedSetArr[ $j + 1 ] )
                swap($sortedSetArr[ $j ], $sortedSetArr[ $j + 1 ]);
        }
    }

    // 记录程序结束微妙时间
    $end = microtime();

    // 程序运行的毫秒 (微妙 * 1000)
    $cost = ( $end - $start ) * 1000;

    return getSortConclusion('冒泡排序 时间复杂度: O(N^2)', $inArr, $sortedSetArr, $cost);
}

$outArr = bubbleSort(getInArr());
echo $outArr['outputHumanStr'];


