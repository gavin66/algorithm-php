<?php
    /**
     * Created by PhpStorm.
     * User: Gavin
     * Date: 2016/11/16
     * Time: 18:06
     */


    /**
     * 队列实现
     *
     * Class Queue
     */
    class Queue {
        // 队列
        private $queue;

        // 队列长度
        private $size;

        // 初始化
        public function __construct() {
            $this->queue = [];
            $this->size = 0;
        }

        /**
         * 入队
         *
         * @param $data
         *
         * @return array
         */
        public function enqueue( $data ) {
            $this->queue[ $this->size++ ] = $data;

            return $this->queue;
        }


        /**
         * 出队
         *
         * @return bool|mixed
         */
        public function dequeue() {
            if ( !$this->isEmpty() ) {
                --$this->size;

                return array_shift($this->queue);
            }

            return false;
        }

        /**
         * 获取队列
         *
         * @return array
         */
        public function getQueue() {

            return $this->queue;

        }

        /**
         * 获取队列长度
         *
         * @return int
         */
        public function getSize() {

            return $this->size;

        }

        /**
         * 队列是否为空
         *
         * @return bool
         */
        public function isEmpty() {
            if ( $this->size === 0 )
                return true;
            else
                return false;
        }

    }

