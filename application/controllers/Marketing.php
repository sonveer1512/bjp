<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketing extends CI_Controller {
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
		$this->load->model('Market_admin_model');
		$this->load->helper('url');
 		$this->load->library('form_validation');
      	$this->load->library('session');
}
	public function index()
	{
		
		if ($this->session->userdata('pmsadmin') == true) {
			$data['masteradmin'] = $this->Market_admin_model->masterData();
		return	$this->load->view('admin/marketing/marketing',$data);

		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
	}


	

	public function followLead()
	{
		$this->load->view('admin/marketing/follow_lead');
	}
	
	public function addmarketing()
	{
  		$market_name=$this->input->post('market_name');
        $market_email=$this->input->post('market_email');
        $market_password=$this->input->post('market_password');
        $password = md5($market_password);
        $market_contact=$this->input->post('market_contact');
        $market_address=$this->input->post('market_address');
        $market_select=$this->input->post('market_select');
        $market_des=$this->input->post('market_des');
        $this->db->where('admin_email',$market_email);
    	$query = $this->db->get('master_admin');
    	if ($query->num_rows() > 0)
    	{
 	 		echo json_encode(['email'=>'0']);
    	}
    		else
    	{
         $insertData = array('admin_name'=>$market_name,
								'admin_email'=>$market_email,
								'admin_password'=>$password,
								'admin_contact'=>$market_contact,
								'admin_role'=>$market_select,
								'admin_marketing_des'=>$market_des,
								'admin_address'=>$market_address
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
		public function deletemarketing($id)
{
    $id = $this->input->post("admin_user_id");
    $this->Market_admin_model->deletemarketing($id);
    redirect('Marketing');
}

public function marketingedit()
{
		$id =  $this->input->post('id');
		$data['content'] = $this->Market_admin_model->marketingeditttModal($id);
		$this->load->view('admin/marketing/marketingeditmodal',$data);
		
}


public function updatemarketing(){
	$id =  $this->input->post('admin_user_id'); 
	$market_email=$this->input->post('market_email');
	$market_name=$this->input->post('market_name');
	$admin_marketing_des=$this->input->post('admin_marketing_des');
	$market_contact=$this->input->post('market_contact');
	$market_address=$this->input->post('market_address');

	 date_default_timezone_set('Asia/Kolkata');
	$date = date('d-m-Y H:i A');

	 $updatedata = array('admin_email'=>$market_email,'admin_name'=>$market_name,'admin_marketing_des'=>$admin_marketing_des,'admin_contact'=>$market_contact,'admin_address' => $market_address);
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
    public function changemarpass()
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
