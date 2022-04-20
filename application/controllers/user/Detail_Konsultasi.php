<?php 
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Detail_Konsultasi extends CI_Controller {
 
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_detail_konsultasi');
        $this->load->model('M_dump');
		$this->load->model('M_hasil_konsultasi');

		if($this->session->userdata('STATUS_USER') != 'USER'){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Anda Belum Login !!!
				</div>');
			redirect('Welcome');
		}  
    }

	public function rules(){ 
        return [
			['field' => 'ID_DUMP',
			'label' => 'ID DUMP',
			'rules' => 'required'],

			['field' => 'ID_HASIL',
			'label' => 'ID HASIL',
			'rules' => 'required'],

			['field' => 'HASIL_HITUNG',
			'label' => 'HASIL HITUNG',
			'rules' => 'required'],

			

        ];
    }

    
	public function edit($ID_DETAIL = NULL)
	{
		if(!isset($ID_DETAIL))
    	{
    		$ID_DETAIL = $this->input->post('ID_DETAIL');
    	}
		if(!isset($ID_DETAIL)) redirect('user/Detail_Konsultasi');
		$mdl = $this->M_detail_konsultasi;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$validation->set_rules($this->rules()); 

        if ($validation->run()){
			$data = array(
			'ID_DETAIL' => $ID_DETAIL,
            'ID_DUMP' => $post['ID_DUMP'],
            'ID_HASIL' => $post['ID_HASIL'],
			'HASIL_HITUNG' => $post['HASIL_HITUNG'],
		);
		$mdl->edit($data);
		$this->session->set_flashdata('success', 'Berhasil diupdate'); 
		}
		redirect('user/Detail_Konsultasi');
	}

	public function delete($id = NULL)
	{
		if (!isset($id)) show_404();                  
    	if ($this->M_detail_konsultasi->delete($id)) 
    		{             
    			redirect('user/Detail_Konsultasi');         
    		}     
    } 
}

?>
