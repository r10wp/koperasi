<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Wilayah extends CI_Controller
{

	function add_ajax_kab($id_prov)
	{
    	$query = $this->db->get_where('kabupaten',array('id_provinsi'=>$id_prov));
    	$data = "<option value=''>- Select Kabupaten -</option>";
    	foreach ($query->result() as $value) {
      	$data .= "<option value='".$value->id."'>".$value->nama."</option>";
    	}
    	echo $data;
	}

	function add_ajax_kec($id_kab)
	{
    	$query = $this->db->get_where('kecamatan',array('id_kabupaten'=>$id_kab));
    	$data = "<option value=''> - Pilih Kecamatan - </option>";
    	foreach ($query->result() as $value) {
      	$data .= "<option value='".$value->id."'>".$value->nama."</option>";
    	}
    	echo $data;
	}

}
