<?php
/**
 * Created by PhpStorm.
 * User: Gavin
 * Date: 2016/11/3
 * Time: 17:57
 */

/**
 * 从命令行获取输入数组
 *
 * @return array
 */
function getInArr(){
    do {
        fwrite(STDOUT, '请输入待排序数组(数字与数字之间用空格分隔)：');
        $inArrStr = trim( fgets(STDIN) );
    } while ( !$inArrStr );

    $inArr = explode(' ',$inArrStr);

    return $inArr;
}

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

/**
 * 排序后输出数据
 *
 * @param string $sortType
 * @param array $sort
 * @param array $sortedSet
 * @param float $cost
 *
 * @return array
 */
function getSortConclusion($sortType,$sort,$sortedSet,$cost){
    $outputHumanStr = $sortType . PHP_EOL . "用时: $cost ms" . PHP_EOL .
                        '排序后:' . implode(',', $sortedSet) . PHP_EOL .
                        '-------------------------------------------------' . PHP_EOL;
    return [
        'sortArr' => $sort, // 带排序数组
        'sortedSetArr' => $sortedSet, // 排序后数组
        'cost'    => $cost, // 花费时间
        'outputHumanStr' => $outputHumanStr, // 利于阅读的字符串
    ];
}