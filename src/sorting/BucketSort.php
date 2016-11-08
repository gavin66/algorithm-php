<?php
/**
 * Created by PhpStorm.
 * User: Gavin
 * Date: 2016/11/4
 * Time: 13:45
 */

/**
 * 桶排序
 *
 * @param array $inArr
 *
 * @return array
 */
function bucketSort( array $inArr ) {
    // 定义排序后的数组
    $sortArr = [];

    // 数组中最大值
    $maxInt = max($inArr);

    // 数组中最小值
    $minInt = min($inArr);

    // 获取桶
    $buckets = array_fill($minInt,$maxInt-$minInt + 1,0);

    // 记录程序起始微妙时间
    $start = microtime();

    // 数组中出现的数字放入桶中
    foreach ($inArr as $val) $buckets[$val]++;

    // 排序后的数组
    foreach ($buckets as $k=>$v){
        for($i=1;$i<=$v;$i++){
            $sortArr[] = $k;
        }
    }

    // 记录程序结束微妙时间
    $end = microtime();

    // 程序运行的毫秒 (微妙 * 1000)
    $cost = ( $end - $start ) * 1000;

    $costStr = "------------桶排序 时间复杂度: O(M+N)----------" . PHP_EOL . "用时: $cost ms" . PHP_EOL;
    $sortStr = '排序后:' . implode(',', $sortArr) . PHP_EOL . '-------------------------------------------------' . PHP_EOL;

    return [
        'cost'    => $cost,
        'costStr' => $costStr,
        'sortArr' => $sortArr,
        'sortStr' => $sortStr,
        'content' => $costStr . $sortStr,
    ];
}

// 获取命令行输入的参数
array_shift($argv); // 移除第一个参数 因为是文件名
if ( empty( $argv ) ) { // 如果数组还为空,赋予默认数组
    $argv = [ 5, 88, 1, 9, 762, 2739, 91237, 8364, 986, 98, 12, 33, 33, 12 ];
//    $argv = [ 6,3,8,4 ];
}

$arr = bucketSort($argv);
echo $arr['content'];