<?php 
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Dump extends CI_Controller {
 
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_dump');
        $this->load->model('M_siswa');
		$this->load->model('M_bakat_minat');
		if($this->session->userdata('STATUS_USER') != 'ADMIN'){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Anda Belum Login !!!
				</div>');
			redirect('Welcome');
		}  
    }

	public function rules(){ 
        return [
			['field' => 'ID_SISWA',
			'label' => 'ID SISWA',
			'rules' => 'required'],

			['field' => 'ID_BAKAT_MINAT',
			'label' => 'ID BAKAT MINAT',
			'rules' => 'required'],

			['field' => 'YA',
			'label' => 'YA',
			'rules' => 'required'],

			['field' => 'TIDAK',
			'label' => 'TIDAK',
			'rules' => 'required'],

        ];
    }

    public function index()
    {
		$mdl = $this->M_kusoner;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$data = array(
			'judul' => 'DATA DUMP',
			'sub' => 'tambah data ',
			'sub2' => 'Edit Data',
			'usr' => $mdl->getAll(),
			'isi' => 'c_admin/v_dump'
		);
		
		$validation->set_rules($this->rules());
		if ($validation->run() == FALSE){
			$this->load->view('templat/index',$data);
		} else {
			$data = array(

				'ID_DUMP' => $post['ID_DUMP'],
				'ID_SISWA' => $post['ID_SISWA'],
				'ID_BAKAT_MINAT' => $post['ID_BAKAT_MINAT'],
				'YA' => $post['YA'],
				'TIDAK' => $post['TIDAK'],
				

                );
			$mdl->add($data);
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect('admin/Dump');
		}
	}

	public function edit($ID_DUMP = NULL)
	{
		if(!isset($ID_DUMP))
    	{
    		$ID_DUMP = $this->input->post('ID_DUMP');
    	}
		if(!isset($ID_DUMP)) redirect('admin/Dump');
		$mdl = $this->M_dump;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$validation->set_rules($this->rules()); 

        if ($validation->run()){
			$data = array(
			'ID_DUMP' => $ID_DUMP,
            'ID_SISWA' => $post['ID_SISWA'],
			'ID_BAKAT_MINAT' => $post['ID_BAKAT_MINAT'],
			'YA' => $post['YA'],
			'TIDAK' => $post['TIDAK'],
		);
		$mdl->edit($data);
		$this->session->set_flashdata('success', 'Berhasil diupdate'); 
		}
		redirect('admin/Dump');
	}

	public function delete($id = NULL)
	{
		if (!isset($id)) show_404();                  
    	if ($this->M_dump->delete($id)) 
    		{             
    			redirect('admin/Dump');         
    		}     
    } 
}

?>
