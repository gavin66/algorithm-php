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

    // 可选择的算法
    $selectableMenuArr = [
        1 => '桶排序',
        2 => '冒泡排序',
        3 => '快速排序',
        4 => '队列',
    ];

    foreach ( $selectableMenuArr as $k => $v ) {
        echo $k . '.' . $v . PHP_EOL;
    }

    do {
        fwrite(STDOUT, '请选择排序类型：');
        $selectableMenuStr = trim(fgets(STDIN)); // 已选的算法选项
    } while ( !array_key_exists($selectableMenuStr, $selectableMenuArr) );


    switch ( $selectableMenuStr ) {
        case 1:
            require_once ROOT_PATH . '/sorting/BucketSort.php';
            $outArr = bucketSort(getInArr());
            echo $outArr['outputHumanStr'];

            break;
        case 2:
            require_once ROOT_PATH . '/sorting/BubbleSort.php';
            $outArr = bubbleSort(getInArr());
            echo $outArr['outputHumanStr'];

            break;
        case 3:
            require_once ROOT_PATH . '/sorting/QuickSort.php';
            $inArr = getInArr();
            $sortedSetArr = $inArr;

            // 记录程序起始微妙时间
            $start = microtime();
            // 开始排序
            quickSort($sortedSetArr);
            // 记录程序结束微妙时间
            $end = microtime();
            // 程序运行的毫秒 (微妙 * 1000)
            $cost = ( $end - $start ) * 1000;

            // 去除第一个占位的item
            array_shift($sortedSetArr);

            $outArr = getSortConclusion('快速排序 最差时间复杂度:O(N^2) 平均时间复杂度:O(NlogN)', $inArr, $sortedSetArr, $cost);
            echo $outArr['outputHumanStr'];

            break;
        case 4:
            require_once ROOT_PATH . '/data-structures/Queue.php';
            $queue = new Queue();

            // 队列算法可选择的选项
            $selectableQueueArr = [
                1 => '入队',
                2 => '出队',
                3 => '获取当前队列',
                4 => '结束脚本',
            ];

            while ( true ) {
                foreach ( $selectableQueueArr as $k => $v ) {
                    echo $k . '.' . $v . PHP_EOL;
                }
                do {
                    fwrite(STDOUT, '请选择执行方式：');
                    $selectableQueueStr = trim(fgets(STDIN)); // 已选择的队列选项
                } while ( !array_key_exists($selectableQueueStr, $selectableQueueArr) );
                switch ( $selectableQueueStr ) {
                    case 1:
                        do {
                            fwrite(STDOUT, '入队内容：');
                            $enqueueContent = trim(fgets(STDIN)); // 需要入队的内容 不能为空
                        } while ( is_null($enqueueContent) );
                        $queue->enqueue($enqueueContent);
                        break;
                    case 2:
                        echo '出队:' . $queue->dequeue().PHP_EOL;
                        break;
                    case 3:
                        echo '目前队列为:' . json_encode($queue->getQueue()).PHP_EOL;
                        break;
                    case 4:
                        exit();
                        break;
                    default:
                        break;
                }
            }
            break;

        default:
            break;
    }