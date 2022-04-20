<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model 
{
	public function cek_login()
	{
		$USRNAMA = set_value('USRNAMA');
		$PASWORD = set_value('PASWORD');

		$result   = $this->db->where('NAMA',$USRNAMA)
							->where('PASSW',$PASWORD)
							->limit(1)
							->get('tb_user');

		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return array();
		}
	}
}

?>
