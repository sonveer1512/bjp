<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

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

		$this->load->model('Employee_model');
		$this->load->helper('url');
 		$this->load->library('form_validation');
      	$this->load->library('session');
    

}
	public function index()
	{
		$data['masteradmin'] = $this->Employee_model->masterData();
		$this->load->view('admin/employee/employeedetails',$data);
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

        //check mail

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
		public function deleteemployee($id)
{
    $id = $this->input->post("admin_user_id");
    $this->Employee_model->deleteemployee($id);
    redirect('Employee');
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
        
    	redirect('Marketing', 'refresh');
      
    }


}
