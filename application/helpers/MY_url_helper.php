<?php
/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 5/12/15
 * Time: 5:13 PM
 */

function new_current_url(){
    $url =current_url() ;
    $url1 = explode('/',$url);
    return str_replace('/'.end($url1),'',$url);
}
