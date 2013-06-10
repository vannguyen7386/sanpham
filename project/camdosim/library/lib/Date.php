<?php

function show_date() {
    if (func_num_args() == 0) {
        $format = 'd/m/Y';
        $date = date('Y-m-d', time());
    } else
    if (func_num_args() == 1) {
        $format = 'd/m/Y';
        $date = func_get_arg(0);
    } else {
        $format = func_get_arg(0);
        $date = func_get_arg(1);
    }

    if (strtotime($date) == 0 || $date == '0000-00-00') {
        return '';
    }
    return date($format, strtotime($date));
}

?>
