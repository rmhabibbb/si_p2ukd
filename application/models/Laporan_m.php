<?php
class Laporan_m extends MY_Model
{

    function __construct()
    {
        parent::__construct();
        $this->data['primary_key'] = 'id_laporan';
        $this->data['table_name'] = 'laporan_kegiatan';
    }

    public function get_num_kegiatan($nip)
    {
        $num = 0;
        $list_laporan = $this->Laporan_m->get(['nip' => $nip]);
        foreach ($list_laporan as $l) {
            $num = $num + $this->Kegiatan_m->get_num_row(['id_laporan' => $l->id_laporan]);
        }

        return $num;
    }

    public function get_namabulan($bln)
    {
        if ($bln == 1) {
            return 'Januari';
        } elseif ($bln == 2) {
            return 'Februari';
        } elseif ($bln == 3) {
            return 'Maret';
        } elseif ($bln == 4) {
            return 'April';
        } elseif ($bln == 5) {
            return 'Mei';
        } elseif ($bln == 6) {
            return 'Juni';
        } elseif ($bln == 7) {
            return 'Juli';
        } elseif ($bln == 8) {
            return 'Agustus';
        } elseif ($bln == 9) {
            return 'September';
        } elseif ($bln == 10) {
            return 'Oktober';
        } elseif ($bln == 11) {
            return 'November';
        } elseif ($bln == 12) {
            return 'Desember';
        }
    }

    public function array_bulan()
    {
        return array(
            array(
                'id' => 1,
                'nama' => 'Januari'
            ),
            array(
                'id' => 2,
                'nama' => 'Februari'
            ),
            array(
                'id' => 3,
                'nama' => 'Maret'
            ),
            array(
                'id' => 4,
                'nama' => 'April'
            ),
            array(
                'id' => 5,
                'nama' => 'Mei'
            ),
            array(
                'id' => 6,
                'nama' => 'Juni'
            ),
            array(
                'id' => 7,
                'nama' => 'Juli'
            ),
            array(
                'id' => 8,
                'nama' => 'Agustus'
            ),
            array(
                'id' => 9,
                'nama' => 'September'
            ),
            array(
                'id' => 10,
                'nama' => 'Oktober'
            ),
            array(
                'id' => 11,
                'nama' => 'November'
            ),
            array(
                'id' => 12,
                'nama' => 'Desember'
            ),
        );
    }
}
