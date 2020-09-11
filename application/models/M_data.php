<?php  

/**
 * summary
 */
class M_data extends CI_Model
{
    public function insert($data = array())
    {
    	$this->db->insert('relawan', $data);
    }
	
    public function show_list($data = array())
    {
    	return $this->db->get('relawan')->result();
    }

    function fetch_data()
	{
	  $this->db->select("npm, nama_lengkap, alamat, telepon, email, password, ipk, semester, fakultas, jurusan, kelas");
	  $this->db->from('relawan');
	  return $this->db->get('');
	}

	public function download($id)
	{
		$query = $this->db->get_where('relawan',array('id'=>$id));
		return $query->row_array();
	}

	public function show_update_data($id)
	{
		return $this->db->get_where('relawan', array('id' => $id));
	}

	public function save_update($id, $data)
	{
		
	}	

	public function delete($id = NULL)
	{
		$this->db->delete('relawan', array('id'=> $id));
		// delete from relawan where id =id
	}

	public function get_user_by_email_password($email = '', $password = '')
	{
		return $this->db->get_where('admin', 
			array(
				'email' => $email, 
				'password' => hashpassword($password)
			)
		)->row(); 
	}

}

?>