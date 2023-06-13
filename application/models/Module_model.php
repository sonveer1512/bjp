<?php

class Module_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function getPermission() {

        $query = $this->db->where("system", 0)->order_by('sort_order', 'asc')->get("permission_group");
        return $query->result_array();
    }

    Public function changeStatus($data) {

        $this->db->where("id", $data["id"])->update("sidebar_group", $data);
    }

    Public function getPermissionByModulename($module_name) {

        $sql = "select is_active from sidebar_group where group_short_name='" . $module_name . "'";

        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function get($id = null) {
        $this->db->select()->from('sidebar_group');
        if ($id != null) {
            $this->db->where('sidebar_group.sidebar_id', $id);
        } else {
            $this->db->order_by('sidebar_group.sidebar_id');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result();
        }
    }

}

?>