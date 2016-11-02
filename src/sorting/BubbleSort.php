<?php

/**
 * Created by PhpStorm.
 * User: Gavin
 * Date: 2016/11/1
 * Time: 21:49
 */
class BubbleSort {
    // 排序
    public function sort( $arr ) {
        // 记录程序起始微妙时间
        $start = microtime();

        // 运行几趟 (n-1)
        for ( $i = 0; $i < count($arr) - 1; $i++ ) {
            // 交换的次数 每一次交换,都会把最大的值放到数组尾部,所有每一趟交换的次数都会减一次
            for ( $j = 0; $j < count($arr) - $i - 1; $j++ ) {
                if ( $arr[ $j ] > $arr[ $j + 1 ] )
                    $this->change($arr[ $j ], $arr[ $j + 1 ]);
            }
        }

        // 记录程序结束微妙时间
        $end = microtime();

        // 程序运行的毫秒 (微妙 * 1000)
        $cost = ($end - $start) * 1000;

        echo "用时花费: $cost ms".PHP_EOL;

        return $arr;
    }

    // 交换数字 a 和 b
    function change( &$a, &$b ) {
        $temp = $a;
        $a = $b;
        $b = $temp;
    }

}

$bs = new BubbleSort();
print_r($bs->sort([ 5, 88, 1,9,762,2739,91237,8364,986,98,12,33, 33, 12 ]));
