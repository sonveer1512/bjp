<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectMemberList extends CI_Controller {

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

		$this->load->model('Projects_member_modal');
		$this->load->model('Subadmin_model');
		$this->load->helper('url');
 		$this->load->library('form_validation');
      	$this->load->library('session');
    

}
	public function index()
	{
		
		if ($this->session->userdata('pmsadmin') == true) {
			//$data['projectdata'] = $this->Projects_modal->pojectdata();
			$data['projectalloted'] = $this->Projects_member_modal->pojectalloteddata();
			// $data['subadminData'] = $this->Subadmin_model->masterData();
			// $data['allUser'] = $this->Projects_modal->alluser();

		return $this->load->view('admin/projects/projectmemberlist',$data);
			 
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
	}

	public function addproject()
	{

		$sess = $this->session->userdata('pmsadmin');
            $name = $sess['name'];
            $role = $sess['role'];
            $id = $sess['id'];

  		$pname=$this->input->post('pname');
        $pdes=$this->input->post('pdes');
        $pvenue=$this->input->post('pvenue');
        $pstart_date =$this->input->post('pstart_date');
        $pend_date=$this->input->post('pend_date');
        
        $pprojectm = $this->input->post('pprojectm');
         $pregional = $this->input->post('pregional');
       $alluser = $this->input->post('alluser');

       date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-Y H:i A');

     	if (($role == 'Master') OR ($role == 'Subadmin')) {
     		$insertData = array('p_name'=>$pname,
								'p_des'=>$pdes,
								'p_venue'=>$pvenue,
								
								'p_start_date'=>$pstart_date,
								'p_end_date'=>$pend_date,
								'created_at'=> $date,
								'regional_head'=> $pregional,
								'project_manager'=> $pprojectm,
								'created_by'=> $id
           	 );
     
           $insertUser =  $this->db->insert('projects',$insertData);
            $item_id = $this->db->insert_id();
         for ($i = 0; $i < count($alluser) ; ++$i) {
         	$useradmin = $alluser[$i];

   		 $insertData = array('project_id'=>$item_id,
								'admin_user_id'=>$useradmin,
								'created_by'=>$id,
								
								'created_at'=> $date
           	 );
  
      $insertUser =  $this->db->insert('project_member',$insertData);
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

     	else{
     				$insertData = array('p_name'=>$pname,
								'p_des'=>$pdes,
								'p_venue'=>$pvenue,
								
								'p_start_date'=>$pstart_date,
								'p_end_date'=>$pend_date,
								'created_at'=> $date,
								
								'project_manager'=> $id,
								'created_by'=> $id,
           	 );
     
           $insertUser =  $this->db->insert('projects',$insertData);
            $item_id = $this->db->insert_id();
         for ($i = 0; $i < count($alluser) ; ++$i) {
         	$useradmin = $alluser[$i];

   		 $insertData = array('project_id'=>$item_id,
								'admin_user_id'=>$useradmin,
								'created_by'=>$id,
								
								'created_at'=> $date
           	 );
  
      $insertUser =  $this->db->insert('project_member',$insertData);
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

	public function deletecalleradmin($id)
{
    $id = $this->input->post("admin_user_id");
    $this->Caller_modal->deletecalleradmin($id);
    redirect('CallerAdmin');
}

public function changecallerpass()
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

    public function calleredit()
{
	
		$id =  $this->input->post('id');
		$data['content'] = $this->Caller_modal->callereditmodel($id);

        
		$this->load->view('admin/Caller/callereditmodal',$data);

}
	
	public function updatecaller()
{

		$id =  $this->input->post('admin_user_id'); 
		
  		$caller_name=$this->input->post('caller_name');
        $caller_email=$this->input->post('caller_email');
       
        $caller_contact=$this->input->post('caller_contact');
        
        $caller_address=$this->input->post('caller_address');
         date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

         $updatedata = array('admin_name'=>$caller_name,
								'admin_email'=>$caller_email,
								
								'admin_contact'=>$caller_contact,
								'updated_at' => $date,
								'admin_address'=>$caller_address
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

    public function userdetail(){
	$id = $this->input->post('userid');
	$data = $this->Projects_modal->getprojectmanager($id);
	$output = '';

	foreach($data as $value) {
		$output .= "<option value =".$value['admin_user_id'].">".$value['admin_name']."</option>";
	}

	echo json_encode($output);
}


}
