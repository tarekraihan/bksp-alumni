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
    			$buttons .= ' <button type="button" class="btn btn-success btn-sm" onclick="approveFunc('.$value['id'].')" data-toggle="modal" data-target="#approveModal"><i class="fa fa-check"></i></button>';
			}
			
			if(in_array('viewApplication', $this->permission)){
				$buttons .= ' <a href="'.base_url('Controller_Applications/view/'.$value['id']).'" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>';
			}

            if(in_array('deleteApplication', $this->permission)) { 
    			$buttons .= ' <a href="'.base_url('Controller_Applications/decline/'.$value['id']).'" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>';
            }

			if(in_array('deleteApplication', $this->permission)) { 
    			$buttons .= ' <a href="'.base_url('Controller_Applications/delete/'.$value['id']).'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
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
    			$buttons .= ' <button type="button" class="btn btn-success btn-sm" onclick="approveFunc('.$value['id'].')" data-toggle="modal" data-target="#approveModal"><i class="fa fa-check"></i></button>';
			}
			
			if(in_array('viewApplication', $this->permission)){
				$buttons .= ' <a href="'.base_url('Controller_Applications/view/'.$value['id']).'" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>';
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


}