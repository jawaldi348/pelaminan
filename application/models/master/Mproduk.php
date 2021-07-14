<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mproduk extends CI_Model
{
    public function fetch_all()
    {
        return $this->db->from('produk')
            ->join('kategori', 'id_kategori=kategori_produk')
            ->get()->result_array();
    }
    public function kode()
    {
        $query = $this->db
            ->select('id_produk', FALSE)
            ->order_by('id_produk', 'DESC')
            ->limit(1)
            ->get('produk');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->id_produk) + 1;
        } else {
            $kode = 1;
        }
        return $kode;
    }
    public function store($post, $link)
    {
        $data = array(
            'id_produk' => $this->kode(),
            'nama_produk' => $post['nama'],
            'kategori_produk' => $post['kategori'],
            'harga_produk' => $post['harga'],
            'desc_produk' => $post['desc'],
            'image_produk' => $link,
            'status_produk' => $post['status']
        );
        return $this->db->insert('produk', $data);
    }
    public function show($id = null)
    {
        return $this->db->where('id_produk', $id)->get('produk')->row_array();
    }
    public function update($post, $link)
    {
        $kode = $post['kode'];
        if ($link == null) {
            $data = array(
                'nama_produk' => $post['nama'],
                'kategori_produk' => $post['kategori'],
                'harga_produk' => $post['harga'],
                'desc_produk' => $post['desc'],
                'status_produk' => $post['status']
            );
        } else {
            $data = $this->show($kode);
            unlink($data['image_produk']);
            $data = array(
                'nama_produk' => $post['nama'],
                'kategori_produk' => $post['kategori'],
                'harga_produk' => $post['harga'],
                'desc_produk' => $post['desc'],
                'image_produk' => $link,
                'status_produk' => $post['status']
            );
        }
        return $this->db->where('id_produk', $kode)->update('produk', $data);
    }
    public function destroy($kode)
    {
        $data = $this->show($kode);
        unlink($data['image_produk']);
        return $this->db->simple_query("DELETE FROM produk WHERE id_produk='$kode'");
    }
    public function perkategori($kategori)
    {
        return $this->db->from('produk')
            ->join('kategori', 'id_kategori=kategori_produk')
            ->where('id_kategori', $kategori)
            ->get()->result_array();
    }
}

/* End of file Mproduk.php */
