<?php
    $today = date('l, d-m-Y');
    echo $today;
    echo "<br>";
    echo date('d-m-Y', prevDay(3));
    $from = '09-03-2022';
    echo date('d-m-Y', PrevDayFrom(strtotime($from), 1));
    echo "<br>";
    echo dateDiff(mktime(0,0,0, 3, 12, 2022), mktime(0,0,0, 3, 14, 2022));

    function dateDiff($time1, $time2){
        $day1 = date('d', $time1);
        $month1 = date('m', $time1);
        $year1 = date('Y', $time1);
        $count=0;
        while($time1!=$time2){
            $time1 = mktime(0, 0, 0, $month1, $day1+1, $year1);
            $day1 = date('d', $time1);
            $month1 = date('m', $time1);
            $year1 = date('Y', $time1);
            $count++;
            if(date('l', $time1) == "Sunday"){
                $count--;
            }
        }
        return $count;
    }

    function nextDay($num){
        //echo "Today is ".date('l, d-m-Y')."<br>";
        $day = date('d');
        $month = date('m');
        $year = date('Y');
        for ($i = 1; $i <= $num; $i++)
        {
            //echo ($i)." ";
            $tomorrow  = mktime(0, 0, 0, $month  , $day+1, $year);
            if(date('l', $tomorrow) == "Sunday"){
                $i--;
            }
            $day = date('d', $tomorrow);
            $month = date('m', $tomorrow);
            $year = date('Y', $tomorrow);
            //echo "Day: ".$day." Month: ".$month." Year: ".$year." ".date('l, d-m-Y', $tomorrow)."<br>";
        }
        return $tomorrow;
    }

    function prevDay($num){
        //echo "Today is ".date('l, d-m-Y')."<br>";
        $day = date('d');
        $month = date('m');
        $year = date('Y');
        for ($i = 1; $i <= $num; $i++)
        {
            //echo ($i)." ";
            $yesterday  = mktime(0, 0, 0, $month  , $day-1, $year);
            if(date('l', $yesterday) == "Sunday"){
                $i--;
            }
            $day = date('d', $yesterday);
            $month = date('m', $yesterday);
            $year = date('Y', $yesterday);
            //echo "Day: ".$day." Month: ".$month." Year: ".$year." ".date('l, d-m-Y', $tomorrow)."<br>";
        }
        return $yesterday;
    }

    function prevDayFrom($time, $num){
        //echo "Today is ".date('l, d-m-Y')."<br>";
        $day = date('d', $time);
        $month = date('m', $time);
        $year = date('Y', $time);
        for ($i = 1; $i <= $num; $i++)
        {
            //echo ($i)." ";
            $yesterday  = mktime(0, 0, 0, $month  , $day-1, $year);
            if(date('l', $yesterday) == "Sunday"){
                $i--;
            }
            $day = date('d', $yesterday);
            $month = date('m', $yesterday);
            $year = date('Y', $yesterday);
            //echo "Day: ".$day." Month: ".$month." Year: ".$year." ".date('l, d-m-Y', $tomorrow)."<br>";
        }
        return $yesterday;
    }
?>