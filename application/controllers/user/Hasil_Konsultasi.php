<?php 
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Hasil_Konsultasi extends CI_Controller {
 
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_hasil_konsultasi');
        $this->load->model('M_detail_konsultasi');
		$this->load->model('M_dump');
		$this->load->model('M_bakat_minat');
		$this->load->model('M_siswa');
        $this->load->model('M_user');
		
		if($this->session->userdata('STATUS_USER') != 'USER'){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Anda Belum Login !!!
				</div>');
			redirect('Welcome');
		}  
    }

	public function rules(){ 
        return [
			['field' => 'ID_HASIL',
			'label' => 'ID HASIL',
			'rules' => 'required'],


        ];
    }

    public function index()
    {
		$mdl = $this->M_hasil_konsultasi;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$data = array(
			'judul' => 'HASIL KUNSULTASI',
			'sub' => 'tambah data ',
			'sub2' => 'Edit Data',
			'usr' => $mdl->getAll(),
			'hasil' => $mdl->getAllJOIN(),
			'isi' => 'c_user/v_hasil_konsultasi'
		);
		
		$validation->set_rules($this->rules());
		if ($validation->run() == FALSE){
			$this->load->view('c_user/index',$data);
		} else {
			$data = array(

				'ID_HASIL' => $post['ID_HASIL'],
				'ID_DUMP' => $post['ID_DUMP'],
				'ID_BAKAT_MINAT' => $post['ID_BAKAT_MINAT'],
				'ID_SISWA' => $post['ID_SISWA'],
				

                );
			$mdl->add($data);
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect('user/Hasil_Konsultasi');
		}
	}

	public function detail($id = null)
    {
		$mdl = $this->M_detail_konsultasi;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$data = array(
			'judul' => 'Detail_Konsultasi',
			'sub' => 'Data Siswa ',
			'sub2' => 'Hasil Teorema Bayes',
			'usr' => $mdl->getAll(),
			'siswa' => $mdl->getsiswa($id),
			'detail' => $mdl->getDetail($id),
			'isi' => 'c_user/v_detail_konsultasi'
		);
		$this->load->view('c_user/index',$data);
		
		// $validation->set_rules($this->rules());
		// if ($validation->run() == FALSE){
		// } else {
		// 	$data = array(

		// 		'ID_DUMP' => $post['ID_DUMP'],
		// 		'ID_HASIL' => $post['ID_HASIL'],
		// 		'HASIL_HITUNG' => $post['HASIL_HITUNG'],

        //         );
		// 	$mdl->add($data);
		// 	$this->session->set_flashdata('success', 'Berhasil disimpan');
		// 	redirect('user/Detail_Konsultasi');
		// }
	}


	public function edit($ID_HASIL = NULL)
	{
		if(!isset($ID_HASIL))
    	{
    		$ID_HASIL = $this->input->post('ID_HASIL');
    	}
		if(!isset($ID_HASIL)) redirect('user/Hasil_Konsultasi');
		$mdl = $this->M_hasil_konsultasi;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$validation->set_rules($this->rules()); 

        if ($validation->run()){
			$data = array(
			'ID_HASIL' => $ID_HASIL,
            'ID_USER' => $post['ID_USER'],
            'MINAT' => $post['MINAT'],
			'KETERANGAN' => $post['KETERANGAN'],

		);
		$mdl->edit($data);
		$this->session->set_flashdata('success', 'Berhasil diupdate'); 
		}
		redirect('user/Hasil_Konsultasi');
	}

	public function delete($id = NULL)
	{
		if (!isset($id)) show_404();                  
    	if ($this->M_hasil_konsultasi->delete($id)) 
    		{             
    			redirect('user/Hasil_Konsultasi');         
    		}     
    } 
}

?>
