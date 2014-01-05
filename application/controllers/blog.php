<?php
class Blog extends CI_Controller{
	public function index(){
		echo "hello world";
		$this->load->helper('url');
		echo anchor('blog/comments', 'Click Here');
	}
	
	public function comments(){
		echo "Comments";
		$data['title'] = "My Real Title";
		$data['heading'] = "My Real Heading";

		$this->load->view('blogview', $data);
	}
	
	public function shoes($sandals, $id){
        echo $sandals;
        echo $id;
    }
}
?>
