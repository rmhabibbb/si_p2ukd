<?php

class Keluar extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->flashmsg('<i class="glyphicon glyphicon-remove"></i> Anda berhasil logout!', 'success');

        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_role');
        redirect('masuk');
        exit;
    }
}
