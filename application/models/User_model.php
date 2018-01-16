<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function cek_user()
	{
		$username = $this->input->post('email');
		$password = $this->input->post('password');

		$query = $this->db->where('email', $username)
			->where('password', md5($password))
			->get('tb_user');
			
			if($query->num_rows() > 0){
				$data = array(
					'id_user' => $query->row()->KD_USER,
					'nama_user' => $query->row()->NAMA_USER,
					'userlevel' => 'user',
					'logged_in' => TRUE
					);
				$this->session->set_userdata($data);

				return TRUE;	
			} else {
				return FALSE;
			}
	}
	public function getProduct()
	{
		return $this->db->get('tb_kopi')->result();
	}
	public function getProductById($id)
	{
		return $this->db->where('KD_KOPI', $id)->get('tb_kopi')->row();
	}

	public function insertUser()
	{
		$data = array(
				'KD_USER' => NULL,
				'NAMA_USER' => $this->input->post('name'),
				'NO_TELP' => $this->input->post('telp'),
				'EMAIL' => $this->input->post('email'),
				'PASSWORD' => md5($this->input->post('password'))
			);

		$this->db->insert('tb_user', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}	
	}

	public function addOrder()
	{
		$this->db->insert('tb_pembelian', array(
			'KD_PEMBELIAN'	=> $this->input->post('kd_beli'),
			'KD_USER'				=> $this->session->userdata('id_user'),
			'TGL_PEMBELIAN'	=> $this->input->post('tgl_beli'),
			'TOTAL'					=> $this->input->post('total'),
			'STATUS'				=> 'BELUM TRANSFER'
		));
		$id = $this->db->insert_id();
		$cart = $this->session->userdata('cart');
		for ($i=0; $i < count($cart); $i++) { 
			$this->db->insert('tb_detail', array(
				'KD_PEMBELIAN'	=> $id,
				'KD_KOPI'				=> $cart[$i]['KD_KOPI'],
				'JUMLAH'				=> $cart[$i]['JUMLAH'],
				'TOTAL'					=> $cart[$i]['JUMLAH'] * $cart[$i]['HARGA']
			));
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_userdata('kd_beli', $id);
			$this->session->unset_userdata('cart');
			return true;
		} else {
			return false;
		}
	}

	public function getHistory()
	{
		$this->db->where('KD_USER', $this->session->userdata('id_user'));
		return $this->db->get('tb_pembelian')
										->result();
		
	}

	public function confirm($id, $foto)
	{
		$this->db->where('KD_PEMBELIAN', $id)->update('tb_pembelian', array(
			'BUKTI'	=> 'upload/'.$foto['file_name'],
			'STATUS'=> 'SUDAH TRANSFER'
		));
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */