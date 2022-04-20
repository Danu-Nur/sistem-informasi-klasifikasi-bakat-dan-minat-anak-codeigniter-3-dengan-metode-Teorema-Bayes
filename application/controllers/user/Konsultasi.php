<?php 
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Konsultasi extends CI_Controller {
 
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kusoner');
        $this->load->model('M_konsultasi');
        $this->load->model('M_detail_konsultasi');
        $this->load->model('M_hasil_konsultasi');
        $this->load->model('M_siswa');
        $this->load->model('M_bakat_minat');
		$this->load->model('M_dump');

		if($this->session->userdata('STATUS_USER') != 'USER'){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Anda Belum Login !!!
				</div>');
			redirect('Welcome');
		}  
	  

    }
	public function rules($r){ 
        return [
            ['field' => 'K'.$r,
			'label' => 'wajib di isi',
			'rules' => 'required']

        ];
    }

    public function index()
    {
		$mdl = $this->M_dump;
		$mdl2 = $this->M_kusoner;
		$mb = $this->M_bakat_minat;
		$mb2 = $this->M_siswa;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$bkt = $mb->getAll()->result_array();

		
		
		$data = array(
			'judul' => 'Konsultasi',
			// 'sub' => 'tambah data ',
			// 'sub2' => 'Edit Data',
			'usr' => $mdl2->getAllJoin(),
			'dump' => $mdl->getAll(),
			'bakat' => $mb->getAll(),
			'siswa' => $mb2->getAll(),
			'isi' => 'c_user/v_konsultasi'
		);
		foreach($mdl2->getAll() as $r){
			$rr = $r['ID_KUSONER'];
			$validation->set_rules($this->rules($rr));
			
		}
		
		if ($validation->run() == FALSE){
			$this->load->view('c_user/index',$data);
		} else {
			$idm = $post['ID_SISWA'];
			foreach($bkt as $k){
				$idbakat = $k['ID_BAKAT_MINAT'];

				$kusoner = $mdl2->getIdKusoner($idbakat);
				foreach($kusoner as $ner){
					$kus = $ner['ID_KUSONER'];

					$data2 = array(
						'ID_SISWA' => $post['ID_SISWA'],
						'ID_KUSONER' => $kus,
						'JWB' => $post['K'.$kus]
					);
					$cek = $mdl->cekDump($data2);
					if(count($cek)>0){
						$mdl->update($data2);
						$this->session->set_flashdata('success', 'Berhasil diupdate');
			
					}else{
						$mdl->add($data2);
						$this->session->set_flashdata('success', 'Berhasil disimpan');
			
					}
				}
			}
	
			$this->bayes($idm);
			redirect('user/Konsultasi/Hasil_Konsultas');
			
		}
	}

	// public function edit($ID_KUSONER = NULL)
	// {
	// 	if(!isset($ID_KUSONER))
    // 	{
    // 		$ID_KUSONER = $this->input->post('ID_KUSONER');
    // 	}
	// 	if(!isset($ID_KUSONER)) redirect('user/Kusoner');
	// 	$mdl = $this->M_kusoner;
	// 	$validation = $this->form_validation;
	// 	$post = $this->input->post();
	// 	$validation->set_rules($this->rules()); 

    //     if ($validation->run()){
	// 		$data = array(
	// 		'ID_KUSONER' => $ID_KUSONER,
	// 		'ID_BAKAT_MINAT' => $post['ID_BAKAT_MINAT'],
	// 		'KUSONER' => $post['KUSONER'],
			// );
	// 	$mdl->edit($data);
	// 	$this->session->set_flashdata('success', 'Berhasil diupdate'); 
	// 	}
	// 	redirect('user/Kusoner');
	// }

	public function delete($id = NULL)
	{
		if (!isset($id)) show_404();                  
    	if ($this->M_kusoner->delete($id)) 
    		{             
    			redirect('user/Konsultasi');         
    		}     
    } 

	public function bayes($id = null)
	{
		if($id == null){
			$siswa = $this->M_dump->siswaDistinct();
		}else {
			$siswa = $this->M_dump->siswaId($id);
		}
		foreach ($siswa as $s) {
			$ids = $s['ID_SISWA'];
			$dataa = array('ID_SISWA'=> $ids);

			$cek = $this->M_hasil_konsultasi->cek($ids);
			$cek_count = count($cek->result_array());
			$h = $cek->row_array();

			if($cek_count > 0){
				$this->M_hasil_konsultasi->edit($dataa);
				
				$idh = $h['ID_HASIL'];
			}else {
				$idh = $this->M_hasil_konsultasi->add($dataa);
			}
			
			$bakat = $this->M_dump->bakatDistinct();
			foreach ($bakat as $b) {
				$idb = $b['ID_BAKAT_MINAT'];
				$data = array(
					'ID_BAKAT_MINAT' => $idb,
					'ID_SISWA' => $ids,
				);
				// P(B).P(B|A) ATAS
				$PB = $this->M_dump->getDump($data);
				$PBt = $this->M_dump->totalkusoner();
				$PBk = $this->M_dump->totalkusonerbakat($idb);
				$totalBawah = 0;
				$atas = ($PB/$PBt)*($PB/$PBk);
				
				foreach ($bakat as $c) {
					$idbc = $c['ID_BAKAT_MINAT'];
					$data2 = array(
					'ID_BAKAT_MINAT'=>$idbc,
					'ID_SISWA'=>$ids,
					);
				// P(B).P(B|A) Bawah
					$PBc = $this->M_dump->getDump($data2);
					$PBtc = $this->M_dump->totalkusoner();
					$PBkc = $this->M_dump->totalkusonerbakat($idbc);

					$bawah = ($PBc/$PBtc)*($PBc/$PBkc);

					$totalBawah = $totalBawah + $bawah;
				}
				$total = $atas / $totalBawah;
				$data3 = array(
						'ID_HASIL' => $idh,
						'ID_BAKAT_MINAT' => $idb,
						'HASIL_HITUNG' => $total,
						);
				$cekD = $this->M_detail_konsultasi->cek($data3);
				if ($cekD > 0) {
					$this->M_detail_konsultasi->edit($data3);
				}else {
					$this->M_detail_konsultasi->add($data3);
				}
				
			}
			
		}
		if ($id == null) {
			// redirect('user/konsultasi');
		}else {
			redirect('user/Hasil_Konsultasi/detail/'.$id);
		}
		
	}
}

?>
