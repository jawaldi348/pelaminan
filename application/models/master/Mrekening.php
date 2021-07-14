<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mrekening extends CI_Model
{
    public function fetch_all()
    {
        return $this->db
            ->from('rekening')
            ->join('bank_kode', 'id_bank=idbank_rekening')
            ->get()->result_array();
    }
    public function bank()
    {
        return $this->db->get('bank_kode')->result_array();
    }
    public function kode()
    {
        $query = $this->db
            ->select('id_rekening', FALSE)
            ->order_by('id_rekening', 'DESC')
            ->limit(1)
            ->get('rekening');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->id_rekening) + 1;
        } else {
            $kode = 1;
        }
        return $kode;
    }
    public function store($post)
    {
        $data = array(
            'id_rekening' => $this->kode(),
            'idbank_rekening' => $post['bank'],
            'nomor_rekening' => $post['nomor'],
            'atasnama_rekening' => $post['pemilik']
        );
        return $this->db->insert('rekening', $data);
    }
    public function show($kode)
    {
        return $this->db->where('id_rekening', $kode)->get('rekening')->row_array();
    }
    public function update($post)
    {
        $data = array(
            'idbank_rekening' => $post['bank'],
            'nomor_rekening' => $post['nomor'],
            'atasnama_rekening' => $post['pemilik']
        );
        return $this->db->where('id_rekening', $post['kode'])->update('rekening', $data);
    }
    public function destroy($kode)
    {
        return $this->db->simple_query("DELETE FROM rekening WHERE id_rekening='$kode'");
    }
}

/* End of file Mrekening.php */
