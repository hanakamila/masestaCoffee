<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('admin_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->session->userdata('userlevel') == "admin")
			{
				$kopi=$this->admin_model->getkopi();
				$data['user']=count($this->admin_model->getuser());
				$data['beli']=count($this->admin_model->getpembelian());
				$data['kopi']=$kopi;
				$data['jml_kopi']=count($kopi);
				$data['pembelian']=$this->admin_model->getbeliview();
				$data['tampilan_admin']="admin/dashboard";
				$this->load->view('admin/t_admin_view', $data);
			}else{
				$this->load->view('restricted');
			}
		}else{
			$this->load->view('login');
		}
	}

	public function tambahkopi()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->session->userdata('userlevel') == "admin")
			{
				$data['tampilan_admin'] = 'admin/tambah_kopi';
				$this->load->view('admin/t_admin_view', $data);
			}else{
				$this->load->view('restricted');
			}
		}else{
			$this->load->view('login');
		}
	}

	public function insert_kopi()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->session->userdata('userlevel') == "admin")
			{
				if ($this->input->post('submit')) {
					$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
					$this->form_validation->set_rules('berat', 'Berat', 'trim|required');
					$this->form_validation->set_rules('asal', 'Asal', 'trim|required');
					$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
					$this->form_validation->set_rules('stock', 'Stok', 'trim|required');

					if ($this->form_validation->run() == TRUE) {

						$config['upload_path'] = './upload/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$config['max_size'] = '2000';

						$this->load->library('upload', $config);

						if ($this->upload->do_upload('foto')) 
						{
							if ($this->admin_model->tambahkopi($this->upload->data()) == TRUE) {
								$data['tampilan_admin'] = 'admin/tambah_kopi';
								$data['notif'] = 'Tambah berhasil!';
								$this->load->view('admin/t_admin_view', $data);
							}else{
								$data['tampilan_admin'] = 'admin/tambah_kopi';
								$data['notif'] = 'Tambah gagal';
								$this->load->view('admin/t_admin_view', $data);
							}
						}
						else {
						// jika gagal
						$data['notif'] = $this->upload->display_errors();
						$data['tampilan_admin'] = 'admin/tambah_kopi';
						$this->load->view('admin/t_admin_view', $data);
					}
				}else{
					$data['notif'] = validation_errors();
					$data['tampilan_admin'] = 'admin/tambah_kopi';
					$this->load->view('admin/t_admin_view', $data);
				}
			}else{
				$this->load->view('restricted');
			}
		}else{
			$this->load->view('login');
		}
	}
}

	public function updateKopi()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->session->userdata('userlevel') == "admin")
			{
				if ($this->input->post('submit')) {
					$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
					$this->form_validation->set_rules('berat', 'Berat', 'trim|required');
					$this->form_validation->set_rules('asal', 'Asal', 'trim|required');
					$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
					$this->form_validation->set_rules('stock', 'Stok', 'trim|required');

						if ($this->form_validation->run() == TRUE) {

							$config['upload_path'] = './upload/';
							$config['allowed_types'] = 'gif|jpg|png|jpeg';
							$config['max_size'] = '2000';

							$this->load->library('upload', $config);

							if ($this->upload->do_upload('foto')) 
							{
								if ($this->admin_model->editkopi($this->upload->data()) == TRUE) {
									$data['tampilan_admin'] = 'admin/edit_kopi';
									$data['notif'] = 'Update berhasil!';
									$data['kopi']	= $this->admin_model->getkopibyid($this->uri->segment(3));
									$this->load->view('admin/t_admin_view', $data);
									return;
								}else{
									$data['tampilan_admin'] = 'admin/edit_kopi';
									$data['notif'] = 'Update gagal';
									$data['kopi']	= $this->admin_model->getkopibyid($this->uri->segment(3));
									$this->load->view('admin/t_admin_view', $data);
									return;
								}
							}
							else {
								// jika gagal
								$data['notif'] = $this->upload->display_errors();
								$data['tampilan_admin'] = 'admin/edit_kopi';
								$data['kopi']	= $this->admin_model->getkopibyid($this->uri->segment(3));
								$this->load->view('admin/t_admin_view', $data);
								return;
							}
						}else{
							$data['notif'] = validation_errors();
							$data['tampilan_admin'] = 'admin/edit_kopi';
							$data['kopi']	= $this->admin_model->getkopibyid($this->uri->segment(3));
							$this->load->view('admin/t_admin_view', $data);
							return;
						}
				}

				$data['tampilan_admin'] = 'admin/edit_kopi';
				$data['kopi']	= $this->admin_model->getkopibyid($this->uri->segment(3));
				$this->load->view('admin/t_admin_view', $data);
			}else{
				$this->load->view('restricted');
			}
		}else{
			$this->load->view('login');
		}
	}

	public function deleteKopi()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->session->userdata('userlevel') == "admin")
			{
				if ($this->admin_model->hapuskopi($this->uri->segment(3))) {
					$this->session->set_flashdata('notif', 'Hapus berhasil');
					redirect('admin');
				} else {
					$this->session->set_flashdata('notif', 'Hapus gagal');
					redirect('admin');
				}
			}else{
				$this->load->view('restricted');
			}
		}else{
			$this->load->view('login');
		}
	}

	public function confirmOrder($id)
	{
		if ($this->session->userdata('logged_in') != TRUE || $this->session->userdata('userlevel') != "admin") {
			redirect('admin');
		}
		if ($this->admin_model->confirmOrder($id)) {
			$this->session->set_flashdata('notif', 'Berhasil dikonfirmasi');
			redirect('admin');
		} else {
			$this->session->set_flashdata('notif', 'Gagal dikonfirmasi');
			redirect('admin');
		}
	}

	public function login()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == TRUE)
				{
					if ($this->admin_model->cek_user() == TRUE){
						redirect('admin');
					} else {
						$data['notif'] = 'Login gagal';
						$this->load->view('login', $data);
					}
				// jika sukses

			} else {
				// jika gagal
				$data['notif'] = validation_errors();
				$this->load->view('login', $data);
			}
		}else{
			$this->load->view('login');
		}
	}

	public function deleteOrder()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->session->userdata('userlevel') == "admin")
			{
				if ($this->admin_model->hapusOrder($this->uri->segment(3)) == TRUE) {
					$this->session->set_flashdata('notif', 'Hapus berhasil');
					redirect('admin');
				} else {
					$this->session->set_flashdata('notif', 'Hapus gagal');
					redirect('admin');
				}
			}else{
				$this->load->view('restricted');
			}
		}else{
			$this->load->view('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}


}


/* End of file admin.php */
/* Location: ./application/controllers/admin.php */