<?php 
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Siswa extends CI_Controller {
 
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_siswa');
		
		if($this->session->userdata('STATUS_USER') != 'ADMIN'){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Anda Belum Login !!!
				</div>');
			redirect('Welcome');
		}  
    }

	public function rules(){ 
        return [
			['field' => 'NAMA_SISWA',
			'label' => 'NAMA_SISWA',
			'rules' => 'required'],

            ['field' => 'KELAS',
			'label' => 'KELAS',
			'rules' => 'required']

        ];
    }

    public function index()
    {
		$mdl = $this->M_siswa;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$data = array(
			'judul' => 'DATA SISWA',
			'sub' => 'tambah data ',
			'sub2' => 'Edit Data',
			'usr' => $mdl->getAll(),
			'isi' => 'c_admin/v_siswa'
		);
		
		$validation->set_rules($this->rules());
		if ($validation->run() == FALSE){
			$this->load->view('templat/index',$data);
		} else {
			$data = array(
				'NAMA_SISWA' => $post['NAMA_SISWA'],
				'KELAS' => $post['KELAS'],
				'JK' => $post['JK'],

                );
			$mdl->add($data);
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect('admin/Siswa');
		}
	}

	public function edit($ID_SISWA = NULL)
	{
		if(!isset($ID_SISWA))
    	{
    		$ID_SISWA = $this->input->post('ID_SISWA');
    	}
		if(!isset($ID_SISWA)) redirect('admin/Siswa');
		$mdl = $this->M_siswa;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$validation->set_rules($this->rules()); 

        if ($validation->run()){
			$data = array(
			'ID_SISWA' => $ID_SISWA,
			'NAMA_SISWA' => $post['NAMA_SISWA'],
			'KELAS' => $post['KELAS'],
			'JK' => $post['JK'],

		);
		$mdl->edit($data);
		$this->session->set_flashdata('success', 'Berhasil diupdate'); 
		}
		redirect('admin/Siswa');
	}

	public function delete($id = NULL)
	{
		if (!isset($id)) show_404();                  
    	if ($this->M_siswa->delete($id)) 
    		{             
    			redirect('admin/Siswa');         
    		}     
    } 
}

?>
