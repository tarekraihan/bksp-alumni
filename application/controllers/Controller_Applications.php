<?php 

class Controller_Applications extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Applications';
		

		$this->load->model('Model_application');
	}

	
	public function index()
	{
		if(!in_array('viewApplication', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$this->render_template('applications/index', $this->data);
    }
    
    public function fetchApplicationData()
	{
		$result = array('data' => array());

		$data = $this->Model_application->getApplicationData();

		foreach ($data as $key => $value) {

           // $store_data = $this->model_stores->getStoresData($value['store_id']);
			// button
            $buttons = '';
            if(in_array('approveApplication', $this->permission)) {
    			$buttons .= ' <button type="button" class="btn btn-success btn-sm" onclick="approveFunc('.$value['id'].')" data-toggle="modal" data-target="#approveModal"><i class="fa fa-pencil"></i></button>';
			}
			
			if(in_array('viewApplication', $this->permission)){
				$buttons .= ' <a href="'.base_url('Controller_Applications/view/'.$value['id']).'" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>';
			}

            if(in_array('deleteApplication', $this->permission)) { 
    			$buttons .= ' <button type="button" class="btn btn-danger btn-sm" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
            }

			$img = '<img src="'.base_url($value['profile_picture']).'" alt="'.$value['name'].'" class="img-circle" width="50" height="50" />';

			$result['data'][$key] = array(
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

	// public function edit($id = null)
	// {
	// 	if(!in_array('veiwApplication', $this->permission)) {
	// 		redirect('dashboard', 'refresh');
	// 	}

	// 	if($id) {
	// 		$application_data = $this->Model_application->getApplicationData($id);
	// 		$this->data['application_data'] = $application_data;
	// 		$this->render_template('applications/view', $this->data);	

	// 	}	
	// }

	public function approve()
	{
		if(!in_array('approveApplication', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$id = $this->input->post('id');
		if($id) {
			
			$approve = $this->Model_application->approve_application($id);
			if($approve == true) {
				return true;
			}
			else {
				return false;
			}
		}
	}

	public function view( $id = null ){
		if(!in_array('viewApplication', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			$application_data = $this->Model_application->getApplicationData($id);
			$this->data['application_data'] = $application_data;
			$this->render_template('applications/view', $this->data);	

		}else{
			redirect('Controller_Applications', 'refresh');
		}
	}

	// public function profile()
	// {
	// 	if(!in_array('viewProfile', $this->permission)) {
	// 		redirect('dashboard', 'refresh');
	// 	}

	// 	$user_id = $this->session->userdata('id');

	// 	$user_data = $this->model_users->getUserData($user_id);
	// 	$this->data['user_data'] = $user_data;

	// 	$user_group = $this->model_users->getUserGroup($user_id);
	// 	$this->data['user_group'] = $user_group;

    //     $this->render_template('members/profile', $this->data);
	// }

}