<?php 
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Bakat_Minat extends CI_Controller {
 
	public function __construct()
    {
        parent::__construct();
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
			['field' => 'BAKAT_MINAT',
			'label' => 'BAKAT MINAT',
			'rules' => 'required'],

        ];
    }

    public function index()
    {
		$mdl = $this->M_bakat_minat;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$data = array(
			'judul' => 'BAKAT MINAT',
			'sub' => 'tambah data ',
			'sub2' => 'Edit Data',
			'usr' => $mdl->getAll()->result(),
			'isi' => 'c_admin/v_bakat_minat'
		);
		
		$validation->set_rules($this->rules());
		if ($validation->run() == FALSE){
			$this->load->view('templat/index',$data);
		} else {
			$data = array(
				'BAKAT_MINAT' => $post['BAKAT_MINAT'],
				
                );
			$mdl->add($data);
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect('admin/Bakat_Minat');
		}
	}

	public function edit($ID_BAKAT_MINAT = NULL)
	{
		if(!isset($ID_BAKAT_MINAT))
    	{
    		$ID_BAKAT_MINAT = $this->input->post('ID_BAKAT_MINAT');
    	}
		if(!isset($ID_BAKAT_MINAT)) redirect('admin/Bakat_Minat');
		$mdl = $this->M_bakat_minat;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$validation->set_rules($this->rules()); 

        if ($validation->run()){
			$data = array(
			'ID_BAKAT_MINAT' => $ID_BAKAT_MINAT,
            'BAKAT_MINAT' => $post['BAKAT_MINAT'],
		);
		$mdl->edit($data);
		$this->session->set_flashdata('success', 'Berhasil diupdate'); 
		}
		redirect('admin/Bakat_Minat');
	}

	public function delete($id = NULL)
	{
		if (!isset($id)) show_404();                  
    	if ($this->M_bakat_minat->delete($id)) 
    		{             
    			redirect('admin/Bakat_Minat');         
    		}     
    } 
}

?>
