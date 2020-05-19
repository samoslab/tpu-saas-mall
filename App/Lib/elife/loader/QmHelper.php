<?php

/**
 * Index: local_xiaoma
 * Date: 2015/4/1
 * Time: 13:45
 * Class QmUtil
 * 公共方法
 */

class QmHelper{

    /**
     * 时间差
     * @param $begin_time
     * @param $end_time
     * @return array
     */
    public static function dateTimeDiff($begin_time,$end_time){
        $begin_time = strtotime($begin_time);
        $end_time = strtotime($end_time);

        if ( $begin_time < $end_time ) {
            $start_time = $begin_time;
            $end_time = $end_time;
        } else {
            $start_time = $end_time;
            $end_time = $begin_time;
        }
        $time_diff = $end_time - $start_time;
        $days = ceil( $time_diff / 86400 );
        $hours = ceil( $time_diff / 3600 );
        $mins = ceil( $time_diff / 60 );
        $secs = $time_diff;
        $res = array( "day" => $days, "hour" => $hours, "min" => $mins, "sec" => $secs );
        return $res;
    }

    /**
     * 当前毫秒数时间戳
     * @return float
     */
    public static function msectime() {
        list($usec, $sec) = explode(' ', microtime());
        return (float)sprintf('%.0f', (floatval($usec) + floatval($sec)) * 1000);
    }
}
