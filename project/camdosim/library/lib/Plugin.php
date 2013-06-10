<?php

function checkYahoo($id = "") {
    $lines = @file("http://opi.yahoo.com/online?u={$id}&m=t");
    if ($lines !== false) {
        $response = implode("", $lines);
        if (stripos($response, "NOT ONLINE") !== false) {
            return 'offline';
        } elseif (stripos($response, "ONLINE") !== false) {
            return 'online';
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}

function short_title($title, $length) {
    if (is_null($title) || !is_string($title))
        return '';
    if (preg_match("/^((&[^\s]+;|\w|\W){" . $length . "})/ui", $title, $match)) {
        if (preg_match("/^((&[^\s]+;|\w|\W){" . ($length - 4) . "})/ui", $title, $m)) {
            return "<span title='" . escape_html($title) . "'>{$m[1]} ...</span>";
        } else {
            return $title;
        }
    } else {
        return $title;
    }
}

function escape_html($data) {
    $data = preg_replace('/"/ui', "&quot;", $data);
    $data = preg_replace("/'/ui", "&#039;", $data);
    $data = preg_replace('/</ui', '&lt;', $data);
    $data = preg_replace('/>/ui', '&gt;', $data);
    return $data;
}

function code_generate($table, $pk = 'ID', $prefix = null) {
    $code = NV_Data::_db()->fetchOne("SELECT MAX(`{$pk}`) FROM `{$table}`");
    $code += 1;
    $code2 = str_pad($code, 5, "0", STR_PAD_LEFT);
    $code2 = $prefix . $code2;
    if (NV_Data::_db()->fetchOne("SELECT COUNT(*) FROM `{$table}` WHERE `code` LIKE ?", array($code2))) {
        $code += 1;
        code_generate($table, $pk, $prefix);
    }
    return $code2;
}

function randomText($length) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = null;
    $size = strlen($chars);
    for ($i = 0; $i < $length; $i++) {
        $str .= $chars[rand(0, $size - 1)];
    }
    return $str;
}

?>
