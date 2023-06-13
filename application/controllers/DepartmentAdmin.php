<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DepartmentAdmin extends MY_Controller {

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

$this->load->model('Department_model');
$this->load->model('Projects_modal');
$this->load->model('Subadmin_model');

$this->load->helper('url');
 $this->load->library('form_validation');
      $this->load->library('session');
    

}

	public function index()
	{
		$data['departData'] = $this->Department_model->departdata();
		$data['projectdata'] = $this->Projects_modal->pojectdata();
			$data['subadminData'] = $this->Department_model->getregionalhead();

		$this->load->view('admin/departmentadmin',$data);
	}


	public function adddepartment()
	{
		$sess = $this->session->userdata('pmsadmin');
            
            $id = $sess['id'];
            $role = $sess['role'];
      		$name = $sess['name'];

  		$dep_name=$this->input->post('dep_name');
        $dep_email=$this->input->post('dep_email');
        $dep_password=$this->input->post('dep_password');
      $password = md5($dep_password);
        $dep_contact=$this->input->post('dep_contact');
        $dep_select=$this->input->post('dep_select');
        $dep_address=$this->input->post('dep_address');
        $department_name=$this->input->post('admin_dep_name');
        $pprojectm=$this->input->post('pprojectm');
      	$subject = "Welcome to Axepert Exhibit Pvt Ltd.";
      	$message = "We are greatfully to inform you ($dep_email),<br>$name is added you $dep_email in Axepert Exhibit Admin Panel as a Project Manager.<br>Your username is your email ($dep_email) and your password is $dep_password.<br>Please click here for login https://axepertexhibits.com/AdminPanelPMS2/";

         $this->db->where('admin_email',$dep_email);
    	$query = $this->db->get('master_admin');
    	
    	if ($query->num_rows() > 0)
    	{
        
 	 		echo json_encode(['email'=>'0']);

    	}
    		else

    	{

    		if ($role == 'Master') {
    			$insertData = array('admin_name'=>$dep_name,
								'admin_email'=>$dep_email,
								'admin_password'=>$password,
								'admin_contact'=>$dep_contact,
								'admin_role'=>$dep_select,
								
								'project_manager_created_by'=>$pprojectm,
								'admin_address'=>$dep_address,
								'master_create_projectAd' => $id
           	 );
    		}
    		else
    		{

    			$insertData = array('admin_name'=>$dep_name,
								'admin_email'=>$dep_email,
								'admin_password'=>$password,
								'admin_contact'=>$dep_contact,
								'admin_role'=>$dep_select,
								
								'project_manager_created_by'=>$id,
								'admin_address'=>$dep_address
								
           	 );
    		}
 			 

           $insertUser =  $this->db->insert('master_admin',$insertData);

           if($insertUser)
				{
             		$this->sendmail('webticsindia@gmail.com',$dep_email,$subject,$message);
					echo json_encode(['done'=>'1']);

				}
				else
				{
					echo json_encode(['done'=>'0']);

				}
 
	}
}

		public function deletedepadmin($id)
{
    $id = $this->input->post("admin_user_id");
    
    $this->Department_model->deletedepadmin($id);
    redirect('DepartmentAdmin');
}

public function depadminedit()
{
	
		$id =  $this->input->post('id');
        $data['content'] = $this->Department_model->depadmineditmodel($id);
		$this->load->view('admin/department/departmentadminmodel',$data);

}

public function updatedepadmin()
{

	
		$id =  $this->input->post('admin_user_id'); 
		$sub_name=$this->input->post('admin_name');
        $sub_email=$this->input->post('admin_email');
        $sub_password=$this->input->post('admin_password');
        $sub_contact=$this->input->post('admin_contact');
        $sub_select=$this->input->post('admin_role');
        $sub_address=$this->input->post('admin_address');
        $department_name=$this->input->post('admin_dep_name');
         date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

           $updatedata = array('admin_name'=>$sub_name,
								'admin_email'=>$sub_email,
								'admin_password'=>$sub_password,
								'admin_contact'=>$sub_contact,
								'admin_role'=>$sub_select,
								'updated_at'=>$date,
								'admin_dep_name'=>$department_name,
								'admin_address'=>$sub_address
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
        

        $admin_user_id  = $_REQUEST['admin_user_id'];
     
		$update = array(
        'admin_status'  => 'Enable'
        );

        $this->db->where('admin_user_id',$admin_user_id);
        $this->db->update('master_admin',$update);
        
    	redirect('DepartmentAdmin', 'refresh');
      
    }

    public function updatedisable()
    {
        $admin_user_id = $_REQUEST['admin_user_id'];
      	
      	$subject = "Welcome to Axepert Exhibit Pvt Ltd";
      	$message = "We are greatfully to inform you $admin_email,<br> Your Account has been Disable,For countinue with us please contact Admin";
        
      	$update = array(
        'admin_status'  => 'Disable'
        );

        $this->db->where('admin_user_id',$admin_user_id);
        $this->db->update('master_admin',$update);
        $this->sendmail('suryapratap05021995@gmail.com',$dep_email,$subject,$message);
    	redirect($_SERVER['REQUEST_URI'], 'refresh'); 
      
    }
    public function changedeppass()
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
