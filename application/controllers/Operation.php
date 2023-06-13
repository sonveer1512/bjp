<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operation extends CI_Controller {

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
		$this->load->model('Operation_admin_model');
      $this->load->model('Department_model');
		$this->load->helper('url');
 		$this->load->library('form_validation');
      	$this->load->library('session');
}
	public function index()
	{
		
		if ($this->session->userdata('pmsadmin') == true) {
			$data['operation'] = $this->Operation_admin_model->masterData();
          $data['subadminData'] = $this->Department_model->getregionalhead();
		return	$this->load->view('admin/operation',$data);

		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
	}
	
	public function addoperationadmin()
	{
  		$oper_name=$this->input->post('oper_name');
        $oper_email=$this->input->post('oper_email');
        $oper_password=$this->input->post('oper_pass');
        $password = md5($oper_password);
        $oper_contact=$this->input->post('oper_contact');
        $oper_address=$this->input->post('oper_address');
        $oper_select=$this->input->post('oper_select');
        
        $this->db->where('admin_email',$oper_email);
    	$query = $this->db->get('master_admin');
    	if ($query->num_rows() > 0)
    	{
 	 		echo json_encode(['email'=>'0']);
    	}
    		else
    	{
         $insertData = array('admin_name'=>$oper_name,
								'admin_email'=>$oper_email,
								'admin_password'=>$password,
								'admin_contact'=>$oper_contact,
								'admin_role'=>$oper_select,
								
								'admin_address'=>$oper_address
           	 );
           $insertUser =  $this->db->insert('master_admin',$insertData);

           if($insertUser)
				{
					echo json_encode(['done'=>'1']);
				}
				else
				{
					echo json_encode(['done'=>'0']);

				}
    	}

          
  
        
	}


	public function deleteoperation($id)
{
    $id = $this->input->post("admin_user_id");
    $this->Operation_admin_model->deleteoperation($id);
    redirect('Marketing');
}

	public function operationedit()
{
	
		$id =  $this->input->post('id');
		$data['content'] = $this->Operation_admin_model->operadmineditmodel($id);

        
		$this->load->view('admin/operation/operationeditmodal',$data);

}

public function updateoperation()
{

		$id =  $this->input->post('admin_user_id'); 
		$oper_name=$this->input->post('oper_name');
		$oper_email=$this->input->post('oper_email');
        
        $oper_contact=$this->input->post('oper_contact');
        $oper_address=$this->input->post('oper_address');
        $oper_select=$this->input->post('oper_select');
         date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

         $updatedata = array('admin_name'=>$oper_name,
								'admin_email'=>$oper_email,
								
								'admin_contact'=>$oper_contact,
								'admin_role'=>$oper_select,
								'updated_at'=>$date,
								'admin_address'=>$oper_address
           	 );
          
         
           	$insertUser= $this->db->where('admin_user_id',$id);
       		$insertUser= $this->db->update('master_admin',$updatedata);
      
         	if($insertUser)
				{
					echo json_encode(['inserted'=>'1']);


					
				}
				else
				{
					echo json_encode(['inserted'=>'0']);
					 
				}
        
       
}

public function update()
    {
        

        $admin_user_id = $_REQUEST['admin_user_id'];
        
     

      	$update = array(
        'admin_status'  => 'Enable'
        );

        $this->db->where('admin_user_id',$admin_user_id);
        $this->db->update('master_admin',$update);
        
    	redirect($_SERVER['REQUEST_URI'], 'refresh'); 
      
    }


 public function updatedisable()
    {
        

        $admin_user_id = $_REQUEST['admin_user_id'];
        
     

      	$update = array(
        'admin_status'  => 'Disable'
        );

        $this->db->where('admin_user_id',$admin_user_id);
        $this->db->update('master_admin',$update);
        
    	redirect($_SERVER['REQUEST_URI'], 'refresh'); 
      
    }
    public function changeoperpass()
{
		$id =  $this->input->post('admin_user_id');
		$cur_password =  $this->input->post('cur_password');
		 $cpassword = md5($cur_password);
		$new_password=$this->input->post('new_password');
        
         $npassword = md5($new_password);
       
         date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

        $this->db->where('admin_password',$cpassword);
        $this->db->where('admin_user_id',$id);
    	$query = $this->db->get('master_admin');

    	if ($query->num_rows() > 0)
    	{

    		$updatedata = array(
								'admin_password'=>$npassword,
								
								'updated_at'=>$date
								
           	 );
          
         
           	$insertUser= $this->db->where('admin_user_id',$id);
       		$insertUser= $this->db->update('master_admin',$updatedata);
      
         	if($insertUser)
				{
					echo json_encode(['inserted'=>'1']);


					
				}
				else
				{
					echo json_encode(['inserted'=>'0']);
					 
				}
				 
        
 	 		

    	}
    	else
    	{

         echo json_encode(['password'=>'0']);
     }
        
       
}

}
