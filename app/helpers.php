<?php

function l($string)
{
    $string = snake_case($string);
    return str_replace('-', '_', $string);
}

function shop_url($string)
{
    return env('SHOP_URL') .'/' . l($string);
}