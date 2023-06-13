<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH."/third_party/PHPExcel.php";

class Master extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Subadmin_model');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
      
      	if ($this->session->userdata('pmsadmin') == false) { 
        	redirect('/');
        }
      
	}
  
  	
  	public function checkdata() {
      	$datas = $this->Subadmin_model->list_common_where3('people_data','refrence_id', '429');
      	$i = 379; 
      	foreach($datas as $value) { 
        	//if(empty($value['image'])) {
            	$text = '225/'.$i.".png";
              	$i++;
              	echo $data['image'] = $text;
              	$this->Subadmin_model->update_common('people_data', $data,'id',$value['id']);
            //}           
        }
    }
  
  
  	public function checkdata2() {
    	$datas = $this->Subadmin_model->list_common('people_data');
      	if(!empty($datas)) {
        	foreach($datas as $value) {
              	if(empty($value['path_1'])) {
                    $parent = $this->Subadmin_model->list_common_where3('master_hierarchy','id',$value['path_2']);
                    echo $data['path_1'] = $parent[0]['parent_id'];
                    echo "<br>";
                    $this->Subadmin_model->update_common('people_data', $data,'id',$value['id']);
                }
            }
        }
      
    }
  

  	public function index()
	{
		if ($this->session->userdata('pmsadmin') == true) {
			return $this->load->view('admin/master/master_access');
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			redirect('/');
		}
	}

	

	public function add_parent_level()
	{
		$parent_level = $this->input->post('parent_level');
		$data['name'] = $this->input->post('title');

		if (!empty($parent_level)) {
			$data['parent_id'] = $parent_level;
		} else {
			$data['parent_id'] = 0;
		}
		
			$insertUser =  $this->Subadmin_model->insert_common('master_hierarchy', $data);

			if ($insertUser) {
				echo json_encode(['status' => 200, 'level' => $this->input->post('level'), 'parent_id' => $data['parent_id']]);
			} else {
				echo json_encode(['status' => 400, 'error' => 'Something went wrong! Try Again']);
			}
		
	}

	public function getparentlist()
	{

		$data['id'] = $this->input->post('id');
		$data['item'] = $this->Subadmin_model->list_common_where3('master_hierarchy', 'parent_id', $data['id']);
		$data['level'] = $this->input->post('level');
		return $this->load->view('admin/master/parent_wise_child_list', $data);
	}

	public function getchilddetails()
	{
		$data['id'] = $id = $this->input->post('id');
		$data['item'] = $this->Subadmin_model->list_common_where3('master_hierarchy', 'parent_id', $id);
		$data['count'] = $this->Subadmin_model->countrowwhere('master_hierarchy', $id);
		$data['level'] = $this->input->post('level');

		return $this->load->view('admin/master/parent_wise_child_list', $data);
	}

	public function getpeople($id)
	{

		$data['item'] = $this->Subadmin_model->list_common_where3('people_data', 'refrence_id', $id);
		//$data['count'] = $this->Subadmin_model->countrowwhere('master_hierarchy', $id);


		return $this->load->view('admin/master/showpeople', $data);
	}

	public function add_child_level()
	{
		$child = $this->input->post('child');
		$parent_id = $this->input->post('parent_id');
		
		
			$insertData = array(
				'name' => $child,
				'parent_id' => $parent_id
			);

			$insertUser =  $this->db->insert('master_hierarchy', $insertData);

			if ($insertUser) {
				echo json_encode(['done' => '1']);
			} else {
				echo json_encode(['done' => '0']);
			}
		
	}


	public function addpeople($id,$level_id = null)
	{
		$data['id'] = $id;
      	$data['level_id'] = $level_id ?? '';
      	if(!empty($level_id)) {
        	$data['level'] = $this->Subadmin_model->list_common_where3('hierarchy_level', 'id', $level_id);
        }
      
		$data['parent_list'] = $this->Subadmin_model->list_common_where3('master_hierarchy', 'id', $data['id']);
		return $this->load->view('admin/master/addpeople', $data);
	}
  
  	
  	
  

	public function add_people()
	{
		$name = $this->input->post('name');
		$liability = $this->input->post('liability');
		$dob = $this->input->post('dob');
		$contact = $this->input->post('contact');
		$id = $this->input->post('id');
      	$level_id = $this->input->post('level_id');
		if ($_FILES['image']['name'] != "") {
			$path_parts = pathinfo($_FILES['image']['name']);
			$image_path = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
			$imgname = $image_path;

			$source =  $_FILES['image']['tmp_name'];
			$originalpath  = "assets/images/people_image/" . $imgname;

			move_uploaded_file($source, $originalpath);
		}

		$liab = explode("/", $liability);


		$insertData = array(
			'name' => $name,
			'refrence_id' => $id,
			'dob' => $dob,
			'liability' => $liab[0],
			'dayitv_id' => $liab[1],
          	'level_id' => $level_id,
			'contact_no' => $contact,
			'image' => $imgname
		);

		$insertUser =  $this->db->insert('people_data', $insertData);

		if ($insertUser) {

			echo json_encode(['done' => '1']);
		} else {
			echo json_encode(['done' => '0']);
		}
	}
  

	public function editpeople($id)
	{
		$data['people_list'] = $this->Subadmin_model->list_common_where3('people_data', 'id', $id);
		return $this->load->view('admin/master/editpeople', $data);
	}

  
	public function updatepeople()
	{
		$insertData['name'] = $this->input->post('name');
		$insertData['dob'] = $this->input->post('dob');
		$insertData['contact_no'] = $this->input->post('contact');
		$insertData['id'] = $id = $this->input->post('id');
      	$liab = explode("/", $this->input->post('liability'));
      
      	$insertData['liability'] = $liab[0];
      	$insertData['dayitv_id'] = $liab[1];    	

		if ($_FILES['image']['name'] != "") {
          	$insertData['uploaded_from'] = '';
          
			$path_parts = pathinfo($_FILES['image']['name']);
			$image_path = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
			$imgname = $image_path;

			$insertData['image'] = $imgname;

			$source =  $_FILES['image']['tmp_name'];
			$originalpath  = "assets/images/people_image/" . $imgname;

			move_uploaded_file($source, $originalpath);
		}



		$insertUser = $this->db->where('id', $id);
		$insertUser = $this->db->update('people_data', $insertData);

		if ($insertUser) {

			echo json_encode(['done' => '1', 'id' => $id]);
		} else {
			echo json_encode(['done' => '0']);
		}
	}



	public function changelabel() {		
		if(!empty($this->input->post('level_title'))) {

			$insertData['title'] = $this->input->post('level_title');
			$insertData['level'] = $this->input->post('level_number_val');
			
			$query = $this->Subadmin_model->list_common_where3('hierarchy_level', 'level', $this->input->post('level_number_val'));

			if(!empty($query)) {

				$insertUser = $this->db->where('id', $query[0]['id']);
				$insertUser = $this->db->update('hierarchy_level', $insertData);

				echo json_encode(['code' => 200, 'message' => 'Update Successfully', 'level' => $insertData['level'], 'title' => $insertData['title'] ]);

			}else{
				$this->Subadmin_model->insert_common('hierarchy_level',$insertData);

				echo json_encode(['code' => 200, 'message' => 'Saved Successfully', 'level' => $insertData['level'], 'title' => $insertData['title'] ]);
			}
		}else{
			echo json_encode(['code' => 400, 'message' => 'Please Enter Title']);
		}	
		
	}


	public function deleteitem()
	{
		$data['flag'] = '2';
		$insertUser = $this->db->where('id', $this->input->post('id'));
		$insertUser = $this->db->update('master_hierarchy', $data);
	}


	public function deletepeople($id)
	{
		$data['flag'] = '2';
		$insertUser = $this->db->where('id', $id);
		$insertUser = $this->db->update('people_data', $data);
	}
  
  //shopowner
  	public function shop_owner()
	{
		$data['parent_list'] = $this->Subadmin_model->list_common_shop('shop_owner');
		return $this->load->view('admin/master/shop_owner',$data);
	}
  
  	public function deleteshopowner($id)
	{
		$data['flag'] = '2';
		$insertUser= $this->db->where('id',$id);
       	$insertUser= $this->db->update('shop_owner',$data);
		
	}
  
  	public function exportexcel($booth_id)
	{
		$booth_details = $this->Subadmin_model->list_common_where3('master_hierarchy','id',$booth_id);

		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=" . $booth_details[0]['name'] . ".xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		echo '<table border="1">
        	  <tr>
                <th>S.No.</th>
                <th>नाम</th>
                <th>दूरभाष</th>
                <th>दायित्व</th>
                <th>जन्म तिथ</th>
            </tr>';

			$booth_details = $this->Subadmin_model->list_common_where3('people_data','refrence_id',$booth_id);

			if (!empty($booth_details)) { $var = 0;
				foreach($booth_details as $array) { $var++;
					echo "<tr>
                        <td>" . $var . "</td>
                        <td>" . $array['name'] . "</td>
                        <td>" . $array['contact_no'] . "</td>
                        <td>" . $array['liability'] . "</td>
                        <td>" . $array['dob'] . "</td>
                    </tr>";
				}
			}

		echo '</table>';
      exit();
	}
  
  
  	public function toptobottom() {
    	$id = $this->input->post('id');
      	
      	$data['booth_details'] = $this->Subadmin_model->list_common_where3('master_hierarchy','parent_id',$id);
      	return $this->load->view('admin/master/toptobottom',$data);
    }
  
  
  
  
  
  
  
  	// morche ka program
  	public function addpeopleinmorche($id,$morcha_id,$level_id)
	{
		$data['id'] = $id;
      	$data['morcha_id'] = $morcha_id;
		$data['parent_list'] = $this->Subadmin_model->list_common_where3('master_hierarchy', 'id', $id);
      	$data['morcha_detail'] = $this->Subadmin_model->list_common_where3('morche', 'id', $morcha_id);
      
		return $this->load->view('admin/master/morche/addpeople', $data);
	}
  
    
  	public function addpoepleinmorchasubmit()
	{
		$name = $this->input->post('name');
		$liability = $this->input->post('liability');
		$dob = $this->input->post('dob');
		$contact = $this->input->post('contact');
      	$level_id = $this->input->post('level_id');
		$id = $this->input->post('id');
      	$morcha_id = $this->input->post('morcha_id');
      
		if ($_FILES['image']['name'] != "") {
			$path_parts = pathinfo($_FILES['image']['name']);
			$image_path = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
			$imgname = $image_path;

			$source =  $_FILES['image']['tmp_name'];
			$originalpath  = "assets/images/people_image/" . $imgname;

			move_uploaded_file($source, $originalpath);
		}

		$liab = explode("/", $liability);

		$insertData = array(
			'name' => $name,
			'refrence_id' => $id,
          	'morcha_id' => $morcha_id,
			'dob' => $dob,
          	'level_id' => $level_id,
			'liability' => $liab[0],
			'dayitv_id' => $liab[1],
			'contact_no' => $contact,
			'image' => $imgname
		);

		$insertUser =  $this->db->insert('morcha_people', $insertData);
		if ($insertUser) {
			echo json_encode(['done' => '1']);
		} else {
			echo json_encode(['done' => '0']);
		}
	}
  
  
  
  	public function getmorchapeoplelist($id, $morcha_id)
	{
		$data['item'] = $this->Subadmin_model->getmorchapeople($id,$morcha_id);
		return $this->load->view('admin/master/morche/showpeople', $data);
	}
  
  
  	public function deletepeopleinmorcha($id)
	{
		$data['flag'] = '2';
		$insertUser = $this->db->where('id', $id);
		$insertUser = $this->db->update('morcha_people', $data);
	}
  
  	public function editpeopleinmorcha($id)
	{
		$data['people_list'] = $this->Subadmin_model->list_common_where3('morcha_people', 'id', $id);
		return $this->load->view('admin/master/morche/editpeople', $data);
	}
  
  
  	public function updatepeopleinmorcha()
	{
		$insertData['name'] = $this->input->post('name');
		$insertData['dob'] = $this->input->post('dob');
		$insertData['contact_no'] = $this->input->post('contact');
		$id = $this->input->post('id');
      	$liab = explode("/", $this->input->post('liability'));
      
      	$insertData['liability'] = $liab[0];
      	$insertData['dayitv_id'] = $liab[1];    	

		if ($_FILES['image']['name'] != "") {
          	$insertData['uploaded_from'] = '';
          
			$path_parts = pathinfo($_FILES['image']['name']);
			$image_path = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
			$imgname = $image_path;

			$insertData['image'] = $imgname;

			$source =  $_FILES['image']['tmp_name'];
			$originalpath  = "assets/images/people_image/" . $imgname;

			move_uploaded_file($source, $originalpath);
		}

		$insertUser = $this->db->where('id', $id);
		$insertUser = $this->db->update('morcha_people', $insertData);

		if ($insertUser) {
			echo json_encode(['done' => '1', 'id' => $id]);
		} else {
			echo json_encode(['done' => '0']);
		}
	}
  
  
  	public function exportexcelinmorcha($booth_id,$morcha_id)
	{
		$booth_details = $this->Subadmin_model->list_common_where3('master_hierarchy','id',$booth_id);
      	$morcha_details = $this->Subadmin_model->list_common_where3('morche','id',$morcha_id);

		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=" . $booth_details[0]['name']." ". $morcha_details[0]['title'] . ".xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		echo '<table border="1">
        	  <tr>
                <th>S.No.</th>
                <th>नाम</th>
                <th>दूरभाष</th>
                <th>दायित्व</th>
                <th>जन्म तिथ</th>
            </tr>';

			$booth_details = $this->Subadmin_model->getmorchapeople($booth_id,$morcha_id);

			if (!empty($booth_details)) { $var = 0;
				foreach($booth_details as $array) { $var++;
					echo "<tr>
                        <td>" . $var . "</td>
                        <td>" . $array['name'] . "</td>
                        <td>" . $array['contact_no'] . "</td>
                        <td>" . $array['liability'] . "</td>
                        <td>" . $array['dob'] . "</td>
                    </tr>";
				}
			}

		echo '</table>';
	}
  
  
  	
  public function changedropdown() {
  	$id = $this->input->post('id');
    $text = $this->input->post('text');
    
    $output = '<option value="" disabled selected>'.$text.'</option><option value="">All</option>';
    if(!empty($id)) {
      $hierarchy = $this->Subadmin_model->list_common_where3('master_hierarchy','parent_id',$id);

      if(!empty($hierarchy)) {
          foreach($hierarchy as $value) {
              $output .= '<option value='.$value['id'].'>'.$value['name'].'</option>';
          }
      }
    }  
    
    echo $output;
  }
  
  
  	//show all data of jila/vidhansabha/ and many other
  	public function morchadata($id = null) {
      	if(empty($id)) {
        	$data['item'] = $this->Subadmin_model->list_common('morcha_people');
        }else{
          	$data['level'] = $this->Subadmin_model->list_common_where3('hierarchy_level','level',$id);
        	$data['item'] = $this->Subadmin_model->list_common_where3('morcha_people','level_id',$id);
        }
    	
		return $this->load->view('admin/master/morche/allpeoples', $data);
    }
  
  	public function leveldata($id = null) {
      	$limit = 10000;
      	if(empty($id)) {
        	$data['item'] = $this->Subadmin_model->list_common('people_data');
        }else{
          	
		$data['level'] = $this->Subadmin_model->list_common_where3('hierarchy_level','level',$id);
        $data['item'] = $this->Subadmin_model->list_common_exactdata('people_data','level_id',$id,$limit);
         
          	//$data['level'] = $this->Subadmin_model->list_common_where3('hierarchy_level','level',$id);
        	//$data['item'] = $this->Subadmin_model->list_common_exactdata('people_data','level_id',$id,$limit,$start);
        }
      	return $this->load->view('admin/master/morche/allpeoples', $data);
    }
  
  	public function leveldata_scroll($id = null) {
      	$limit = $this->input->post('limit');
      	if(empty($id)) {
        	$data['item'] = $this->Subadmin_model->list_common('people_data');
        }else{
          	
		$data['level'] = $this->Subadmin_model->list_common_where3('hierarchy_level','level',$id);
        $data['item'] = $this->Subadmin_model->list_common_exactdata('people_data','level_id',$id,$limit);
         
          	//$data['level'] = $this->Subadmin_model->list_common_where3('hierarchy_level','level',$id);
        	//$data['item'] = $this->Subadmin_model->list_common_exactdata('people_data','level_id',$id,$limit,$start);
        }
      	return $this->load->view('admin/master/morche/allpeoples', $data);
    }
  
  
  	public function changetabledata() {
      	$booth_id = '';
      	$where = 'level_id';
      	if($this->input->post('jila_id')) {  $booth_id = $this->input->post('jila_id'); $where = 'path_1';  }
      	if($this->input->post('vidhansabha_id')) {  $booth_id = $this->input->post('vidhansabha_id');  $where = 'path_2'; }
      	if($this->input->post('pachayat_id')) {  $booth_id = $this->input->post('pachayat_id'); $where = 'path_3';  }
      	if($this->input->post('mandal_id')) {  $booth_id = $this->input->post('mandal_id');  $where = 'path_4'; }
      	if($this->input->post('gram_id')) {  $booth_id = $this->input->post('gram_id'); $where = 'path_5';  }
      	if($this->input->post('booth_id')) {  $booth_id = $this->input->post('booth_id'); $where = 'refrence_id';  }
      
      	$level = $this->input->post('level');
      	$dayitv = $this->input->post('dayitv');
      	$pagedata = $this->input->post('pagedata');
      	
      
      	
      	$data['item'] = $this->Subadmin_model->getpeopledata3($where,$booth_id,$level,$dayitv,$pagedata);
    	return $this->load->view('admin/master/morche/allpeoplesfilter', $data);
    }
  
  
  	public function exportfilterdata($file_name = 'excel')
	{	
      	$booth_id = '';
      	$where ='*';
      	if($this->input->post('jila_id')) {  $booth_id = $this->input->post('jila_id'); $where = 'path_1';  }
      	if($this->input->post('vidhansabha_id')) {  $booth_id = $this->input->post('vidhansabha_id');  $where = 'path_2'; }
      	if($this->input->post('pachayat_id')) {  $booth_id = $this->input->post('pachayat_id'); $where = 'path_3';  }
      	if($this->input->post('mandal_id')) {  $booth_id = $this->input->post('mandal_id');  $where = 'path_4'; }
      	if($this->input->post('gram_id')) {  $booth_id = $this->input->post('gram_id'); $where = 'path_5';  }
      	if($this->input->post('booth_id')) {  $booth_id = $this->input->post('booth_id'); $where = 'refrence_id';  }
      
      	$level = $this->input->post('level');	
      	$dayitv = $this->input->post('dayitv');
      	$pagedata = $this->input->post('pagedata');
      	
        $booth_details = $this->Subadmin_model->getpeopledata3($where,$booth_id,$level,$dayitv,$pagedata);
		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=" . $file_name. ".xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		echo '<table border="1">
        	  <tr>
                <th>S.No.</th>
                <th>नाम</th>
                <th>बूथ</th>
                <th>दूरभाष</th>
                <th>दायित्व</th>
                <th>जन्म तिथ</th>
            </tr>';

			if (!empty($booth_details)) { $var = 0;
				foreach($booth_details as $array) { $var++;
                                                   
                    $refrence = $this->Subadmin_model->list_common_where3('master_hierarchy','id',$array['refrence_id']);
                                                   
					echo "<tr>
                        <td>" . $var . "</td>
                        <td>" . $array['name'] . "</td>
                        <td>" . $refrence[0]['name'] ?? '' . "</td>
                        <td>" . $array['contact_no'] . "</td>
                        <td>" . $array['liability'] . "</td>
                        <td>" . $array['dob'] . "</td>
                    </tr>";
				}
			}

		echo '</table>';
      
      exit;
	}
  	
  
  public function showmsg() {
      $id = $this->input->post('id');

      $sms = $this->Subadmin_model->list_common_where3('sms_templates','id',$id);

      $output = '<div class="cat action"><label><span>'.$sms[0]['message'].'</label></div>';

      echo $output;
  }
  
  
  	public function sendsms() {
  		$sendmsg = $this->input->post('sendmsg');
		$sms_template = $this->input->post('sms_template');
    	
    	$sms = $this->Subadmin_model->list_common_where3('sms_templates','id',$sms_template);
    	
    	$api_key = '463981ECBAF66F';
    	$contacts = implode(",",$sendmsg);
      	$contacts = "8826269838";
    	$from = 'HJHALA';
    	echo $sms_text = urlencode(utf8_encode($sms[0]['message'])); exit;
    	$template_id = $sms[0]['template_id'];
    	$pe_id = '1201162141462253036';
      
      	$ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, "http://smsk7.webtics.in/app/smsapi/index.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "key=".$api_key."&campaign=14920&routeid=100996&type=unicode&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text);
        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;        
    
    	//echo json_encode(['done' => '1']);
	}
  
  	public function calling()
    {
    	$data['to_number']= $to_number = $this->input->post('to_number');
      	 header("Access-Control-Allow-Origin: *"); 
         header("Access-Control-Allow-Credentials: true ");
         header("Access-Control-Allow-Methods: OPTIONS, GET, POST");
         header("Access-Control-Allow-Headers: Content-Type,Cache-Control");
      	 $post_data = array(
         'From' => '8595111819',
         'To' => '7703960005',
         "CallerId = 01143146587",
         );
      	$api_key = "8d3392faf0b4355ed843e23a0d6ef09ebad73e435f51a15d";
        $api_token = "6a776b1a805bc5f83416c5cb2cac820dcce901daeaabd6e5";
      	// currect sid
        $exotel_sid = "axepertexhibits2";
      	// incorrect sid
      	//$exotel_sid = "axepertexhibits3";
      	
      	$url = "https://" . $api_key . ":" . $api_token . "@api.exotel.com/v1/Accounts/" . $exotel_sid . "/Calls/connect"; 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));

        $http_result = curl_exec($ch);
        $error = curl_error($ch);
        $http_code = curl_getinfo($ch ,CURLINFO_HTTP_CODE);
        curl_close($ch);
      	$my_array1 = explode(" ", $http_result);
      	
      	$data['sid'] = $sid = $my_array1[5];
      	$this->session->set_userdata('sid',$sid);
      	/*
      	 $url2 = "https://" . $api_key . ":" . $api_token . "@api.exotel.com/v1/Accounts/" . $exotel_sid . "/Calls".$sid;
         $replaced = str_replace('<Sid>', '/', $url2);
        $replaced_1 = str_replace('</Sid>', '', $replaced);

        $json = file_get_contents($replaced_1, true);
        $new = simplexml_load_string($json);
        $con = json_encode($new);
        $newArr = json_decode($con, true); */
        return $this->load->view('admin/master/morche/showcall', $data);
    }
  
  	public function calling_1()
    {
          $data['id'] = $id = $this->input->post('id');
          $data['status'] = $this->input->post('status');
      	  $get_mob = $this->Subadmin_model->list_common_limit_1('calling_details','campaign_id',$id,'1');
      		$count_1 = $this->Subadmin_model->count_1('calling_details','campaign_id',$id);
      	  $data['count_1'] = $count_1+1;
      	  $count_all = $this->Subadmin_model->count_all('calling_details','campaign_id',$id);
         $data['count_all'] = $count_all;
      	if(!empty($get_mob))
        {
      	  $data['to_number'] = $get_mob[0]['mobile'];
        }
      else{
      	$data['code'] = 200;
      }
      	 header("Access-Control-Allow-Origin: *"); 
         header("Access-Control-Allow-Credentials: true ");
         header("Access-Control-Allow-Methods: OPTIONS, GET, POST");
         header("Access-Control-Allow-Headers: Content-Type,Cache-Control");
      	 $post_data = array(
         'From' => '8595111819',
         'To' => '7703960005',
         "CallerId = 01143146587",
         );
      	$api_key = "8d3392faf0b4355ed843e23a0d6ef09ebad73e435f51a15d";
        $api_token = "6a776b1a805bc5f83416c5cb2cac820dcce901daeaabd6e5";
      	$exotel_sid = "axepertexhibits2";
      	$url = "https://" . $api_key . ":" . $api_token . "@api.exotel.com/v1/Accounts/" . $exotel_sid . "/Calls/connect"; 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));

        $http_result = curl_exec($ch);
        $error = curl_error($ch);
        $http_code = curl_getinfo($ch ,CURLINFO_HTTP_CODE);
        curl_close($ch);
      	$my_array1 = explode(" ", $http_result);
      	
      	$data['sid'] = $sid = $my_array1[5];
      	$data['call_status'] = 'busy';
      	/*
      	 $url2 = "https://" . $api_key . ":" . $api_token . "@api.exotel.com/v1/Accounts/" . $exotel_sid . "/Calls".$sid;
         $replaced = str_replace('<Sid>', '/', $url2);
        $replaced_1 = str_replace('</Sid>', '', $replaced);

        $json = file_get_contents($replaced_1, true);
        $new = simplexml_load_string($json);
        $con = json_encode($new);
        $newArr = json_decode($con, true); */
      
    	return $this->load->view('admin/master/morche/showcall', $data);
    
    }
  
  public function check_status()
  {
  		/* $check_status = $this->input->post('sid');
    	$api_key = "8d3392faf0b4355ed843e23a0d6ef09ebad73e435f51a15d";
        $api_token = "6a776b1a805bc5f83416c5cb2cac820dcce901daeaabd6e5";
        $exotel_sid = "axepertexhibits2";
    	$replaced = str_replace('<Sid>', '', $check_status);
		$replaced_1 = str_replace('</Sid>', '', $replaced);
    
    	 $url2 = "https://" . $api_key . ":" . $api_token . "@api.exotel.com/v1/Accounts/" . $exotel_sid . "/Calls/".urlencode($check_status);

        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );  

        $file = file_get_contents($url2, false, stream_context_create($arrContextOptions));    
        $new = simplexml_load_string($file);
        $con = json_encode($new);
        $newArr = json_decode($con, true);
    	json_encode($newArr); */
    	//$status = $newArr['Call']['Status'];
    	$status = 'completed';
    	if($status == 'completed')
        {
    	echo json_encode(['status' => $status]);
        }
    else{
    	echo json_encode(['code' => 400]);
    }
       
  }
  
  public function save_call_data()
  {
    	$data['Status'] = $this->input->post('status');
    	$mobile_no = $this->input->post('mobile');
    	$insertUser = $this->db->where('mobile',$mobile_no);
    	$insertUser = $this->db->where('campaign_id',$this->input->post('campaign_id'));
      	$insertUser = $this->db->update('calling_details', $data);
    	exit;
      	$api_key = "8d3392faf0b4355ed843e23a0d6ef09ebad73e435f51a15d";
        $api_token = "6a776b1a805bc5f83416c5cb2cac820dcce901daeaabd6e5";
        $exotel_sid = "axepertexhibits2";
    
    	$sid = $this->session->userdata('sid');
    	$replaced = str_replace('<Sid>', '', $sid);
		$replaced_1 = str_replace('</Sid>', '', $replaced);
    
    	$url2 = "https://" . $api_key . ":" . $api_token . "@api.exotel.com/v1/Accounts/" . $exotel_sid . "/Calls/".urlencode($replaced_1);

        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );  

        $file = file_get_contents($url2, false, stream_context_create($arrContextOptions));    
        $new = simplexml_load_string($file);
        $con = json_encode($new);
        $newArr = json_decode($con, true);
    	$check_sid = $this->Subadmin_model->countrow_sid('calling_details','sid',$replaced_1);
    	if($check_sid > 0)
        {
    		exit;
        }
    	else 
        {
        $data['Sid'] = !empty($newArr['Call']['Sid']) ? $newArr['Call']['Sid']:'';
    	$data['DateCreated'] = !empty($newArr['Call']['DateCreated']) ? $newArr['Call']['DateCreated']:'';
    	$data['DateUpdated'] = !empty($newArr['Call']['DateUpdated']) ? $newArr['Call']['DateUpdated']:'';
    	$data['AccountSid'] = !empty($newArr['Call']['AccountSid']) ? $newArr['Call']['AccountSid']:'';
    	$data['call_To'] = !empty($newArr['Call']['To']) ? $newArr['Call']['To']:''; 
    	$data['call_From'] = !empty($newArr['Call']['From']) ? $newArr['Call']['From']:'';
    	$data['PhoneNumberSid'] = !empty($newArr['Call']['PhoneNumberSid']) ? $newArr['Call']['PhoneNumberSid']:''; 
    	$data['Status'] =  !empty($newArr['Call']['Status']) ? $newArr['Call']['Status']:'';
    	$data['StartTime'] =  !empty($newArr['Call']['StartTime']) ? $newArr['Call']['StartTime']:'';
    	$data['EndTime'] =  !empty($newArr['Call']['EndTime']) ? $newArr['Call']['EndTime']:'';
        $data['Duration'] =  !empty($newArr['Call']['Duration']) ? $newArr['Call']['Duration']:'';
         $data['Price'] =  !empty($newArr['Call']['Price']) ? $newArr['Call']['Price']:'';
          $data['Uri'] =  !empty($newArr['Call']['Uri']) ? $newArr['Call']['Uri']:'';
          if($newArr['Call']['status'] == 'completed')
          {
          $data['RecordingUrl'] =  "https://s3-ap-southeast-1.amazonaws.com/exotelrecordings/axepertexhibits2/".$newArr['Call']['Sid'].".mp3";
          }
          else{
          	$data['RecordingUrl'] =  !empty($newArr['Call']['RecordingUrl']) ? $newArr['Call']['RecordingUrl']:'';
          }
          
    	$this->db->insert('calling_details',$data);  
          exit;
        }
   
  
  }
  public function save_call_update(){
  	
    $number = $this->input->post('to_number');
    $not_verify = $this->input->post('not_verify');
    $verify = $this->input->post('is_verify_1');
    if(!empty($not_verify))
    {
    	$data['is_verify_satus'] = $not_verify;
    }
    if(!empty($verify))
    {
    	$data['is_verify_satus'] = $verify;
    }
    $data['remark'] = $this->input->post('callremark');
    $data['is_verified'] = $this->input->post('verify');
    
    $insertUser = $this->db->where('mobile',$number);
    $insertUser = $this->db->where('campaign_id',$this->input->post('campaign_id'));
    $insertUser = $this->db->update('calling_details', $data);
    
     if ($insertUser) {
            $response = [
                'code' => 200,'message' => 'Call Record Update Succesfully',
            ];
        } else {
            $response = ['code' => 400, 'message' => 'Something went wrong'];
        }
    
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    
  
  }
  
  public function import_people_data()
  {
    error_reporting(0);
  	    require_once APPPATH . "./third_party/PHPExcel.php";
     	 $path = 'uploads/';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
    
        if (!$this->upload->do_upload('uploadFile')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }

        if (!empty($data['upload_data']['file_name'])) {
            $import_xls_file = $data['upload_data']['file_name'];
        } else {
            $import_xls_file = 0;
        }

        $inputFileName = $path . $import_xls_file;
    
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

            $flag = true;
            $i=0;

            foreach ($allDataInSheet as $key => $value) {
              	
              	if($key > 0) {
                  	if(!empty($value['A'])) {
                      	$inserdata[$i]['refrence_id'] = $value['A'];
                        $inserdata[$i]['level_id'] = 0;
                        $inserdata[$i]['name'] = $value['C'];
                        $inserdata[$i]['liability'] = $value['D'];
                        $inserdata[$i]['dayitv_id'] = $value['E'];
                      	$inserdata[$i]['dob'] = $value['F'];
                      	$inserdata[$i]['contact_no'] = $value['G'];
                      	$inserdata[$i]['image'] = $value['H'];
                      
                        //$update_data = $this->db->insert('people_data', $inserdata);
                        
                    }  
                }
              
                $i++;                
            }
          	print_r($inserdata);exit;
          
         if ($update_data) {
                echo json_encode(['inserted' => 1]);
            }
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                . '": ' . $e->getMessage());
        }
    
  }
  
  public function imp_excel()
  {
  	$this->load->library('PHPExcel');
        $path = 'uploads/';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'xlsx|xls';
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $sess = $this->session->userdata('pmsadmin');

        $id = $sess['id'];
        $role = $sess['role'];

        if (!$this->upload->do_upload('uploadFile')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }

        if (!empty($data['upload_data']['file_name'])) {
            $import_xls_file = $data['upload_data']['file_name'];
        } else {
            $import_xls_file = 0;
        }

        $inputFileName = $path . $import_xls_file;

        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

            $flag = true;
           $i = 0;

            
          foreach ($allDataInSheet as $key => $value) {
              	//print_r($value);
              	if($key > 0) {
                  	//if(!empty($value['A'])) {
                      	$inserdata['refrence_id'] = $value['A'];
                        $inserdata['level_id'] = 6;
                        $inserdata['name'] = $value['C'];
                        $inserdata['liability'] = $value['D'];
                        $inserdata['dayitv_id'] = $value['E'];
                      	$inserdata['dob'] = $value['F'];
                      	$inserdata['contact_no'] = $value['G'];
                      	$inserdata['image'] = $value['H'];
                      
                        //
                        
                   // }  
                }
              
                $i++;                
            	$update_data = $this->db->insert('people_data', $inserdata);
            }
          	

            echo json_encode(['done'=>'1']);



        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                . '": ' . $e->getMessage());
        }
  
  }
  
  public function changetabledata_1()
  {
    	$page = $this->input->post('page');
      	echo $pagedata = $this->input->post('pagedata'); exit;
    
    	$booth_id = '';
      	$where = 'level_id';
      	if($this->input->post('jila_id')) {  $booth_id = $this->input->post('jila_id'); $where = 'path_1';  }
      	if($this->input->post('vidhansabha_id')) {  $booth_id = $this->input->post('vidhansabha_id');  $where = 'path_2'; }
      	if($this->input->post('pachayat_id')) {  $booth_id = $this->input->post('pachayat_id'); $where = 'path_3';  }
      	if($this->input->post('mandal_id')) {  $booth_id = $this->input->post('mandal_id');  $where = 'path_4'; }
      	if($this->input->post('gram_id')) {  $booth_id = $this->input->post('gram_id'); $where = 'path_5';  }
      	if($this->input->post('booth_id')) {  $booth_id = $this->input->post('booth_id'); $where = 'refrence_id';  }
      
      	$level = $this->input->post('level');
      	$dayitv = $this->input->post('dayitv');
      	
      	$data['item'] = $this->Subadmin_model->getpeopledata45($pagedata,$page);
    	return $this->load->view('admin/master/morche/allpeople_data', $data);
  
  }

  
}
