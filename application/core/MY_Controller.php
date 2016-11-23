<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('User');
		$this->load->model('Poke');
	}
		
	public function user_authentication() 
	{
		return $this->session->userdata('user') ? true : false;
	}
}
?>