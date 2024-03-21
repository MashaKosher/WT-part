<?php
$post_arr = explode(' ', $_POST[0]);
$arr_len = count($post_arr)-1;
for ($i = $arr_len; $i >= 0; $i--){
    echo $post_arr[$i].' ';
}