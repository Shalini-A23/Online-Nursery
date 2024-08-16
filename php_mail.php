<?php
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 2; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    $a=implode($pass); //turn the array into a string

    $alphabet1 = '!@#$%^&*';
    $pass1 = array(); //remember to declare $pass as an array
    $alphaLength1 = strlen($alphabet1) - 1; //put the length -1 in cache
    for ($i1 = 0; $i1 < 2; $i1++) {
        $n1 = rand(0, $alphaLength1);
        $pass1[] = $alphabet1[$n1];
    }
    $b=implode($pass1); //turn the array into a string

    $alphabet2 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $pass2 = array(); //remember to declare $pass as an array
    $alphaLength2 = strlen($alphabet2) - 1; //put the length -1 in cache
    for ($i2 = 0; $i2 < 2; $i2++) {
        $n2 = rand(0, $alphaLength2);
        $pass2[] = $alphabet2[$n2];
    }
    $c=implode($pass2); //turn the array into a string

    $alphabet3 = '1234567890';
    $pass3 = array(); //remember to declare $pass as an array
    $alphaLength3 = strlen($alphabet3) - 1; //put the length -1 in cache
    for ($i3 = 0; $i3 < 2; $i3++) {
        $n3 = rand(0, $alphaLength3);
        $pass3[] = $alphabet3[$n3];
    }
    $d=implode($pass3); //turn the array into a string

    $password=$a.$b.$c.$d;
    return $password;
}
?>