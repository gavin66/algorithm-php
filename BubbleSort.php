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
        $start = microtime();

        for ( $i = 0; $i < count($arr) - 1; $i++ ) {
            for ( $j = 0; $j < count($arr) - $i - 1; $j++ ) {
                if ( $arr[ $j ] > $arr[ $j + 1 ] ) $this->change($arr[ $j ], $arr[ $j + 1 ]);
            }
        }

        $end = microtime();

        $cost = ($end - $start) * 1000; // 毫秒 ms

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
