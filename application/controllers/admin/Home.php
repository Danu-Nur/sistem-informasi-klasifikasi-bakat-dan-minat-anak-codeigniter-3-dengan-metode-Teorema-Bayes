<?php 
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Home extends CI_Controller {
 
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
		if($this->session->userdata('STATUS_USER') != 'ADMIN'){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Anda Belum Login !!!
				</div>');
			redirect('Welcome');
		}  
    }


    public function index()
    {
		// $mdl = $this->M_user;
		// $validation = $this->form_validation;
		// $post = $this->input->post();
		$data = array(
			'judul' => 'Home ',
			// 'sub' => 'tambah data ',
			// 'sub2' => 'Edit Data',
			// 'usr' => $mdl->getAll(),
			'isi' => 'c_admin/home'
		);
		
		// $validation->set_rules($this->rules());
		// if ($validation->run() == FALSE){
			$this->load->view('templat/index',$data);
		// } else {
		// 	$data = array(
		// 		'NAMA' => $post['NAMA'],
		// 		'PASSW' => $post['PASSW'],
		// 		'STATUS_USER' => $post['STATUS_USER'],

        //         );
		// 	$mdl->add($data);
		// 	$this->session->set_flashdata('success', 'Berhasil disimpan');
		// 	redirect('admin/Login');
		// }
	}

}

?>
