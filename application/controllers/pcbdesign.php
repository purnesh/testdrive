<?php

	class Pcbdesign extends CI_Controller{
		public function index(){
			$this->load->helper('url');
			$this->load->view('download_pcb_design_pdf');
		}
	}

?>
