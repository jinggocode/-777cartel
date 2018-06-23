<?php

/**
 * 
 */
class Mirror extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->_accessable = true;
		$this->load->helper(array('dump', 'utility')); 
		$this->load->model('admin/user_model');
	} 
	
	public function view($id)
	{   
		$data['data'] = $this->user_model->get($id);;

		$this->render('mirror', $data);
	}
}