<?php 

class M_data extends CI_Model{
    //-- syntax di bawha ini (get) berfungsi mengambil data dari data base--//
	function tampil_data(){
		return $this->db->get('user');
    }
    //-- syntax di bawah ini untuk mengingputkan data yang di ambil dari data base--//
    function input_data($data,$table){
        $this->db->insert($table,$data);
    }
    //-- Pada syntax di bawah ini terdapat fungsi where ini berguna unutk menyeleksi query dan delete unutuk menghapus record--//
    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    function edit_data($where,$table){		
        return $this->db->get_where($table,$where);
    }
    //-- syntax di bawah berfungsi untuk meng update data--//
    function update_data($where,$data,$table){
		$this->db->where($where);
        $this->db->update($table,$data);
    }
}