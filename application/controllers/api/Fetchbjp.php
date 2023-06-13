<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Fetchbjp extends CI_Controller

{



    public function __construct()

    {

        parent::__construct();

        header("Access-Control-Allow-Origin: *");

        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");

        header("Access-Control-Allow-Headers: *");
    }

    public function index()
    {

        $request = json_decode(file_get_contents('php://input'), 1);

        $response = array();





        $bjp = array();





        $total = $this->api_model->countrow('bjpdetail');

        $productbycategory = $this->api_model->getdata('bjpdetail', $request['limit'], $request['offset']);







        if (!empty($productbycategory)) {

            foreach ($productbycategory as $value) {

                array_push($bjp, array('id' => $value['id'], 'name' => $value['name'], 'f_name' => $value['f_name'], 'panchayatsimit' => $value['panchayatsimit'], 'caste' => $value['caste'], 'dharm' => $value['dharm'], 'mobile' => $value['mobile'], 'whtup' => $value['whtup'], 'birthd' => $value['birthd'], 'marriedstatus' => $value['marriedstatus'], 'dateofmarriage' => $value['dateofmarriage'], 'ward_no' => $value['ward_no'], 'verify' => $value['verify'], 'aadharno' => $value['aadharno'], 'voteridno' => $value['voteridno'], 'village' => $value['village'], 'gram_panchanyat' => $value['gram_panchanyat'], 'gram' => $value['gram'], 'panchayat' => $value['panchayat'], 'tashsil' => $value['tashsil'], 'district' => $value['district'], 'pincode' => $value['pincode'], 'sadasha_varsh' => $value['sadasha_varsh'], 'vartaman_pad' => $value['vartaman_pad'], 'purv_pad' => $value['purv_pad'], 'vidhan_sabha' => $value['vidhan_sabha'], 'cities_id' => $value['cities_id'],'moholla'=>$value['moholla'], 'flag' => $value['flag'], 'datastatus' => $value['datastatus']));
            }

            $data['count'] =  $total;

            $data['uderdata'] =  $bjp;



            $response = array('status' => 'success', 'code' => 200, 'data' => $data);
        } else {

            $response = array('status' => 'Data Not Found', 'code' => 400);
        }

        echo json_encode($response);

        exit;
    }
}
