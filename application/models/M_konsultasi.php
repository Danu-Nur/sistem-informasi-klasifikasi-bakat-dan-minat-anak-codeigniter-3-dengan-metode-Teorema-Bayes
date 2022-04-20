<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_konsultasi extends CI_Model {

    
    public $_table = 'tb_kusoner';
    public $idm = 'ID_KUSONER';

	public function getAll()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function getAllJoin()
    {

    $this->db->select('*');
    
    $this->db->from('tb_kusoner');

    $this->db->join('tb_bakat_minat', 'tb_bakat_minat.ID_BAKAT_MINAT = tb_kusoner.ID_BAKAT_MINAT');
    $this->db->join('tb_dump', 'tb_dump.ID_DUMP = tb_kusoner.ID_DUMP');
    
    return $this->db->get()->result();
    
    }

	public function getById($id){
        return $this->db->get_where($this->_table, ['ID_KUSONER' => $id])->row();
    } 

    public function add($data)
    {
        $this->db->insert($this->_table, $data);

        return $this->db->insert_id();
        
    }

    // public function cekhasil($hasil)
    // {
    //     $this->db->select('*');
    //     $this->db->from('detail_konsultasi');
    //     $this->db->where('ID_HASIL', $Value);
        
    // }

    public function tambah2($data)
    {
        $this->db->insert('detail_konsultasi', $data);
    }

	public function delete($id)
	{        
        return $this->db->delete($this->_table, [$this->idm => $id]);     
    }

    public function edit($data)
    {
        $this->db->where($this->idm, $data[$this->idm]);
        $this->db->update($this->_table, $data);
    }

    
}

/* End of file ModelName.php */



?>