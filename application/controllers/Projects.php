<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Projects extends MY_Controller
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

		$this->load->model('Projects_modal');
		$this->load->model('Subadmin_model');
		$this->load->model('Department_model');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	public function index()
	{

		if ($this->session->userdata('pmsadmin') == true) {
			$data['projectdata'] = $this->Projects_modal->pojectdata();
			$data['projectalloted'] = $this->Projects_modal->pojectalloteddata();
			$data['subadminData'] = $this->Department_model->getregionalhead();
			$data['allUser'] = $this->Projects_modal->alluser();

			return $this->load->view('admin/projects/projectlist', $data);
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
	}

	public function addproject()
	{

		$sess = $this->session->userdata('pmsadmin');
		$name = $sess['name'];
		$role = $sess['role'];
		$id = $sess['id'];

		$pname = $this->input->post('pname');
		$pdes = $this->input->post('pdes');
		$pvenue = $this->input->post('pvenue');
		$pstart_date = $this->input->post('pstart_date');
		$pend_date = $this->input->post('pend_date');
      	$purl = $this->input->post('purl');

		$pprojectm = $this->input->post('pprojectm');
      	$this->db->select('*');
        $this->db->from('master_admin');
        $this->db->where('admin_user_id',$pprojectm);
        $query = $this->db->get();
        $arr = $query->result();

        $admin_email = $arr[0]->admin_email;
       $admin_name = $arr[0]->admin_name;
		$pregional = $this->input->post('pregional');
		$alluser = $this->input->post('alluser');
      	
       	$subject = "Welcome to Axepert Exhibit Pvt Ltd.";
      	$message = "We are greatfully to inform you $admin_name,<br>$name is alloted to you $pname in Axepert Exhibit Admin Panel.<br>Start date : $pstart_date <br> End date: $pend_date <br> Project Venue: $pvenue";
		
      	

		date_default_timezone_set('Asia/Kolkata');
		$date = date('d-m-Y H:i A');

		if (($role == 'Master')) {
			$insertData = array(
				'p_name' => $pname,
				'p_des' => $pdes,
				'p_venue' => $pvenue,

				'p_start_date' => $pstart_date,
				'p_end_date' => $pend_date,
				'created_at' => $date,
				'regional_head' => $pregional,
				'project_manager' => $pprojectm,
              'purl' => $purl,
				'created_by' => $id
			);

			$insertUser =  $this->db->insert('projects', $insertData);
			$item_id = $this->db->insert_id();
			for ($i = 0; $i < count($alluser); ++$i) {


				$useradmin = $alluser[$i];

				$insertData = array(
					'project_id' => $item_id,
					'admin_user_id' => $useradmin,
					'created_by' => $id,

					'created_at' => $date
				);

				$insertUser =  $this->db->insert('project_member', $insertData);
			}
			if ($insertUser) {
            		$this->sendmail('suryapratap05021995@gmail.com',$admin_email,$subject,$message);
				echo json_encode(['done' => '1']);
			} else {
				echo json_encode(['done' => '0']);
			}
		} elseif (($role == 'Subadmin')) {

			$insertData = array(
				'p_name' => $pname,
				'p_des' => $pdes,
				'p_venue' => $pvenue,

				'p_start_date' => $pstart_date,
				'p_end_date' => $pend_date,
				'created_at' => $date,
				'regional_head' => $id,
              'purl' => $purl,
				'project_manager' => $pprojectm,
				'created_by' => $id
			);

			$insertUser =  $this->db->insert('projects', $insertData);
			$item_id = $this->db->insert_id();
			for ($i = 0; $i < count($alluser); ++$i) {
				$useradmin = $alluser[$i];

				$insertData = array(
					'project_id' => $item_id,
					'admin_user_id' => $useradmin,
					'created_by' => $id,

					'created_at' => $date
				);

				$insertUser =  $this->db->insert('project_member', $insertData);
			}
			if ($insertUser) {
              $this->sendmail('suryapratap05021995@gmail.com',$admin_email,$subject,$message);
				echo json_encode(['done' => '1']);
			} else {
				echo json_encode(['done' => '0']);
			}
		} else {
			$insertData = array(
				'p_name' => $pname,
				'p_des' => $pdes,
				'p_venue' => $pvenue,

				'p_start_date' => $pstart_date,
				'p_end_date' => $pend_date,
				'created_at' => $date,
				'purl' => $purl,
				'project_manager' => $id,
				'created_by' => $id,
			);

			$insertUser =  $this->db->insert('projects', $insertData);
			$item_id = $this->db->insert_id();
			for ($i = 0; $i < count($alluser); ++$i) {
				$useradmin = $alluser[$i];

				$insertData = array(
					'project_id' => $item_id,
					'admin_user_id' => $useradmin,
					'created_by' => $id,

					'created_at' => $date
				);

				$insertUser =  $this->db->insert('project_member', $insertData);
			}
			if ($insertUser) {
              $this->sendmail('suryapratap05021995@gmail.com',$admin_email,$subject,$message);
				echo json_encode(['done' => '1']);
			} else {
				echo json_encode(['done' => '0']);
			}
		}
	}

	public function deleteprojects($id)
	{
		$id = $this->input->post("p_id");
		$this->Projects_modal->deleteproject($id);
		$this->db->query("DELETE FROM  project_member where project_id = ?",[$id]);
		$this->db->query("DELETE FROM  project_allot_show_admin where project_id = ?",[$id]);
		redirect('Projects');
	}

	public function changecallerpass()
	{
		$id =  $this->input->post('admin_user_id');
		$cur_password =  $this->input->post('cur_password');
		$cpassword = md5($cur_password);
		$new_password = $this->input->post('new_password');

		$npassword = md5($new_password);

		date_default_timezone_set('Asia/Kolkata');
		$date = date('d-m-Y H:i A');

		$this->db->where('admin_password', $cpassword);
		$this->db->where('admin_user_id', $id);
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

	public function projectlistedit()
	{

		$id =  $this->input->post('id');
		$data['projectdata'] = $this->Projects_modal->pojectdata();
		$data['projectalloted'] = $this->Projects_modal->pojectalloteddata();
		$data['subadminData'] = $this->Subadmin_model->masterData();
		$data['allUser'] = $this->Projects_modal->alluser();
		$data['content'] = $this->Projects_modal->projectedit($id);


		$this->load->view('admin/projects/editprojectlistmodel', $data);
	}

	public function updateprojectlist()
	{

		$id =  $this->input->post('p_id');

		$pname = $this->input->post('pname');
		$pdes = $this->input->post('pdes');
		$pvenue = $this->input->post('pvenue');
		$pstart_date = $this->input->post('pstart_date');
		$pend_date = $this->input->post('pend_date');

		$pprojectm = $this->input->post('pprojectm');
		$pregional = $this->input->post('pregional');
		$alluser = $this->input->post('alluser');
		date_default_timezone_set('Asia/Kolkata');
		$date = date('d-m-Y H:i A');

		$updatedata = array(
			'p_name' => $pname,
			'p_des' => $pdes,
			'p_venue' => $pvenue,

			'p_start_date' => $pstart_date,
			'p_end_date' => $pend_date,
			'created_at' => $date,
			'regional_head' => $pregional,
			'project_manager' => $pprojectm,
			'created_by' => $id
		);


		$insertUser = $this->db->where('p_id', $id);
		$insertUser = $this->db->update('projects', $updatedata);

		if ($insertUser) {
			echo json_encode(['inserted' => '1']);
		} else {
			echo json_encode(['inserted' => '0']);
		}
	}

	public function update()
	{


		$p_id = $_REQUEST['p_id'];
		date_default_timezone_set('Asia/Kolkata');
		$date = date('d-m-Y H:i A');


		$update = array(
			'project_status'  => 'Complete',
			'project_updated_at' => $date
		);

		$this->db->where('p_id', $p_id);
		$this->db->update('projects', $update);

		redirect($_SERVER['REQUEST_URI'], 'refresh');
	}


	public function updatedisable()
	{


		$p_id = $_REQUEST['p_id'];
		date_default_timezone_set('Asia/Kolkata');
		$date = date('d-m-Y H:i A');


		$update = array(
			'project_status'  => 'Cancel By Admin',
			'project_updated_at' => $date
		);

		$this->db->where('p_id', $p_id);
		$this->db->update('projects', $update);

		redirect($_SERVER['REQUEST_URI'], 'refresh');
	}

	public function pending()
	{


		$p_id = $_REQUEST['p_id'];
		date_default_timezone_set('Asia/Kolkata');
		$date = date('d-m-Y H:i A');


		$update = array(
			'project_status'  => 'Pending',
			'project_updated_at' => $date
		);

		$this->db->where('p_id', $p_id);
		$this->db->update('projects', $update);

		redirect($_SERVER['REQUEST_URI'], 'refresh');
	}

	public function userdetail()
	{
		$id = $this->input->post('userid');
		$data = $this->Projects_modal->getprojectmanager($id);
		$output = '';

		foreach ($data as $value) {
			$output .= "<option value='" . $value['admin_user_id'] . "'>" . $value['admin_name'] . "</option>";
		}

		echo json_encode($output);
	}

	public function userdetailedit()
	{
		$id = $this->input->post('userid');
		$data = $this->Projects_modal->getprojectmanager($id);
		$output = '';

		foreach ($data as $value) {
			$output .= "<option value ='" . $value['admin_user_id'] . "'>" . $value['admin_name'] . "</option>";
		}

		echo json_encode($output);
	}
	public function autobackup()
	{

		$this->load->dbutil();
		$filename = "db-" . date("Y-m-d_H-i-s") . ".sql";
		$prefs = array(
			'ignore' => array(),
			'format' => 'txt',
			'filename' => 'mybackup.sql',
			'add_drop' => TRUE,
			'add_insert' => TRUE,
			'newline' => "\n"
		);
		$backup = $this->dbutil->backup($prefs);
		$this->load->helper('file');
		write_file('./db/' . $filename, $backup);
		echo "success";
	}
}
