<?php  

class Home extends CI_Controller
{

    public function index()
    {
    	$data['page'] = 'pages/index';
    	$data['title'] = 'Beranda | Relawan Pajak';
    	$this->load->view('template', $data);
    }

    public function register()
    {
        $this->load->helper('url');
    	// $data['page'] = 'registerasi';
    	// $data['title'] = 'Pendaftaran | Relawan Pajak';
    	// $this->load->view('template', $data);

        // $this->load->view('pages/registerasi');

        $this->load->view('registerasi');
    }
}

?>