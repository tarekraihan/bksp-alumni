<?php 

class Members extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Alumni Members';
		

		$this->load->model('Model_application');
	}

	
	public function index()
	{
		if(!in_array('viewMember', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->render_template('alumni_members/index', $this->data);
	}

	
    public function fetchMemberData()
	{
		$result = array('data' => array());

		$data = $this->Model_application->getMemberData();

		foreach ($data as $key => $value) {

           // $store_data = $this->model_stores->getStoresData($value['store_id']);
			// button
           $buttons = '';
            // if(in_array('approveApplication', $this->permission)) {
    		// 	$buttons .= '<a href="'.base_url('Member/approve/'.$value['id']).'" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>';
            // }

            // if(in_array('deleteApplication', $this->permission)) { 
    		// 	$buttons .= ' <button type="button" class="btn btn-danger btn-sm" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			// }
			if(in_array('viewMember', $this->permission)){
				$buttons .= ' <a href="'.base_url('Members/view/'.$value['id']).'" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>';
			}


			$img = '<img src="'.base_url($value['profile_picture']).'" alt="'.$value['name'].'" class="img-circle" width="50" height="50" />';

			$result['data'][$key] = array(
				$value['id'],
				$img,
				$value['name'],
				$value['bksp_admission_year'],
				$value['cadet_no'],
				$value['year_of_ssc'],
				$value['mobile'],
				date('d-M-Y', strtotime($value['created_at'])),
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}

	
	public function view( $id = null ){
		if(!in_array('viewApplication', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			$application_data = $this->Model_application->getMemberData($id);
			$this->data['application_data'] = $application_data;
			$this->render_template('alumni_members/view', $this->data);	

		}else{
			redirect('Members', 'refresh');
		}
	}


}