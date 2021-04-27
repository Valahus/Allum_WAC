<?php
/**
 * Created by PhpStorm.
 * User: vulgaris
 * Date: 11/29/18
 * Time: 2:47 PM
 */


function createTable($tab_size)
{
    $tab = array_fill(1, $tab_size, "i");
    print_r($tab);
    return $tab;
}

function player1($number1, $tab_size)
{
    if ($number1 < 4 && $number1 > 0) {
        $res = $tab_size;
        $tab_size = $res - $number1;

        createTable($tab_size);

    }

    return $tab_size;
}

function player2($number2, $tab_size)
{
    if ($number2 < 4 && $number2 > 0) {
        $res = $tab_size;
        $tab_size = $res - $number2;
        createTable($tab_size);

    }
    return $tab_size;
}


echo("enter 1 to start\n");
$line = trim(fgets(STDIN));
echo("set table ");
fscanf(STDIN, "%d\n", $tab_size);
createTable($tab_size);
$status = 0;

$turns = array();
$number = array();

echo("player1 to start \n");
echo("pick 1-3 ");
fscanf(STDIN, "%d\n", $number[0]);
$turns[0] = player1($number[0], $tab_size);


echo("player2 to start \n");
echo("pick 1-3 ");
fscanf(STDIN, "%d\n", $number[1]);
$turns[1] = player1($number[1], $turns[0]);


for ($i = 2; $i < $tab_size; $i++) {
    if ($i % 2 == 0) {

        echo("player1 to start \n");
        echo("pick 1-3 ");
        fscanf(STDIN, "%d\n", $number[$i]);
        $turns[$i] = player1($number[$i], $turns[$i - 1]);

    } else if ($i % 2 != 0) {
        echo("player2 to start \n");
        echo("pick 1-3 ");
        $random = rand(1, 3);
        $turns[$i] = player2($random, $turns[$i - 1]);
    }
    if ($turns[$i] == 1) {
        echo "t'as perdu";
        return 0;
    }
}

/*
    echo("player2 to start \n");
echo("pick 1-3 ");
fscanf(STDIN, "%d\n", $number4);
$p4 = player2($number4, $p3);

*/
echo " WINNNNN";


