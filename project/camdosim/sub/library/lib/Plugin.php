<?php
function checkYahoo($id = ""){
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

function short_title( $title, $length ) {
    if ( is_null($title) || !is_string($title) )
        return '';
    if ( preg_match("/^((&[^\s]+;|\w|\W){" . $length . "})/ui", $title, $match) ) {
        if ( preg_match("/^((&[^\s]+;|\w|\W){" . ($length - 4) . "})/ui", $title, $m) ) {
            return "<span title='" . escape_html($title) . "'>{$m[1]} ...</span>";
        } else {
            return $title;
        }
    } else {
        return $title;
    }
}

function escape_html( $data ) {
    $data = preg_replace('/"/ui', "&quot;", $data);
    $data = preg_replace("/'/ui", "&#039;", $data);
    $data = preg_replace('/</ui', '&lt;', $data);
    $data = preg_replace('/>/ui', '&gt;', $data);
    return $data;

}

function code_generate($table, $pk = 'ID', $prefix = null){
    $code = NV_Data::_db()->fetchOne("SELECT MAX(`{$pk}`) FROM `{$table}`");
    $code += 1;
    $code2 = str_pad($code, 5, "0", STR_PAD_LEFT);
    $code2 = $prefix . $code2;
    if (NV_Data::_db()->fetchOne("SELECT COUNT(*) FROM `{$table}` WHERE `code` LIKE ?", array($code2))){
        $code += 1;
        code_generate($table, $pk, $prefix);
    }
    return $code2;
}

function getCache($table, $file = null, $alias = 'ID', $order = 'title', $order_type = 'DESC' ){
    if (is_null($file)) {
        $file = $table;
    }
    $posts = getCacheDB($file);
    if (!$posts){
        $posts = array();
        $data = NV_Data::_db()->fetchAll("SELECT * FROM `{$table}` ORDER BY `{$order}` {$order_type}");
        foreach ($data as $v) {
            $posts[$v[$alias]] = $v;
        }
        setCacheDB($file, array($table), $posts);
    }
    return $posts;
}

function create_alias( $data ) {
    $data = preg_replace('/\s+/ui', '-', $data);

    //data must
    $maTViet = array(
        "à", "á", "ạ", "ả", "ã", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă",
        "ằ", "ắ", "ặ", "ẳ", "ẵ", "è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề",
        "ế", "ệ", "ể", "ễ",
        "ì", "í", "ị", "ỉ", "ĩ",
        "ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ", "ố", "ộ", "ổ", "ỗ", "ơ",
        "ờ", "ớ", "ợ", "ở", "ỡ",
        "ù", "ú", "ụ", "ủ", "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ",
        "ỳ", "ý", "ỵ", "ỷ", "ỹ",
        "đ",
        "À", "Á", "Ạ", "Ả", "Ã", "Â", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ", "Ă",
        "Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ",
        "È", "É", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ề", "Ế", "Ệ", "Ể", "Ễ",
        "Ì", "Í", "Ị", "Ỉ", "Ĩ",
        "Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ô", "Ồ", "Ố", "Ộ", "Ổ", "Ỗ", "Ơ",
        "Ờ", "Ớ", "Ợ", "Ở", "Ỡ",
        "Ù", "Ú", "Ụ", "Ủ", "Ũ", "Ư", "Ừ", "Ứ", "Ự", "Ử", "Ữ",
        "Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ",
        "Đ", " ", "<", ">", "&", "#", "\'", '\"', "?", "#", "!", ":", "\/"
    );

    $maKoDau = array(
        "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a",
        "a", "a", "a", "a", "a", "a",
        "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e",
        "i", "i", "i", "i", "i",
        "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o",
        "o", "o", "o", "o", "o",
        "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u",
        "y", "y", "y", "y", "y",
        "d",
        "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A",
        "A", "A", "A", "A", "A",
        "E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E",
        "I", "I", "I", "I", "I",
        "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O",
        "O", "O", "O", "O", "O",
        "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U",
        "Y", "Y", "Y", "Y", "Y",
        "D", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-"
    );
    $data = str_replace($maTViet, $maKoDau, trim($data));
    $data = preg_replace('/-{2,}/ui', '-', $data);
    $data = preg_replace('/-/ui', '_', $data);
    $data = strtolower($data);
    return $data;

}
?>
