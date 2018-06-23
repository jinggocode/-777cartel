<?php

/**
* 
*/
class Homepage extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->_accessable = TRUE;
		$this->load->helper(array('dump')); 
		$this->load->model(array('admin/user_model'));
		$this->load->model(array('admin/group_model'));
	}

	public function index()
	{
		$user = $this->ion_auth->user()->row(); 
		$data['user'] = $this->user_model->with_group()->get($user->id); 
		// 
		$this->generateCsrf();
		$this->render('admin/home', $data);
	}

	public function tambah()
	{
		dump('ini tambah');
	}

}