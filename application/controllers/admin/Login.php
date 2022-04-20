<?php 
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Login extends CI_Controller {
 
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

	public function rules(){ 
        return [
			['field' => 'NAMA',
			'label' => 'nama',
			'rules' => 'required'],

            ['field' => 'PASSW',
			'label' => 'password',
			'rules' => 'required']
        ];
    }

    public function index()
    {
		$mdl = $this->M_user;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$data = array(
			'judul' => 'DATA USER',
			'sub' => 'tambah data ',
			'sub2' => 'Edit Data',
			'usr' => $mdl->getAll(),
			'isi' => 'c_admin/v_user'
		);
		
		$validation->set_rules($this->rules());
		if ($validation->run() == FALSE){
			$this->load->view('templat/index',$data);
		} else {
			$data = array(
				'NAMA' => $post['NAMA'],
				'PASSW' => $post['PASSW'],
				'STATUS_USER' => $post['STATUS_USER'],

                );
			$mdl->add($data);
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect('admin/Login');
		}
	}

	public function edit($ID_USER = NULL)
	{
		if(!isset($ID_USER))
    	{
    		$ID_USER = $this->input->post('ID_USER');
    	}
		if(!isset($ID_USER)) redirect('admin/Login');
		$mdl = $this->M_user;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$validation->set_rules($this->rules()); 

        if ($validation->run()){
			$data = array(
			'ID_USER' => $ID_USER,
			'NAMA' => $post['NAMA'],
			'PASSW' => $post['PASSW'],
			'STATUS_USER' => $post['STATUS_USER'],

		);
		$mdl->edit($data);
		$this->session->set_flashdata('success', 'Berhasil diupdate'); 
		}
		redirect('admin/Login');
	}

	public function delete($id = NULL)
	{
		if (!isset($id)) show_404();                  
    	if ($this->M_user->delete($id)) 
    		{             
    			redirect('admin/Login');         
    		}     
    } 
}

?>
