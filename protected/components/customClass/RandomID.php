<?php
       
class RandomID {
    //random 899 3 numbers types
    public function  three_digit(){
        $random_number = mt_rand(100, 999); //three digit random number
        return $random_number;
}
    //random 899 4 numbers types
    public function  four_digit(){
        $random_number = mt_rand(1000, 9999); //four digit random number
        return $random_number;
}
    //random 899 5 numbers types
    public function  five_digit(){
        $random_number = mt_rand(10000, 99999); //five digit random number
        return $random_number;
}
}