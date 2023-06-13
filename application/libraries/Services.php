<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Services
{
    public $CI;

    //this is the expiration for a non-remember session
    //var $session_expire    = 600;

    public function __construct() {
        $this->CI = &get_instance();
    }

    /*
      this checks to see if the admin is logged in
      we can provide a link to redirect to, and for the login page, we have $default_redirect,
      this way we can check if they are already logged in, but we won't get stuck in an infinite loop if it returns false.
     */

    public function getapiurl() {
        return 'https://axepertexhibits.com/bjpadmin/api/';
    }


   

    // get user data api 
    public function userdata1() {
        return $this->getapiurl().'Fetchbjp';
    }

   

   

   
}
