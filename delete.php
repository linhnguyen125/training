<?php

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    // lấy dữ liệu
    $str = file_get_contents('./data.json');
    $data = json_decode($str, true);
    for ($i = 0; $i <= count($data) - 1; $i++) {
        if ($data[$i]['id'] == $id) {
            $data = json_decode($str, true);
            unset($data[$i]); // xóa dữ liệu
            // cập nhật lại file json
            $file = fopen('./data.json', 'w');
            fwrite($file, json_encode($data));
            fclose($file);
            break;
        }
    }
    header('Location: ' . './index.php');
    exit;
}
