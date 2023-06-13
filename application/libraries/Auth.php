<?php



if (!defined('BASEPATH')) {

    exit('No direct script access allowed');
}



class Auth

{



    public $CI;



    //this is the expiration for a non-remember session

    //var $session_expire    = 600;



    public function __construct()
    {

        $this->CI = &get_instance();
    }



    /*

      this checks to see if the admin is logged in

      we can provide a link to redirect to, and for the login page, we have $default_redirect,

      this way we can check if they are already logged in, but we won't get stuck in an infinite loop if it returns false.

     */











    public function callurl($data, $url)
    {

        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt($curl, CURLOPT_POST, true);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);



        $headers = array(

            'method'  => 'POST',

            "Accept: application/json",

            "Content-Type: application/json",

        );

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);



        $result =  curl_exec($curl);
       

        return json_decode($result);
    }
}
