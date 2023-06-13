<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectShowAdmin extends MY_Controller {

	
	public function __construct()

{

parent::__construct();

		$this->load->model('Project_show_model');
      $this->load->model('Department_model');
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
           $data['subadminData'] = $this->Department_model->getregionalhead();
			return $this->load->view('admin/projectshowadmin/projectshowadmin',$data); 
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
		
	}

	public function showadminproject()
	{

		if ($this->session->userdata('pmsadmin') == true) {
			$data['projectshowadmin'] = $this->Project_show_model->masterData();
			$data['allotprojectshowadmin'] = $this->Project_show_model->allotprojectshowadmin();
			$data['projectlist'] = $this->Project_show_model->projectlist();
			return $this->load->view('admin/projectshowadmin/showallotproject',$data); 
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
		
	}

	public function allotprojectshow()
	{

		$sess = $this->session->userdata('pmsadmin');
            $name = $sess['name'];
            $role = $sess['role'];
            $id = $sess['id'];

  		$showadmin=$this->input->post('showadmin');
        $project=$this->input->post('project');
       date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');
      for ($i = 0; $i < count($project); ++$i) {
              	$projectlist = $project[$i];
      
        $check = $this->db->query("SELECT *	 FROM  project_allot_show_admin WHERE project_id = $projectlist   AND  show_admin_id = $showadmin ");
			if ($check->num_rows() > 0) {
        
           	echo json_encode(['project'=>'0']);
          }

          else{
            
				
                 
      			$insertData = array('project_id'=>$projectlist,
								'show_admin_id'=>$showadmin,
								'created_by'=>$id,
								'created_at'=>$date
								
           	 );
                

         
           $insertUser =  $this->db->insert('project_allot_show_admin',$insertData);
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
          
  
        
	}



	public function deletepshowadmin($id)
{
    $id = $this->input->post("admin_user_id");
    $this->Project_show_model->deleteshowadmin($id);
    redirect('./');
}

public function pshowadminedit()
{
	
		$id =  $this->input->post('id');
		$data['projectshowadmin'] = $this->Project_show_model->masterData();
			$data['allotprojectshowadmin'] = $this->Project_show_model->allotprojectshowadmin();
			$data['projectlist'] = $this->Project_show_model->projectlist();
		$data['content'] = $this->Project_show_model->pshoweditmodel($id);

        
		$this->load->view('admin/projectshowadmin/projectshowedit',$data);

}
  
  public function projectallotedit()
{
	
		$id =  $this->input->post('id');
		$data['projectshowadmin'] = $this->Project_show_model->masterData();
			$data['allotprojectshowadmin'] = $this->Project_show_model->allotprojectshowadmin();
			$data['projectlist'] = $this->Project_show_model->projectlist();
		$data['content'] = $this->Project_show_model->pshoweditmodel($id);

        
		$this->load->view('admin/projectshowadmin/projectshowedit',$data);

}

public function updatepshowadmin()
{

		$id =  $this->input->post('admin_user_id'); 
		$sub_name=$this->input->post('admin_name');
        $sub_email=$this->input->post('admin_email');
        
        $sub_contact=$this->input->post('admin_contact');
        $sub_select=$this->input->post('admin_role');
        $sub_address=$this->input->post('admin_address');
         date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

         $updatedata = array('admin_name'=>$sub_name,
								'admin_email'=>$sub_email,
								
								'admin_contact'=>$sub_contact,
								'admin_role'=>$sub_select,
								'updated_at'=>$date,
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
    public function changepshowpass()
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

public function allotedprojects()
{
		$data['allotprojectshowadmin'] = $this->Project_show_model->allotedprojectlist();

		$this->load->view('admin/projectshowadmin/showallotproject',$data); 
		
}


public function addshowadmin()
	{

		$sess = $this->session->userdata('pmsadmin');
            $name = $sess['name'];
            $role = $sess['role'];
            $id = $sess['id'];

  		$sub_name=$this->input->post('sub_name');
        $sub_email=$this->input->post('sub_email');
        $sub_password=$this->input->post('sub_password');
        $password = md5($sub_password);
        $sub_contact=$this->input->post('sub_contact');
        $sub_select=$this->input->post('sub_select');
        $sub_address=$this->input->post('sub_address');

        //check mail
        $subject = 'test Mail';
        $message = 'test msg';
        $this->db->where('admin_email',$sub_email);
    	$query = $this->db->get('master_admin');

    	if ($query->num_rows() > 0)
    	{
        
 	 		echo json_encode(['email'=>'0']);

    	}
    		else

    	{
       
		if($role == 'Master')
        {
         $insertData = array('admin_name'=>$sub_name,
								'admin_email'=>$sub_email,
								'admin_password'=>$password,
								'admin_contact'=>$sub_contact,
								'admin_role'=>$sub_select,
								'admin_address'=>$sub_address
           	 );
         
           $insertUser =  $this->db->insert('master_admin',$insertData);
           
            }
  		else
        {
        	$insertData = array('admin_name'=>$sub_name,
								'admin_email'=>$sub_email,
								'admin_password'=>$password,
								'admin_contact'=>$sub_contact,
								'admin_role'=>$sub_select,
								'admin_address'=>$sub_address,
                                'user_created_by'=>$id,
                             'user_regional_head'=>$id
           	 );
         
           $insertUser =  $this->db->insert('master_admin',$insertData);
        }

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

	public function updateallottedproject()
	{
		$showadmin=$this->input->post('showadmin');
        $project=$this->input->post('project');
        $p_allot_id=$this->input->post('p_allot_id');
         date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');
     

        $updatedata = array('project_id'=>$project,
								'show_admin_id'=>$showadmin,
								'updated_at'=>$date
								
           	 );
       $insertUser = $this->db->where('p_allot_id',$p_allot_id);
       $insertUser = $this->db->update('project_allot_show_admin',$updatedata);

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

