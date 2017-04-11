<?php

function l($string)
{
    $string = snake_case($string);
    return str_replace('-', '_', $string);
}

function c($string)
{
    $string = str_replace('_', ' ', $string);
    return title_case($string);
}

function stars($count)
{
    return str_repeat('<span class="fa fa-star text-yellow"></span>', $count);
}

function shop_url($string)
{
    return env('SHOP_URL') .'/' . $string;
}

function cdn($string)
{
    return env('CDN_URL') .'/' . $string;
}

function pre_r($array)
{
    print '<pre>';
    print_r($array);
    print '</pre>';
}