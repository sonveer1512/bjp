 <?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Dashboard_Model extends CI_Model

{

public function __construct()

{

parent::__construct();

}





public function countrow($table)
	{
		//$this->db->select('*');
		//$this->db->from($table);
		//$this->db->order_by('id', 'desc');
		//$query = $this->db->get();
		//return $query->num_rows();
  	
  		$this->db->select('count(*)');
        $query = $this->db->get($table);
        $cnt = $query->row_array();
        return $cnt['count(*)'];
  		
	}

    public function countrow_where($table)
	{
		$this->db->select('*');
		$this->db->from($table);
        $this->db->where('admin_role','Subadmin');
		$this->db->order_by('admin_user_id', 'desc');
		$query = $this->db->get();
		return $query->num_rows();
	}

    public function countrow_where_1($table)
	{
		$this->db->select('*');
		$this->db->from($table);
        $this->db->where('admin_role','Supervisor');
		$this->db->order_by('admin_user_id', 'desc');
		$query = $this->db->get();
		return $query->num_rows();
	}

    public function countrow_where_approve($table)
	{
		$this->db->select('*');
		$this->db->from($table);
        $this->db->where('flag','0');
      	$this->db->where('is_varified','varified');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->num_rows();
	}
  
   public function countrow_where_activebjp($table)
	{
		$this->db->select('*');
		$this->db->from($table);
        $this->db->where('flag','0');
      	$this->db->where('is_varified','varified');
     	$this->db->where('datastatus','active');
     $this->db->where('bjp_congress','bjp');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->num_rows();
	}
  
  public function countrow_where_activecongress($table)
	{
		$this->db->select('*');
		$this->db->from($table);
        $this->db->where('flag','0');
      	$this->db->where('is_varified','varified');
     	$this->db->where('datastatus','active');
     $this->db->where('bjp_congress','congress');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->num_rows();
	}
  
  public function countrow_where_supportbjp($table)
	{
		$this->db->select('*');
		$this->db->from($table);
        $this->db->where('flag','0');
      	$this->db->where('is_varified','varified');
    $this->db->where('is_supporter','support');
     	//$this->db->where('datastatus','active');
     $this->db->where('bjp_congress','bjp');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->num_rows();
	}
  
  public function countrow_where_supportcongress($table)
	{
		$this->db->select('*');
		$this->db->from($table);
        $this->db->where('flag','0');
      	$this->db->where('is_varified','varified');
    $this->db->where('is_supporter','support');
     	//$this->db->where('datastatus','active');
     $this->db->where('bjp_congress','congress');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->num_rows();
	}
  
  	public function countrow_where_panchyat($table)
	{
		$this->db->select('*');
		$this->db->from($table);
        $this->db->where('flag','0');
        $this->db->where('panchayat ','1');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->num_rows();
	}
  public function countrow_where_grampanchyat($table)
	{
		$this->db->select('*');
		$this->db->from($table);
        $this->db->where('flag','0');
        $this->db->where('panchayat ','1');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->num_rows();
	}
  public function countrow_where_gramdetail($table)
	{
		$this->db->select('*');
		$this->db->from($table);
        $this->db->where('flag','0');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->num_rows();
	}
  public function countrow_where_nagarpalika($table)
	{
		$this->db->select('*');
		$this->db->from($table);
        $this->db->where('flag','0');
        $this->db->where('panchayat ','2');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->num_rows();
	}
  public function countrow_where_ward($table)
	{
		$this->db->select('*');
		$this->db->from($table);
        $this->db->where('flag','0');
        $this->db->where('panchayat ','2');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->num_rows();
	}
  




}
