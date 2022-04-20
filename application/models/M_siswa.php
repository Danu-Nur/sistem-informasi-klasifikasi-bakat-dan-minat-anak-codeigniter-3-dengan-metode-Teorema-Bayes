<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model {

    
    public $_table = 'tb_siswa';
    public $idm = 'ID_SISWA';

	public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

	public function getById($id){
        return $this->db->get_where($this->_table, ['ID_SISWA' => $id])->row_array();
    } 

    public function add($data)
    {
        $this->db->insert($this->_table, $data);
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