<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BeritaModel extends CI_Model {
    public function getData($table)
	{
		return $this->db->get($table);
	}

	public function getWhere($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

//update data
	public function update_data($table, $data, $where)
	{
		return $this->db->update($table, $data, $where);
	}


    public function get_news($id = FALSE) {
        if ($id === FALSE) {
            $query = $this->db->get('berita');
            return $query->result_array();
        }

        $query = $this->db->get_where('berita', array('id_berita' => $id));
        return $query->row_array();
    }

    public function set_news() {
        $data = array(
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi'),
            'gambar' => $this->input->post('gambar'),
            'created_by' => $this->input->post('created_by'),
            'created_at' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('berita', $data);
    }
}
