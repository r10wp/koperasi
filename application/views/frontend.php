<?php
	$this->load->view('AppBackEnd/head');
	$this->load->view('AppBackEnd/navbar');
	$this->load->view('AppBackEnd/sidebar');
	$this->load->view($content);
	$this->load->view('AppBackEnd/footer');
?>
