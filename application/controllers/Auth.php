<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		
		$this->load->database();
	}

	public function  login()
	{
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() == TRUE) // Only add new option if it is unique
		{
			$email = $this->input->post('email');
			//check the email  existence or not 
			$check = $this->db->query("SELECT * FROM master_admin  WHERE admin_status = 'Enable' and admin_email  = ?", [$email]);
			if ($check->num_rows() > 0) {
				//match the db  password with the  user password 
				$dbData = $check->result();
				$dbpassword = $dbData[0]->admin_password;
				$admin_user_id = $dbData[0]->admin_user_id;

				//get the userpassword
				$userpassword = $this->input->post('password');
				$password = md5($userpassword);
				
				if ($password == $dbpassword) {
					//set session 
					 $sess_data = array(
               		'id'           => $dbData[0]->admin_user_id,
               		'email'     	=> $dbData[0]->admin_email,
               		'role'			=> $dbData[0]->admin_role,
               		'role_id'			=> $dbData[0]->admin_role,
               		'name'         => $dbData[0]->admin_name
             		);

					 $this->session->set_userdata('pmsadmin', $sess_data);
					 // $this->db->query("UPDATE master_admin set last_login = now() WHERE admin_user_id = '$admin_user_id'");
					
					redirect('Dashboard');
				} else {
					$this->session->set_flashdata('Email', 'Password  is Incorrect');
					return $this->load->view("admin/login");
				}
			} else {
				$this->session->set_flashdata('Email', 'Email is not registered!');
				return $this->load->view("admin/login");
			}
		} else {
			return $this->load->view('admin/login');
		}
	}

	public function logout()
    {
    	
        $this->session->sess_destroy();

        redirect('auth/login');
    }

    public function forgotpassword()
    {
        
        $this->load->view('admin/forgotpassword');

//          $to_email = $this->input->post('email');
    
         
//          $this->db->select('*');
//          $this->db->from('master_admin');
//          $this->db->where('admin_email',$to_email);
//          $query=$this->db->get();
//          $arr['user'] = $query->result_array(); 
         
        
//           $rand = rand(1000,9999);
         

//          $to =$to_email;
        
//         if($to) {
    
// $html  = "urlencode($rand)";
    
    
// $subject = "Axepert PMS2 - Forgot Password"; 

// $name ='Axepert Exhibit Pvt Ltd';
// $reply=$to_email; 


//       //$headers = 'From: '.$from.'\r\n'.'X-Mailer: PHP/' . phpversion();
//         $headers  = "From: ".strip_tags($name)." <".strip_tags($reply).">\r\n";
//         $headers .= "Reply-To: ".strip_tags($reply). "\r\n";
//         $headers .= "MIME-Version: 1.0\r\n";
//         $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
//        // $headers.= "Content-Type: text/html; charset=ISO-8859-1\r\n";

//     $html = utf8_decode($html);
//     mail($to, $subject, $html, $headers);


//       	  }

    	
     }
}
