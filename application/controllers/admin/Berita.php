<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Berita';
		$data['berita'] = $this->BeritaModel->getData('berita')->result();

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('template_admin/topbar');
		$this->load->view('admin/berita', $data);
		$this->load->view('template_admin/footer');
	} 

	public function view_berita()
	{
		$data['title'] = 'Berita';	
		$data['identitas'] = $this->DataModel->getData('identitas')->result();
		$data['berita'] = $this->db->get('berita')->result();
		$this->load->view('v_berita', $data);

	}

	public function add()
	{
		$data['title'] = 'Form Tambah Berita';
		$data['berita'] = $this->db->get_where('berita')->row_array();
		$data = array(
			'judul' => $this->input->post('judul'),
			'isi' => $this->input->post('isi'),
			'gambar' => $this->input->post('gambar'),
			'created_by' => $this->input->post('created_by'),
			'created_at' => date('Y-m-d H:i:s')
		);

		$this->db->insert('berita', $data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Data berhasil ditambahkan!.
              </div>');
		redirect('admin/berita');
	}

	public function update($id)
	{
		$data['title'] = "Edit Berita";
		$where = array('id_berita' => $id);

		$data['title'] = 'Form Update Berita';
		$data['berita'] = $this->db->get_where('berita', $where)->row_array();

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('template_admin/topbar');
		$this->load->view('admin/edit_berita', $data);
		$this->load->view('template_admin/footer');

	}

	public function update_aksi()
	{
		
		$id 		= $this->input->post('id_berita');
		$judul	    = $this->input->post('judul', true);
		$isi		= $this->input->post('isi', true);
		$photo		= $_FILES['gambar']['name'];
			if($photo){
				$config ['upload_path']		= './assets/user/img';
				$config ['allowed_types']	= 'jpeg|jpg|png|gif|tiff';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('gambar')){
					$photo = $this->upload->data('file_name');
					$this->db->set('gambar', $photo);
				}else{
					echo "Gagal upload";
				}
			}
		$dibuat = $this->input->post('created_by', true);

		$data = array(
			'gambar' => $photo,
			'judul'  => $judul,
			'isi'	=> $isi,
			'created_by' => $dibuat,
		);

		$where = array(
			'id_berita' => $id
		);

		$this->BeritaModel->update_data('berita', $data, $where);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Data berhasil diperbaharui!.
              </div>');
		redirect('admin/berita');
	}

    public function delete($id)
	{
		$where = array('id_berita' => $id);

		$this->db->delete('berita', $where);
		$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-times"></i> Delete!</h4>
                Data berhasil dihapus!.
              </div>');
		redirect('admin/berita');
	}


}