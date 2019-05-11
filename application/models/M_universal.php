<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_universal extends CI_Model
{
  public function index($options) {

    $select = false;  $table = false;
    $join   = false;  $order = false;
    $limit  = false;  $offset = false;
    $where  = false;  $or_where = false;
    $single = false;  $where_not_in = false;
    $like   = false;  $setjoin = false;

    extract($options);

    if ($select != false)
        $this->db->select($select);
    if ($table != false)
        $this->db->from($table);
    if ($where != false)
        $this->db->where($where);
    if ($where_not_in != false) {
      foreach ($where_not_in as $key => $value) {
        if (count($value) > 0) $this->db->where_not_in($key, $value);
      }
    }

    if ($like != false) {
        $this->db->like($like);
    }

    if ($or_where != false)
        $this->db->or_where($or_where);

    if ($limit != false) {
        if (!is_array($limit)) {
            $this->db->limit($limit);
        } else {
            foreach ($limit as $limitval => $offset) {
                $this->db->limit($limitval, $offset);
            }
        }
    }

    if ($order != false) {
      foreach ($order as $key => $value) {
        if (is_array($value)) {
          foreach ($order as $orderby => $orderval)
          {
            $this->db->order_by($orderby, $orderval);
          }
        }else{
          $this->db->order_by($key, $value);
        }
      }
    }

    if ($join != false) {
      foreach ($join as $key => $value) {
        if (is_array($value)) {
          if (count($value) == 3) {
            $this->db->join($value[0], $value[1], $value[2],$setjoin);
          }else{
            foreach ($value as $key1 => $value1) {
              $this->db->join($key1, $value1,$setjoin);
              }
          }
        }else{
          $this->db->join($key, $value,$setjoin);
        }
      }
    }

    $query = $this->db->get();
    if ($single) return $query->row();
    return $query->result();
  }

  function checkDuplicateEntry($table,$where,$data)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($where,$data);
    $query = $this->db->get();
    return $query->num_rows();
  }

  function logged_id_anggota()
  {
    return $this->session->userdata('ai_anggota');
  }

  function logged_id_pengurus()
  {
    return $this->session->userdata('ai_pengurus');
  }

  public function list_bank()
  {
    $this->db->select('*');
    $this->db->from('bank');
    $query = $this->db->get();
    return $query->result();
  }

  public function rekening_nasabah()
  {
    $this->db->select('*');
    $this->db->from('rekening_nasabah');
    $this->db->where('id_pemilik_rekening', $this->session->userdata('ai_anggota'));
    $this->db->join('bank', 'bank.id_bank = rekening_nasabah.id_bank_nasabah');
    $query = $this->db->get();
    return $query->result();
  }

  public function rekening_koperasi()
  {
    $this->db->select('*');
    $this->db->from('rekening_koperasi');
    $this->db->join('bank', 'bank.id_bank = rekening_koperasi.id_bank_koperasi');

    $query = $this->db->get();
    return $query->result();
  }

  public function rekening_koperasi_aktif()
  {
    $this->db->select('*');
    $this->db->from('rekening_koperasi');
    $this->db->join('bank', 'bank.id_bank = rekening_koperasi.id_bank_koperasi');
    $this->db->where('status_rekening_koperasi', '1');
    $query = $this->db->get();
    return $query->result();
  }

  public function data_diri_nasabah()
  {
    $this->db->select('*');
    $this->db->from('anggota');
    $this->db->where('id', $this->session->userdata('ai_anggota'));
    $query = $this->db->get();
    return $query->result();
  }

  public function pekerjaan()
  {
    $this->db->select('*');
    $this->db->from('pekerjaan');
    $query = $this->db->get();
    return $query->result();
  }

  public function settings()
  {
    $this->db->select('*');
    $this->db->from('data_koperasi');
    $query = $this->db->get();
    return $query->result();
  }


  // public function kotak_pesan_nasabah()
  // {
  //   $this->db->select('*');
  //   $this->db->from('pesan');
  //   $this->db->where('kepada', $this->session->userdata('ai_anggota'));
  //   $query = $this->db->get();
  //   return $query->result();
  // }

  // public function search($search)
  // {
  //   $this->db->select('*');
  //   $this->db->from('users');
  //   $this->db->like('username',$search);
  //   $this->db->or_like('fname',$search);
  //   $this->db->or_like('lname',$search);
  //   $this->db->or_like('mname',$search);
  //   $query = $this->db->get();
  //   return $query->result();
  // }



}
