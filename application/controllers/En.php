<?php defined('BASEPATH') OR exit('No direct script access allowed');

class En extends FrontEnd_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model('Model_member');
    }

    public function index(){
        $this->data['page_title'] = 'BKSP HOME';

        $this->render_template('front_end/home', $this->data);
    }

    public function about_us(){
        $this->data['page_title'] = 'About Us';

        $this->render_template('front_end/about_us', $this->data);
    }

    public function become_a_member(){
        $this->data['page_title'] = 'Become a Member';

		$this->form_validation->set_rules('Name', 'Name', 'trim|required');
		$this->form_validation->set_rules('SpouseName', 'SpouseName', 'trim');
		$this->form_validation->set_rules('FatherName', 'Father Name', 'trim|required');
		$this->form_validation->set_rules('MotherName', 'Mother Name', 'trim|required');
		$this->form_validation->set_rules('BKSPAdmissionYear', 'BKSPAdmissionYear', 'trim|required');
		$this->form_validation->set_rules('CadetNo', 'CadetNo', 'trim|required');
		$this->form_validation->set_rules('YearOfSSC', 'YearOfSSC', 'trim|required');
		$this->form_validation->set_rules('YearOfHSC', 'YearOfHSC', 'trim|required');
		$this->form_validation->set_rules('Address', 'Address', 'trim|required');
		$this->form_validation->set_rules('BloodGroup', 'BloodGroup', 'trim|required');
		$this->form_validation->set_rules('Religion', 'Religion', 'trim|required');
		$this->form_validation->set_rules('Mobile', 'Mobile', 'trim|required');
		$this->form_validation->set_rules('Phone', 'Phone', 'trim');
		$this->form_validation->set_rules('EmailAddress', 'EmailAddress', 'trim|required|valid_email');
		$this->form_validation->set_rules('FacebookId', 'FacebookId', 'trim|valid_url');
		$this->form_validation->set_rules('ProfessinalInformation', 'ProfessinalInformation', 'trim');
		$this->form_validation->set_rules('NID', 'NID', 'trim|required');
		$this->form_validation->set_rules('DateOfBirth', 'DateOfBirth', 'trim|required');
		$this->form_validation->set_rules('agree', 'Disclaimer', 'required');
		if ($this->form_validation->run() == TRUE) {
            // true case
        	$upload_image = $this->upload_image();
           
        	$data = array(
        		'name' => $this->input->post('Name'),
        		'spouse_name' => $this->input->post('SpouseName'),
        		'father_name' => $this->input->post('FatherName'),
                'mother_name' => $this->input->post('MotherName'),
                'bksp_admission_year' => date('Y',strtotime($this->input->post('BKSPAdmissionYear'))),
                'cadet_no' => $this->input->post('CadetNo'),                
                'year_of_ssc' => date('Y',strtotime($this->input->post('YearOfSSC'))),
                'year_of_hsc' => date('Y',strtotime($this->input->post('YearOfHSC'))),
                'address' => $this->input->post('Address'),
                'blood_group' => $this->input->post('BloodGroup'),
                'religious' => $this->input->post('Religion'),
                'mobile' => $this->input->post('Mobile'),
                'phone' => $this->input->post('Phone'),
                'email_address' => $this->input->post('EmailAddress'),
                'facebook_id' => $this->input->post('FacebookId'),
                'professional_info' => $this->input->post('ProfessinalInformation'),
                'nid' => $this->input->post('NID'),
                'date_of_birth' => date('Y-m-d',strtotime($this->input->post('DateOfBirth'))),
        		'profile_picture' => $upload_image,        		
                'created_at' => date("Y-m-d H:i:s")
        	);

        	$create = $this->Model_member->create($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully appplied');
        		redirect('En/become_a_member', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('En/become_a_member', 'refresh');
            }
            
        }else {

            $this->render_template('front_end/become_a_member', $this->data);
        }
    }

    public function ajax_change_language(){
        $language =  $this->input->post('language');
        $languages = [
                "EN" => [
                    "NameLabel" => "Name",
                    "NamePlaceholder" => "Name",
                    "SpouseNameLabel" => "Spouse's Name",
                    "SpouseNamePlaceholder" => "Spouse's Name",
                    "FatherNameLabel" => "Father's Name",
                    "FatherNamePlaceholder" => "Father's Name",
                    "MotherNameLabel" => "Mother's Name",
                    "MotherNamePlaceholder" => "Mother's Name",
                    "BKSPAdmissionYearLabel" => "BKSP Admission Year",
                    "BKSPAdmissionYearPlaceholder" => "BKSP Admission Year",
                    "CadetNoLabel" => "Cadet No",
                    "CadetNo" => "Cadet No",
                    "YearOfSSCLabel" => "Year of SSC",
                    "YearOfSSC" => "Year of SSC",
                    "YearOfHSCLabel" => "Year of HSC",
                    "YearOfHSC" => "Year of HSC",
                    "AddressLabel" => "Address",
                    "Address" => "Address",
                    "BloodGroupLabel" => "Blood Group",
                    "BloodGroup" => "Blood Group",
                    "ReligionLabel" => "Religion",
                    "Religion" => "Religion",
                    "MobileLabel" => "Mobile",
                    "Mobile" => "Mobile",
                    "PhoneLabel" => "Phone No",
                    "Phone" => "Phone",
                    "EmailAddressLabel" => "E-mail",
                    "EmailAddress" => "E-mail",
                    "FacebookIdLabel" => "Facebook ID",
                    "FacebookId" => "Facebook ID",
                    "ProfessinalInformationLabel" => "Professinal Information",
                    "ProfessinalInformation" => "Professinal Information",
                    "NIDLabel" => "NID No",
                    "NID" => "NID No",
                    "DateOfBirthLabel" => "Date of Birth",
                    "DateOfBirth" => "Date of Birth",
                ],
                "BN" => [
                    "NameLabel" => "নাম",
                    "NamePlaceholder" => "নাম",
                    "SpouseNameLabel" => "স্বামী/স্ত্রীর নাম",
                    "SpouseNamePlaceholder" => "স্বামী/স্ত্রীর নাম",
                    "FatherNameLabel" => "বাবার নাম",
                    "FatherNamePlaceholder" => "বাবার নাম",
                    "MotherNameLabel" => "মায়ের নাম",
                    "MotherNamePlaceholder" => "মায়ের নাম",
                    "BKSPAdmissionYearLabel" => "বিকেএসপিতে ভর্তি সাল",
                    "BKSPAdmissionYearPlaceholder" => "বিকেএসপিতে ভর্তি সাল",
                    "CadetNoLabel" => "ক্যাডেট নং",
                    "CadetNo" => "ক্যাডেট নং",
                    "YearOfSSCLabel" => "এসএসসি সাল",
                    "YearOfSSC" => "এসএসসি সাল",
                    "YearOfHSCLabel" => "এইচএসসি সাল",
                    "YearOfHSC" => "এইচএসসি সাল",
                    "AddressLabel" => "ঠিকানা",
                    "Address" => "ঠিকানা",
                    "BloodGroupLabel" => "রক্তের গ্রুপ",
                    "BloodGroup" => "রক্তের গ্রুপ",
                    "ReligionLabel" => "ধর্ম",
                    "Religion" => "ধর্ম",
                    "MobileLabel" => "মোবাইল নং",
                    "Mobile" => "মোবাইল",
                    "PhoneLabel" => "ফোন নং",
                    "Phone" => "ফোন নং",
                    "EmailAddressLabel" => "ই-মেইল",
                    "EmailAddress" => "ই-মেইল",
                    "FacebookIdLabel" => "ফেসবুক আইডি",
                    "FacebookId" => "ফেসবুক আইডি",
                    "ProfessinalInformationLabel" => "পেশাদারি তথ্য",
                    "ProfessinalInformation" => "পেশাদারি তথ্য",
                    "NIDLabel" => "জাতীয় পরিচয় পত্র নম্বর",
                    "NID" => "জাতীয় পরিচয় পত্র নম্বর",
                    "DateOfBirthLabel" => "জন্ম তারিখ",
                    "DateOfBirth" => "জন্ম তারিখ",
                ]
            ];

        echo json_encode($languages[$language]);
    }
    
    /*
    * This function is invoked from another function to upload the image into the assets folder
    * and returns the image path
    */
	public function upload_image()
    {
        $config['upload_path'] = 'assets/front_end/members';
        $config['file_name'] =  uniqid();
        $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG';
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
