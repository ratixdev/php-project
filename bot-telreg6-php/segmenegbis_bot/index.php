<?php
require 'functions.php';

$content = file_get_contents("php://input");

if ($content) {
    $source = "08 April 2022";
    $notice = "List data diurutkan berdasarkan nama AM\n\n";
    $token = "5363203716:AAEenh3h-kk--5zyaGMKBG0qs9fDk9q8flE";
    $apiUrl = "https://api.telegram.org/bot$token/";
    $update = json_decode($content, true);
    $chatId = $update["message"]["chat"]["id"];
    $text = $update["message"]["text"];
    $chatName = $update["message"]["chat"]["first_name"] . " " . $update["message"]["chat"]["last_name"] . " (" . $update["message"]["chat"]["username"] . ")";

    if (strpos($text, "/start") === 0) {
        $command = "<b> --- DAFTAR PERINTAH TR6 BOT --- </b>\n\n" .
            "/perintah\nMenampilkan daftar perintah TR6 Bot\n\n" .
            "/des_pbaso\nMenampilkan Pending BASO segmen DES\n\n" .
            "/dgs_pbaso\nMenampilkan Pending BASO segmen DGS\n\n" .
            "/dbs_pbaso\nMenampilkan Pending BASO segmen DBS\n\n" .
            "/des_enddate\nMenampilkan End Date segmen DES\n\n" .
            "/dgs_enddate\nMenampilkan End Date segmen DGS\n\n" .
            "/dbs_enddate\nMenampilkan End Date segmen DBS\n\n" .
            "https://9b60-180-250-126-146.ngrok.io/segmenegbis_bot/excelPbaso.php\n" .
            "Klik link diatas ini untuk mendownload data pbaso format xlsx\n\n" .
            "https://9b60-180-250-126-146.ngrok.io/segmenegbis_bot/excelEnddate.php\n" .
            "Klik link diatas ini untuk mendownload data enddate format xlsx\n\n";

        $send = [
            'text' => "$command",
            'chat_id' => $chatId,
            'parse_mode' => 'html'
        ];
        file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));

        // Pending BASO
    } else if (strpos($text, "/perintah") === 0) {
        $command = "<b> --- DAFTAR PERINTAH TR6 BOT --- </b>\n\n" .
            "/perintah\nMenampilkan daftar perintah TR6 Bot\n\n" .
            "/des_pbaso\nMenampilkan Pending BASO segmen DES\n\n" .
            "/dgs_pbaso\nMenampilkan Pending BASO segmen DGS\n\n" .
            "/dbs_pbaso\nMenampilkan Pending BASO segmen DBS\n\n" .
            "/des_enddate\nMenampilkan End Date segmen DES\n\n" .
            "/dgs_enddate\nMenampilkan End Date segmen DGS\n\n" .
            "/dbs_enddate\nMenampilkan End Date segmen DBS\n\n" .
            "https://c422-180-250-126-146.ngrok.io/tr6bot/saveexcel.php\n" .
            "Klik link diatas ini untuk mendownload respon pbaso format xlsx";

        $send = [
            'text' => "$command",
            'chat_id' => $chatId,
            'parse_mode' => 'html'
        ];
        file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));

        // Pending BASO
    } else if (strpos($text, "/des_pbaso") === 0) {
        $data = query("SELECT DISTINCT agree_createdby_name FROM pbaso WHERE cust_divisi = 'DES' ORDER BY agree_createdby_name");
        if (empty($data)) {
            $send = [
                'text' => "<b>Data tidak ditemukan</b>",
                'chat_id' => $chatId,
                'parse_mode' => 'html'
            ];

            file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
        } else {
            foreach ($data as $key => $val) {
                $pack = "";
                $agree_createdby_name = $val["agree_createdby_name"];
                $query = query("SELECT * FROM pbaso WHERE agree_createdby_name = '$agree_createdby_name'");
                foreach ($query as $key => $row) {
                    $agree_createdby_name = $row["agree_createdby_name"];
                    $bill_accnt_name = $row["bill_accnt_name"];
                    $li_product_name = $row["li_product_name"];
                    $order_id = $row["order_id"];
                    $order_subtype = $row["order_subtype"];
                    if (is_null($row["respon_keterangan"]) && is_null($row["respon_waktu"])) {
                        $status = "<b>Belum Direspon</b>";
                    } else {
                        $status = "<b>Sudah Direspon</b>";
                    }
                    $var =
                        $agree_createdby_name . "\n" .
                        $bill_accnt_name . "\n" .
                        $li_product_name . "\n" .
                        $order_id . "\n" .
                        $order_subtype . "\n" .
                        $status . "\n\n";

                    $arr[] = $var;
                }

                for ($j = 0; $j < count($arr); $j++) {
                    $packVal = $arr[$j];
                    $pack .= $packVal;
                }

                $send = [
                    'text' => $pack,
                    'chat_id' => $chatId,
                    'parse_mode' => 'html'
                ];

                file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));

                unset($pack);
                unset($arr);
            }
        }
    } else if (strpos($text, "/dgs_pbaso") === 0) {
        $data = query("SELECT DISTINCT agree_createdby_name FROM pbaso WHERE cust_divisi = 'DGS' ORDER BY agree_createdby_name");
        if (empty($data)) {
            $send = [
                'text' => "<b>Data tidak ditemukan</b>",
                'chat_id' => $chatId,
                'parse_mode' => 'html'
            ];

            file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
        } else {
            foreach ($data as $key => $val) {
                $pack = "";
                $agree_createdby_name = $val["agree_createdby_name"];
                $query = query("SELECT * FROM pbaso WHERE agree_createdby_name = '$agree_createdby_name'");
                foreach ($query as $key => $row) {
                    $agree_createdby_name = $row["agree_createdby_name"];
                    $bill_accnt_name = $row["bill_accnt_name"];
                    $li_product_name = $row["li_product_name"];
                    $order_id = $row["order_id"];
                    $order_subtype = $row["order_subtype"];
                    if (is_null($row["respon_keterangan"]) && is_null($row["respon_waktu"])) {
                        $status = "<b>Belum Direspon</b>";
                    } else {
                        $status = "<b>Sudah Direspon</b>";
                    }
                    $var =
                        $agree_createdby_name . "\n" .
                        $bill_accnt_name . "\n" .
                        $li_product_name . "\n" .
                        $order_id . "\n" .
                        $order_subtype . "\n" .
                        $status . "\n\n";

                    $arr[] = $var;
                }

                for ($j = 0; $j < count($arr); $j++) {
                    $packVal = $arr[$j];
                    $pack .= $packVal;
                }

                $send = [
                    'text' => $pack,
                    'chat_id' => $chatId,
                    'parse_mode' => 'html'
                ];

                file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));

                unset($pack);
                unset($arr);
            }
        }
    } else if (strpos($text, "/dbs_pbaso") === 0) {
        $data = query("SELECT DISTINCT agree_createdby_name FROM pbaso WHERE cust_divisi = 'DBS' ORDER BY agree_createdby_name");
        if (empty($data)) {
            $send = [
                'text' => "<b>Data tidak ditemukan</b>",
                'chat_id' => $chatId,
                'parse_mode' => 'html'
            ];

            file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
        } else {
            foreach ($data as $key => $val) {
                $pack = "";
                $agree_createdby_name = $val["agree_createdby_name"];
                $query = query("SELECT * FROM pbaso WHERE agree_createdby_name = '$agree_createdby_name'");
                foreach ($query as $key => $row) {
                    $agree_createdby_name = $row["agree_createdby_name"];
                    $bill_accnt_name = $row["bill_accnt_name"];
                    $li_product_name = $row["li_product_name"];
                    $order_id = $row["order_id"];
                    $order_subtype = $row["order_subtype"];
                    if (is_null($row["respon_keterangan"]) && is_null($row["respon_waktu"])) {
                        $status = "<b>Belum Direspon</b>";
                    } else {
                        $status = "<b>Sudah Direspon</b>";
                    }
                    $var =
                        $agree_createdby_name . "\n" .
                        $bill_accnt_name . "\n" .
                        $li_product_name . "\n" .
                        $order_id . "\n" .
                        $order_subtype . "\n" .
                        $status . "\n\n";

                    $arr[] = $var;
                }

                for ($j = 0; $j < count($arr); $j++) {
                    $packVal = $arr[$j];
                    $pack .= $packVal;
                }

                $send = [
                    'text' => $pack,
                    'chat_id' => $chatId,
                    'parse_mode' => 'html'
                ];

                file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));

                unset($pack);
                unset($arr);
            }
        }

        // End Date
    } else if (strpos($text, "/des_enddate") === 0) {
        $data = query("SELECT DISTINCT am FROM enddate WHERE divisi = 'DES' ORDER BY am");
        if (empty($data)) {
            $send = [
                'text' => "<b>Data tidak ditemukan</b>",
                'chat_id' => $chatId,
                'parse_mode' => 'html'
            ];

            file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
        } else {
            foreach ($data as $key => $val) {
                $pack = "";
                $am = $val["am"];
                $query = query("SELECT * FROM enddate WHERE am = '$am'");
                foreach ($query as $key => $row) {
                    $am = $row["am"];
                    $witel = $row["witel"];
                    $sid = $row["sid"];
                    $nama_pelanggan = $row["nama_pelanggan"];
                    $nomor_kontrak = $row["nomor_kontrak"];
                    $layanan = $row["layanan"];
                    $end_kontrak = $row["end_kontrak"];
                    $var =
                        $am . "\n" .
                        $witel . "\n" .
                        $sid . "\n" .
                        $nama_pelanggan . "\n" .
                        $nomor_kontrak . "\n" .
                        $layanan . "\n" .
                        $end_kontrak . "\n\n";

                    $arr[] = $var;
                }

                for ($j = 0; $j < count($arr); $j++) {
                    $packVal = $arr[$j];
                    $pack .= $packVal;
                }

                $send = [
                    'text' => $pack,
                    'chat_id' => $chatId,
                    'parse_mode' => 'html'
                ];

                file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));

                unset($pack);
                unset($arr);
            }
        }
    } else if (strpos($text, "/dgs_enddate") === 0) {
        $data = query("SELECT DISTINCT am FROM enddate WHERE divisi = 'DGS' ORDER BY am");
        if (empty($data)) {
            $send = [
                'text' => "<b>Data tidak ditemukan</b>",
                'chat_id' => $chatId,
                'parse_mode' => 'html'
            ];

            file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
        } else {
            foreach ($data as $key => $val) {
                $pack = "";
                $am = $val["am"];
                $query = query("SELECT * FROM enddate WHERE am = '$am'");
                foreach ($query as $key => $row) {
                    $am = $row["am"];
                    $witel = $row["witel"];
                    $sid = $row["sid"];
                    $nama_pelanggan = $row["nama_pelanggan"];
                    $nomor_kontrak = $row["nomor_kontrak"];
                    $layanan = $row["layanan"];
                    $end_kontrak = $row["end_kontrak"];
                    $var =
                        $am . "\n" .
                        $witel . "\n" .
                        $sid . "\n" .
                        $nama_pelanggan . "\n" .
                        $nomor_kontrak . "\n" .
                        $layanan . "\n" .
                        $end_kontrak . "\n\n";

                    $arr[] = $var;
                }

                for ($j = 0; $j < count($arr); $j++) {
                    $packVal = $arr[$j];
                    $pack .= $packVal;
                }

                $send = [
                    'text' => $pack,
                    'chat_id' => $chatId,
                    'parse_mode' => 'html'
                ];

                file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));

                unset($pack);
                unset($arr);
            }
        }
    } else if (strpos($text, "/dbs_enddate") === 0) {
        $data = query("SELECT DISTINCT am FROM enddate WHERE divisi = 'DBS' ORDER BY am");
        if (empty($data)) {
            $send = [
                'text' => "<b>Data tidak ditemukan</b>",
                'chat_id' => $chatId,
                'parse_mode' => 'html'
            ];

            file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
        } else {
            foreach ($data as $key => $val) {
                $pack = "";
                $am = $val["am"];
                $query = query("SELECT * FROM enddate WHERE am = '$am'");
                foreach ($query as $key => $row) {
                    $am = $row["am"];
                    $witel = $row["witel"];
                    $sid = $row["sid"];
                    $nama_pelanggan = $row["nama_pelanggan"];
                    $nomor_kontrak = $row["nomor_kontrak"];
                    $layanan = $row["layanan"];
                    $end_kontrak = $row["end_kontrak"];
                    $var =
                        $am . "\n" .
                        $witel . "\n" .
                        $sid . "\n" .
                        $nama_pelanggan . "\n" .
                        $nomor_kontrak . "\n" .
                        $layanan . "\n" .
                        $end_kontrak . "\n\n";

                    $arr[] = $var;
                }

                for ($j = 0; $j < count($arr); $j++) {
                    $packVal = $arr[$j];
                    $pack .= $packVal;
                }

                $send = [
                    'text' => $pack,
                    'chat_id' => $chatId,
                    'parse_mode' => 'html'
                ];

                file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));

                unset($pack);
                unset($arr);
            }
        }
    } else {
        $command = "<b>Format inputan salah.</b>";

        $send = [
            'text' => "$command",
            'chat_id' => $chatId,
            'parse_mode' => 'html'
        ];
        file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
        exit();
    }
} else {
    echo "URL ini khusus untuk akses telegram";
}
