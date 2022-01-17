<?php

class Model_akun extends CI_Model {

    public function get_akun(){
        $this->db->select('*');
        $this->db->from('akun');
        // $this->db->join('saldo', 'akun.idAkun=saldo.idAkun');

        return $this->db->get();
    }
    public function cek_saldo($id){
        $saldo_ada = $this->db->get_where('akun', ['idAkun' => $id]);
        return $saldo_ada;
    }
    public function insert_akun($data){
        return $this->db->insert('akun', $data);
    }

    public function insert_log($data){
        return $this->db->insert('log_akun', $data);
    }

    public function insert_saldoAwal($data){
        return $this->db->insert('akun', $data);
    }
    public function get_perusahaan(){
        $this->db->select('*');
        $this->db->from('perusahaan');
        // $this->db->join('saldo', 'akun.idAkun=saldo.idAkun');

        return $this->db->get();
    }

    public function insert_perusahaan($data){
        return $this->db->insert('perusahaan', $data);
    }
    public function get_barang(){
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('jenis_barang', 'barang.idJenis=jenis_barang.idJenis');

        return $this->db->get();
    }

    public function get_jenis(){
        $this->db->select('*');
        $this->db->from('jenis_barang');
        return $this->db->get();
    }

    public function insert_barang($data){
        return $this->db->insert('barang', $data);
    }


    public function get_pelanggan(){
        $this->db->select('*');
        $this->db->from('pelanggan');
        return $this->db->get();
    }
    public function insert_pelanggan($data){
        return $this->db->insert('pelanggan', $data);
    }

    public function get_supplier(){
        $this->db->select('*');
        $this->db->from('supplier');
        return $this->db->get();
    }
    public function insert_supplier($data){
        return $this->db->insert('supplier', $data);
    }
}