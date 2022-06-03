<?php
require 'functions.php';
error_reporting(0);

$token = "5381156800:AAHWpXiM-pJhzq-VfR_82pXx8_3crcDBIAo";
$apiUrl = "https://api.telegram.org/bot$token/";

$data = query("SELECT DISTINCT chat_id, nik FROM users");
$arr = [];
foreach ($data as $row) {
    $pack = "";
    $nik = $row["nik"];
    $chatId = $row["chat_id"];

    $cek_data = mysqli_query($conn, "SELECT * FROM pbaso WHERE nik = $nik");

    if (mysqli_fetch_assoc($cek_data)) {
        $send = [
            'text' => "<b>BERIKUT ADALAH DATA PENDING BASO</b>",
            'chat_id' => $chatId,
            'parse_mode' => 'html'
        ];
        file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
    }
}

$data = query("SELECT * FROM pbaso");
$arr = [];
foreach ($data as $row) {
    $pack = "";
    $nik = $row["nik"];
    $query = query("SELECT chat_id FROM users WHERE nik = '$nik'")[0];
    $chatId = $query["chat_id"];

    if (is_null($chatId)) {
    } else {
        $id_data = $row["id"];
        $agree_createdby_name = $row["agree_createdby_name"];
        $bill_accnt_name = $row["bill_accnt_name"];
        $li_product_name = $row["li_product_name"];
        $order_id = $row["order_id"];
        $order_subtype = $row["order_subtype"];
        $var =
            "<b>" . "ID DATA = " . $id_data . "</b>" . "\n" .
            "agree_createdby_name : " . $agree_createdby_name . "\n" .
            "bill_accnt_name : " . $bill_accnt_name . "\n" .
            "li_product_name : " . $li_product_name . "\n" .
            "order_id : " . $order_id . "\n" .
            "order_subtype : " . $order_subtype . "\n\n";

        $arr[] = $var;

        for ($j = 0; $j < count($arr); $j++) {
            $packVal = $arr[$j];
            $pack .= $packVal;
        }

        $send = [
            'text' => "$pack",
            'chat_id' => $chatId,
            'parse_mode' => 'html'
        ];

        file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
        unset($pack);
        unset($arr);
    }
}

$data = query("SELECT DISTINCT chat_id, nik FROM users");
$arr = [];
foreach ($data as $row) {
    $pack = "";
    $nik = $row["nik"];
    $chatId = $row["chat_id"];

    $cek_data = mysqli_query($conn, "SELECT * FROM pbaso WHERE nik = '$nik'");

    if (mysqli_fetch_assoc($cek_data)) {
        $command = "<b>COLLECT RESPON PENDING BASO VIA BOT TELEGRAM</b>\n\n" .
            "<b> --- LIST DAFTAR RESPON KETERANGAN --- </b>\n\n" .
            "[1] Pembuatan draft dokumen\n[2] Dokumen direview di pelanggan\n[3] Dokumen proses submit NCX\n[4] Baso completed, Pending Billing Approval\n[5] Terkendala delivery layanan\n[6] Terkendala pengiriman dokumen\n[7] Billing Complete\n[8] Lainnya\n\n" .
            "<b> --- LIST DAFTAR RESPON WAKTU --- </b>\n\n" .
            "[1] Week 1\n[2] Week 2\n[3] Week 3\n[4] Week 4\n\n" .
            "<b> --- FORMAT RESPON --- </b>\n\n" .
            "/respon [NIK] [ID_DATA] [NO_RESPON_KETERANGAN] [NO_RESPON_WAKTU]\n\n" .
            "<b> --- CONTOH RESPON --- </b>\n\n" .
            "/respon 302455 27 2 3";

        $send = [
            'text' => "$command",
            'chat_id' => $chatId,
            'parse_mode' => 'html'
        ];
        file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
    }
}
