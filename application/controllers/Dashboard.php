<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

		$this->load->model('Dashboard_model');
    	$this->load->model('Subadmin_model');
		$this->load->helper('url');
 		$this->load->library('form_validation');
      	$this->load->library('session');
   
}
	public function index()
	{
		//$this->session->set('login', true);
		//check that whether the  session is set or not 
		if ($this->session->userdata('pmsadmin') == true) {
          	
			  $data['totaluser'] = $this->Dashboard_model->countrow('bjpdetail');
			  $data['totalsubadmin'] = $this->Dashboard_model->countrow_where('master_admin');
			  $data['totalsupervisor'] = $this->Dashboard_model->countrow_where_1('master_admin');
			  $data['totalapproved'] = $this->Dashboard_model->countrow_where_approve('user_form_data');
              $data['totalactivebjp'] = $this->Dashboard_model->countrow_where_activebjp('user_form_data');
              $data['totalactivecongress'] = $this->Dashboard_model->countrow_where_activecongress('user_form_data');
          		$data['totalbjpsupporter'] = $this->Dashboard_model->countrow_where_supportbjp('user_form_data');
              $data['totalcongresssuporter'] = $this->Dashboard_model->countrow_where_supportcongress('user_form_data');
              $data['panchayatsamiti'] = $this->Dashboard_model->countrow_where_panchyat('pachayatsimiti');
              $data['grampanchayat'] = $this->Dashboard_model->countrow_where_grampanchyat('grampanchyat');
              $data['gram'] = $this->Dashboard_model->countrow_where_gramdetail('gramdetail');
              $data['nagarpalika'] = $this->Dashboard_model->countrow_where_nagarpalika('pachayatsimiti');
              $data['ward'] = $this->Dashboard_model->countrow_where_ward('grampanchyat');
          $data['totalfilled'] =$this->Dashboard_model->countrow('user_form_data');
			return $this->load->view('admin/index',$data);
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
	}

	public function logout()
	{

        $sess = $this->session->userdata('pmsadmin');
      if(!empty($sess)){
            $name = $sess['name'];
            $role = $sess['role'];
            $id = $sess['id'];
            date_default_timezone_set('Asia/Kolkata');
        	$date = date('d-m-Y H:i A');
			$this->db->query("UPDATE master_admin set last_login = '$date' WHERE admin_user_id = '$id'");
      }
			session_destroy();
           unset($_SESSION);
           return $this->load->view('admin/logout');
	}

	public function notification()
	{
		$id = $_POST['id'];
		$update = array(
        'read_status'  => '1'
        );
         $sess = $this->session->userdata('pmsadmin');
         $name = $sess['name'];
         $role = $sess['role'];
      	 $this->db->where('member_created_to',$id);
        $this->db->update('notification',$update);
      	redirect($_SERVER['REQUEST_URI'], 'refresh'); 
	}
  
  public function leveldata_scroll($id = null) {
      	$limit = $this->input->post('limit');
      	if(empty($id)) {
        	$data['item'] = $this->Subadmin_model->list_common('people_data');
        }else{
          	
		$data['level'] = $this->Subadmin_model->list_common_where3('hierarchy_level','level',$id);
        $data['item'] = $this->Subadmin_model->list_common_exactdata('people_data','level_id',$id,$limit);
         
          	//$data['level'] = $this->Subadmin_model->list_common_where3('hierarchy_level','level',$id);
        	//$data['item'] = $this->Subadmin_model->list_common_exactdata('people_data','level_id',$id,$limit,$start);
        }
    print_r($data);exit;
      	return $this->load->view('admin/master/morche/allpeoples', $data);
    }
}
