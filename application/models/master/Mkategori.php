<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mkategori extends CI_Model
{
    public function fetch_all()
    {
        return $this->db->get('kategori')->result_array();
    }
    public function kode()
    {
        $query = $this->db
            ->select('id_kategori', FALSE)
            ->order_by('id_kategori', 'DESC')
            ->limit(1)
            ->get('kategori');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->id_kategori) + 1;
        } else {
            $kode = 1;
        }
        return $kode;
    }
    public function store($post)
    {
        $count = $this->db->from('kategori')->order_by('nourut_kategori', 'DESC')->limit(1)->get()->row_array();
        $nomor = $count['nourut_kategori'] + 1;
        $data = array(
            'id_kategori' => $this->kode(),
            'nama_kategori' => $post['nama'],
            'nourut_kategori' => $nomor,
            'utama_kategori' => $post['utama']
        );
        return $this->db->insert('kategori', $data);
    }
    public function show($id = null)
    {
        return $this->db->where('id_kategori', $id)->get('kategori')->row_array();
    }
    public function update($post)
    {
        $data = array(
            'nama_kategori' => $post['nama'],
            'utama_kategori' => $post['utama']
        );
        return $this->db->where('id_kategori', $post['kode'])->update('kategori', $data);
    }
    public function destroy($kode)
    {
        return $this->db->simple_query("DELETE FROM kategori WHERE id_kategori='$kode'");
    }
}

/* End of file Mkategori.php */
