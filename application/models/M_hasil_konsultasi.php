<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_hasil_konsultasi extends CI_Model {

    
    public $_table = 'tb_hasil_konsultasi';
    public $idm = 'ID_HASIL';

	public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }


    public function getAllJOIN()
    {
        $this->db->select('*');
        $this->db->from('tb_hasil_konsultasi');
        $this->db->join('tb_siswa', 'tb_siswa.ID_SISWA = tb_hasil_konsultasi.ID_SISWA');
        return $this->db->get()->result();
        
    }
	public function getById($id){
        return $this->db->get_where($this->_table, ['ID_HASIL' => $id])->row();
    } 

    public function add($data)
    {
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }

    public function cek($data)
    {
        $query = "SELECT * FROM tb_hasil_konsultasi WHERE ID_SISWA = '$data' ";
        return $this->db->query($query);
        
    }

	public function delete($id)
	{        
        return $this->db->delete($this->_table, [$this->idm => $id]);     
    }

    public function edit($data)
    {
        $this->db->where($this->idm, $data['ID_SISWA']);
        $this->db->update($this->_table, $data);
    }
}

/* End of file ModelName.php */



?>