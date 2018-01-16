<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$data = [
			'content_view'	=> 'index_view',
			'produk'		=> $this->user_model->getProduct(),
			'user'			=> $this->user_model->cek_user()
		];
		$this->load->view('template_view', $data);
	}

	public function addToCart($id)
	{
		if ($this->session->userdata('logged_in') != TRUE || $this->session->userdata('userlevel') != "user") {
			redirect('user/login?to='.$id);
		}
		if (!empty($this->session->userdata('cart'))) {
			$cart = $this->session->userdata('cart');
		}
		$available = false;
		for ($i=0; $i < count($cart); $i++) { 
			if ($cart[$i]['KD_KOPI'] == $id) {
				$newValue = $cart[$i]['JUMLAH'] + 1;
				$cart[$i]['JUMLAH'] = $newValue;
				$available = true;
			}
		}
		if (!$available) {
			$cart[] = [
				'KD_USER'	=> $this->session->userdata('id_user'),
				'KD_KOPI'	=> $id,
				'NAMA_KOPI'	=> $this->user_model->getProductById($id)->NAMA_KOPI,
				'HARGA' => $this->user_model->getProductById($id)->HARGA,
				'JUMLAH'	=> 1
			];
		}
		$this->session->set_userdata('cart', $cart );
		redirect('user');
	}

	public function removeCart($id)
	{
		if ($this->session->userdata('logged_in') != TRUE || $this->session->userdata('userlevel') != "user") {
			redirect('user/login?to='.$id);
		}
		if (!empty($this->session->userdata('cart'))) {
			$cart = $this->session->userdata('cart');
			for ($i=0; $i < count($cart); $i++) { 
				if ($cart[$i]['KD_KOPI'] == $id) {
					unset($cart[$i]);
					$cart = array_values($cart);
				}
			}
		}
		$this->session->set_userdata('cart', $cart );
		redirect('user/cart');
	}

	public function changeCart($id, $action)
	{
		if ($this->session->userdata('logged_in') != TRUE || $this->session->userdata('userlevel') != "user") {
			// redirect('user/login?to='.$id);
			echo 0;
		}
		if (!empty($this->session->userdata('cart'))) {
			$cart = $this->session->userdata('cart');
			for ($i=0; $i < count($cart); $i++) { 
				if ($cart[$i]['KD_KOPI'] == $id) {
					$newValue = $cart[$i]['JUMLAH'];
					if ($action == 'plus') {
						$newValue = $cart[$i]['JUMLAH'] + 1;
					} elseif ($action == 'minus') {
						if ($cart[$i]['JUMLAH'] - 1 > 0) {
							$newValue = $cart[$i]['JUMLAH'] - 1;
						}
					}
					$cart[$i]['JUMLAH'] = $newValue;
				}
			}
		}
		$this->session->set_userdata('cart', $cart );
		// redirect('user/cart');
		echo 1;
	}

	public function Cart()
	{
		if ($this->session->userdata('logged_in') != TRUE || $this->session->userdata('userlevel') != "user") {
			redirect('user/login?to='.$id);
		}
		$data = [
			'content_view'	=> 'order_view',
			'cart'					=> $this->session->userdata('cart')
		];
		$this->load->view('template_view', $data);
	}

	public function login()
	{
		$data = [
			'content_view'	=> 'login_view'
		];
		$this->load->view('template_view', $data);
	}

	public function dologin()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == TRUE)
				{
					if ($this->user_model->cek_user() == TRUE){
						if ($this->input->post('to')) {
							redirect('user/addToCart/'.$this->input->post('to'));
						} else {
							redirect('user');
						}
					} else {
						$data = [
							'content_view'	=> 'login_view',
							'notif'					=> 'Login gagal'
						];
						$this->load->view('template_view', $data);
					}
				// jika sukses

			} else {
				// jika gagal
				$data = [
							'content_view'	=> 'login_view',
							'notif'					=> validation_errors()
						];
				$this->load->view('template_view', $data);
			}
		}else{
			redirect('user/login');
		}
	}

	public function register()
	{
		$data = [
			'content_view'	=> 'register_view',
		];
		$this->load->view('template_view', $data);
	}

	public function doregister()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('telp', 'Phone Number', 'trim|required');

			if ($this->form_validation->run() == TRUE)
				{
					if ($this->user_model->insertUser() == TRUE){
							$data = [
							'content_view'	=> 'register_view',
							'notif'					=> 'Registrasi Berhasil'
						];
							$this->load->view('template_view', $data);
					} else {
						$data = [
							'content_view'	=> 'register_view',
							'notif'					=> 'Registrasi gagal'
						];
						$this->load->view('template_view', $data);
					}
				// jika sukses

			} else {
				// jika gagal
				$data = [
							'content_view'	=> 'register_view',
							'notif'					=> validation_errors()
						];
				$this->load->view('template_view', $data);
			}
		}else{
			redirect('register');
		}
	}

	public function detail()
	{
		$data = [
							'content_view'	=> 'detail_view',
						];
				$this->load->view('template_view', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('user');
	}

	public function goOrder()
	{
		$data = [
							'content_view'	=> 'confirm_view',
							'cart' 					=> $this->session->userdata('cart')
						];
		$this->load->view('template_view', $data);
	}

	public function order()
	{
		if ($this->session->userdata('logged_in') != TRUE || $this->session->userdata('userlevel') != "user") {
			redirect('user/login?to='.$id);
		}
		if ($this->user_model->addOrder()) {
			redirect('user/history');
		} else {
			$this->session->set_flashdata('notif', 'Order gagal!');
			redirect('user/goOrder');
		}
	}

	public function history()
	{
		if ($this->session->userdata('logged_in') != TRUE || $this->session->userdata('userlevel') != "user") {
			redirect('user/login?to='.$id);
		}
		$data = [
							'content_view'	=> 'list_order_view',
							'list_order' 					=> $this->user_model->getHistory()
						];
		$this->load->view('template_view', $data);
	}

	public function detailOrder()
	{
		if ($this->session->userdata('logged_in') != TRUE || $this->session->userdata('userlevel') != "user") {
			redirect('user/login?to='.$id);
		}
		$kd_beli=$this->uri->segment(3);
		$data = [
							'kd_beli' 						=> $this->session->userdata('kd_beli'),
							'content_view'	=> 'detail_order_view',
							'list_order' 		=> $this->user_model->getHistory()
						];
		$this->load->view('template_view', $data);
	}

	public function doConfirm($kd_beli)
	{
		if ($this->session->userdata('logged_in') != TRUE || $this->session->userdata('userlevel') != "user") {
			redirect('user/login?to='.$id);
		}
		if (isset($_POST['submit'])) {
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_size']  = '2000';
			
			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('foto')){
				if ($this->user_model->confirm($kd_beli, $this->upload->data())) {
					redirect('user/history');
				} else {
					$data = [
							'kd_beli' 			=> $kd_beli,
							'content_view'	=> 'transfer_view',
							'notif'					=> 'Konfirmasi Gagal'
						];
					$this->load->view('template_view', $data);
				}
			}
			else{
				$data = [
							'kd_beli' 			=> $kd_beli,
							'content_view'	=> 'transfer_view',
							'notif'					=> $this->upload->display_errors()
						];
					$this->load->view('template_view', $data);
			}
			return;
		}
		$data = [
							'kd_beli' 			=> $kd_beli,
							'content_view'	=> 'transfer_view'
						];
		$this->load->view('template_view', $data);
	}

	public function contact()
	{
		$data = [
			'content_view'	=> 'contact'
		];
		$this->load->view('template_view', $data);
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */