<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        if ($this->session->userdata('idUser') == null) {
        	redirect('auth/login');
        }
    }

    public function daftar_penjualan()
    {
        $data['pelanggan'] = $this->Model_akun->get_pelanggan()->result_array();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/data_penjualan');
        $this->load->view('template/footer');
    }

    public function tambah_penjualan()
    {
        $data['barang'] = $this->Model_akun->get_barang()->result_array();
        $data['pelanggan'] = $this->Model_akun->get_pelanggan()->result_array();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/tambah_penjualan', $data);
        $this->load->view('template/footer');
    }

    public function daftar_pembelian()
    {
        
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/data_pembelian');
        $this->load->view('template/footer');
    }

}
