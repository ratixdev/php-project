<?php
session_start();
require 'functions.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$query = "SELECT * FROM pbaso";
$sql = mysqli_query($conn, $query);
$date = date("d-m-Y");
$fileName = "respon_pbaso_(" . $date . ")";

if (mysqli_num_rows($sql) > 0) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'id');
    $sheet->setCellValue('B1', 'order_id');
    $sheet->setCellValue('C1', 'li_sid');
    $sheet->setCellValue('D1', 'range_time');
    $sheet->setCellValue('E1', 'agree_createdby_name');
    $sheet->setCellValue('F1', 'bill_accnt_name');
    $sheet->setCellValue('G1', 'cust_divisi');
    $sheet->setCellValue('H1', 'segmen');
    $sheet->setCellValue('I1', 'li_product_name');
    $sheet->setCellValue('J1', 'order_subtype');
    $sheet->setCellValue('K1', 'witel');
    $sheet->setCellValue('L1', 'nik');
    $sheet->setCellValue('M1', 'respon_keterangan');
    $sheet->setCellValue('N1', 'respon_waktu');

    $rowCount = 2;
    foreach ($sql as $data) {
        $sheet->setCellValue('A' . $rowCount, $data['id']);
        $sheet->setCellValue('B' . $rowCount, $data['order_id']);
        $sheet->setCellValue('C' . $rowCount, $data['li_sid']);
        $sheet->setCellValue('D' . $rowCount, $data['range_time']);
        $sheet->setCellValue('E' . $rowCount, $data['agree_createdby_name']);
        $sheet->setCellValue('F' . $rowCount, $data['bill_accnt_name']);
        $sheet->setCellValue('G' . $rowCount, $data['cust_divisi']);
        $sheet->setCellValue('H' . $rowCount, $data['segmen']);
        $sheet->setCellValue('I' . $rowCount, $data['li_product_name']);
        $sheet->setCellValue('J' . $rowCount, $data['order_subtype']);
        $sheet->setCellValue('K' . $rowCount, $data['witel']);
        $sheet->setCellValue('L' . $rowCount, $data['nik']);
        $sheet->setCellValue('M' . $rowCount, $data['respon_keterangan']);
        $sheet->setCellValue('N' . $rowCount, $data['respon_waktu']);
        $rowCount++;
    }

    $writer = new Xlsx($spreadsheet);
    $final_filename = $fileName . '.xlsx';
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . urlencode($final_filename) . '"');
    $writer->save('php://output');
}
