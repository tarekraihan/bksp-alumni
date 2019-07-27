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
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}	

	// public function edit($id = null)
	// {
	// 	if(!in_array('updateUser', $this->permission)) {
	// 		redirect('dashboard', 'refresh');
	// 	}

	// 	if($id) {
	// 		$this->form_validation->set_rules('groups', 'Group', 'required');
	// 		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
	// 		$this->form_validation->set_rules('email', 'Email', 'trim|required');
	// 		$this->form_validation->set_rules('fname', 'First name', 'trim|required');


	// 		if ($this->form_validation->run() == TRUE) {
	//             // true case
	// 	        if(empty($this->input->post('password')) && empty($this->input->post('cpassword'))) {
	// 	        	$data = array(
	// 	        		'username' => $this->input->post('username'),
	// 	        		'email' => $this->input->post('email'),
	// 	        		'firstname' => $this->input->post('fname'),
	// 	        		'lastname' => $this->input->post('lname'),
	// 	        		'phone' => $this->input->post('phone'),
	// 	        		'gender' => $this->input->post('gender'),
	// 	        	);

	// 	        	$update = $this->model_users->edit($data, $id, $this->input->post('groups'));
	// 	        	if($update == true) {
	// 	        		$this->session->set_flashdata('success', 'Successfully created');
	// 	        		redirect('Controller_Members/', 'refresh');
	// 	        	}
	// 	        	else {
	// 	        		$this->session->set_flashdata('errors', 'Error occurred!!');
	// 	        		redirect('Controller_Members/edit/'.$id, 'refresh');
	// 	        	}
	// 	        }
	// 	        else {
	// 	        	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
	// 				$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

	// 				if($this->form_validation->run() == TRUE) {

	// 					$password = $this->password_hash($this->input->post('password'));

	// 					$data = array(
	// 		        		'username' => $this->input->post('username'),
	// 		        		'password' => $password,
	// 		        		'email' => $this->input->post('email'),
	// 		        		'firstname' => $this->input->post('fname'),
	// 		        		'lastname' => $this->input->post('lname'),
	// 		        		'phone' => $this->input->post('phone'),
	// 		        		'gender' => $this->input->post('gender'),
	// 		        	);

	// 		        	$update = $this->model_users->edit($data, $id, $this->input->post('groups'));
	// 		        	if($update == true) {
	// 		        		$this->session->set_flashdata('success', 'Successfully updated');
	// 		        		redirect('Controller_Members/', 'refresh');
	// 		        	}
	// 		        	else {
	// 		        		$this->session->set_flashdata('errors', 'Error occurred!!');
	// 		        		redirect('Controller_Members/edit/'.$id, 'refresh');
	// 		        	}
	// 				}
	// 		        else {
	// 		            // false case
	// 		        	$user_data = $this->model_users->getUserData($id);
	// 		        	$groups = $this->model_users->getUserGroup($id);

	// 		        	$this->data['user_data'] = $user_data;
	// 		        	$this->data['user_group'] = $groups;

	// 		            $group_data = $this->model_groups->getGroupData();
	// 		        	$this->data['group_data'] = $group_data;

	// 					$this->render_template('members/edit', $this->data);	
	// 		        }	

	// 	        }
	//         }
	//         else {
	//             // false case
	//         	$user_data = $this->model_users->getUserData($id);
	//         	$groups = $this->model_users->getUserGroup($id);

	//         	$this->data['user_data'] = $user_data;
	//         	$this->data['user_group'] = $groups;

	//             $group_data = $this->model_groups->getGroupData();
	//         	$this->data['group_data'] = $group_data;

	// 			$this->render_template('members/edit', $this->data);	
	//         }	
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