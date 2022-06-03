<?php
require 'functions.php';

$content = file_get_contents("php://input"); // Untuk registrasi.
// Untuk pengiriman data nya tidak pakai input.

if ($content) {
    $token = "5381156800:AAHWpXiM-pJhzq-VfR_82pXx8_3crcDBIAo";
    $apiUrl = "https://api.telegram.org/bot$token/";
    $update = json_decode($content, true);
    $chatId = $update["message"]["chat"]["id"];
    $text = $update["message"]["text"];
    $chatName = $update["message"]["chat"]["first_name"] . " " . $update["message"]["chat"]["last_name"] . " (" . $update["message"]["chat"]["username"] . ")";
    $arrData = [];
    if (strpos($text, "/start") === 0) {
        $command = "Hai, " . "<b>" . $chatName . "</b>\n" .
            "Bot ini bertugas untuk membantu  mengumpulkan respon Pending BASO dan memberikan reminder End Date.\n" .
            "Silahkan pilih menu berikut:\n\n" .
            "/registrasi\nUntuk melakukan pendaftaran akun\n\n" .
            "/info\nUntuk menampilkan informasi bot.";

        $send = [
            'text' => "$command",
            'chat_id' => $chatId,
            'parse_mode' => 'html'
        ];
        file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
        exit();
    } else if (strpos($text, "/registrasi") === 0) {
        $command = "<b>Untuk memudahkan proses, silahkan registrasi sesuai format berikut.</b>\n\n" .
            "<b> --- FORMAT RESPON --- </b>\n\n" .
            "/daftar [NIK]\n\n" .
            "<b> --- CONTOH RESPON --- </b>\n\n" .
            "/daftar 123456";

        $send = [
            'text' => "$command",
            'chat_id' => $chatId,
            'parse_mode' => 'html'
        ];
        file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
        exit();
    } else if (strpos($text, "/daftar") === 0) {
        $data = $text;
        $strArray = explode(' ', $data);
        $nik = $strArray[1];

        $cek_data = mysqli_query($conn, "SELECT nik FROM pbaso WHERE nik = '$nik'");

        if (empty($nik)) {
            $send = [
                'text' => "<b>Format respon belum lengkap.</b>",
                'chat_id' => $chatId,
                'parse_mode' => 'html'
            ];
            file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
            exit();
        } else if (mysqli_num_rows($cek_data) == 0) {
            $send = [
                'text' => "<b>NIK tidak ditemukan. Silahkan kontak admin.</b>",
                'chat_id' => $chatId,
                'parse_mode' => 'html'
            ];
            file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
            exit();
        } else if (!is_numeric($nik) or strlen($nik) < 5 or strlen($nik) > 6) {
            $send = [
                'text' => "<b>Format respon salah.</b>",
                'chat_id' => $chatId,
                'parse_mode' => 'html'
            ];
            file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
            exit();
        } else if (is_numeric($nik)) {
            $cek_user = mysqli_query($conn, "SELECT nik FROM users WHERE nik = '$nik'");
            if (mysqli_fetch_assoc($cek_user)) {
                $send = [
                    'text' => "<b>Data telah terdaftar sebelumnya.</b>",
                    'chat_id' => $chatId,
                    'parse_mode' => 'html'
                ];
                file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
                exit();
            } else {
                mysqli_query($conn, "INSERT INTO users (nik, chat_id) VALUES ('$nik', $chatId)");
                $command = "<b>Data telah terdaftar.</b>";
                $command2 = "<b>> Data Pending BASO akan dikirimkan setiap tanggal 8 per bulannya. Silahkan respon data Pending BASO sesuai format yang telah diberikan.\n\n" .
                    "> Data End Date akan dikirimkan setiap tanggal 4 per bulannya.</b>";

                $send = [
                    'text' => "$command",
                    'chat_id' => $chatId,
                    'parse_mode' => 'html'
                ];
                $confirm = [
                    'text' => "$command2",
                    'chat_id' => $chatId,
                    'parse_mode' => 'html'
                ];

                file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
                file_get_contents($apiUrl . "sendmessage?" . http_build_query($confirm));
                exit();
            }
        } else {
            $send = [
                'text' => "<b>Format respon salah.</b>",
                'chat_id' => $chatId,
                'parse_mode' => 'html'
            ];
            file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
            exit();
        }
    } else if (strpos($text, "/info") === 0) {
        $command = "<b>> Data Pending BASO akan dikirimkan setiap tanggal 8 per bulannya. Silahkan respon data Pending BASO sesuai format yang telah diberikan.\n\n" .
            "> Data End Date akan dikirimkan setiap tanggal 4 per bulannya.</b>";

        $send = [
            'text' => "$command",
            'chat_id' => $chatId,
            'parse_mode' => 'html'
        ];
        file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
        exit();
    } else if (strpos($text, "/respon") === 0) {
        $data = $text;
        $strArray = explode(' ', $data);
        $nik = $strArray[1];
        $id = $strArray[2];
        $respon_keterangan = $strArray[3];
        $respon_waktu = $strArray[4];

        if ($respon_keterangan == 1) {
            $ket = "Pembuatan draft dokumen";
        } else if ($respon_keterangan == 2) {
            $ket = "Dokumen direview di pelanggan";
        } else if ($respon_keterangan == 3) {
            $ket = "Dokumen proses submit NCX";
        } else if ($respon_keterangan == 4) {
            $ket = "Baso completed, Pending Billing Approval";
        } else if ($respon_keterangan == 5) {
            $ket = "Terkendala delivery layanan";
        } else if ($respon_keterangan == 6) {
            $ket = "Terkendala pengiriman dokumen";
        } else if ($respon_keterangan == 7) {
            $ket = "Billing Complete";
        } else if ($respon_keterangan == 8) {
            $ket = "Lainnya";
        }

        if ($respon_waktu == 1) {
            $ket_waktu = "Week 1";
        } else if ($respon_waktu == 2) {
            $ket_waktu = "Week 2";
        } else if ($respon_waktu == 3) {
            $ket_waktu = "Week 3";
        } else if ($respon_waktu == 4) {
            $ket_waktu = "Week 4";
        }

        if (empty($nik or $id or $respon_keterangan or $respon_waktu) or $respon_keterangan > 8 or $respon_waktu > 4) {
            $send = [
                'text' => "<b>Periksa kembali respon anda.</b>",
                'chat_id' => $chatId,
                'parse_mode' => 'html'
            ];
            file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
            exit();
        } else if (!is_numeric($nik) or !is_numeric($id) or !is_numeric($respon_keterangan) or !is_numeric($respon_waktu)) {
            $send = [
                'text' => "<b>Format respon salah.</b>",
                'chat_id' => $chatId,
                'parse_mode' => 'html'
            ];
            file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
            exit();
        } else if (is_numeric($nik) or is_numeric($id) or is_numeric($respon_keterangan) or is_numeric($respon_waktu)) {
            $cek_id = mysqli_query($conn, "SELECT id FROM pbaso WHERE id = $id");
            $cek_nik = mysqli_query($conn, "SELECT nik FROM pbaso WHERE nik = '$nik'");

            if (!mysqli_fetch_assoc($cek_id) or !mysqli_fetch_assoc($cek_nik)) {
                $send = [
                    'text' => "<b>Periksa kembali ID data dan NIK anda.\n</b>",
                    'chat_id' => $chatId,
                    'parse_mode' => 'html'
                ];
                file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
                exit();
            } else {
                $arrData = [];
                $cek_dataSesuai = mysqli_query($conn, "SELECT * FROM pbaso WHERE nik = $nik");
                $cek_data = query("SELECT respon_keterangan, respon_waktu FROM pbaso WHERE id = $id AND nik = '$nik'")[0];
                while ($row = mysqli_fetch_assoc($cek_dataSesuai)) {
                    $arrData[] = $row["id"];
                }

                if (!is_null($cek_data["respon_keterangan"]) and !is_null($cek_data["respon_waktu"])) {
                    mysqli_query($conn, "UPDATE pbaso SET respon_keterangan = '$ket', respon_waktu = '$ket_waktu' WHERE id = $id AND nik = '$nik'");
                    $send = [
                        'text' => "<b>Data telah direspon sebelumnya.\nRespon berhasil diperbarui.</b>",
                        'chat_id' => $chatId,
                        'parse_mode' => 'html'
                    ];
                    file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
                    exit();
                } else if (is_null($cek_data["respon_keterangan"]) and is_null($cek_data["respon_waktu"])) {
                    foreach ($arrData as $value) {
                        if ($value == $id) {
                            mysqli_query($conn, "UPDATE pbaso SET respon_keterangan = '$ket', respon_waktu = '$ket_waktu' WHERE id = $id AND nik = '$nik'");
                            $send = [
                                'text' => "<b>Respon berhasil disimpan.</b>",
                                'chat_id' => $chatId,
                                'parse_mode' => 'html'
                            ];
                            file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
                            exit();
                        }
                    }
                    $command = [
                        'text' => "<b>Periksa kembali NIK dan ID anda.</b>",
                        'chat_id' => $chatId,
                        'parse_mode' => 'html'
                    ];
                    file_get_contents($apiUrl . "sendmessage?" . http_build_query($command));
                    exit();
                }
            }
        } else {
            $send = [
                'text' => "<b>Format respon salah.</b>",
                'chat_id' => $chatId,
                'parse_mode' => 'html'
            ];
            file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
            exit();
        }
    } else {
        $command = "<b>Format respon salah.</b>";

        $send = [
            'text' => "$command",
            'chat_id' => $chatId,
            'parse_mode' => 'html'
        ];
        file_get_contents($apiUrl . "sendmessage?" . http_build_query($send));
        exit();
    }
} else {
    echo "URL ini khusus telegram";
}
