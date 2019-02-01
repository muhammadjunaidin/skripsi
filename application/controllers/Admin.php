<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'controllers/BaseController.php'); 

class Admin extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('main_m');
		$this->is_admin = parent::is_admin();
	}

	public function dashboard(){
		parent::getView('admin/dashboard');
	}

	public function users(){
		$users = $this->main_m->get('users');
		parent::getView('admin/users/index', ['users' => $users]);
	}

	public function delete_user($id) {
		$delete = $this->main_m->delete('users', ['id' => $id]);
		if($delete['status']) {
			$this->session->set_flashdata('alert', array('message' => 'Berhasil menghapus user','class' => 'success'));
		} else {
			$this->session->set_flashdata('alert', array('message' => 'Gagal menghapus user','class' => 'alert'));
		}
		redirect('admin/users'); 
	}

	public function jenis_usaha(){
		$jenis_usaha = $this->main_m->get('jenis_usaha', ['deleted_at' => null]);
		parent::getView('admin/perizinan/index', ['jenis_usaha' => $jenis_usaha]);
	}

	public function lihat_usaha( $id = null ) {
		$usaha = $this->main_m->get('jenis_usaha', ['id' => $id]);
		parent::getView('admin/perizinan/detail', ['usaha' => $usaha[0]]);
	}

	public function edit_usaha( $id = null ) {
		$usaha = $this->main_m->get('jenis_usaha', ['id' => $id]);
		parent::getView('admin/perizinan/edit', ['usaha' => $usaha[0]]);	
	}

	public function hapus_usaha( $id = null ) {
		$usaha = $this->main_m->delete('jenis_usaha', ['id' => $id]);
		$this->session->set_flashdata('alert', array('message' => 'Berhasil hapus jenis usaha','class' => 'success'));
                redirect('admin/jenis_usaha'); 
	}

	public function tambah_usaha() {
		parent::getView('admin/perizinan/tambah');
	}

	public function simpan_usaha(){
		$nama_izin = $this->input->post('nama_izin');
		$syarat = $this->input->post('syarat');
		$prosedur = $this->input->post('prosedur');
		$estimasi = $this->input->post('estimasi');
		$deskripsi = $this->input->post('deskripsi');
		$berkas = $_FILES['berkas']['name'];

        $data = array(
            'nama' => $nama_izin,
			'syarat' => $syarat,
			'prosedur' => $prosedur,
			'file_pengesahan' => $berkas,
			'estimasi_proses' => $estimasi,
			'deskripsi' => $deskripsi,
			'created_at' => date("Y-m-d H:m:s")
        );

        $config['upload_path']          = './upload';
        $config['allowed_types']        = 'pdf|ppt|pptx|doc|docx';
        $config['max_size']             = 150000;
        $config['file_name']            = $berkas;

        $this->load->library('upload', $config);

        if($this->input->post('action') === 'tambah') {
   			if ( ! $this->upload->do_upload('berkas') )
	        {
	            $error = array('error' => $this->upload->display_errors());
	            $this->session->set_flashdata('alert', array('message' => $this->upload->display_errors(),'class' => 'danger'));
				redirect('admin/jenis_usaha'); 
	        } else {
	         	$insert = $this->main_m->insert('jenis_usaha', $data);	
            	if ($insert) {
                    $this->session->set_flashdata('alert', array('message' => 'Berhasil menambah usaha','class' => 'success'));
                    redirect('admin/jenis_usaha'); 
                }
                else {
                    $this->session->set_flashdata('alert', array('message' => 'Gagal menambah usaha','class' => 'danger'));
                    redirect('admin/jenis_usaha'); 
                }
	        }  	

        } else if ( $this->input->post('action') === 'edit' ) {
        	if($berkas !== "") {
        		if ( ! $this->upload->do_upload('berkas') )
		        {
		            $error = array('error' => $this->upload->display_errors());
		            $this->session->set_flashdata('alert', array('message' => $this->upload->display_errors(),'class' => 'danger'));
					redirect('admin/jenis_usaha'); 
		        }
        	} else {
        		$data['file_pengesahan'] = $this->input->post('berkas_lama');
        	}
        	$id = $this->input->post('id');
        	$update = $this->main_m->update('jenis_usaha', $data, ['id' => $id]);	
        	if ($update) {
                $this->session->set_flashdata('alert', array('message' => 'Berhasil update jenis usaha','class' => 'success'));
                redirect('admin/jenis_usaha'); 
            }
            else {
                $this->session->set_flashdata('alert', array('message' => 'Gagal update jenis usaha','class' => 'danger'));
                redirect('admin/jenis_usaha'); 
            }
        }
	}

	public function antrian() {
		$userData = parent::userdata();
		$where = [];
		if(!parent::is_admin()) {
			$where['user_id']= $userData['user_id'];
		} else {
			$where['status_terakhir'] = 'diproses';
		}
		$lists = $this->main_m->get_antrian($where);
		parent::getView('admin/antrian/list', ['lists' => $lists]);
	}

	public function antrian_lama() {
		$where = ['status_terakhir' => 'diterima'];
		$or_where = ['status_terakhir' => 'ditolak'];
		$lists = $this->main_m->get_antrian($where, $or_where);
		parent::getView('admin/antrian/list', ['lists' => $lists, 'disable' => true ]);	
	}

	public function tambah_antrian() {
		$jenis_usaha = $this->main_m->get('jenis_usaha');
		parent::getView('admin/antrian/tambah', ['jenis_usaha' => $jenis_usaha]);	
	}

	public function simpan_antrian() {
		$userData = parent::userdata();
		$data = [
			'nomor_izin' => $this->input->post('nomor_izin'),
			'nama_pemilik' => $this->input->post('nama_pemilik'),
			'nama_usaha' => $this->input->post('nama_perusahaan'),
			'alamat_usaha' => $this->input->post('alamat'),
			'tanggal_berdiri' => date('Y-m-d', strtotime($this->input->post('tanggal_berdiri'))),
			'id_izin_usaha' => $this->input->post('jenis_usaha'),
			'status_terakhir' => 'diproses'
		];


		$berkas = $_FILES['berkas']['name'];
        $ext = pathinfo($berkas, PATHINFO_EXTENSION);
        $new_name = uniqid().'.'.$ext;

		$config['upload_path']          = './upload/berkas';
        $config['allowed_types']        = 'pdf|ppt|pptx|doc|docx';
        $config['max_size']             = 150000;
        $config['file_name']            = $new_name;

        $this->load->library('upload', $config);

		if($this->input->post('action') === 'edit') {
			if($berkas !== "") {
				$updateData['berkas'] = $new_name;
        		if ( ! $this->upload->do_upload('berkas') )
		        {
		            $error = array('error' => $this->upload->display_errors());
		            $this->session->set_flashdata('alert', array('message' => $this->upload->display_errors(),'class' => 'danger'));
					redirect('admin/antrian'); 
		        }
        	} else {
        		$updateData['berkas'] = $this->input->post('berkas_lama');
        	}

			$permohonan_izin = $this->main_m->get_row('permohonan_izin', ['id' => $this->input->post('id')]);
			$updateData['status_terakhir'] = $this->input->post('status') === null ? "diproses":"";
			$updateData['id'] = $this->input->post('id');
			$updateData['updated_at'] = date('Y-m-d H:m:s');
			$updateData['tanggal_survey'] = $this->input->post('tanggal_survey');
			$this->main_m->update('permohonan_izin', $updateData, ['id' => $updateData['id']]);

			$antrian = [
            	'kode_antrian' => $this->input->post('kode_antrian'),
            	'id_permohonan_izin' => $this->input->post('id'),
            	'tanggal_pengajuan' => date('Y-m-d'),
            	'pesan' => $this->input->post('pesan'),
            	'status_permohonan' => $this->input->post('status'),
            	'status_antrian' => $this->input->post('status') === 'Ditolak' ? 0 : 1,
            	'user_id' => $userData['user_id'],
            	'created_at' => date('Y-m-d H:m:s')
            ];
            
            if(is_admin()) {
            	$insert = $this->main_m->insert('antrian', $antrian);
            	if($insert) {
					$user = $this->user_model->get_user($permohonan_izin->user_id);
					// parent::sendEmail($user, $permohonan_izin->kode_antrian, $this->input->post('status'), $this->input->post('tanggal_survey'));
					$this->session->set_flashdata('alert', array('message' => 'Berhasil update izin usaha','class' => 'success'));
	            	redirect('admin/antrian'); 
				}
            } else {
            	$this->session->set_flashdata('alert', array('message' => 'Berhasil update izin usaha','class' => 'success'));
	            	redirect('admin/antrian'); 
            }
			
		}

		/*
		* Status permohonan
		* diproses, ditolak, diterima, selesai
		*/
		if ( ! $this->upload->do_upload('berkas') )
        {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('alert', array('message' => $this->upload->display_errors(),'class' => 'danger'));
			redirect('admin/antrian'); 
        }

		$data['user_id'] = $userData['user_id'];
		$data['berkas'] = $new_name;
		$data['created_at'] = date('Y-m-d H:m:s');
		$insert_id = $this->main_m->insert_id('permohonan_izin', $data);
		if ($insert_id) {
			$kode_antrian = $insert_id.'/'.$userData['user_id'].'/'.date('m/Y');
            $antrian = [
            	'kode_antrian' => $kode_antrian,
            	'id_permohonan_izin' => $insert_id,
            	'tanggal_pengajuan' => date('Y-m-d'),
            	'pesan' => '',
            	'status_permohonan' => 'diproses',
            	'status_antrian' => true,
            	'user_id' => 1,
            	'created_at' => date('Y-m-d H:m:s')
            ];
            $update = $this->main_m->update('permohonan_izin', ['kode_antrian' => $kode_antrian], ['id' => $insert_id]);
			$insert = $this->main_m->insert('antrian', $antrian);
			if($insert) {
				$this->session->set_flashdata('alert', array('message' => 'Berhasil menambah izin usaha','class' => 'success'));
            	redirect('admin/antrian'); 
			}
        }
        else {
            $this->session->set_flashdata('alert', array('message' => 'Gagal menambah izin usaha','class' => 'danger'));
            redirect('admin/antrian'); 
        }
	}

	public function hapus_antrian( $id = null ) {
		$delete = $this->main_m->delete('permohonan_izin', ['id' => $id]);
		if($delete) {
			$this->session->set_flashdata('alert', array('message' => 'Berhasil hapus permohonan','class' => 'success'));
                redirect('admin/antrian'); 	
		} else {
			$this->session->set_flashdata('alert', array('message' => 'Gagal hapus permohonan','class' => 'danger'));
                redirect('admin/antrian'); 
		}
	}

	public function edit_antrian($id = null) {
		$jenis_usaha = $this->main_m->get('jenis_usaha', ['deleted_at' => null]);
		$antrian = $this->main_m->get('permohonan_izin', ['id' => $id]);
		$min_date = $this->main_m->get('permohonan_izin', null, 'tanggal_survey desc');
		$log = $this->main_m->get_log($id);
		parent::getView('admin/antrian/edit', ['izin' => $antrian[0], 'jenis_usaha' => $jenis_usaha, 'log' => $log, 'min_date' => $min_date[0]->tanggal_survey]);
	}
	public function lihat_antrian($id = null) {
		$jenis_usaha = $this->main_m->get('jenis_usaha', ['deleted_at' => null]);
		$antrian = $this->main_m->get('permohonan_izin', ['id' => $id]);
		$log = $this->main_m->get_log($id);
		parent::getView('admin/antrian/detail', ['izin' => $antrian[0], 'jenis_usaha' => $jenis_usaha, 'log' => $log]);
	}

	public function jadwal() {
		$list = $this->main_m->get('permohonan_izin', ['status_terakhir' => 'diterima', 'deleted_at' => NULL]);
		$data = [];
		foreach ($list as $key => $value) {
			$data[$key] = [
				'title' => $value->nama_usaha,
				'url' => base_url('admin/lihat_antrian/').$value->id,
				'start' => $value->tanggal_survey
			];
		}
		parent::getView('admin/jadwal', ['antrian' => json_encode($data)]);
	}
}