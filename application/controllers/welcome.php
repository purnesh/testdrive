<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data['title'] = "ATCAD - Home";
		$this->load->helper('url');
		$this->load->view('index_page', $data);
		$this->load->view('footer');
	}
}
