<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_dump extends CI_Model {

    
    public $_table = 'tb_dump';
    public $idm = 'ID_DUMP';

	public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getAllJOIN()

    {

        $this->db->select('*');
    
        $this->db->from($this->_table);
    
        $this->db->join('tb_siswa', 'tb_siswa.ID_SISWA = tb_dump.ID_DUMP');
        $this->db->join('tb_bakat_minat', 'tb_bakat_minat.ID_MINAT_BAKAT = tb_dump.ID_DUMP');
        
    }

	public function getById($id){
        return $this->db->get_where($this->_table, ['ID_DUMP' => $id])->row();
    } 

    public function cekDump($data)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('ID_SISWA', $data['ID_SISWA']);
        $this->db->where('ID_KUSONER', $data['ID_KUSONER']);
        
        return $this->db->get()->result_array();
        
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

    public function update($data)
    {
        $this->db->where('ID_SISWA', $data['ID_SISWA']);
        $this->db->where('ID_KUSONER', $data['ID_KUSONER']);
        $this->db->update($this->_table, $data);
    }

    public function siswaDistinct()
    {
        // $this->db->distinct();
        // $this->db->select('ID_SISWA');
        // $this->db->from($this->_table);
        $query = "SELECT DISTINCT ID_SISWA FROM tb_dump";
        return $this->db->query($query)->result_array();
    }

    public function siswaId($data)
    {
        $this->db->select('ID_SISWA');
        $this->db->from($this->_table);
        $this->db->where('ID_SISWA', $data);
        $this->db->limit(1);
        
        return $this->db->get()->result_array();
    }
    
    public function bakatDistinct()
    {
        $this->db->distinct();
        $this->db->select('ID_BAKAT_MINAT');
        $this->db->from('tb_kusoner');
        return $this->db->get()->result_array();
    }

    public function getDump($data)
    {
        $this->db->select('*');
        $this->db->from('tb_dump');
        $this->db->join('tb_kusoner', 'tb_kusoner.ID_KUSONER = tb_dump.ID_KUSONER');
        $this->db->where('tb_kusoner.ID_BAKAT_MINAT', $data['ID_BAKAT_MINAT']);
        $this->db->where('tb_dump.ID_SISWA', $data['ID_SISWA']);
        $this->db->where('JWB', 'Y');
        return count($this->db->get()->result());
    }

    public function totalkusoner()
    {
        $this->db->select('*');
        $this->db->from('tb_kusoner');
        return count($this->db->get()->result());
    }

    public function totalkusonerbakat($iid)
    {
        $this->db->select('*');
        $this->db->from('tb_kusoner');
        $this->db->where('ID_BAKAT_MINAT', $iid);
        return count($this->db->get()->result());
    }
}

/* End of file ModelName.php */



?>