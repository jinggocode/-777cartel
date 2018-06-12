<?php

/**
 * 
 */
class Url extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->_accessable = true;
		$this->load->helper(array('dump', 'utility')); 
		$this->load->model('admin/url_model');
	} 
	
	public function index()
	{  
		$data['url'] = $this->url_model->get();
 
		$this->render('user/url/index', $data);
	}
	public function save()
	{
		$this->form_validation->set_rules('url', 'URL', 'trim|required|max_length[255]'); 

		if ($this->form_validation->run() == false) {   

			$this->generateCsrf(); 
			$this->render('user/home');
		} else { 
			$data = $this->input->post();  
 
			$insert = $this->url_model->insert($data);
			if ($insert == false) {
				echo "ada kesalahan";
			} else {
				$this->message('URL berhasi di Tambahkan!', 'success');
				$this->go('user/homepage');  
			}
		}
	} 

	public function update()
	{
		$this->form_validation->set_rules('url', 'URL', 'trim|required|max_length[255]');  

		if ($this->form_validation->run() == false) {
			$data['data'] = $this->input->post(); 

			$this->generateCsrf();
			$this->render('user/home', $data);
		} else {
			$data = $this->input->post();  

			$update = $this->url_model->update($data);
			if ($update == false) {
				echo "ada kesalahan";
			} else {
				$this->message('URL berhasi di Ubah!', 'success');
				$this->go('user/homepage'); //redirect ke users
			}
		}
	}
}