<?php defined('BASEPATH') OR exit('No direct script access allowed');

class En extends FrontEnd_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model('Model_application');
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
        $this->not_logged_in();
        $this->data['page_title'] = 'Become a Member';

		$this->form_validation->set_rules('Name', 'Name', 'trim|required');
		$this->form_validation->set_rules('SpouseName', 'SpouseName', 'trim');
		$this->form_validation->set_rules('FatherName', 'Father Name', 'trim|required');
		$this->form_validation->set_rules('MotherName', 'Mother Name', 'trim|required');
		$this->form_validation->set_rules('BKSPAdmissionYear', 'BKSPAdmissionYear', 'trim|required');
		$this->form_validation->set_rules('CadetNo', 'CadetNo', 'trim|required');
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
		$this->form_validation->set_rules('ProfessinalInformation', 'ProfessinalInformation', 'trim');
		$this->form_validation->set_rules('NID', 'NID', 'trim|required');
		$this->form_validation->set_rules('DateOfBirth', 'DateOfBirth', 'trim|required');
		// $this->form_validation->set_rules('agree', 'Disclaimer', 'required');
		$this->form_validation->set_rules('Gender', 'Gender', 'required');
		if ($this->form_validation->run() == TRUE) {
           
            // true case
        	$upload_image = $this->upload_image();
        	// $upload_nid = $this->upload_nid();
            $email = $this->input->post('EmailAddress');
            $gender = $this->input->post('Gender');
            $name =  $this->input->post('Name');
        	$data = array(
        		'name' =>  $name,
        		'spouse_name' => $this->input->post('SpouseName'),
        		'father_name' => $this->input->post('FatherName'),
                'mother_name' => $this->input->post('MotherName'),
                'bksp_admission_year' => date('Y',strtotime($this->input->post('BKSPAdmissionYear'))),
                'cadet_no' => $this->input->post('CadetNo'),                
                'year_of_ssc' => date('Y',strtotime($this->input->post('YearOfSSC'))),
                'year_of_hsc' => date('Y',strtotime($this->input->post('YearOfHSC'))),
                'degree_cadet_admission_year' => date('Y',strtotime($this->input->post('YearOfAdmission'))),
                'degree_cadet_passing_year' => date('Y',strtotime($this->input->post('YearOfPass'))),
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
                'profile_picture' => $upload_image,
                'is_approved' => 0,
                'is_deleted' => 0,
        		// 'nid_doc' => $upload_nid,        		
                'created_at' => date("Y-m-d H:i:s")
        	);

        	$create = $this->Model_application->create($data);
        	if($create == true) {
                // Send Email Note yet Tested
                // $this->load->library('email');
                // $title = ($gender =='Male') ? 'Mr. ': 'Ms.';
                // $title =. $name;

                // $message = "Dear ". $title ."\r\n Thank your for your application."
                // $this->email->from('bksp1983@yahoo.com', 'Alumni Association of BKSP');
                // $this->email->to($email);

                // $this->email->subject('Application in Alumni Association of BKSP');
                // $this->email->message($message);
                // $this->email->send();
                $this->session->unset_userdata('cadetNo');
        		$this->session->set_flashdata('success', 'Successfully appplied');
        		redirect('cadet-no', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('become-a-member', 'refresh');
            }
            
        }else {

            $this->render_template('front_end/become_a_member', $this->data);
        }
    }

    public function contact(){
        $this->data['page_title'] = 'Contact Us';

        $this->render_template('front_end/contact', $this->data);
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
                    "NIDLabel" => "NID/Passport No",
                    "NID" => "NID/Passport No",
                    "DateOfBirthLabel" => "Date of Birth",
                    "DateOfBirth" => "Date of Birth",
                    // "nid_uploadLabel" => "Upload NID",
                    "GenderLabel" => "Gender",
                    "DegreeYearOfAdmissionLabel" => "Year of Admission",
                    "YearOfAdmission" => "Year of Admission",
                    "YearOfPassLabel" => "Year of Pass",
                    "YearOfPass" => "Year of Pass",
                    "onlyForDegreeLabel" => "Only for degree Cadet",
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
                    "NIDLabel" => "জাতীয় পরিচয় পত্র/ পাসপোর্ট নম্বর",
                    "NID" => "জাতীয় পরিচয় পত্র /পাসপোর্ট নম্বর",
                    "DateOfBirthLabel" => "জন্ম তারিখ",
                    "DateOfBirth" => "জন্ম তারিখ",
                    // "nid_uploadLabel" => "জাতীয় পরিচয় পত্র",
                    "GenderLabel" => "লিঙ্গ",
                    "DegreeYearOfAdmissionLabel" => "ভর্তির সাল",
                    "YearOfAdmission" => "ভর্তির সাল",
                    "YearOfPassLabel" => "পরীক্ষোত্তীর্ণ হত্তয়ার সাল",
                    "YearOfPass" => "পরীক্ষোত্তীর্ণ হত্তয়ার সাল",
                    "onlyForDegreeLabel" => "কেবল ডিগ্রি ক্যাডেটের জন্য",
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

    // public function upload_nid()
    // {
    //     $config['upload_path'] = 'assets/front_end/nid';
    //     $config['file_name'] =  uniqid();
    //     $config['allowed_types'] = 'jpg|png|jpeg';
    //     $config['max_size'] = '2000';

    //     $this->load->library('upload', $config);
    //     if ( ! $this->upload->do_upload('nid_upload'))
    //     {
    //         $error = $this->upload->display_errors();
    //         return $error;
    //     }
    //     else
    //     {
    //         $data = array('upload_data' => $this->upload->data());
    //         $type = explode('.', $_FILES['nid_upload']['name']);
    //         $type = $type[count($type) - 1];
            
    //         $path = $config['upload_path'].'/'.$config['file_name'].'.'.$type;
    //         return ($data == true) ? $path : false;            
    //     }
    // }


    
    public function cadet_no(){
        
        $this->data['page_title'] = 'Become a Member';

		$this->form_validation->set_rules('CadetNo', 'CadetNo', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
            $categories = array("ATH", "AR", "BA", "BO", "C", "F", "GYM", "H", "JU", "KA", "SW", "SH", "T", "TT", "U", "TKD", "VO" );
            $cadetNo = $this->input->post('CadetNo');
            $cadetNum = preg_replace('/[^0-9]/i','',$cadetNo);
            $cadetText = preg_replace('/[^a-z]/i','',$cadetNo);
            $category = trim(strtoupper($cadetText));

            if (in_array($category, $categories)){
                $newCadetNo = $category.'-'.$cadetNum;
                $this->session->set_userdata('cadetNo',$newCadetNo);
                redirect('become-a-member', 'refresh');
            }else{
                $this->session->set_flashdata('error', 'Invalid Cadet No !');
        		redirect('cadet-no', 'refresh');
            }
            
        }else {

            $this->render_template('front_end/cadet_no', $this->data);
        }
    }


}
