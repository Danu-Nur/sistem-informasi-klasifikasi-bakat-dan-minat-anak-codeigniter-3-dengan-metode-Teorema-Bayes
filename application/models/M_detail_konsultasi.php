<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_detail_konsultasi extends CI_Model {

    
    public $_table = 'detail_konsultasi';
    public $idm = 'ID_DETAIL';

	public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getAllJoin()
    {

    $this->db->select('*');
    
    $this->db->from('detail_konsultasi');

    $this->db->join('tb_dump', 'tb_dump.ID_DUMP = detail_konsultasi.ID_DETAIL');
    $this->db->join('tb_hasil_konsultasi', 'tb_hasil_konsultasu.ID_HASIL = detail_konsultasi.ID_DETAIL');
    
    return $this->db->get()->result_array();
    }

    public function getDetail($id)
    {
        $query = "SELECT tb_siswa.NAMA_SISWA, detail_konsultasi.HASIL_HITUNG, tb_bakat_minat.BAKAT_MINAT
        FROM detail_konsultasi 
        inner JOIN tb_hasil_konsultasi ON tb_hasil_konsultasi.ID_HASIL = detail_konsultasi.ID_HASIL
        inner JOIN tb_bakat_minat ON tb_bakat_minat.ID_BAKAT_MINAT = detail_konsultasi.ID_BAKAT_MINAT
        inner join tb_siswa on tb_siswa.ID_SISWA = tb_hasil_konsultasi.ID_SISWA
        WHERE tb_hasil_konsultasi.ID_SISWA = '$id'
        ORDER BY detail_konsultasi.HASIL_HITUNG DESC 
        LIMIT 3";

        return $this->db->query($query)->result();
    }

    public function getsiswa($id)
    {
        $query = "SELECT tb_siswa.NAMA_SISWA
        FROM detail_konsultasi 
        inner JOIN tb_hasil_konsultasi ON tb_hasil_konsultasi.ID_HASIL = detail_konsultasi.ID_HASIL
        inner JOIN tb_bakat_minat ON tb_bakat_minat.ID_BAKAT_MINAT = detail_konsultasi.ID_BAKAT_MINAT
        inner join tb_siswa on tb_siswa.ID_SISWA = tb_hasil_konsultasi.ID_SISWA
        WHERE tb_hasil_konsultasi.ID_SISWA = '$id'
        ORDER BY detail_konsultasi.HASIL_HITUNG DESC 
        LIMIT 1";

        return $this->db->query($query)->result();
    }

    public function cek($data)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('ID_HASIL', $data['ID_HASIL']);
        $this->db->where('ID_BAKAT_MINAT', $data['ID_BAKAT_MINAT']);
        return count($this->db->get()->result());
        
    }

	public function getById($id){
        return $this->db->get_where($this->_table, ['ID_DETAIL' => $id])->row();
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
        $this->db->where('ID_HASIL', $data['ID_HASIL']);
        $this->db->where('ID_BAKAT_MINAT', $data['ID_BAKAT_MINAT']);
        $this->db->update($this->_table, $data);
    }
}

/* End of file ModelName.php */



?>