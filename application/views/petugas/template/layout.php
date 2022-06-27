<?php
$data = [
  'title' => $title,
  'index' => $index
];
$this->load->view('petugas/template/header', $data);
$this->load->view('petugas/template/navbar');
$this->load->view('petugas/template/sidebar', $data);
$this->load->view($content);
$this->load->view('petugas/template/footer');
