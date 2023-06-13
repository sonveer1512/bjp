<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workallotment extends CI_Controller {

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

		$this->load->model('Workallot_model');
		$this->load->model('Market_admin_model');
		$this->load->helper('url');
 		$this->load->library('form_validation');
      	$this->load->library('session');
    

}
	public function index()
	{
		
		if ($this->session->userdata('pmsadmin') == true) {
			$data['workallotData'] = $this->Workallot_model->workallotedData();
			$data['marketingData'] = $this->Market_admin_model->masterData();
			

		return $this->load->view('admin/Caller/workallotlist',$data);
			 
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
	}
	
	public function addwork()
	{


		$mid = $this->input->post('work_allot_id');
  		$marketer=$this->input->post('marketer_name');
        $marketer_email=$this->input->post('marketer_email');
        
        $marketer_contact=$this->input->post('marketer_contact');
        $marketer_remark=$this->input->post('marketer_remark');
        
        $this->db->select('*');
        $this->db->from('master_admin');
        $this->db->where('admin_user_id',$marketer);
        $query = $this->db->get();
        $arr = $query->result();

        $marketername = $arr[0]->admin_name;

         $insertData = array('marketing_name'=>$marketername,
								'marketer_email'=>$marketer_email,
								'marketer_contact'=>$marketer_contact,
								'marketing_id'=>$mid,
								'work'=>$marketer_remark
								
           	 );
       
           $insertUser =  $this->db->insert('work_alloted_list',$insertData);

           if($insertUser)
				{
					echo json_encode(['done'=>'1']);


					
				}
				else
				{
					echo json_encode(['done'=>'0']);

				}
    	

          
  
        
	}

	public function deletecusadmin($id)
{
    $id = $this->input->post("admin_user_id");
    $this->users_model->deletecusadmin($id);
    redirect('Users');
}


public function getcurpassword()
{
	
		$id =  $this->input->post('id');
		$data['content'] = $this->users_model->subadmineditmodel($id);

        
		$this->load->view('admin/subadmin/subadmineditmodel',$data);

}


public function updatecusadmin()
{
		$id =  $this->input->post('admin_user_id');
		$cur_password =  $this->input->post('cur_password');
		 $cpassword = md5($cur_password);
		$new_password=$this->input->post('new_password');
        
         $npassword = md5($new_password);
       
         date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

        $this->db->where('admin_password',$cpassword);
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
 public function update()
    {
        

        $admin_user_id = $_REQUEST['admin_user_id'];
        $accept_status  = $_REQUEST['accept_status']; 
     

      	$update = array(
        'admin_status'  => $accept_status
        );

        $this->db->where('admin_user_id',$admin_user_id);
        $this->db->update('master_admin',$update);
        
    	redirect('Subadmin', 'refresh');
      
    }

    public function workedit()
{
	
		$id =  $this->input->post('id');


		//$data['content'] = $this->Workallot_model->mytask($id);
		 //$data['marketingData'] = $this->market_admin_model->masterData();

		$this->db->select('*');
        $this->db->from('work_alloted_list');
        $this->db->where('work_allot_id',$id);
        $query = $this->db->get();
        $data['content'] = $query->result_array();
        

		$this->load->view('admin/Caller/workallotedit',$data);

}

public function updatecustomer()
{

		$id =  $this->input->post('admin_user_id'); 
		$cus_name=$this->input->post('cus_name');
        $cus_email=$this->input->post('cus_email');
       
        $cus_contact=$this->input->post('cus_contact');
       
        $cus_address=$this->input->post('cus_address');
         date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

         $updatedata = array('admin_name'=>$cus_name,
								'admin_email'=>$cus_email,
								
								'admin_contact'=>$cus_contact,
								'updated_at' => $date,
								'admin_address'=>$cus_address
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


public function userdetail(){
	$markerid = $this->input->post('userid');
	//get the  user info 
	$marketerinfo = $this->db->query("SELECT * FROM master_admin WHERE admin_user_id = ? ",[$markerid]);
	$marketdata  = $marketerinfo->result();
	 $marketeremail = $marketdata[0]->admin_email;
	 $marketercontact = $marketdata[0]->admin_contact;
	 $marketerID = $marketdata[0]->admin_user_id;
	 echo json_encode(["marketercontact"=>$marketercontact,"marketeremail"=>$marketeremail,"marketerID"=>$marketerID]);
	 

}

public function mytask($id = null)
{

		if(empty($id)) {
			$sess = $this->session->userdata('pmsadmin');
			$id = $sess['id'];


		}

			$data['complete'] = $this->Workallot_model->totalcompleted($id);
			$data['pendingdata'] = $this->Workallot_model->totalpending($id);
			$data['reject'] = $this->Workallot_model->totalreject($id);
			$data['total'] = $this->Workallot_model->totalwork($id);
  			$data['content'] = $this->Workallot_model->mytask($id);
  			
			
  			
           $this->load->view('admin/marketing/mytask',$data);

           
}

public function updatework()
{

		$id =  $this->input->post('work_allot_id'); 
		$marketer_remark=$this->input->post('marketer_remark');
       
         date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

         $updatedata = array('work'=>$marketer_remark,
								
								'updated_at'=>$date
								
           	 );
          
         
           	$insertUser= $this->db->where('work_allot_id',$id);
       		$insertUser= $this->db->update('work_alloted_list',$updatedata);
      
         	if($insertUser)
				{
					echo json_encode(['inserted'=>'1']);


					
				}
				else
				{
					echo json_encode(['inserted'=>'0']);
					 
				}
        
       
}
	

}
