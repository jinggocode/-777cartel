<?php

/**
 *
 */
class Homepage extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->_accessable = true;
		$this->load->helper(array('dump', 'cek_semester')); 
		$this->load->model('admin/user_model'); 
	}

	public function index()
	{ 
		$data['user'] = (object)$this->ion_auth->user()->row(); 

		$this->generateCsrf();
		$this->render('users/home', $data);
	}

	public function submit_kuesioner()
	{
		$data['status_selesai'] = '1';
		$this->kuesioner_isi_model
			->where('id_periode', $this->input->post('id_periode'))
			->where('id_mahasiswa', $this->input->post('id_mahasiswa'))
			->update($data);

		$this->message('Terima Kasih telah melakukan pengisian kuesioner', 'success');
		$this->go('auth/logout');
	}

}
