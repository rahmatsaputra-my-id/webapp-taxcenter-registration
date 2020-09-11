<?php
class User extends CI_Controller
{ 
	public function login()
	{
		
		$data['title'] = 'Relawan Pajak Administrator | Login';
		// set rules validasi
		// echo hashpassword('@R3l4w4np4j4k');
		$this->form_validation->set_rules('email', 'Email', 'required|Valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		// cek rules
		if($this->form_validation->run() ==  FALSE) 
		{			
			$this->load->view('user/login', $data);
		} 
		else 
		{
			// proses login
			// tampung data
			$email 		= $this->input->post('email'); //$_POST['email']
			$password 	= $this->input->post('password');

			// cek apakah email dan password sesuai dengan database
			$user = $this->M_data->get_user_by_email_password($email,$password);

			if ($user) 
			{
				// session
				$data = array(
					'id' 		=> $user->id,
					'username' 	=> $user->username,
					'email' 	=> $user->email,
					'is_login'  => TRUE
				);
				
				// buat session
				$this->session->set_userdata($data);
				// redirect ke halaman area
				redirect('admin/dashboard');
			}
			else
			{
				// buat pesan error
				$this->session->set_flashdata('error_login', 'Wrong email or Password.');
				// redirect ke halaman login
				redirect('user/login');
			}
		}
	}

	public function logout()
    {
        $this->session->unset_userdata(array('id','username', 'email', 'is_login'));

        redirect('user/login');
    }
}
?>

