 <?php
  if (!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

  class Subadmin_model extends CI_Model

  {

    public function __construct()

    {

      parent::__construct();
    }

    public function takeUser($admin_email, $admin_password, $admin_role)

    {

      $this->db->select('*');

      $this->db->from('master_admin');

      $this->db->where('admin_email', $admin_email);

      $this->db->where('admin_password', $admin_password);

      $this->db->where('admin_status', 'Enable');
      $this->db->where('admin_role', $admin_role);

      $query = $this->db->get();

      return $query->num_rows();
    }
    
    public function get_count($table) {
        return $this->db->count_all($table);
    }
    
    public function list_common_limit($table,$where,$id,$limit,$where1,$id1)
    {
    	$this->db->select('*');
      $this->db->from($table);
	  $this->db->where('flag !=', '2');
      $this->db->where($where,$id);
      $this->db->where($where1, $id1);
      $this->db->limit($limit);
      $this->db->order_by('id', 'asc');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
    
    public function list_common_limit_1($table,$where,$id,$limit)
    {
    	$this->db->select('*');
      $this->db->from($table);
	  $this->db->where('flag !=', '2');
      $this->db->where($where,$id);
      $this->db->where('Status !=','completed');
      $this->db->limit($limit);
      $this->db->order_by('id', 'asc');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
    
    public function count_1($table,$where,$id)
    {
    	$this->db->select('*');
      $this->db->from($table);
	  $this->db->where('flag !=', '2');
      $this->db->where($where,$id);
      $this->db->where('Status !=','');
      $this->db->order_by('id', 'asc');
      $query = $this->db->get();
      $result = $query->num_rows();
      return $result;
    
    
    }
   
    
    public function count_all($table,$where,$id)
    {
    	$this->db->select('*');
      $this->db->from($table);
	  $this->db->where('flag !=', '2');
      $this->db->where($where,$id);
      $this->db->order_by('id', 'asc');
      $query = $this->db->get();
      $result = $query->num_rows();
      return $result;
    }

    public function list_common($table)
    {
      $this->db->select('*');
      $this->db->from($table);

      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
    public function list_common_shop($table)
    {
      $this->db->select('*');
      $this->db->from($table);
	  $this->db->where('flag !=', '2');
      $this->db->order_by('id', 'desc');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }

    public function insert_common($table,$data){
      $this->db->insert($table,$data);
      return $this->db->insert_id();
    }

    public function countrowwhere($table,$id)
    {
      $this->db->select('*');
      $this->db->from($table);
      $this->db->where('parent_id', $id);
      $this->db->where('flag', '0');
      $query = $this->db->get();
      return $query->num_rows();
    }


    public function check_hierarchy($parent_id, $title)
  {
    $this->db->select('*');
    $this->db->from('master_hierarchy');
    $this->db->where('parent_id', $parent_id);
    $this->db->where('name', $title);
    $query = $this->db->get();
    if ($query->num_rows() == 1) {
      return $query->num_rows();
    } else {
      return FALSE;
    }
  }

    public function countrow($table, $where, $id)
    {
      $this->db->select('*');
      $this->db->from($table);
      $this->db->where($where, $id);
      $this->db->where('flag', '0');


      $query = $this->db->get();
      return $query->num_rows();
    }
    
    public function countrow_sid($table, $where, $id)
    {
      $this->db->select('*');
      $this->db->from($table);
      $this->db->where($where, $id);
      $query = $this->db->get();
      return $query->num_rows();
    }

    public function list_common_where3($table, $where, $id)
    {
      $this->db->select('*');
      $this->db->where($where, $id);
      $this->db->where('flag', '0');
      $this->db->order_by('id', 'asc');
      $this->db->from($table);
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
    
    
    public function list_common_exactdata($table, $where, $id,$limit)
    {
      $this->db->select('id, refrence_id, name, liability, dob, contact_no, uploaded_from, image');
      $this->db->where($where, $id);
      $this->db->where('flag', '0');
      $this->db->order_by('id', 'asc');
      $this->db->limit($limit);
      $this->db->from($table);
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
    
    
    public function getmorchapeople($id, $morcha_id)
    {
      $this->db->select('*');
      $this->db->where('refrence_id', $id);
      $this->db->where('morcha_id', $morcha_id);
      $this->db->where('flag', '0');
      $this->db->order_by('dayitv_id', 'asc');
      $this->db->from('morcha_people');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
    
    
    public function getpeopledata2($id, $level,$dayitv,$page_data)
    {
      $this->db->select('*');
      
      if(!empty($id)) {
      	$this->db->where('refrence_id', $id);
      }
        
      if(!empty($level)) {
        if($page_data == 'morcha_people') {
        	$this->db->where('morcha_id', $level);
        }else{
        	$this->db->where('level_id', $level);
        }
      }
      
      if(!empty($dayitv)) {
      	$this->db->where('dayitv_id', $dayitv);
      }
      
      $this->db->where('flag', '0');
      $this->db->order_by('dayitv_id', 'asc');
      $this->db->from($page_data);
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
    
    
    
    public function getpeopledata3($where, $id, $level,$dayitv,$page_data)
    {
      $this->db->select('*');
      
      if(!empty($id)) {
      	$this->db->where($where, $id);
      }
       
      if(!empty($dayitv)) {
      	$this->db->where('dayitv_id', $dayitv);
      }
      
      $this->db->where('flag', '0');
      $this->db->order_by('refrence_id', 'asc');
      $this->db->from($page_data);
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
    
    public function getpeopledata45($page_data,$page)
    {
      $offset = 500*$page;
      $limit = 500;
      $this->db->select('*');
      
      if(!empty($id)) {
      	$this->db->where($where, $id);
      }
       
      if(!empty($dayitv)) {
      	$this->db->where('dayitv_id', $dayitv);
      }
      
      $this->db->where('flag', '0');
      $this->db->order_by('refrence_id', 'asc');
      $this->db->limit($limit,$offset);
      $this->db->from($page_data);
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
    


    public function userData($admin_email)

    {

      $this->db->select('admin_email');



      $this->db->where('admin_email', $admin_email);

      $query = $this->db->get('master_admin');

      return $query->row();
    }

    public function masterData()

    {

      $this->db->select('*');
      $this->db->where('admin_role', 'Subadmin');
      $this->db->where('flag', '0');
      // $this->db->where('admin_status','Enable');
      $query = $this->db->get('master_admin');

      return $query;
    }

    public function supervisordata()

    {

      $this->db->select('*');
      $this->db->where('admin_role', 'Supervisor');
      // $this->db->where('admin_status','Enable');
      $query = $this->db->get('master_admin');

      return $query;
    }
    public function deletesubadmin($id)
    {

      $this->db->where('admin_user_id', $id);
      $this->db->set('flag', '1');
      $this->db->update('master_admin');
    }
    public function deletesubadminnagar($id)
    {

      $this->db->where('id', $id);
      $this->db->set('flag', '1');
      $this->db->update('pachayatsimiti');
    }
    public function deletesubadminpan($id)
    {

      $this->db->where('id', $id);
      $this->db->set('flag', '1');
      $this->db->update('pachayatsimiti');
    }

    public function deletegram($id)
    {
      $this->db->where('id', $id);
      $this->db->delete('gramdetail');
    }

    public function deleteward($id)
    {
      $this->db->where('id', $id);
      $this->db->set('flag', '1');
      $this->db->update('grampanchyat');
    }

    public function deletesubadmin1($id)
    {
      $this->db->where('id', $id);
      $this->db->delete('grampanchyat');
    }

    public function subadmineditmodel($id)
    {
      // $id = $this->input->get("admin_user_id");

      $this->db->select('*');
      $this->db->from('pachayatsimiti');
      $this->db->where('id', $id);
      $this->db->where('panchayat', '1');
      $this->db->last_query();
      $query = $this->db->get();

      return $query->result_array();
    }

    public function editgram($id)
    {
      // $id = $this->input->get("admin_user_id");

      $this->db->select('*');
      $this->db->from('gramdetail');
      $this->db->where('id', $id);

      $this->db->last_query();
      $query = $this->db->get();

      return $query->result_array();
    }

    public function editward($id)
    {
      // $id = $this->input->get("admin_user_id");

      $this->db->select('*');
      $this->db->from('grampanchyat');
      $this->db->where('id', $id);

      $this->db->last_query();
      $query = $this->db->get();

      return $query->result_array();
    }
    public function subadmineditmodel1($id)
    {
      // $id = $this->input->get("admin_user_id");

      $this->db->select('*');
      $this->db->from('grampanchyat');
      $this->db->where('id', $id);

      $this->db->last_query();
      $query = $this->db->get();

      return $query->result_array();
    }
    
    
    public function update_common($table, $data, $where, $id)
	{
		$this->db->where($where, $id);
		$this->db->update($table, $data);
		return true;
	}
    

    public function nagarpalikaedit($id)
    {
      // $id = $this->input->get("admin_user_id");

      $this->db->select('*');
      $this->db->from('pachayatsimiti');
      $this->db->where('id', $id);
      $this->db->where('panchayat', '2');
      $this->db->last_query();
      $query = $this->db->get();

      return $query->result_array();
    }

    public function supervisoreditmodel($id)
    {
      // $id = $this->input->get("admin_user_id");

      $this->db->select('*');
      $this->db->from('master_admin');
      $this->db->where('admin_user_id', $id);
      $this->db->last_query();
      $query = $this->db->get();

      return $query->result_array();
    }

    public function usereditmodel($id)
    {
      // $id = $this->input->get("admin_user_id");
      $this->db->select('*');
      $this->db->from('bjpdetail');
      $this->db->where('id', $id);
      $this->db->last_query();
      $query = $this->db->get();
      return $query->result_array();
    }




    //filer by name


    public function getname($postData = null)
    {

      $response = array();
      $draw = $postData['draw'];
      $start = $postData['start'];
      $rowperpage = $postData['length']; // Rows display per page
      $columnIndex = $postData['order'][0]['column']; // Column index
      $columnName = $postData['columns'][$columnIndex]['data']; // Column name
      $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
      $searchValue = $postData['search']['value']; // Search value

      $name_search = $postData['name_search'];

      $search_arr = array();
      $searchQuery = "";

      //  if($searchName != ''){
      //     $search_arr[] = " name like '%".$name_search."%' ";
      //  }
      //  if(count($search_arr) > 0){
      //     $searchQuery = implode(" and ",$search_arr);
      //  }

      ## Total number of records without filtering
      $this->db->select('count(*) as allcount');
      $this->db->where('admin_role', 'Regional');
      $records = $this->db->get('master_admin')->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $this->db->select('count(*) as allcount');
      if ($searchQuery != '')
        $this->db->where($searchQuery);
      $this->db->where('admin_role', 'Regional');
      $records = $this->db->get('master_admin')->result();
      $totalRecordwithFilter = $records[0]->allcount;

      ## Fetch records
      $this->db->select('*');
      if ($searchQuery != '')
        $this->db->where($searchQuery);
      $this->db->where('admin_role', 'Regional');
      $this->db->order_by($columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('master_admin')->result();

      $data = array();

      foreach ($records as $record) {

        $data[] = array(
          "admin_name" => $record->admin_name,
          "admin_email" => $record->admin_email,
          "admin_contact" => $record->admin_contact,
          "created_at" => $record->created_at

        );
      }


      ## Response
      $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
      );

      return $response;
    }


   public function grampanchayatdata($table, $limit = null, $offset = null)
    {
      $this->db->select('*');
      $this->db->from($table);
     
      $this->db->where('flag', '0');

      if (!empty($limit)) {
        $this->db->limit($limit, $offset);
      }

      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }

   public function gramdata($table, $limit = null, $offset = null)
    {
      $this->db->select('*');
      $this->db->from($table);
    
      $this->db->where('flag', '0');

      if (!empty($limit)) {
        $this->db->limit($limit, $offset);
      }

      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }

    public function userdata1($table, $where, $id, $limit = null, $offset = null)
    {
      $this->db->select('*');
      $this->db->from($table);
      $this->db->where($where, $id);


      if (!empty($limit)) {
        $this->db->limit($limit, $offset);
      }

      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }


    public function bjpdatalist($table, $where, $id, $limit = null, $offset = null)
    {
      $this->db->select('*');
      $this->db->from($table);
      $this->db->where($where, $id);
       $this->db->where('flag', '0');


      if (!empty($limit)) {
        $this->db->limit($limit, $offset);
      }

      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }

    public function bjpdatalist1($table, $where, $id, $limit = null, $offset = null)
    {
      $this->db->select('id');
      $this->db->from($table);
      $this->db->where($where, $id);

      if (!empty($limit)) {
        $this->db->limit($limit, $offset);
      }

      $query = $this->db->get();
      $result = $query->num_rows();
      return $result;
    }

    public function userdata2($table, $where, $id, $limit = null, $offset = null)
    {
      $this->db->select('id');
      $this->db->from($table);
      $this->db->where($where, $id);

      if (!empty($limit)) {
        $this->db->limit($limit, $offset);
      }

      $query = $this->db->get();
      $result = $query->num_rows();
      return $result;
    }


    public function filterdate($startdate, $enddate)
    {
      $this->db->select('*');
      $this->db->from('bjpdetail');
      $this->db->where('LEFT(created_at,10) BETWEEN "' . $startdate . '" and "' . $enddate . '"');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }

    public function searchdata($content)
    {
      $this->db->select('*');
      $this->db->from('bjpdetail');
      $this->db->or_like('name', $content);
      $this->db->or_like('f_name', $content);
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
    
    public function list_common_like()
    {
      $this->db->select('*');
      $this->db->from('master_hierarchy');
      $this->db->or_like('name', 'बूथ');
      $this->db->where('flag', '0');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }

    public function fetch_is_panchayat_data($table, $where, $id, $limit = null, $offset = null)
    {
      $this->db->select('*');
      $this->db->from($table);
      $this->db->where($where, $id);
      $this->db->where('flag', '0');


      if (!empty($limit)) {
        $this->db->limit($limit, $offset);
      }

      $query = $this->db->get();
      $result = $query->result_array();
      return $result;

    }

    public function fetch_gram_panchayat_data($table, $where1, $id,$where2,$is_id, $limit = null, $offset = null)
    {
      $this->db->select('*');
      $this->db->from($table);
      $this->db->where($where1, $id);
      $this->db->where($where2, $is_id);
      $this->db->where('flag', '0');


      if (!empty($limit)) {
        $this->db->limit($limit, $offset);
      }

      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }

    public function fetch_gram_data($table, $where1, $id,$where2,$gram_pan_id,$where3,$is_id, $limit = null, $offset = null)
    {
      $this->db->select('*');
      $this->db->from($table);
      $this->db->where($where1, $id);
      $this->db->where($where2, $gram_pan_id);
      $this->db->where($where3, $is_id);
      $this->db->where('flag', '0');


      if (!empty($limit)) {
        $this->db->limit($limit, $offset);
      }

      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }

    public function fetch_mohalla_data($table, $where1, $id,$where2,$gram_pan_id,$where3,$is_id,$where4,$gram, $limit = null, $offset = null)
    {
      $this->db->select('*');
      $this->db->from($table);
      $this->db->where($where1, $id);
      $this->db->where($where2, $gram_pan_id);
      $this->db->where($where3, $is_id);
      $this->db->where($where4, $gram);
      $this->db->where('flag', '0');


      if (!empty($limit)) {
        $this->db->limit($limit, $offset);
      }

      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
    
    public function fake_data($table, $where, $id, $limit = null, $offset = null)
    {
      $this->db->select('*');
      $this->db->from($table);
      $this->db->where($where, $id);
       //$this->db->or_where('flag', '2');


      if (!empty($limit)) {
        $this->db->limit($limit, $offset);
      }

      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
    
    
  }
