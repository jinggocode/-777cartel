<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Url_model extends MY_Model
{
	public function __construct()
	{
        $this->table = 'url';
        $this->primary_key = 'id';
        $this->protected = array('id'); 
        
		parent::__construct();
	}

}
