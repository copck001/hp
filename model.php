<?php
class Cg_Model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function login($data)
	{
		$query = $this->db->query("Select * from users WHERE email='".$data->email."' AND password ='".$data->password."'");

		return $query->result_array();
	}
	public function getUsers($id=false)
	{
		$sql = "Select * from users WHERE 1";
		if($id)
		{
			$sql .= " AND id=".$id;
		}
		$query = $this->db->query($sql);

		return $query->result_array();
	}

}

?>
