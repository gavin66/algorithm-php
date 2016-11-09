<?php
/**
 * Created by PhpStorm.
 * User: Gavin
 * Date: 2016/11/4
 * Time: 13:45
 */
include '../tools.php';


/**
 * 桶排序
 *
 * @param array $inArr
 *
 * @return array
 */
function bucketSort( array $inArr ) {
    // 定义排序后的数组
    $sortedSetArr = [];

    // 数组中最大值
    $maxInt = max($inArr);

    // 数组中最小值
    $minInt = min($inArr);

    // 记录程序起始微妙时间
    $start = microtime();

    // 获取桶
    $buckets = array_fill($minInt, $maxInt - $minInt + 1, 0); // 循环了m次,获取了m个桶

    // 数组中出现的数字放入桶中
    foreach ( $inArr as $val ) $buckets[ $val ]++; // 循环了n次,插入带排序的个数

    // 排序后的数组
    foreach ( $buckets as $k => $v ) { // 循环m个桶
        for ( $i = 1; $i <= $v; $i++ ) { // 一共有n个数
            $sortedSetArr[] = $k;
        }
    }

    // 记录程序结束微妙时间
    $end = microtime();

    // 程序运行的毫秒 (微妙 * 1000)
    $cost = ( $end - $start ) * 1000;

    return getSortConclusion('桶排序 时间复杂度: O(M+N)', $inArr, $sortedSetArr, $cost);
}

$outArr = bucketSort(getInArr());
echo $outArr['outputHumanStr'];