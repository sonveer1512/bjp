<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance extends CI_Controller {

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
		$this->load->model('Finance_modal');
		$this->load->helper('url');
 		$this->load->library('form_validation');
      	$this->load->library('session');
}
	public function index()
	{
		
		if ($this->session->userdata('pmsadmin') == true) {
			$data['finance'] = $this->Finance_modal->masterData();
		return	$this->load->view('admin/finance',$data);

		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
	}
	
	public function addfinance()
	{
  		$fin_name=$this->input->post('fin_name');
        $fin_email=$this->input->post('fin_email');
        $fin_password=$this->input->post('fin_pass');
        $password = md5($fin_password);
        $fin_contact=$this->input->post('fin_contact');
        $fin_address=$this->input->post('fin_address');
        $fin_select=$this->input->post('fin_select');
        
        $this->db->where('admin_email',$fin_email);
    	$query = $this->db->get('master_admin');
    	if ($query->num_rows() > 0)
    	{
 	 		echo json_encode(['email'=>'0']);
    	}
    		else
    	{
         $insertData = array('admin_name'=>$fin_name,
								'admin_email'=>$fin_email,
								'admin_password'=>$password,
								'admin_contact'=>$fin_contact,
								'admin_role'=>$fin_select,
								
								'admin_address'=>$fin_address
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


	public function deletefinance($id)
{
    $id = $this->input->post("admin_user_id");
    $this->Finance_modal->deletefinance($id);
    redirect('Marketing');
}

	public function financenedit()
{
	
		$id =  $this->input->post('id');
		$data['content'] = $this->Finance_modal->financeeditmodel($id);

        
		$this->load->view('admin/finance/finance_edit_modal',$data);

}

public function updatefinance()
{

		$id =  $this->input->post('admin_user_id'); 
		$fin_name=$this->input->post('fin_name');
		$fin_email=$this->input->post('fin_email');
        
        $fin_contact=$this->input->post('fin_contact');
        $fin_address=$this->input->post('fin_address');
        $fin_select=$this->input->post('fin_select');
         date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

         $updatedata = array('admin_name'=>$fin_name,
								'admin_email'=>$fin_email,
								
								'admin_contact'=>$fin_contact,
								'admin_role'=>$fin_select,
								'updated_at'=>$date,
								'admin_address'=>$fin_address
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
    public function changefinpass()
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
