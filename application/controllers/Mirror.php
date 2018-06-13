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
		$this->load->model('admin/url_model');
	} 
	
	public function index()
	{  
		$data['url'] = $this->url_model->get();
 
		$this->render('mirror', $data);
	}
}