<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'third_party/dompdf/autoload.inc.php';
use Dompdf\Dompdf;


class Welcome extends CI_Controller {

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
	public function index()
	{
		if ($this->session->userdata('login') == true) {
			return $this->load->view('admin/index');
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('welcome_message');
		}
		//$this->load->view('welcome_message');
	}
  
  
  
  	public function generateinvoicepdf($id) {        
        $url=base_url('welcome/invoicepdf/'.$id);

        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );  

        echo $file = file_get_contents($url, false, stream_context_create($arrContextOptions)); exit;
        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->set_option('isHtml5ParserEnabled', TRUE);
        $dompdf->loadHtml(html_entity_decode($file));
        $dompdf->render();
      	ob_end_clean();
        $dompdf->stream('data.pdf', array('Attachment'=>0));
        exit(0);
    }
  
  
  	public function generateinvoicepdfinmorcha($id,$morcha_id) {        
        $url=base_url('welcome/invoicepdfinmorcha/'.$id."/".$morcha_id);

        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );  

        echo $file = file_get_contents($url, false, stream_context_create($arrContextOptions)); exit;
        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->set_option('isHtml5ParserEnabled', TRUE);
        $dompdf->loadHtml(html_entity_decode($file));
        $dompdf->render();
      	ob_end_clean();
        $dompdf->stream('data.pdf', array('Attachment'=>0));
        exit(0);
    }
  
  
  
  	public function invoicepdf($id) {
        $data['items'] = $this->api_model->list_common_where3('people_data','refrence_id',$id);    
		$data['booth'] = $this->api_model->list_common_where4('master_hierarchy','id',$data['items'][0]['refrence_id'] ?? '0');
      	$data['gram'] = $this->api_model->list_common_where4('master_hierarchy','id',$data['booth'][0]['parent_id'] ?? '0');
      	$data['mandal'] = $this->api_model->list_common_where4('master_hierarchy','id',$data['gram'][0]['parent_id'] ?? '0');
      	$data['nagar'] = $this->api_model->list_common_where4('master_hierarchy','id',$data['mandal'][0]['parent_id'] ?? '0');
      	$data['vidhansabha'] = $this->api_model->list_common_where4('master_hierarchy','id',$data['nagar'][0]['parent_id'] ?? '0');
      	
        $this->load->view('admin/master/pdfview.php',$data);     
    }
  
  
  	public function invoicepdfinmorcha($id,$morcha_id) {
      	$data['items'] = $this->Subadmin_model->getmorchapeople($booth_id,$morcha_id);
		$data['booth'] = $this->api_model->list_common_where4('master_hierarchy','id',$data['items'][0]['refrence_id'] ?? '0');
      	$data['gram'] = $this->api_model->list_common_where4('master_hierarchy','id',$data['booth'][0]['parent_id'] ?? '0');
      	$data['mandal'] = $this->api_model->list_common_where4('master_hierarchy','id',$data['gram'][0]['parent_id'] ?? '0');
      	$data['nagar'] = $this->api_model->list_common_where4('master_hierarchy','id',$data['mandal'][0]['parent_id'] ?? '0');
      	$data['vidhansabha'] = $this->api_model->list_common_where4('master_hierarchy','id',$data['nagar'][0]['parent_id'] ?? '0');
      	
        $this->load->view('admin/master/pdfview.php',$data);     
    }
  
  
}
