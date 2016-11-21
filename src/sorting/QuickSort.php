<?php
    /**
     * Created by PhpStorm.
     * User: Gavin
     * Date: 2016/11/3
     * Time: 18:06
     */

    /**
     * 快速排序
     *
     * @param array $inArr 排序的数组
     * @param int   $start 数组开始索引值
     * @param int   $end   数组最后索引值
     * @param int   $run   运行次数,初始为1
     */
    function quickSort( array &$inArr, $start = 1, $end = 0, $run = 1 ) {
        if ( $run == 1 ) {
            // 一共几个数
            $end = count($inArr);

            // 占据index=0的位置 使数组从index=1开始计算
            array_unshift($inArr, '');
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
            while ( $temp <= $inArr[ $jRight ] && $iLeft < $jRight )
                $jRight--;
            // 从左侧往右侧走 寻找左侧比基准数大的数组索引
            while ( $temp >= $inArr[ $iLeft ] && $iLeft < $jRight )
                $iLeft++;

            // 交换左侧与右侧
            if ( $iLeft < $jRight ) {
                swap($inArr[ $iLeft ], $inArr[ $jRight ]);
            }

        }

        // 基准数归位
        $inArr[ $start ] = $inArr[ $iLeft ];
        $inArr[ $iLeft ] = $temp;

        // 递归 左侧数组继续此操作
        quickSort($inArr, $start, $iLeft - 1, ++$run);
        // 递归 右侧数组继续此操作
        quickSort($inArr, $iLeft + 1, $end, ++$run);

        return;
    }