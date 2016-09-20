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
    return str_repeat('<span class="icon icon-star text-yellow"></span>', $count);
}

function shop_url($string)
{
    return env('SHOP_URL') .'/' . l($string);
}