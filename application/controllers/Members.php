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
            if(in_array('approveApplication', $this->permission)) {
    			$buttons .= '<a href="'.base_url('Members/edit/'.$value['id']).'" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>';
            }

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
	public function edit($id =null){
        $this->data['page_title'] = 'Update Member';
		if($id) {
			$this->form_validation->set_rules('Name', 'Name', 'trim|required');
			$this->form_validation->set_rules('SpouseName', 'SpouseName', 'trim');
			$this->form_validation->set_rules('FatherName', 'Father Name', 'trim|required');
			$this->form_validation->set_rules('MotherName', 'Mother Name', 'trim|required');
			$this->form_validation->set_rules('BKSPAdmissionYear', 'BKSPAdmissionYear', 'trim|required');
			$this->form_validation->set_rules('CadetNo', 'Cadet No', 'trim|required');
			// $this->form_validation->set_rules('CadetNo', 'Cadet No', 'is_unique[temp_members.cadet_no]', array('is_unique' => 'You already applied'));
			$this->form_validation->set_rules('YearOfSSC', 'YearOfSSC', 'trim|required');
			$this->form_validation->set_rules('YearOfHSC', 'YearOfHSC', 'trim|required');
			$this->form_validation->set_rules('YearOfAdmission', 'Year Of Admission', 'trim|required');
			$this->form_validation->set_rules('YearOfPass', 'Year Of Pass', 'trim|required');
			$this->form_validation->set_rules('Address', 'Address', 'trim|required');
			$this->form_validation->set_rules('BloodGroup', 'BloodGroup', 'trim|required');
			$this->form_validation->set_rules('Religion', 'Religion', 'trim|required');
			$this->form_validation->set_rules('Mobile', 'Mobile', 'trim|required');
			$this->form_validation->set_rules('Phone', 'Phone', 'trim');
			$this->form_validation->set_rules('EmailAddress', 'EmailAddress', 'trim|required|valid_email');
			$this->form_validation->set_rules('FacebookId', 'FacebookId', 'trim|valid_url');
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
					// 'is_approved' => 0,
					// 'is_deleted' => 0
				);
            
				if($_FILES['picture_upload']['size'] > 0) {
					$upload_image = $this->upload_image();
					$upload_image = array('profile_picture' => $upload_image);
					
					$this->Model_application->update_member($upload_image, $id);
				}
	
				$update = $this->Model_application->update_member($data, $id);
				if($update == true) {
					$this->session->set_flashdata('success', 'Successfully appplied');
					redirect('Members','refresh');
				}else {
					$this->session->set_flashdata('errors', 'Error occurred!!');
					redirect('Members/edit','refresh');
				}
			}else{
				$this->data['id']=$id;
				$application_data = $this->Model_application->getMemberData($id);
				$this->data['application_data'] = $application_data;
				$this->render_template('alumni_members/edit', $this->data);	
			}
            
        }else {
            redirect('Members','refresh');
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