<?php defined('BASEPATH') OR exit('No direct script access allowed');

class En extends FrontEnd_Controller 
{
	public function __construct()
	{
		parent::__construct();
	
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

        $this->render_template('front_end/become_a_member', $this->data);
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
                ]
            ];

        echo json_encode($languages[$language]);
    }
    

}
