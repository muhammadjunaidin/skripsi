<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main_m extends CI_Model
{
    private $success_status = "success";
    private $failed_status = "failed";
    
    
    public function __construct()
    {
        parent::__construct();
    }

    function insert($table, $data = null, $datab = null)
    {
        if ($datab != null) {
            return $this->db->insert_batch($table, $datab);
        } else {
            return $this->db->insert($table, $data);
        }
    }

    function insert_id($table, $data = null ){
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    function update($table, $data, $where)
    {
        $this->db->where($where)->update($table, $data);
        
        if ($this->db->affected_rows()) {
            $result['status']  = TRUE;
            $result['message'] = "success";
        } else {
            $result['status']  = FALSE;
            $result['message'] = $this->db->error();
        }
        return $result;
    }

    function delete($table, $where)
    {
        $this->db->where($where)->update($table, ['deleted_at' => date("Y-m-d") ]);
        
        if ($this->db->affected_rows()) {
            $result['status']  = TRUE;
            $result['message'] = "success";
        } else {
            $result['status']  = FALSE;
            $result['message'] = $this->db->error();
        }
        return $result;
    }

    function get($table,$where = null, $order = null, $limit = null, $group = null,$select = null){
		if($where != null) $this->db->where($where);
		if($order != null) $this->db->order_by($order);
		if($group != null) $this->db->group_by($group);
		if($limit != null) $this->db->limit($limit);
		if($select != null) $this->db->select($select);

		$query = $this->db->get($table);
		return $query->result();
	}

    function get_antrian($where = null) {
        if ($where != null)
            $this->db->where($where);
        $this->db->select('permohonan_izin.*, jenis_usaha.nama');
        $this->db->where(['permohonan_izin.deleted_at' => NULL]);
        $this->db->join('jenis_usaha', 'jenis_usaha.id = permohonan_izin.id_izin_usaha');
        $this->db->join('users', 'users.id = permohonan_izin.user_id');
        $query = $this->db->get('permohonan_izin');
        return $query->result();
    }

    public function get_log($id = null) {
        $this->db->select('antrian.*, admin.nama, admin.id as admin_id');
        $this->db->where('id_permohonan_izin', $id);
        $this->db->join('admin', 'admin.id = antrian.user_id');
        $antrian = $this->db->get('antrian');
        return $antrian->result();
    }

}