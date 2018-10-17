<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class User_model extends CI_Model {
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
	/**
	 * create_user function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $email
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function create_user($params) {
		
		$data = array(
			'nik' => $params['nik'],
			'nama_lengkap' => $params['nama_lengkap'],
			'email' => $params['email'],
			'no_tlp' => $params['no_tlp'],
			'alamat' => $params['alamat'],
			'kewarganegaraan' => $params['kewarganegaraan'],
			'pekerjaan' => $params['pekerjaan'],
			'jabatan' => $params['jabatan'],
			'password' => $this->hash_password($params['password']),
			'akses' => $params['akses']
		);
		
		return $this->db->insert('users', $data);
	}
	
	/**
	 * check_login function.
	 * 
	 * @access public
	 * @param mixed $email
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function check_login($email, $password) {
		
		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('email', $email);
		$hash = $this->db->get()->row('password');
		
		return $this->verify_password_hash($password, $hash);
		
	}
	
	/**
	 * get_user_id_from function.
	 * 
	 * @access public
	 * @param array $params
	 * @return int the user id
	 */
	public function get_user_id_from($params) {
		
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where($params);
		return $this->db->get()->row('id');
		
	}
	
	/**
	 * get_user function.
	 * 
	 * @access public
	 * @param mixed $user_id
	 * @return object the user object
	 */
	public function get_user($user_id) {
		
		$this->db->from('users');
		$this->db->where('id', $user_id);
		return $this->db->get()->row();
		
	}
	
	/**
	 * check_access function.
	 * 
	 * @access public
	 * @param mixed $access
	 * @return bool
	 */
	public function check_access($access){
		return $access === 'admin' ? true : false;
	}

	/**
	 * hash_password function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @return string|bool could be a string on success, or bool false on failure
	 */
	private function hash_password($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
		
	}
	
	/**
	 * verify_password_hash function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @param mixed $hash
	 * @return bool
	 */
	private function verify_password_hash($password, $hash) {
		
		return password_verify($password, $hash);
		
	}
	
}
