<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mkeranjang extends CI_Model
{
    public function fetch_all()
    {
        return $this->db->from('tmp_order')
            ->join('produk', 'produk_tmp=id_produk')
            ->where('user_tmp', id_pelanggan())
            ->order_by('id_tmp', 'ASC')
            ->get()->result_array();
    }
    public function store($post)
    {
        $check = $this->db->from('tmp_order')->where(['produk_tmp' => $post['id_produk'], 'user_tmp' => id_pelanggan()])->count_all_results();
        if ($check == 0) :
            $data = array(
                'produk_tmp' => $post['id_produk'],
                'jumlah_tmp' => $post['jumlah'],
                'user_tmp' => id_pelanggan()
            );
            return $this->db->insert('tmp_order', $data);
        else :
            return true;
        endif;
    }
    public function update($post)
    {
        if (isset($post['tmp'])) :
            foreach ($post['tmp'] as $key => $value) {
                $data = array(
                    'jumlah_tmp' => $value['jumlah']
                );
                $this->db->where('id_tmp', $value['id_tmp'])->update('tmp_order', $data);
            }
            return true;
        else :
            return false;
        endif;
    }
}

/* End of file Mkeranjang.php */
