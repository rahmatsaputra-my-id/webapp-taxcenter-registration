<?php 

class About extends CI_Controller
{
    public function index()
    {
        $data['page'] = 'pages/tentang';
    	$data['title'] = 'Tentang | Relawan Pajak';
    	$this->load->view('template', $data);
    }
}

?>