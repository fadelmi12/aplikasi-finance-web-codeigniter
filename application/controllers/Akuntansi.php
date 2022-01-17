<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akuntansi extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        if ($this->session->userdata('idUser') == null) {
        	redirect('auth/login');
        }
    }

    public function jurnal_umum()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('akuntansi/jurnal_umum');
        $this->load->view('template/footer');
    }

    public function buku_besar()
    {
        
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('akuntansi/buku_besar');
        $this->load->view('template/footer');
    }

    public function jurnal_penyesuaian()
    {
        
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('akuntansi/jurnal_penyelesaian');
        $this->load->view('template/footer');
    }

}
