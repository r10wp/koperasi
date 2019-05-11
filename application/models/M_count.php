<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_count extends CI_Model
{
  public function index($options) {

    $select = false;  $table = false;
    $join = false;    $order = false;
    $limit = false;   $offset = false;
    $where = false;   $or_where = false;
    $single = false;  $where_not_in = false;
    $like = false;    $setjoin = false;

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
    return $query->num_rows();
  }

  function checkDuplicateEntry($table,$where,$data)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($where,$data);
    $query = $this->db->get();
    return $query->num_rows();
  }



  function logged_id()
  {
    return $this->session->userdata('ai_anggota');
  }

  function FunctionName1()
  {
    // code...
  }
  function FunctionName2()
  {
    // code...
  }
  function FunctionName3()
  {
    // code...
  }
}
