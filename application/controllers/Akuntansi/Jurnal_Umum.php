<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Jurnal_Umum extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        if ($this->session->userdata('idUser') == null) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['umum'] = $this->Model_akuntansi->get_all_jurnal_umum()->result_array();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('akuntansi/jurnal_umum', $data);
        $this->load->view('template/footer');
    }

    public function tambah_jurnal_umum()
    {
        $data['akun'] = $this->Model_akun->get_akun()->result_array();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('akuntansi/tambah_jurnal_umum', $data);
        $this->load->view('template/footer');
    }

    

    public function save_jurnal()
    {
        $idAkun = $this->input->post('idAkun');
        $saldo = $this->input->post('jenisSaldo');
        $nominal = $this->input->post('nominal');
        $keterangan = $this->input->post('keterangan');
        if ($saldo == "Kredit") {
            $data3 = array(
                'idAkun'        => $idAkun,
                'kredit'       => $nominal,
                'keterangan'       => $keterangan,
                'input_from'       => 'Jurnal Umum'
            );
            $save = $this->Model_akun->insert_log($data3);
            if ($save) {
                $data = array(
                    'idAkun'        => $idAkun,
                    'kredit'       => $nominal,
                    'idLog'       => $this->db->insert_id(),
                );
                
                $this->Model_akuntansi->insert_data('kredit_log', $data);
                redirect('akuntansi/jurnal_umum');
            }
        } else {
            $data3 = array(
                'idAkun'        => $idAkun,
                'debit'       => $nominal,
                'keterangan'       => $keterangan,
                'input_from'       => 'Jurnal Umum'
            );
            $save = $this->Model_akun->insert_log($data3);
            
            if ($save) {
                $data = array(
                    'idAkun'        => $idAkun,
                    'debit'       => $nominal,
                    'idLog'       => $this->db->insert_id(),
                );
                $this->Model_akuntansi->insert_data('debit_log', $data);
                redirect('akuntansi/jurnal_umum');
            }
        }
    }
    public function edit_jurnal_umum($idLog)
    {
        $data['akun'] = $this->Model_akun->get_akun()->result_array();
        $data['jurnal'] = $this->Model_akun->get_detail('log_akun', 'idLog', $idLog)->row();
        $data2 = $data['jurnal'];
        
        $data['akun2'] = $this->Model_akun->get_detail('akun', 'idAkun', $data2->idAkun)->row();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('akuntansi/edit_jurnal_umum', $data);
        $this->load->view('template/footer');
    }

    public function update_jurnal_umum(){
        $saldo = $this->input->post('jenisSaldo');
        $idLog = $this->input->post('idLog');
        $idAkun = $this->input->post('idAkun');
        $saldoLawas = $this->input->post('saldoLawas');
        
        $nominal = $this->input->post('nominal');
        $keterangan = $this->input->post('keterangan');
        // $tabel, $data,$id,$rowid
        if ($saldoLawas != $saldo) {
            if ($saldo == "Kredit") {
                $this->db->delete('debit_log', array('idLog' => $idLog));
                $data3 = array(
                    'kredit'       => $nominal,
                    'keterangan'       => $keterangan,
                    'debit'     => 0
                );
                $save = $this->Model_akuntansi->update_data('log_akun', $data3, $idLog, 'idLog');
                if ($save) {
                    $data = array(
                        'idAkun'        => $idAkun,
                        'kredit'       => $nominal,
                        'idLog'       => $idLog,
                    );
                    $this->Model_akuntansi->insert_data('kredit_log', $data);
                    redirect('akuntansi/jurnal_umum');
                }
            } else {
                $this->db->delete('kredit_log', array('idLog' => $idLog));
                $data3 = array(
                    'debit'       => $nominal,
                    'keterangan'       => $keterangan,
                    'kredit'     => 0
                );
                $save = $this->Model_akuntansi->update_data('log_akun', $data3, $idLog, 'idLog');
                
                if ($save) {
                    $data = array(
                        'idAkun'        => $idAkun,
                        'debit'       => $nominal,
                        'idLog'       => $idLog,
                    );
                    $this->Model_akuntansi->insert_data('debit_log', $data);
                    redirect('akuntansi/jurnal_umum');
                }
            }
        }else{
            if ($saldo == "Kredit") {
                $data3 = array(
                    'kredit'       => $nominal,
                    'keterangan'       => $keterangan,
                    
                );
                $save = $this->Model_akuntansi->update_data('log_akun', $data3, $idLog, 'idLog');
                if ($save) {
                    $data = array(
                        'kredit'       => $nominal,
                    );
                    $this->Model_akuntansi->update_data('kredit_log', $data, $idLog, 'idLog');
                    redirect('akuntansi/jurnal_umum');
                }
            } else {
                $data3 = array(
                    'debit'       => $nominal,
                    'keterangan'       => $keterangan,
                );
                $save = $this->Model_akuntansi->update_data('log_akun', $data3, $idLog, 'idLog');
                
                if ($save) {
                    $data = array(
                        'debit'       => $nominal
                    );
                    $this->Model_akuntansi->update_data('debit_log', $data, $idLog, 'idLog');
                    redirect('akuntansi/jurnal_umum');
                }
            }
        }
        
    }

    public function delete_jurnal_umum($id)
    {
        
    }
}
