<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function cek_user()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$query = $this->db->where('username', $username)
			->where('password', md5($password))
			->get('tb_admin');
			
			if($query->num_rows() > 0){
				$data = array(
					'username' => $username,
					'userlevel' => 'admin',
					'logged_in' => TRUE
					);
				$this->session->set_userdata($data);

				return TRUE;	
			} else {
				return FALSE;
			}
	}

	public function tambahkopi($foto)
	{
		$data = array(
				'KD_KOPI' => NULL,
				'NAMA_KOPI' => $this->input->post('nama'),
				'BERAT' => $this->input->post('berat'),
				'ASAL_KOPI' => $this->input->post('asal'),
				'HARGA' => $this->input->post('harga'),
				'STOCK' => $this->input->post('stock'),
				'foto' => $foto['file_name']
			);

		$this->db->insert('tb_kopi', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}	
	}

	public function editkopi($foto)
	{
		$data = array(
				'NAMA_KOPI' => $this->input->post('nama'),
				'BERAT' => $this->input->post('berat'),
				'ASAL_KOPI' => $this->input->post('asal'),
				'HARGA' => $this->input->post('harga'),
				'STOCK' => $this->input->post('stock'),
				'foto' => $foto['file_name']
			);

		$this->db->where('KD_KOPI', $this->uri->segment(3))->update('tb_kopi', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}	
	}

	public function hapuskopi($id)
	{
		$this->db->where('KD_KOPI', $id)->delete('tb_kopi');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}	
	}

	public function getkopi()
	{
		return $this->db->get('tb_kopi')
										->result();
	}

	public function getkopibyid($id)
	{
		return $this->db->where('KD_KOPI', $id)
										->get('tb_kopi')
										->row();
	}

	public function getpembelian()
	{
		return $this->db->get('tb_pembelian')
										->result();
	}

	public function getuser()
	{
		return $this->db->get('tb_user')
										->result();
	}

	public function getbeliview()
	{
		return $this->db->select('tb_pembelian.KD_PEMBELIAN,tb_user.NAMA_USER,tb_pembelian.TOTAL,tb_pembelian.TGL_PEMBELIAN, tb_pembelian.STATUS, tb_pembelian.BUKTI')
										->from('tb_pembelian')
										->join('tb_user','tb_user.KD_USER = tb_pembelian.KD_USER','inner')
										->get()
										->result();
	}

	public function confirmOrder($id)
	{
		$this->db->where('KD_PEMBELIAN', $id)->update('tb_pembelian', [ 'STATUS' => 'SUDAH KONFIRMASI' ]);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function hapusOrder($kd)
	{
		$this->db->where('KD_PEMBELIAN', $kd)->delete('tb_detail');
		$this->db->where('KD_PEMBELIAN', $kd)->delete('tb_pembelian');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}	
	}
}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */