<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('email');
	}


	function sendmail($sender_email, $reciever_email,$subject, $message) {
     

      $config = Array(
            'protocol' => 'mail',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 587, 
            'smtp_user' => 'sp9522385@gmail.com',
            'smtp_pass' => 'Dev@Surya#123',
            'newline' => '\r\n',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );

        $this->email->initialize($config);
        $this->email->from($sender_email);
        $this->email->to( $reciever_email);
        $this->email->subject("Welcome to Axepert Exhibit Pvt Ltd.");
        $this->email->message($message);
        
      $this->email->send();
    }

}

?>