<?php
class Admin_model extends CI_Model {
	

	public function verify_user($username,$password)
	{
		$q = $this
		->db
		->where('user_name',$username)
		->where('password',SHA1($password))
		->limit(1)
		->get('users');
		if($q->num_rows() > 0)
		{
			return $q->row();
		}
			return false;
	}
	
	public function update_password($id,$password)
	{
		$data = array('password' => SHA1($password));

		$where = "id =".$id;

		$str = $this->db->update_string('users', $data, $where);
		$this->db->query($str);
	}
	
	public function change_image($id,$image)
	{
		$data = array('image_path' => $image);

		$where = "id =".$id;

		$str = $this->db->update_string('users', $data, $where);
		$this->db->query($str);
	}
	
	public function update_personal_info($id,$first_name,$last_name,$user_name,$email_address)
	{
		$data = array('first_name' => $first_name,'last_name' => $last_name, 'user_name' => $user_name, 'email_address' => $email_address);

		$where = "id =".$id;

		$str = $this->db->update_string('users', $data, $where);
		$this->db->query($str);
	}
	
	public function get_user_data($id)
	{
		
		$q = $this
		->db
		->where('id',$id)
		->limit(1)
		->get('users');
		if($q->num_rows() > 0)
		{
			return $q->row();
		}
		return false;
	}
}
?>
