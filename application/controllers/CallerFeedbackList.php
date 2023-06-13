<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CallerFeedbackList extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
  public function __construct()

{

parent::__construct();

		$this->load->model('Users_model');
		$this->load->helper('url');
 		$this->load->library('form_validation');
      	$this->load->library('session');
    

}
	public function index()
	{
      
      if ($this->session->userdata('pmsadmin') == true) {
			$data['subadminData'] = $this->Users_model->userdata();
          $data['useruploaddata'] = $this->Users_model->userupload();
		return $this->load->view('admin/Caller/feedback_list',$data);
			 
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
		$this->load->view('admin/Caller/feedback_list');
	}
	
	public function workallotedlist()
	{
		$this->load->view('admin/Caller/work_alloted_list');
	}
	public function notintresteddata()
	{
		$this->load->view('admin/Caller/result/not_intrested');
	}
	public function laterintresteddata()
	{
		$this->load->view('admin/Caller/result/later_intrested');
	}
	public function showintresteddata()
	{
		$this->load->view('admin/Caller/result/show_intrest');
	}
	public function confirmintresteddata()
	{
		$this->load->view('admin/Caller/result/confirm_intrested');
	}

}
