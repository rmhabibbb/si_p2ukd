<?php
class Kegiatan_m extends MY_Model
{

    function __construct()
    {
        parent::__construct();
        $this->data['primary_key'] = 'id_kegiatan';
        $this->data['table_name'] = 'uraian_kegiatan';
    }
}
