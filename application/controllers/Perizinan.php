<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perizinan extends MY_Controller {
	public function __construct() {
        parent::__construct();     
		$this->load->model('main_m');
	}

	public function index() {
		$list = $this->main_m->get('jenis_usaha', ['deleted_at' => null]);
		$this->getHomeView('homepage/perizinan/index', ['list' => $list]);
	}

	public function detail( $id = null ){
		$usaha = $this->main_m->get('jenis_usaha', ['id' => $id]);
		if(!$usaha) {
			echo "jenis perizinan tidak ada";die();
		}
		$this->getHomeView('homepage/perizinan/detail', ['usaha' => $usaha[0]]);	
	}

	public function tracking() {
		$kode = $this->input->get('q');
		$permohonan = $this->main_m->get('permohonan_izin', ['kode_antrian' => $kode]);
		$data = [];
		if(count($permohonan) > 0) {
			$log = $this->main_m->get_log($permohonan[0]->id);
			$data['log'] = $log;
			$data['izin'] = $permohonan[0];
		}
		$this->getHomeView('homepage/perizinan/tracking', $data);	
	}
}