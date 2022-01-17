<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_Data extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->output->disable_cache();
        if ($this->session->userdata('idUser') == null) {
            redirect('auth/login');
        }
    }

    public function saldo_awal()
    {
        $data['akun'] = $this->Model_akun->get_akun()->result_array();
        // echo json_encode($data['akun']);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('master_data/saldo_awal', $data);
        $this->load->view('template/footer');
    }

    public function tambah_saldo()
    {
        $data['akun'] = $this->Model_akun->get_akun()->result_array();

        // $data['akun2'] = $this->Model_akun->get_akun()->result_row();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('master_data/tambah_saldo', $data);
        $this->load->view('template/footer');
    }
    public function getSaldoAkhir()
    {
        $idAkun = $this->input->post('id', TRUE);
        $data = $this->Model_akun->cek_saldo($idAkun)->row();
        echo $data->alamat;
    }
    public function save_saldo()
    {
        $idAkun = $this->input->post('idAkun');
        $nominal = $this->input->post('saldoAwal');
        $saldoAwal = filter_var($nominal, FILTER_SANITIZE_NUMBER_INT);
        // echo $saldoAwal;
        $keterangan = $this->input->post('keterangan');

        $saldo_ada = $this->db->get_where('akun', ['idAkun' => $idAkun])->result();
        $tanggal =  date("Y-m-d", time());
        if ($saldo_ada) {
            $sql = "update akun set saldoAkhir = saldoAwal + '$saldoAwal', saldoAwal = '$saldoAwal' , updated_at = '$tanggal' where idAkun = '$idAkun'";
            $update = $this->db->query($sql);
            $data2 = array(
                'idAkun'        => $idAkun,
                'saldoAwal'       => $saldoAwal,
                'keterangan'       => $keterangan
            );
            if ($update) {
                $this->Model_akun->insert_log($data2);
                redirect('master_data/saldo_awal');
            }
        } else {
            $data2 = array(
                'idAkun'        => $idAkun,
                'saldoAwal'       => $saldoAwal,
                'saldoAkhir'       => $saldoAwal
            );
            $save = $this->Model_akun->insert_saldoAwal($data2);
            if ($save) {
                redirect('master_data/saldo_awal');
            }
        }
    }

    //DATA PERUSAHAAN

    public function info_perusahaan()
    {
        $data['perusahaan'] = $this->Model_akun->get_perusahaan()->result_array();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('master_data/info_perusahaan', $data);
        $this->load->view('template/footer');
    }

    public function tambah_perusahaan()
    {

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('master_data/tambah_perusahaan');
        $this->load->view('template/footer');
    }

    public function save_perusahaan()
    {
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $npwp = $this->input->post('npwp');
        $data2 = array(
            'nama'        => $nama,
            'alamat'       => $alamat,
            'npwp'       => $npwp
        );
        $save = $this->Model_akun->insert_perusahaan($data2);
        if ($save) {
            redirect('master_data/info_perusahaan');
        }
    }


    // DATA AKUN
    public function data_perkiraan_akun()
    {
        $data['akun'] = $this->Model_akun->get_akun()->result_array();
        // echo json_encode($data['akun']);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('master_data/data_perkiraan', $data);
        $this->load->view('template/footer');
    }

    public function tambah_akun()
    {

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('master_data/tambah_akun');
        $this->load->view('template/footer');
    }

    public function save_akun()
    {
        $nama = $this->input->post('namaAkun');
        $kode = $this->input->post('kodeAkun');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'namaAkun'        => $nama,
            'kodeAkun'       => $kode,
            'jenisAkun'           => $keterangan
        );
        $save = $this->Model_akun->insert_akun($data);
        if ($save) {
            redirect('master_data/data_perkiraan_akun');
        }
    }

    //Data Barang
    public function data_barang()
    {
        $data['barang'] = $this->Model_akun->get_barang()->result_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('master_data/data_barang', $data);
        $this->load->view('template/footer');
    }

    
    public function tambah_barang(){
        $data['jenis'] = $this->Model_akun->get_jenis()->result_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('master_data/tambah_barang', $data);
        $this->load->view('template/footer');
    }
    public function save_barang(){
        $nama = $this->input->post('namaBarang');
        $kode = $this->input->post('kodeBarang');
        $jenisBarang = $this->input->post('jenisBarang');
        $harga = $this->input->post('harga');
        $harga2 = filter_var($harga, FILTER_SANITIZE_NUMBER_INT);
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'nama'        => $nama,
            'kodeBarang'       => $kode,
            'idJenis'           => $jenisBarang,
            'harga'            => $harga2,
            'keterangan'            => $keterangan,

        );
        $save = $this->Model_akun->insert_barang($data);
        if ($save) {
            redirect('master_data/data_barang');
        }
    }


    // DATA PELANGGAN
    public function data_pelanggan()
    {

        $data['pelanggan'] = $this->Model_akun->get_pelanggan()->result_array();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('master_data/data_pelanggan', $data);
        $this->load->view('template/footer');
    }

    public function tambah_pelanggan()
    {
        
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('master_data/tambah_pelanggan');
        $this->load->view('template/footer');
    }

    public function save_pelanggan(){
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $notelp = $this->input->post('notelp');
        $status = $this->input->post('status');

        $data = array(
            'nama'        => $nama,
            'alamat'       => $alamat,
            'no_telp'           => $notelp,
            'status'            => $status

        );
        $save = $this->Model_akun->insert_pelanggan($data);
        if ($save) {
            redirect('master_data/data_pelanggan');
        }
    }

    public function data_supplier()
    {
        $data['supplier'] = $this->Model_akun->get_supplier()->result_array();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('master_data/data_supplier', $data);
        $this->load->view('template/footer');
    }

    public function tambah_supplier()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('master_data/tambah_supplier');
        $this->load->view('template/footer');
    }

    public function save_supplier(){
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $notelp = $this->input->post('notelp');

        $data = array(
            'nama'        => $nama,
            'alamat'       => $alamat,
            'no_telp'           => $notelp

        );
        $save = $this->Model_akun->insert_supplier($data);
        if ($save) {
            redirect('master_data/data_supplier');
            
        }
    }
}
