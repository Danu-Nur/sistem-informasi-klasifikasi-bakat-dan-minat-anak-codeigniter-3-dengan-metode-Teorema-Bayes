<?php 
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Kusoner extends CI_Controller {
 
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kusoner');
        $this->load->model('M_Bakat_Minat');
		
		if($this->session->userdata('STATUS_USER') != 'ADMIN'){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Anda Belum Login !!!
				</div>');
			redirect('Welcome');
		}  

    }
	public function rules(){ 
        return [
			['field' => 'ID_BAKAT_MINAT',
			'label' => 'ID BAKAT MINAT',
			'rules' => 'required'],

            ['field' => 'KUSONER',
			'label' => 'KUSONER',
			'rules' => 'required']

        ];
    }

    public function index()
    {
		$mdl = $this->M_kusoner;
		$mb = $this->M_Bakat_Minat;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$data = array(
			'judul' => 'KUSONER',
			'sub' => 'tambah data ',
			'sub2' => 'Edit Data',
			'usr' => $mdl->getAllJoin(),
			'bakat' => $mb->getAll(),
			'isi' => 'c_admin/v_kusoner'
		);
		
		$validation->set_rules($this->rules());
		if ($validation->run() == FALSE){
			$this->load->view('templat/index',$data);
		} else {
			$data = array(

				'ID_BAKAT_MINAT' => $post['ID_BAKAT_MINAT'],
				'KUSONER' => $post['KUSONER'],

                );
			$mdl->add($data);
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect('admin/Kusoner');
		}
	}

	public function edit($ID_KUSONER = NULL)
	{
		if(!isset($ID_KUSONER))
    	{
    		$ID_KUSONER = $this->input->post('ID_KUSONER');
    	}
		if(!isset($ID_KUSONER)) redirect('admin/Kusoner');
		$mdl = $this->M_kusoner;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$validation->set_rules($this->rules()); 

        if ($validation->run()){
			$data = array(
			'ID_KUSONER' => $ID_KUSONER,
			'ID_BAKAT_MINAT' => $post['ID_BAKAT_MINAT'],
			'KUSONER' => $post['KUSONER'],
			

		);
		$mdl->edit($data);
		$this->session->set_flashdata('success', 'Berhasil diupdate'); 
		}
		redirect('admin/Kusoner');
	}

	public function delete($id = NULL)
	{
		if (!isset($id)) show_404();                  
    	if ($this->M_kusoner->delete($id)) 
    		{             
    			redirect('admin/Kusoner');         
    		}     
    } 
}

?>
