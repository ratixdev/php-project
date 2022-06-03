<?php
error_reporting(0);
require 'functions.php';
$token = "5381156800:AAHWpXiM-pJhzq-VfR_82pXx8_3crcDBIAo";
$apiUrl = "https://api.telegram.org/bot$token/";
$update = json_decode($content, true);

$data = query("SELECT DISTINCT chat_id, nik FROM users");
$arr = [];
foreach ($data as $row) {
    $pack = "";
    $nik = $row["nik"];
    $chatId = $row["chat_id"];

    $cek_data = mysqli_query($conn, "SELECT * FROM enddate WHERE nik = '$nik'");

    if (mysqli_fetch_assoc($cek_data)) {
        $send = [
            'text' => "<b>BERIKUT ADALAH DATA ENDDATE</b>",
            'chat_id' => $chatId,
            'parse_mode' => 'html'
        ];
        file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
    }
}

$data = query("SELECT * FROM enddate");
$arr = [];
foreach ($data as $row) {
    $pack = "";
    $nik = $row["nik"];
    $data = query("SELECT chat_id FROM users WHERE nik = '$nik'")[0];
    $chatId = $data["chat_id"];

    if (is_null($chatId)) {
    } else {
        $id = $row["id"];
        $am = $row["am"];
        $witel = $row["witel"];
        $sid = $row["sid"];
        $nama_pelanggan = $row["nama_pelanggan"];
        $nomor_kontrak = $row["nomor_kontrak"];
        $layanan = $row["layanan"];
        $end_kontrak = $row["end_kontrak"];
        $var =
            "<b>" . "ID DATA = " . $id . "</b>" . "\n" .
            "am : " . $am . "\n" .
            "witel : " . $witel . "\n" .
            "sid : " . $sid . "\n" .
            "nama_pelanggan : " . $nama_pelanggan . "\n" .
            "nomor_kontrak : " . $nomor_kontrak . "\n" .
            "layanan : " . $layanan . "\n" .
            "end_kontrak : " . $end_kontrak . "\n\n";

        $arr[] = $var;

        for ($j = 0; $j < count($arr); $j++) {
            $packVal = $arr[$j];
            $pack .= $packVal;
        }

        if (empty($pack)) {
            $send = [
                'text' => "<b><i>Data tidak ditemukan</i></b>",
                'chat_id' => $chatId,
                'parse_mode' => 'html'
            ];
        } else {
            $send = [
                'text' => "$pack",
                'chat_id' => $chatId,
                'parse_mode' => 'html'
            ];
        }

        file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
        unset($pack);
        unset($arr);
    }
}
