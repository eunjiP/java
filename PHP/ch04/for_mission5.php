<?php
    /*
    문제) 2~9단까지 구구단 출력
    */
    for($i = 2; $i < 10; $i++)
    {
        for($j=1; $j < 10; $j++)
        {
            print "$i X $j = " . $i * $j . " <br>";
        }
        print "==================<br>";
    }


?>