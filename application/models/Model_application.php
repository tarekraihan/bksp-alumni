<?php 

class Model_application extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getApplicationData($tempId= null) 
	{
		if($tempId) {
			$sql = "SELECT * FROM temp_members WHERE id = ?";
			$query = $this->db->query($sql, array($tempId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM temp_members WHERE is_deleted = ?";
		$query = $this->db->query($sql, array(0));
		return $query->result_array();
	}

	public function getMemberData($Id= null) 
	{
		if($Id) {
			$sql = "SELECT * FROM members WHERE id = ?";
			$query = $this->db->query($sql, array($Id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM members WHERE is_deleted = ?";
		$query = $this->db->query($sql, array(0));
		return $query->result_array();
	}

	public function create($data = '')
	{
		$create = $this->db->insert('temp_members', $data);
		return ($create == true) ? true : false;
	}
	public function approve_application($id){

		$sql = "SELECT * FROM temp_members WHERE id = ?";
		$query = $this->db->query($sql, array($id));
		$member = $query->row_array();
		
		unset($member['id']);
		unset($member['updated_at']);
		$member['is_approved'] = 1;
		$member['approved_by'] = $this->session->userdata('id');

		$create = $this->db->insert('members', $member);
		if( $create == true){
			$data = [
				'is_deleted' => 1,
				'is_approved' => 1,
				'approved_by' => $this->session->userdata('id')
			];
			$this->db->where('id', $id);
			$update = $this->db->update('temp_members', $data);
		}
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