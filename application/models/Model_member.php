<?php 

class Model_member extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	// public function getGroupData($groupId = null) 
	// {
	// 	if($groupId) {
	// 		$sql = "SELECT * FROM groups WHERE id = ?";
	// 		$query = $this->db->query($sql, array($groupId));
	// 		return $query->row_array();
	// 	}

	// 	$sql = "SELECT * FROM groups WHERE id != ?";
	// 	$query = $this->db->query($sql, array(1));
	// 	return $query->result_array();
	// }

	public function create($data = '')
	{
		$create = $this->db->insert('temp_members', $data);
		return ($create == true) ? true : false;
	}

	// public function edit($data, $id)
	// {
	// 	$this->db->where('id', $id);
	// 	$update = $this->db->update('groups', $data);
	// 	return ($update == true) ? true : false;	
	// }

	// public function delete($id)
	// {
	// 	$this->db->where('id', $id);
	// 	$delete = $this->db->delete('groups');
	// 	return ($delete == true) ? true : false;
	// }
}