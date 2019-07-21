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
    

}
