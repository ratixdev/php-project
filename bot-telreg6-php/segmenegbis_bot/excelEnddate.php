<?php
session_start();
require 'functions.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$query = "SELECT * FROM enddate";
$sql = mysqli_query($conn, $query);
$date = date("d-m-Y");
$fileName = "respon_enddate_(" . $date . ")";

if (mysqli_num_rows($sql) > 0) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'id');
    $sheet->setCellValue('B1', 'divisi');
    $sheet->setCellValue('C1', 'witel');
    $sheet->setCellValue('D1', 'sid');
    $sheet->setCellValue('E1', 'nama_pelanggan');
    $sheet->setCellValue('F1', 'nomor_kontrak');
    $sheet->setCellValue('G1', 'order_id');
    $sheet->setCellValue('H1', 'am');
    $sheet->setCellValue('I1', 'end_kontrak');
    $sheet->setCellValue('J1', 'layanan');
    $sheet->setCellValue('K1', 'nik');

    $rowCount = 2;
    foreach ($sql as $data) {
        $sheet->setCellValue('A' . $rowCount, $data['id']);
        $sheet->setCellValue('B' . $rowCount, $data['divisi']);
        $sheet->setCellValue('C' . $rowCount, $data['witel']);
        $sheet->setCellValue('D' . $rowCount, $data['sid']);
        $sheet->setCellValue('E' . $rowCount, $data['nama_pelanggan']);
        $sheet->setCellValue('F' . $rowCount, $data['nomor_kontrak']);
        $sheet->setCellValue('G' . $rowCount, $data['order_id']);
        $sheet->setCellValue('H' . $rowCount, $data['am']);
        $sheet->setCellValue('I' . $rowCount, $data['end_kontrak']);
        $sheet->setCellValue('J' . $rowCount, $data['layanan']);
        $sheet->setCellValue('K' . $rowCount, $data['nik']);
        $rowCount++;
    }

    $writer = new Xlsx($spreadsheet);
    $final_filename = $fileName . '.xlsx';
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . urlencode($final_filename) . '"');
    $writer->save('php://output');
}
