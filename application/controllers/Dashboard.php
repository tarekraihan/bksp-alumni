<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();


		$this->not_logged_in();

		$this->data['page_title'] = 'Dashboard';
		
		$this->load->model('Model_application');
		//$this->load->model('model_sales');
		 $this->load->model('model_users');
		//$this->load->model('model_purchase');
	}

	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function index()
	{

		//$this->data['total_products'] = $this->model_products->countTotalProducts();
		//$this->data['total_sales'] = $this->model_sales->countTotalSales();
		$this->data['new_application'] = $this->Model_application->countTotalApplication();
		//$this->data['total_purchase'] = $this->model_purchase->countTotalPurchase();

		$this->data['total_member'] = $this->Model_application->countTotalMember();
		//$this->data['total_category'] = $this->model_products->countTotalcategory();
		//$this->data['total_attribures'] = $this->model_products->countTotalattribures();
		//$this->data['total_stores'] = $this->model_stores->countTotalStores();

		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;

		$this->data['is_admin'] = $is_admin;
		$this->render_template('dashboard', $this->data);
	}
}