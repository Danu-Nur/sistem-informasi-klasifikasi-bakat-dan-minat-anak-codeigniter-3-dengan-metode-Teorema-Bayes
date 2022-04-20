<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct()     
	{         
		parent::__construct();         
		$this->load->model("M_login");       
		$this->load->library('form_validation');     
	} 

	public function index()
	{
		$this->form_validation->set_rules('USRNAMA', 'USERNAME', 'required',['required' => 'Username wajib diisi !!!']);
		$this->form_validation->set_rules('PASWORD', 'PASSWORD', 'required',['required' => 'Password wajib diisi !!!']);
		if($this->form_validation->run()==FALSE)
		{
			$data = array(
				'judul' => 'LOGIN'
			);
			$this->load->view('v_login',$data);
		}else{
			$auth = $this->M_login->cek_login();
			if($auth == FALSE)
			{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					Username atau Password anda salah !!! </div>');
				redirect('Welcome');
			}else{
				$array = array(
					'ID_USER' => $auth->ID_USER,
					'NAMA'=> $auth->USRNAMA,
					'STATUS_USER'=> $auth->STATUS_USER );
				
				$this->session->set_userdata( $array );
				

				switch ($auth->STATUS_USER) {
					case 'ADMIN' : redirect('admin/Home');
						break;
					
					case 'USER' : redirect('user/Konsultasi');
						break;

						default : ;break;
				}
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Welcome');
	}

	public function lupa()
	{
		$data['judul'] = 'Sistem Informasi Akademik';
		$this->load->view('product/sao',$data);
	}
}
