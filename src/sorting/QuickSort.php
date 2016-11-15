<?php
    /**
     * Created by PhpStorm.
     * User: Gavin
     * Date: 2016/11/3
     * Time: 18:06
     */

    /**
     * @param array $inArr
     * @param int   $start
     * @param int   $end
     * @param int   $run
     */
    function quickSort( array &$inArr, $start = 1, $end = 0, $run = 1 ) {
        if ( $run == 1 ) {
            array_unshift($inArr, '');

            // 一共几个数
            $end = count($inArr);
        }

        if ( $start > $end ) return;

        // 当前数组最小索引
        $iLeft = $start;
        // 当前数组最大索引
        $jRight = $end;
        // 基准数
        $temp = $inArr[ $iLeft ];

        while ( $iLeft != $jRight ) {
            // 从右侧往左侧走 寻找右侧比基准数小的数组索引
            while ( $temp < $jRight && $iLeft < $jRight )
                $jRight--;
            // 从左侧往右侧走 寻找
            while ( $temp > $iLeft && $iLeft < $jRight )
                $iLeft++;

            // 交换左侧与右侧
            if ( $iLeft < $jRight ) {
                $t = $inArr[ $iLeft ];
                $inArr[ $iLeft ] = $inArr[ $jRight ];
                $inArr[ $jRight ] = $t;
            }

        }

        $inArr[ $start ] = $inArr[ $iLeft ];
        $inArr[ $iLeft ] = $temp;

        quickSort($inArr, $start, $iLeft - 1, ++$run);
        quickSort($inArr, $iLeft + 1, $end, ++$run);

        return;
    }

    $inArr = [ 5, 99, 2, 3 ];
    quickSort($inArr);
    print_r($inArr);