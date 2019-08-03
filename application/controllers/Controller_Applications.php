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
    			$buttons .= ' <button type="button" class="btn btn-success btn-sm" title="Approve" onclick="approveFunc('.$value['id'].')" data-toggle="modal" data-target="#approveModal"><i class="fa fa-check"></i></button>';
			}
			
			if(in_array('viewApplication', $this->permission)){
				$buttons .= ' <a href="'.base_url('Controller_Applications/view/'.$value['id']).'"  title="View Details" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>';
			}
			if(in_array('approveApplication', $this->permission)){
				$buttons .= ' <a href="'.base_url('Controller_Applications/edit/'.$value['id']).'" title="Edit" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>';
			}


            if(in_array('deleteApplication', $this->permission)) { 
    			$buttons .= ' <a href="'.base_url('Controller_Applications/decline/'.$value['id']).'" title="Decline" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>';
            }

			if(in_array('deleteApplication', $this->permission)) { 
    			$buttons .= ' <a href="'.base_url('Controller_Applications/delete/'.$value['id']).'" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
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

	public function decline($id = null)
	{
		if(!in_array('deleteApplication', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			$this->form_validation->set_rules('comment', 'Decline Reason', 'trim|required|min_length[10]');
			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'comment' => $this->input->post('comment'),
					'is_decline' => 1,
					'decline_by' =>  $this->session->userdata('id')
				);
				$decline = $this->Model_application->decline_application($data,$id);
				if($decline == true){
					$this->session->set_flashdata('success', 'Successfully Decline');
        			redirect('Controller_Applications/decline/'.$id, 'refresh');
				}else{
					$this->session->set_flashdata('errors', 'Error occurred!!');
        			redirect('Controller_Applications/decline/'.$id, 'refresh');
				}
			}else{
				$this->data['id']=$id;
				$this->render_template('applications/decline', $this->data);	
			}	
		}else{
			redirect('Controller_Applications','refresh');
		}
	}

	public function delete($id = null)
	{
		if(!in_array('deleteApplication', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			
			if($this->input->post('confirm')){ 
				$data = array(
					'is_deleted' => 1,
					'deleted_by' =>  $this->session->userdata('id')
				);
				$delete = $this->Model_application->delete_application($data,$id);
				if($delete == true){
					$this->session->set_flashdata('success', 'Successfully Deleted');
        			redirect('Controller_Applications/delete/'.$id, 'refresh');
				}else{
					$this->session->set_flashdata('errors', 'Error occurred!!');
        			redirect('Controller_Applications/delete/'.$id, 'refresh');
				}
			}else{
				$this->data['id']=$id;
				$this->render_template('applications/delete', $this->data);	
			}	
		}else{
			redirect('Controller_Applications','refresh');
		}
	}

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
	public function decline_list()
	{
		if(!in_array('viewApplication', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$this->data['title'] = "Decline List";
		$this->render_template('applications/decline_list', $this->data);
    }
	
	public function fetchDeclineApplicationData()
	{
		$result = array('data' => array());

		$data = $this->Model_application->getDeclineApplicationData();

		foreach ($data as $key => $value) {

           // $store_data = $this->model_stores->getStoresData($value['store_id']);
			// button
            $buttons = '';
            if(in_array('approveApplication', $this->permission)) {
    			$buttons .= ' <button type="button" class="btn btn-success btn-sm" title="Approve" onclick="approveFunc('.$value['id'].')" data-toggle="modal" data-target="#approveModal"><i class="fa fa-check"></i></button>';
			}
			
			if(in_array('viewApplication', $this->permission)){
				$buttons .= ' <a href="'.base_url('Controller_Applications/view/'.$value['id']).'" title="View Details" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>';
			}

            // if(in_array('deleteApplication', $this->permission)) { 
    		// 	$buttons .= ' <a href="'.base_url('Controller_Applications/decline/'.$value['id']).'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
            // }

			$img = '<img src="'.base_url($value['profile_picture']).'" alt="'.$value['name'].'" class="img-circle" width="50" height="50" />';

			$result['data'][$key] = array(
				$img,
				$value['name'],
				$value['bksp_admission_year'],
				$value['cadet_no'],
				$value['year_of_ssc'],
				$value['mobile'],
				$value['comment'],
				date('d-M-Y', strtotime($value['created_at'])),
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}

	public function edit($id =null){
        $this->data['page_title'] = 'Update Application';
		if($id) {
			$this->form_validation->set_rules('Name', 'Name', 'trim|required');
			$this->form_validation->set_rules('SpouseName', 'SpouseName', 'trim');
			$this->form_validation->set_rules('FatherName', 'Father Name', 'trim|required');
			$this->form_validation->set_rules('MotherName', 'Mother Name', 'trim|required');
			// $this->form_validation->set_rules('BKSPAdmissionYear', 'BKSPAdmissionYear', 'trim|required');
			$this->form_validation->set_rules('CadetNo', 'Cadet No', 'trim|required');
			// $this->form_validation->set_rules('CadetNo', 'Cadet No', 'is_unique[temp_members.cadet_no]', array('is_unique' => 'You already applied'));
			$this->form_validation->set_rules('YearOfSSC', 'YearOfSSC', 'trim');
			$this->form_validation->set_rules('YearOfHSC', 'YearOfHSC', 'trim');
			// $this->form_validation->set_rules('YearOfAdmission', 'Year Of Admission', 'trim|required');
			// $this->form_validation->set_rules('YearOfPass', 'Year Of Pass', 'trim|required');
			$this->form_validation->set_rules('Address', 'Address', 'trim|required');
			$this->form_validation->set_rules('BloodGroup', 'BloodGroup', 'trim|required');
			$this->form_validation->set_rules('Religion', 'Religion', 'trim|required');
			$this->form_validation->set_rules('Mobile', 'Mobile', 'trim|required');
			$this->form_validation->set_rules('Phone', 'Phone', 'trim');
			$this->form_validation->set_rules('EmailAddress', 'EmailAddress', 'trim|required|valid_email');
			$this->form_validation->set_rules('FacebookId', 'FacebookId', 'trim');
			$this->form_validation->set_rules('ProfessinalInformation', 'ProfessinalInformation', 'trim|required');
			$this->form_validation->set_rules('NID', 'NID', 'trim|required');
			$this->form_validation->set_rules('DateOfBirth', 'DateOfBirth', 'trim|required');
			$this->form_validation->set_rules('Gender', 'Gender', 'required');
			if ($this->form_validation->run() == TRUE) {
			
				$email = $this->input->post('EmailAddress');
				$gender = $this->input->post('Gender');
				$name =  $this->input->post('Name');
				$data = array(
					'name' =>  $name,
					'spouse_name' => $this->input->post('SpouseName'),
					'father_name' => $this->input->post('FatherName'),
					'mother_name' => $this->input->post('MotherName'),
					'bksp_admission_year' => $this->input->post('BKSPAdmissionYear'),
					'cadet_no' => $this->input->post('CadetNo'),                
					'year_of_ssc' => $this->input->post('YearOfSSC'),
					'year_of_hsc' => $this->input->post('YearOfHSC'),
					'degree_cadet_admission_year' => $this->input->post('YearOfAdmission'),
					'degree_cadet_passing_year' => $this->input->post('YearOfPass'),
					'address' => $this->input->post('Address'),
					'blood_group' => $this->input->post('BloodGroup'),
					'religious' => $this->input->post('Religion'),
					'mobile' => $this->input->post('Mobile'),
					'phone' => $this->input->post('Phone'),
					'email_address' => $email,
					'facebook_id' => $this->input->post('FacebookId'),
					'professional_info' => $this->input->post('ProfessinalInformation'),
					'nid' => $this->input->post('NID'),
					'gender' => $gender,
					'date_of_birth' => date('Y-m-d',strtotime($this->input->post('DateOfBirth'))),
					// 'profile_picture' => $upload_image,
					'is_approved' => 0,
					'is_deleted' => 0
				);
            
				if($_FILES['picture_upload']['size'] > 0) {
					$upload_image = $this->upload_image();
					$upload_image = array('profile_picture' => $upload_image);
					
					$this->Model_application->update_application($upload_image, $id);
				}
	
				$update = $this->Model_application->update_application($data, $id);
				if($update == true) {
					$this->session->set_flashdata('success', 'Successfully appplied');
					redirect('Controller_Applications','refresh');
				}else {
					$this->session->set_flashdata('errors', 'Error occurred!!');
					redirect('Controller_Applications/edit','refresh');
				}
			}else{
				$this->data['id']=$id;
				$application_data = $this->Model_application->getApplicationData($id);
				$this->data['application_data'] = $application_data;
				$this->render_template('applications/edit', $this->data);	
			}
            
        }else {
            redirect('Controller_Applications','refresh');
        }
    }
	public function upload_image()
    {
        $config['upload_path'] = 'assets/front_end/members';
        $config['file_name'] =  uniqid();
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '1000';

        // $config['max_width']  = '1024';s
        // $config['max_height']  = '768';

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('picture_upload'))
        {
            $error = $this->upload->display_errors();
            return $error;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $type = explode('.', $_FILES['picture_upload']['name']);
            $type = $type[count($type) - 1];
            
            $path = $config['upload_path'].'/'.$config['file_name'].'.'.$type;
            return ($data == true) ? $path : false;            
        }
    }

}