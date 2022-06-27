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
            $data = [
                'nama_kriteria' => $this->POST('nama_kriteria'),
                'bobot_vektor' => $this->POST('bobot'),
                'tipe' => $this->POST('tipe'),
                'penilai' => $this->POST('penilai')
            ];
            $this->Kriteria_m->insert($data);
            $id = $this->db->insert_id();

            $this->flashmsg('KRITERA BERHASIL DITAMBAH!', 'success');
            redirect('operator/kriteria/' . $id);
            exit();
        }

        if ($this->POST('edit')) {
            $data = [
                'nama_kriteria' => $this->POST('nama_kriteria'),
                'bobot_vektor' => $this->POST('bobot'),
                'tipe' => $this->POST('tipe'),
                'penilai' => $this->POST('penilai')
            ];

            $this->Kriteria_m->update($this->POST('id_kriteria'), $data);

            $this->flashmsg('DATA BERHASIL TERSIMPAN!', 'success');
            redirect('operator/kriteria/' . $this->POST('id_kriteria'));
            exit();
        }

        if ($this->POST('hapus')) {
            $id_kriteria = $this->POST('id_kriteria');
            $this->Kriteria_m->delete($id_kriteria);
            $this->flashmsg('Kriteria berhasil dihapus!', 'success');
            redirect('operator/kriteria/');
            exit();
        }


        if ($this->uri->segment(3)) {
            if ($this->Kriteria_m->get_num_row(['id_kriteria' => $this->uri->segment(3)]) == 1) {
                $this->data['kriteria'] = $this->Kriteria_m->get_row(['id_kriteria' => $this->uri->segment(3)]);
                $this->data['list_sub'] = $this->Bobot_m->get(['id_kriteria' => $this->uri->segment(3)]);


                $this->data['title']  = 'Kelola Kriteria - ' . $this->data['kriteria']->nama_kriteria . '';
                $this->data['index'] = 3;
                $this->data['content'] = 'operator/detailkriteria';
                $this->template($this->data, 'operator');
            } else {
                redirect('sekretariat/kriteria');
                exit();
            }
        } else {
            $this->data['list_kriteria'] = $this->Kriteria_m->get();


            $this->data['title']  = 'Kelola Data Kriteria';
            $this->data['index'] = 3;
            $this->data['content'] = 'operator/kriteria';
            $this->template($this->data, 'operator');
        }
    }

    public function kegiatan()
    {
        if ($this->POST('tambah')) {
            $data = [
                'keterangan' => $this->POST('ket'),
                'bobot' => $this->POST('nilai'),
                'id_kriteria' => $this->POST('id_kriteria')
            ];
            $this->Bobot_m->insert($data);

            $this->flashmsg('BOBOT KRITERA BERHASIL DITAMBAH!', 'success');
            redirect('operator/kriteria/' . $this->POST('id_kriteria'));
            exit();
        }

        if ($this->POST('edit')) {
            $data = [
                'keterangan' => $this->POST('ket'),
                'bobot' => $this->POST('nilai'),
                'id_kriteria' => $this->POST('id_kriteria')
            ];

            $this->Bobot_m->update($this->POST('id_bobot'), $data);

            $this->flashmsg('DATA BERHASIL TERSIMPAN!', 'success');
            redirect('operator/kriteria/' . $this->POST('id_kriteria'));
            exit();
        }

        if ($this->POST('hapus')) {
            $this->Bobot_m->delete($this->POST('id_bobot'));
            $this->flashmsg('DATA BOBOT KRITERA BERHASIL DIHAPUS!', 'success');
            redirect('operator/kriteria/' . $this->POST('id_kriteria'));
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
