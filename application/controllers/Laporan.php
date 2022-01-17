<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class Laporan extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		if ($this->session->userdata('idUser') == null) {
			redirect('login');
		}
	}

	public function laporan_laba_rugi()
	{		
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('laporan/laba_rugi');
		$this->load->view('template/footer');
	}

	public function laporan_posisi_keuangan()
	{		
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('laporan/posisi_keuangan');
		$this->load->view('template/footer');
	}

	// public function export()
	// {
	// 	$id = $this->session->userdata('idUser');
	// 	$transaksi = $this->Model_transaksi->get_transaksi($id)->result();
	// 	$spreadsheet = new Spreadsheet;
	// 	$spreadsheet->getActiveSheet()->setCellValue('B1', "Laporan Daftar Transaksi");
	// 	$spreadsheet->getActiveSheet()->mergeCells("B1:G1");
	// 	$spreadsheet->getActiveSheet()->getRowDimension('1')->setRowHeight(40);
	// 	$spreadsheet->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
	// 	$spreadsheet->getActiveSheet()->getStyle('B1')->getFont()->setSize(18)->setBold(true);
	// 	$spreadsheet->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
	// 	$spreadsheet->getActiveSheet()->getStyle('B1')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

	// 	$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
	// 	$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(4);
	// 	$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(18);
	// 	$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(17);
	// 	$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(19);
	// 	$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(24);
	// 	$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(16);

	// 	$spreadsheet->setActiveSheetIndex(0)
	// 		->setCellValue('B2', 'No')
	// 		->setCellValue('C2', 'Transaksi')
	// 		->setCellValue('D2', 'Jenis Transaksi')
	// 		->setCellValue('E2', 'Tanggal')
	// 		->setCellValue('F2', 'Jumlah')
	// 		->setCellValue('G2', 'Tipe');
	// 	$spreadsheet->getActiveSheet()->getStyle('B2:G2')->getFont()->setBold(true);

	// 	$styleArray = array(
	// 		'borders' => array(
	// 			'allBorders' => array(
	// 				'borderStyle' => Border::BORDER_THIN,
	// 				'color' => array('argb' => '00000000'),
	// 			),
	// 		),
	// 		'fill' => array(
	// 			'fillType' => Fill::FILL_SOLID,
	// 			'startColor' => array('argb' => 'FF87CEEB')
	// 		),
	// 		'alignment' => [
	// 			'vertical' => Alignment::VERTICAL_CENTER,
	// 			'horizontal' => Alignment::HORIZONTAL_CENTER,
	// 		],
	// 	);
	// 	$styleArray2 = array(
	// 		'borders' => array(
	// 			'allBorders' => array(
	// 				'borderStyle' => Border::BORDER_THIN,
	// 				'color' => array('argb' => '00000000'),
	// 			),
	// 		),
	// 		'fill' => array(
	// 			'fillType' => Fill::FILL_SOLID,
	// 			'startColor' => array('argb' => 'FFE0FFFF')
	// 		),
	// 		'alignment' => [
	// 			'vertical' => Alignment::VERTICAL_CENTER,
	// 			'horizontal' => Alignment::HORIZONTAL_CENTER,
	// 		],
	// 		'numberFormat' => [
	// 			'formatCode' => NumberFormat::FORMAT_CURRENCY_EUR
	// 		]
	// 	);
	// 	$styleArray4 = array(
	// 		'borders' => array(
	// 			'allBorders' => array(
	// 				'borderStyle' => Border::BORDER_THIN,
	// 				'color' => array('argb' => '00000000'),
	// 			),
	// 		),
	// 		'fill' => array(
	// 			'fillType' => Fill::FILL_SOLID,
	// 			'startColor' => array('argb' => 'FFE0FFFF')
	// 		),
	// 		'alignment' => [
	// 			'vertical' => Alignment::VERTICAL_CENTER,
	// 			'horizontal' => Alignment::HORIZONTAL_CENTER,
	// 		],
	// 	);
	// 	$styleArray3 = array(
	// 		'borders' => array(
	// 			'allBorders' => array(
	// 				'borderStyle' => Border::BORDER_THIN,
	// 				'color' => array('argb' => '00000000'),
	// 			),
	// 		),
	// 		'fill' => array(
	// 			'fillType' => Fill::FILL_SOLID,
	// 			'startColor' => array('argb' => 'FFFFFF00')
	// 		),
	// 		'alignment' => [
	// 			'vertical' => Alignment::VERTICAL_CENTER,
	// 			'horizontal' => Alignment::HORIZONTAL_CENTER,
	// 		],
	// 		'numberFormat' => [
	// 			'formatCode' => NumberFormat::FORMAT_CURRENCY_EUR
	// 		]
	// 	);
	// 	$spreadsheet->getActiveSheet()->getStyle('B2:G2')->applyFromArray($styleArray);
	// 	$kolom = 3;
	// 	$nomor = 1;
	// 	foreach ($transaksi as $pengguna) {
	// 		$spreadsheet->setActiveSheetIndex(0)
	// 			->setCellValue('B' . $kolom, $nomor)
	// 			->setCellValue('C' . $kolom, $pengguna->judul)
	// 			->setCellValue('D' . $kolom, $pengguna->jenis_transaksi)
	// 			->setCellValue('E' . $kolom, $pengguna->tanggal)
	// 			->setCellValue('F' . $kolom, $pengguna->jumlah)
	// 			->setCellValue('G' . $kolom, $pengguna->tipe_transaksi);
	// 		$spreadsheet->getActiveSheet()->getStyle('C' . $kolom . ':G' . $kolom)->applyFromArray($styleArray2);
	// 		$spreadsheet->getActiveSheet()->getStyle('B' . $kolom)->applyFromArray($styleArray4);
	// 		$kolom++;
	// 		$nomor++;
	// 	}
	// 	$kolom2 = $kolom + 1;
	// 	$kolom3 = $kolom2 + 1;
	// 	$spreadsheet->setActiveSheetIndex(0)
	// 		->setCellValue('B' . $kolom2, $nomor);
	// 	$spreadsheet->getActiveSheet()->setCellValue('B' . $kolom2, "Total Transaksi");
	// 	$spreadsheet->getActiveSheet()->mergeCells('B' . $kolom2 . ':G' . $kolom2);
	// 	$spreadsheet->getActiveSheet()->getRowDimension($kolom2)->setRowHeight(40);
	// 	$spreadsheet->getActiveSheet()->getStyle('B' . $kolom2)->getFont()->setSize(18)->setBold(true);
	// 	$spreadsheet->getActiveSheet()->getStyle('B' . $kolom2)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
	// 	$spreadsheet->getActiveSheet()->getStyle('B' . $kolom2)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
	// 	$spreadsheet->getActiveSheet()->setCellValue('B' . $kolom3, "No");
	// 	$spreadsheet->getActiveSheet()->setCellValue('C' . $kolom3, "Jenis");
	// 	$spreadsheet->getActiveSheet()->mergeCells('C' . $kolom3 . ':D' . $kolom3);
	// 	$spreadsheet->getActiveSheet()->setCellValue('E' . $kolom3, "Jumlah");
	// 	$spreadsheet->getActiveSheet()->getRowDimension($kolom3)->setRowHeight(20);
	// 	$spreadsheet->getActiveSheet()->mergeCells('E' . $kolom3 . ':G' . $kolom3);
		
	// 	$spreadsheet->getActiveSheet()->getStyle('B' . $kolom3 . ':G' . $kolom3)->getFont()->setBold(true);
	// 	$spreadsheet->getActiveSheet()->getStyle('B' . $kolom3 . ':G' . $kolom3)->applyFromArray($styleArray);
	// 	$kolom4 = $kolom3 +1;
	// 	$kolom5 = $kolom4 +1;
	// 	$kolom6 = $kolom5 +1;
	// 	$spreadsheet->getActiveSheet()->setCellValue('B' . $kolom4, "1");
	// 	$spreadsheet->getActiveSheet()->setCellValue('B' . $kolom5, "2");
	// 	$spreadsheet->getActiveSheet()->setCellValue('C' . $kolom4, "Pengeluaran");
	// 	$spreadsheet->getActiveSheet()->setCellValue('C' . $kolom5, "Pemasukan");
	// 	$spreadsheet->getActiveSheet()->getStyle('C' . $kolom4 . ':G' . $kolom4)->applyFromArray($styleArray2);
	// 	$spreadsheet->getActiveSheet()->getStyle('C' . $kolom5 . ':G' . $kolom5)->applyFromArray($styleArray2);
	// 	$spreadsheet->getActiveSheet()->getStyle('B' . $kolom4 )->applyFromArray($styleArray4);
	// 	$spreadsheet->getActiveSheet()->getStyle('B' . $kolom5 )->applyFromArray($styleArray4);
	// 	$spreadsheet->getActiveSheet()->mergeCells('C' . $kolom4 . ':D' . $kolom4);
	// 	$spreadsheet->getActiveSheet()->mergeCells('E' . $kolom4 . ':G' . $kolom4);
	// 	$spreadsheet->getActiveSheet()->mergeCells('C' . $kolom5 . ':D' . $kolom5);
	// 	$spreadsheet->getActiveSheet()->mergeCells('E' . $kolom5 . ':G' . $kolom5);
	// 	$spreadsheet->getActiveSheet()->mergeCells('C' . $kolom6 . ':D' . $kolom6);
	// 	$spreadsheet->getActiveSheet()->getStyle('C' . $kolom6)->getFont()->setBold(true);
	// 	$spreadsheet->getActiveSheet()->setCellValue('C' . $kolom6, "TOTAL SALDO");
	// 	$spreadsheet->getActiveSheet()->mergeCells('E' . $kolom6 . ':G' . $kolom6);
	// 	$spreadsheet->getActiveSheet()->getStyle('C' . $kolom6 . ':G' . $kolom6)->applyFromArray($styleArray3);
	// 	$pengeluaran= $this->Model_laporan->get_pengeluaran($id)->row();
	// 	$pemasukan = $this->Model_laporan->get_pemasukan($id)->row();
		
	// 	if($pengeluaran->jumlah){
	// 		$spreadsheet->getActiveSheet()->setCellValue('E' . $kolom4, $pengeluaran->jumlah);
	// 	}else{
	// 		$spreadsheet->getActiveSheet()->setCellValue('E' . $kolom4, "0");
	// 	}
	// 	if($pemasukan->jumlah){
			
	// 		$spreadsheet->getActiveSheet()->setCellValue('E' . $kolom5, $pemasukan->jumlah);
	// 	}else{
	// 		$spreadsheet->getActiveSheet()->setCellValue('E' . $kolom5, "0");
	// 	}
	// 	$sal = $this->Model_dashboard->get_data($id)->row();
	// 	$spreadsheet->getActiveSheet()->setCellValue('E' . $kolom6, ''. $sal->saldo);
	// 	$writer = new Xlsx($spreadsheet);

	// 	header('Content-Type: application/vnd.ms-excel');
	// 	header('Content-Disposition: attachment;filename="Laporan.xlsx"');
	// 	header('Cache-Control: max-age=0');

	// 	$writer->save('php://output');
	// }
}
