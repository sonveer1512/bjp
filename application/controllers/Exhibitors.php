<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Exhibitors extends MY_Controller
{

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

		$this->load->model('Exhibitors_model');
      $this->load->model('Project_show_model');
      $this->load->model('Department_model');
		$this->load->model('Service_model');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	public function index()
	{

		if ($this->session->userdata('pmsadmin') == true) {
			$data['exhibitorsData'] = $this->Exhibitors_model->userdata();
			// echo $this->db->last_query(); die();
			$data['servicesData'] = $this->Exhibitors_model->getservicelist();
           $data['subadminData'] = $this->Department_model->getregionalhead();
          $data['projectlist'] = $this->Project_show_model->projectlist();
			return $this->load->view('admin/exhibitors/exhibitors', $data);
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
	}

	public function addexhibitors()
	{
		$sess = $this->session->userdata('pmsadmin');
            $name = $sess['name'];
            $role = $sess['role'];
            $id = $sess['id'];
		$sess = $this->session->userdata('pmsadmin');
		$name = $sess['name'];
		$role = $sess['role'];
		$id = $sess['id'];
		$ex_name = $this->input->post('ex_name');
		$exorg = $this->input->post('admin_exhibitor_organization');
		$exchex = $this->input->post('admin_exhibitor_chief_executive');
		$exadminpass = $this->input->post('admin_password');
		$password = md5($exadminpass);
		$exadmincontact = $this->input->post('admin_contact');
		$admin_role = $this->input->post('admin_role');
		$exadminadd = $this->input->post('admin_address');
		$exdes = $this->input->post('admin_exhibitors_designation');
		$exadminweb = $this->input->post('admin_exhibit_website');
		$exchexcontact = $this->input->post('admin_exhibit_contact_executive');
		$exadminemail = $this->input->post('admin_email');
		$ex_title = $this->input->post('ex_title');
		$ex_image = $this->input->post('ex_image');
		$ex_services = $this->input->post('ex_services');
		$ex_content = $this->input->post('ex_content');
		$ex_address = $this->input->post('ex_address');
		$totalamount = $this->input->post('totalamount');
		 $admin_name=$this->input->post('ex_name');
      $pregional=$this->input->post('pregional');
      $projectlist=$this->input->post('projectlist');
         $nmsg = $name. ' added new exhibitor ' .$exadminemail;
      $subject = "Welcome to Axepert Exhibit Pvt Ltd.";
      	$message = "We are greatfully to inform you ($exadminemail),<br>$name is added you $exadminemail in Axepert Exhibit Admin Panel as a Exhibitiors.Please contact to admin for approve Your account and then, <br> Click here for login https://axepertexhibits.com/AdminPanelPMS2/";
		date_default_timezone_set('Asia/Kolkata');
		$date = date('d-m-Y H:i A');

		//check mail
		$this->db->where('admin_email', $exadminemail);
		$query = $this->db->get('master_admin');
		if ($query->num_rows() > 0) {
			echo json_encode(['email' => '0']);
		} else {
          if($role == 'Master')
          {
			$insertData = array(
				'admin_email' => $exadminemail,
				'admin_name'=> $admin_name,
				'admin_password' => $password,

				'admin_contact' => $exadmincontact,
				'admin_role' => $admin_role,
				'admin_address' => $exadminadd,

				'admin_address' => $exadminadd,
				'admin_status'=>'Disable',
              'user_created_by'=>$id,
              'user_regional_head' =>$pregional 

			);

			$insertUser =  $this->db->insert('master_admin', $insertData);
			$item_id = $this->db->insert_id();
			if ($_FILES['ex_image']['name'] != "") {
				$path_parts = pathinfo($_FILES['ex_image']['name']);
				$image_path = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
				$imgname = $image_path;

				$source =  $_FILES['ex_image']['tmp_name'];
				$originalpath  = "webupload/" . $imgname;

				move_uploaded_file($source, $originalpath);
			} else {
				$imgname = '';
			}
			$insertData = array(
				'ex_organization' => $exorg,
				'ex_ch_executive' => $exchex,
				'ex_designation' => $exdes,
				'ex_name'=>$ex_name,
				'ex_contact_executive' => $exchexcontact,
				'ex_email' => $exadminemail,
				'ex_contact' => $exadmincontact,
				'ex_website' => $exadminweb,
				'ex_title' => $ex_title,
				'ex_content' => $ex_content,
				'created_by' => $id,
				'ex_created_at' => $date,
				'master_admin_id' => $item_id,
				'ex_address' => $exadminadd,
				'ex_image' => $imgname,
				'ex_services_amount' => $totalamount

			);
			$insertUser =  $this->db->insert('exhibitors', $insertData);


			$ex_id = $this->db->insert_id();

			for ($i = 0; $i < count($ex_services); ++$i) {
				$services = $ex_services[$i];
				$first = (explode("+", $services));

				$insertDatas = [
					'service_id' => $first[0],
					'exhibitor_id' => $ex_id,
					'ex_services_amount' => $totalamount



				];

				$insertUser =  $this->db->insert('exhibitors_services', $insertDatas);
			}
            
           
				$projectlist=$this->input->post('projectlist');
			for ($i = 0; $i < count($projectlist); ++$i) {
				$project = $projectlist[$i];
			

				$insertDatas = [
					'project_id' => $project,
					'exhibitor_id' => $ex_id,
					'ex_project_created_by' => $id



				];

				$insertUser =  $this->db->insert('exhibitor_projects', $insertDatas);
			}

			  $insertData = array('member_created_to'=>$item_id,
								'member_created_by'=>$id,
								'notification_msg'=>$nmsg
							
           	 );
      
           	 $insertUser =  $this->db->insert('notification',$insertData);

          }
          else{
          $insertData = array(
				'admin_email' => $exadminemail,
				'admin_name'=> $admin_name,
				'admin_password' => $password,

				'admin_contact' => $exadmincontact,
				'admin_role' => $admin_role,
				'admin_address' => $exadminadd,

				'admin_address' => $exadminadd,
				'admin_status'=>'Disable',
              'user_created_by'=>$id,
              'user_regional_head' =>$id 

			);

			$insertUser =  $this->db->insert('master_admin', $insertData);
			$item_id = $this->db->insert_id();
			if ($_FILES['ex_image']['name'] != "") {
				$path_parts = pathinfo($_FILES['ex_image']['name']);
				$image_path = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
				$imgname = $image_path;

				$source =  $_FILES['ex_image']['tmp_name'];
				$originalpath  = "webupload/" . $imgname;

				move_uploaded_file($source, $originalpath);
			} else {
				$imgname = '';
			}
			$insertData = array(
				'ex_organization' => $exorg,
				'ex_ch_executive' => $exchex,
				'ex_designation' => $exdes,
				'ex_name'=>$ex_name,
				'ex_contact_executive' => $exchexcontact,
				'ex_email' => $exadminemail,
				'ex_contact' => $exadmincontact,
				'ex_website' => $exadminweb,
				'ex_title' => $ex_title,
				'ex_content' => $ex_content,
				'created_by' => $id,
				'ex_created_at' => $date,
				'master_admin_id' => $item_id,
				'ex_address' => $exadminadd,
				'ex_image' => $imgname,
				'ex_services_amount' => $totalamount

			);
			$insertUser =  $this->db->insert('exhibitors', $insertData);


			$ex_id = $this->db->insert_id();

			for ($i = 0; $i < count($ex_services); ++$i) {
				$services = $ex_services[$i];
				$first = (explode("+", $services));

				$insertDatas = [
					'service_id' => $first[0],
					'exhibitor_id' => $ex_id,
					'ex_services_amount' => $totalamount



				];

				$insertUser =  $this->db->insert('exhibitors_services', $insertDatas);
			}
            
            

			for ($i = 0; $i < count($projectlist); ++$i) {
				$project = $projectlist[$i];
				$first = (explode("+", $project));

				$insertDatas = [
					'project_id' => $project,
					'exhibitor_id' => $ex_id,
					'ex_project_created_by' => $id



				];

				$insertUser =  $this->db->insert('exhibitor_projects', $insertDatas);
			}


			  $insertData = array('member_created_to'=>$item_id,
								'member_created_by'=>$id,
								'notification_msg'=>$nmsg
							
           	 );
      
           	 $insertUser =  $this->db->insert('notification',$insertData);

          
          
          
          }
			if ($insertUser) {
              $this->sendmail('webticsindia@gmail.com',$exadminemail,$subject,$message);
				echo json_encode(['done' => '1']);
			} else {
				echo json_encode(['done' => '0']);
			}
		}
	}

	public function deleteexeadmin($id)
	{
		$id = $this->input->post("admin_user_id");
		//get the exhibitor  id from the speaker table
		$getexhibitor_id = $this->db->query("SELECT * FROM exhibitors where master_admin_id = ? ", [$id])->result();
		$exhibtorid = $getexhibitor_id[0]->exhibitors_id ;
		$this->db->where('exhibitor_id', $exhibtorid);
		$this->db->delete('exhibitors_services');
      $this->db->where('exhibitor_id', $exhibtorid);
		$this->db->delete('exhibitor_projects');
      $this->db->where('exhibitor_id', $exhibtorid);
		$this->db->delete('exhibitor_projects');
      
       $this->db->where('exhibitors_id', $exhibtorid);
		$this->db->delete('exhibitors');

		$this->Exhibitors_model->deleteexeadmin($id);
		redirect('Exhibitors');
	}

	public function updateexhadminpass()
	{
		$id =  $this->input->post('admin_user_id');
		$cur_password =  $this->input->post('cur_password');
		$cpassword = md5($cur_password);
		$new_password = $this->input->post('new_password');

		$npassword = md5($new_password);

		date_default_timezone_set('Asia/Kolkata');
		$date = date('d-m-Y H:i A');

		$this->db->where('admin_password', $cpassword);
		$query = $this->db->get('master_admin');

		if ($query->num_rows() > 0) {

			$updatedata = array(
				'admin_password' => $npassword,

				'updated_at' => $date

			);


			$insertUser = $this->db->where('admin_user_id', $id);
			$insertUser = $this->db->update('master_admin', $updatedata);

			if ($insertUser) {
				echo json_encode(['inserted' => '1']);
			} else {
				echo json_encode(['inserted' => '0']);
			}
		} else {

			echo json_encode(['password' => '0']);
		}
	}

	public function exhibitorsedit()
	{
		$id =  $this->input->post('id');
		$data['servicesData'] = $this->Exhibitors_model->getservicelist();
		$data['content'] = $this->Exhibitors_model->exhibitoreditmodel($id);
		$services = $this->Exhibitors_model->exhibitor_services($id);
		foreach ($services as $value) {
			$serve[] = $value['service_id'];
		}
		$data['services'] = $serve;
		$this->load->view('admin/exhibitors/exhibit_edit_modal', $data);
	}

	public function updateexhibit()
	{
		$sess = $this->session->userdata('pmsadmin');
		$udpdatedbyid = $sess['id'];


		$id =  $this->input->post('exhibitors_id');
		$exorg = $this->input->post('admin_exhibitor_organization');
		$exname = $this->input->post('ex_name');
		$exchex = $this->input->post('admin_exhibitor_chief_executive');
		$exadmincontact = $this->input->post('admin_contact');
		$admin_role = $this->input->post('admin_role');
		$exadminadd = $this->input->post('admin_address');
		$exdes = $this->input->post('admin_exhibitors_designation');
		$exadminweb = $this->input->post('admin_exhibit_website');
		$exchexcontact = $this->input->post('admin_exhibit_contact_executive');
		$exadminemail = $this->input->post('admin_email');
		$ex_title = $this->input->post('ex_title');
		$ex_services = $this->input->post('ex_services');

		$ex_content = $this->input->post('ex_content');
		$ex_address = $this->input->post('ex_address');
		$totalamount = $this->input->post('totalamount');
		$imgname = $this->input->post('ex_image');
		date_default_timezone_set('Asia/Kolkata');
		$date = date('d-m-Y H:i A');
		if ($_FILES['ex_image']['name'] != "") {

			$path_parts = pathinfo($_FILES['ex_image']['name']);
			$image_path = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
			$imgname = $image_path;

			$source =  $_FILES['ex_image']['tmp_name'];
			$originalpath  = "webupload/" . $imgname;

			move_uploaded_file($source, $originalpath);
		}

		for ($i = 0; $i < count($ex_services); ++$i) {
			$services = $ex_services[$i];
			$first = (explode("+", $services));

			//now check that  the service  is already purchased  or not'
			$check = $this->db->query("SELECT *	 FROM  exhibitors_services WHERE exhibitor_id = ?   AND  service_id = ? ", array($id, $first[0]));
			if ($check->num_rows() > 0) {

				$updatedData = array(
					'ex_organization' => $exorg,
					'ex_name' => $exname,
					'ex_ch_executive' => $exchex,
					'ex_designation' => $exdes,
					'ex_contact_executive' => $exchexcontact,
					'ex_email' => $exadminemail,
					'ex_contact' => $exadmincontact,
					'ex_website' => $exadminweb,
					'ex_title' => $ex_title,
					'ex_image' => $imgname,
					'ex_content' => $ex_content,
					'updated_by' => $udpdatedbyid,
					'ex_updated_at' => $date,
					'ex_address' => $exadminadd,
					// 'ex_services_amount'=>$totalamount

				);
				$this->db->where('exhibitors_id', $id);

				$this->db->update('exhibitors', $updatedData);
			} else {

				$insertData = [
					'exhibitor_id' => $id,
					'service_id' => $first[0],
					'ex_services_amount' => $totalamount
				];
				$updatedDatas = array(
					'ex_organization' => $exorg,
					'ex_ch_executive' => $exchex,
					'ex_designation' => $exdes,
					'ex_name' => $exname,
					'ex_contact_executive' => $exchexcontact,
					'ex_email' => $exadminemail,
					'ex_contact' => $exadmincontact,
					'ex_website' => $exadminweb,
					'ex_title' => $ex_title,
					'ex_image' => $imgname,
					'ex_content' => $ex_content,
					'updated_by' => $udpdatedbyid,
					'ex_updated_at' => $date,
					'ex_address' => $exadminadd,
					'ex_services_amount' => $totalamount

				);
				$updateServiceAmount = [
					'ex_services_amount' => $totalamount
				];
				$this->db->where('exhibitors_id', $id);
				$this->db->update('exhibitors', $updatedDatas);
				$this->db->where('exhibitor_id', $id);
				$this->db->update('exhibitors_services', $updateServiceAmount);

				$this->db->insert('exhibitors_services', $insertData);
			}
		}
		echo  json_encode(['inserted' => '1']);
	}


	public function update()
	{
		$admin_user_id = $_REQUEST['admin_user_id'];
      	$sess = $this->session->userdata('pmsadmin');
		$name = $sess['name'];
		$role = $sess['role'];
		$id = $sess['id'];
		$update = array(
			'admin_status'  => 'Enable'
		);

		$this->db->where('admin_user_id', $admin_user_id);
		$this->db->update('master_admin', $update);
		$update = array(
        'notification_msg'  => 'Your Account is approved',
         'admin_role' => 'Master'
        );
        $this->db->where('member_created_to',$admin_user_id);
        $this->db->update('notification',$update);
      $insert =array(
      'notification_msg'  => 'Your Account is approved',
         'admin_role' => 'Subadmin',
      'member_created_to'=> $admin_user_id
        );
       
        $this->db->insert('notification',$insert);

		redirect($_SERVER['REQUEST_URI'], 'refresh');
	}


	public function updatedisable()
	{


		$admin_user_id = $_REQUEST['admin_user_id'];



		$update = array(
			'admin_status'  => 'Disable'
		);

		$this->db->where('admin_user_id', $admin_user_id);
		$this->db->update('master_admin', $update);

		redirect($_SERVER['REQUEST_URI'], 'refresh');
	}
  
 public function paymentcomplete() {
		$sess = $this->session->userdata('pmsadmin');
		$name = $sess['name'];
		$role = $sess['role'];
		$id = $sess['id'];
		$payment_status = $_REQUEST['paymentstatus'];

		$admin_user_id = $_REQUEST['admin_user_id'];
		$ex_name = $_REQUEST['ex_name'];
		
		$msg = "The Payment is $payment_status for $ex_name";
		
		$update = array(
			'payment_status'  => $_REQUEST['paymentstatus']
		);

		$this->db->where('master_admin_id', $admin_user_id);
		$this->db->update('exhibitors', $update);

		$insertnotofication = array(
			'notification_msg' => $msg,
			'admin_role' => 'Master'
		);

		$this->db->insert('notification',$insertnotofication);

		$insertnotofication = array(
			'notification_msg' => $msg,
			'admin_role' => 'Subadmin'
		);

		$this->db->insert('notification',$insertnotofication);

		redirect($_SERVER['REQUEST_URI'], 'refresh');
	}

}
