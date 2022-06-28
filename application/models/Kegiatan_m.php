<?php
class Kegiatan_m extends MY_Model
{

    function __construct()
    {
        parent::__construct();
        $this->data['primary_key'] = 'id_kegiatan';
        $this->data['table_name'] = 'uraian_kegiatan';
    }

    public function get_tgl($tgl)
    {
        $hari = date("D", strtotime($tgl));
        $tanggal = date("j", strtotime($tgl));
        $bulan = date("m", strtotime($tgl));
        $tahun = date("Y", strtotime($tgl));

        switch ($hari) {
            case 'Sun':
                $hari_ini = "Minggu";
                break;

            case 'Mon':
                $hari_ini = "Senin";
                break;

            case 'Tue':
                $hari_ini = "Selasa";
                break;

            case 'Wed':
                $hari_ini = "Rabu";
                break;

            case 'Thu':
                $hari_ini = "Kamis";
                break;

            case 'Fri':
                $hari_ini = "Jumat";
                break;

            case 'Sat':
                $hari_ini = "Sabtu";
                break;

            default:
                $hari_ini = "Tidak di ketahui";
                break;
        }

        $bulan = $this->Laporan_m->get_namabulan($bulan);

        return  $hari_ini . ', ' . $tanggal . ' ' . $bulan . ' ' . $tahun;
    }
}
