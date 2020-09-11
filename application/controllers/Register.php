<?php

class Register extends CI_Controller
{

    public function __construct() 
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation', 'upload');
    }

    public function index()
    {
    	$data['page'] = 'pages/registerasi';
    	$data['title'] = 'Pendaftaran | Relawan Pajak';
    	$this->load->view('template', $data);    	
    }

    public function insert()
    {
        $data['title'] = 'Pendaftaran | Relawan Pajak';

        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
    	$this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'required');    	
    	$this->form_validation->set_rules('alamat', 'Alamat', 'required');
    	$this->form_validation->set_rules('telepon', 'Nomor Telepon', 'required|is_natural');
        $this->form_validation->set_rules('email', 'Email', 'required|Valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
    	$this->form_validation->set_rules('npm', 'NPM', 'required|is_unique[relawan.npm]');
    	$this->form_validation->set_rules('ipk', 'IPK', 'required');
    	$this->form_validation->set_rules('semester', 'Semester', 'required');
    	$this->form_validation->set_rules('fakultas', 'Fakultas', 'required');
    	$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
    	$this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('status', 'Pernah Mengikuti Relawan Pajak', 'required');

    	if ($this->form_validation->run() == FALSE)
    	{
    		$this->index();
    	} 
    	else 
    	{
            $config['upload_path']          = './files/';
            $config['allowed_types']        = 'rar|zip';
            $config['max_size']             = 20000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('berkas'))
            {
                $this->session->set_flashdata('failed', 'Unggah berkas gagal!, Jangan lupa unggah berkas');
                redirect('register');
            }
            else
            {
                $data = $this->upload->data();
            }
    		$data = array(
                    'firstname'     => $this->input->post('firstname'),
                    'lastname'      => $this->input->post('lastname'),
    				'nama_lengkap' 	=> $this->input->post('namalengkap'),    				
    				'alamat'		=> $this->input->post('alamat'),
    				'telepon'		=> $this->input->post('telepon'),
                    'email'         => $this->input->post('email'),
                    'password'      => $this->input->post('password'),
    				'npm'			=> $this->input->post('npm'),
    				'ipk'			=> $this->input->post('ipk'),
    				'semester'		=> $this->input->post('semester'),
    				'fakultas'		=> $this->input->post('fakultas'),
    				'jurusan'		=> $this->input->post('jurusan'),
    				'kelas'			=> $this->input->post('kelas'),
                    'status'        => $this->input->post('status'),
                    'file'          => $data['file_name']
    		);
    		$this->M_data->insert($data);

    		$this->session->set_flashdata('success', 'Terima kasih telah mendaftar. Untuk tahap berikutnya akan diinfokan lebih lanjut');

    		redirect('register');
    	}
    }
}

?>