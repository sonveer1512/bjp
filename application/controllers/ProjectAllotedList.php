<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectAllotedList extends MY_Controller {

	
	public function __construct()

{

parent::__construct();

		$this->load->model('Project_show_model');
      $this->load->model('Projects_modal');
		$this->load->helper('url');
 		$this->load->library('form_validation');
      	$this->load->library('session');
      	$this->load->helper('email');
    

}
public function test(){
	$this->sendmail('suryapratap05021995@gmail.com','bhaveshkapoor09@gmail.com','test Mail','hello');
}

	public function index()
	{

		if ($this->session->userdata('pmsadmin') == true) {
			$data['projectshowadmin'] = $this->Project_show_model->masterData();
			$data['allotprojectshowadmin'] = $this->Project_show_model->allotedprojectlist();
			$data['projectlist'] = $this->Project_show_model->projectlist();
			return $this->load->view('admin/projectshowadmin/showallotproject',$data); 
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
		
		
	}

	public function update()
    {
        

        $p_id = $_REQUEST['p_allot_id'];
         date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');
     

      	$update = array(
        'p_show_status'  => 'Complete',
        'updated_at' => $date
        );

        $this->db->where('p_allot_id',$p_id);
        $this->db->update('project_allot_show_admin',$update);
        
    	redirect($_SERVER['REQUEST_URI'], 'refresh'); 
      
    }


 public function updatedisable()
    {
        

        $p_id = $_REQUEST['p_allot_id'];
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');
     

      	$update = array(
        'p_show_status'  => 'Cancel By Admin',
         'updated_at' => $date
        );

        $this->db->where('p_allot_id',$p_id);
        $this->db->update('project_allot_show_admin',$update);
        
    	redirect($_SERVER['REQUEST_URI'], 'refresh'); 
      
    }

    public function pending()
    {
        

        $p_id = $_REQUEST['p_allot_id'];
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');
     

      	$update = array(
        'p_show_status'  => 'Pending',
         'updated_at' => $date
        );

        $this->db->where('p_allot_id',$p_id);
        $this->db->update('project_allot_show_admin',$update);
        
    	redirect($_SERVER['REQUEST_URI'], 'refresh'); 
      
    }
  
  public function deleteallottedproject($id)
{
    $id = $this->input->post("p_allot_id");
    $this->Projects_modal->deleteallottedproject($id);
    redirect('ProjectAllotedList');
}

	
}

