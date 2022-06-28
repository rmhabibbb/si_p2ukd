<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->data['email'] = $this->session->userdata('email');
        $this->data['id_role']  = $this->session->userdata('id_role');
        if (!$this->data['email'] || ($this->data['id_role'] != 2)) {
            $this->flashmsg('<i class="glyphicon glyphicon-remove"></i> Anda harus masuk terlebih dahulu', 'danger');
            redirect('masuk');
            exit;
        }

        $this->load->model('User_m');
        $this->load->model('Petugas_m');
        $this->load->model('Laporan_m');
        $this->load->model('Kegiatan_m');

        $this->data['akun'] = $this->User_m->get_row(['email' => $this->data['email']]);
        $this->data['profil'] = $this->Petugas_m->get_row(['email' => $this->data['email']]);

        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {

        $this->data['title']  = 'Dashboard - P2UKD';
        $this->data['index'] = 1;
        $this->data['content'] = 'petugas/dashboard';
        $this->template($this->data, 'petugas');
    }


    public function laporan()
    {
        if ($this->POST('tambah')) {

            $cek = $this->Laporan_m->get_row(['nip' => $this->data['profil']->nip, 'bulan' => $this->POST('bulan'), 'tahun' => $this->POST('tahun')]);

            if (isset($cek)) {
                $this->flashmsg('Laporan telah ada, silahkan masukkan data kegiatan anda.', 'warning');
                redirect('petugas/laporan/' . $cek->id_laporan);
                exit();
            }

            $data = [
                'bulan' => $this->POST('bulan'),
                'tahun' => $this->POST('tahun'),
                'nip' => $this->data['profil']->nip
            ];

            $this->Laporan_m->insert($data);
            $id = $this->db->insert_id();
            $this->flashmsg('Data berhasil dibuat, silahkan masukkan data kegiatan anda', 'success');
            redirect('petugas/laporan/' . $id);
            exit();
        }
        if ($this->POST('edit')) {
            $cek = $this->Laporan_m->get_row(['nip' => $this->data['profil']->nip, 'bulan' => $this->POST('bulan'), 'tahun' => $this->POST('tahun')]);

            if (isset($cek) && $cek->id_laporan != $this->POST('id_laporan')) {
                $this->flashmsg('Maaf, laporan pada bulan dan tahun yang anda pilih telah dibuat.', 'warning');
                redirect('petugas/laporan/' . $this->POST('id_laporan'));
                exit();
            }

            $data = [
                'bulan' => $this->POST('bulan'),
                'tahun' => $this->POST('tahun')
            ];

            $this->Laporan_m->update($this->POST('id_laporan'), $data);

            $this->flashmsg('Data laporan berhasil diubah!', 'success');
            redirect('petugas/laporan/' . $this->POST('id_laporan'));
            exit();
        }

        if ($this->POST('hapus')) {
            $id_laporan = $this->POST('id_laporan');
            $this->Laporan_m->delete($id_laporan);
            $this->flashmsg('Laporan berhasil dihapus!', 'success');
            redirect('petugas/laporan/');
            exit();
        }


        if ($this->uri->segment(3)) {
            if ($this->Laporan_m->get_num_row(['id_laporan' => $this->uri->segment(3)]) == 1) {
                $this->data['laporan'] = $this->Laporan_m->get_row(['id_laporan' => $this->uri->segment(3)]);
                $this->data['list_kegiatan'] = $this->Kegiatan_m->get_by_order('tanggal_kegiatan', 'asc', ['id_laporan' => $this->uri->segment(3)]);


                $this->data['title']  = 'Laporan ' . $this->data['laporan']->bulan . '/' . $this->data['laporan']->tahun . ' - P2UKD';
                $this->data['index'] = 2;
                $this->data['content'] = 'petugas/detaillaporan';
                $this->template($this->data, 'petugas');
            } else {
                redirect('petugas/laporan');
                exit();
            }
        } else {
            $this->data['list_laporan'] = $this->Laporan_m->get(['nip' => $this->data['profil']->nip]);
            $this->data['title']  = 'Data Laporan - P2UKD';
            $this->data['index'] = 2;
            $this->data['content'] = 'petugas/laporan';
            $this->template($this->data, 'petugas');
        }
    }

    public function kegiatan()
    {
        if ($this->POST('tambah')) {
            $data = [
                'keterangan' => $this->POST('keterangan'),
                'nama_kegiatan' => $this->POST('nama_kegiatan'),
                'tanggal_kegiatan' => $this->POST('tanggal_kegiatan'),
                'id_laporan' => $this->POST('id_laporan')
            ];
            $this->Kegiatan_m->insert($data);

            $this->flashmsg('Kegiatan berhasil ditambah!', 'success');
            redirect('petugas/laporan/' . $this->POST('id_laporan'));
            exit();
        }

        if ($this->POST('edit')) {
            $data = [
                'keterangan' => $this->POST('keterangan'),
                'nama_kegiatan' => $this->POST('nama_kegiatan'),
                'tanggal_kegiatan' => $this->POST('tanggal_kegiatan'),
            ];

            $this->Kegiatan_m->update($this->POST('id_kegiatan'), $data);

            $this->flashmsg('Data kegiatan berhasil diubah!', 'success');
            redirect('petugas/laporan/' . $this->POST('id_laporan'));
            exit();
        }

        if ($this->POST('hapus')) {
            $this->Kegiatan_m->delete($this->POST('id_kegiatan'));
            $this->flashmsg('Data kegiatan berhasil dihapus!', 'success');
            redirect('petugas/laporan/' . $this->POST('id_laporan'));
            exit();
        }
    }

    public function downloadpdf()
    {
        $bulan_start = $this->POST('bulan_start');
        $bulan_end = $this->POST('bulan_end');
        $tahun_start = $this->POST('tahun_start');
        $tahun_end = $this->POST('tahun_end');

        $this->data['laporan'] = $this->Laporan_m->get_laporan($this->data['profil']->nip, $bulan_start, $bulan_end, $tahun_start, $tahun_end);

        if (sizeof($this->data['laporan']) != 0) {
            $this->load->library('dompdf_gen');

            $this->load->view('laporan_pdf', $this->data);

            $paper_size = 'A4';
            $orientation = 'potrait';
            $html = $this->output->get_output();
            $this->dompdf->set_paper($paper_size, $orientation);
            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $this->dompdf->stream('Laporan Kegiatan.pdf', array('Attachment' => 0));
        } else {
            $this->flashmsg('Maaf, tidak ada data pada bulan dan tahun yang anda pilih', 'warning');
            redirect('petugas/laporan/');
            exit();
        }
    }

    public function profil()
    {
        $this->data['title']  = 'Profil - P2UKD';
        $this->data['index'] = 3;
        $this->data['content'] = 'petugas/profil';
        $this->template($this->data, 'petugas');
    }

    public function proses_edit_profil()
    {
        if ($this->POST('edit')) {
            $cek = 0;
            $msg = '';

            if ($this->User_m->get_num_row(['email' => $this->POST('email')]) != 0 && $this->POST('email') != $this->POST('email_x')) {
                $msg = $msg . 'Email telah digunakan!<br>';
                $cek++;
            }

            if ($this->Petugas_m->get_num_row(['nip' => $this->POST('nip')]) != 0 && $this->POST('nip') != $this->POST('nip_x')) {
                $msg = $msg . 'NIP telah digunakan!<br>';
                $cek++;
            }

            if ($cek != 0) {
                $this->flashmsg($msg, 'warning');
                redirect('petugas/profil');
                exit();
            }


            $data_user = [
                'email' => $this->POST('email'),
            ];

            $this->User_m->update($this->POST('email_x'), $data_user);


            $data = [
                'nama_petugas' => $this->POST('nama_petugas'),
                'nip' => $this->POST('nip'),
                'rt' => $this->POST('rt'),
                'rw' => $this->POST('rw'),
                'kecamatan' => $this->POST('kecamatan'),
                'kelurahan' => $this->POST('kelurahan'),
                'kabupaten' => $this->POST('kabupaten'),
                'alamat' => $this->POST('alamat'),
                'wilayah_tugas' => $this->POST('wilayah_tugas'),
                'tempat_lahir' => $this->POST('tempat_lahir'),
                'tanggal_lahir' => $this->POST('tanggal_lahir'),
                'status' => 1
            ];

            $this->Petugas_m->update($this->POST('nip_x'), $data);


            $user_session = [
                'email' => $this->POST('email'),
            ];
            $this->session->set_userdata($user_session);


            $this->flashmsg('Profil berhasil disimpan!', 'success');
            redirect('petugas/profil');
            exit();
        } elseif ($this->POST('edit2')) {

            $cek = 0;
            $msg = '';

            if (md5($this->POST('pass'))  != $this->data['akun']->password) {
                $msg = $msg . 'Password lama salah!<br>';
            }
            if ($this->POST('pass1') != $this->POST('pass2')) {
                $msg = $msg . 'Password baru tidak sama!<br>';
                $cek++;
            }

            if ($cek != 0) {
                $this->flashmsg($msg, 'warning');
                redirect('petugas/profil');
                exit();
            }

            $data = [
                'password' => md5($this->POST('pass1'))
            ];

            $this->User_m->update($this->data['email'], $data);

            $this->flashmsg('Password telah diganti!', 'success');
            redirect('petugas/profil');
            exit();
        } else {

            redirect('petugas/profil');
            exit();
        }
    }




    public function cekpasslama()
    {
        echo $this->User_m->cekpasslama($this->data['email'], $this->input->post('pass'));
    }
    public function cekpass()
    {
    }
    public function cekpass2()
    {
        echo $this->User_m->cek_passwords($this->input->post('pass1'), $this->input->post('pass2'));
    }
}
