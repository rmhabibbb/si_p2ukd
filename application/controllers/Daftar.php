<?php
class Daftar extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->data['email'] = $this->session->userdata('email');
        $this->data['id_role']  = $this->session->userdata('id_role');
        if (isset($this->data['email'], $this->data['id_role'])) {
            if ($this->data['id_role'] == 1) {
                redirect('admin');
                exit();
            } elseif ($this->data['id_role'] == 2) {
                redirect('petugas');
                exit();
            } else {
                redirect('login');
                exit();
            }
        }
        $this->load->model('User_m');
        $this->load->model('Petugas_m');
    }


    public function index()
    {

        if ($this->POST('daftar')) {
            $email = $this->POST('email');

            setcookie('email_temp', $email, time() + 5, "/");
            setcookie('nama_temp', $this->POST('nama'), time() + 5, "/");
            setcookie('nip_temp', $this->POST('nip'), time() + 5, "/");

            $cek = 0;
            $msg = '';
            if ($this->User_m->get_num_row(['email' => $email]) != 0) {
                $msg = $msg  . 'Email telah digunakan!<br>';
                $cek++;
            }
            if ($this->Petugas_m->get_num_row(['email' => $email]) != 0) {
                $msg =  $msg  . 'NIP telah digunakan! <br>';
                $cek++;
            }
            if ($this->POST('password2') != $this->POST('password')) {
                $msg =  $msg  . 'Password tidak sama!<br>';
                $cek++;
            }
            if ($cek != 0) {
                $this->flashmsg('<i class="glyphicon glyphicon-remove"></i>' . $msg, 'warning');
                redirect('daftar');
                exit();
            }
            $data = [
                'email' => $this->POST('email'),
                'password' => md5($this->POST('password2')),
                'role' => 2
            ];

            if ($this->User_m->insert($data)) {

                $data = [
                    'nip' => $this->POST('nip'),
                    'email' => $this->POST('email'),
                    'nama_petugas' => $this->POST('nama')
                ];
                if ($this->Petugas_m->insert($data)) {
                    $user_session = [
                        'email' => $this->POST('email'),
                        'id_role' => 2
                    ];
                    $this->session->set_userdata($user_session);
                    $this->flashmsg('Selamat datang, proses pendaftaran akun anda berhasil, silahkan lengkapi profil anda.', 'success');
                    redirect('petugas/profil');
                    exit();
                } else {
                    $this->User_m->delete($this->POST('email'));
                }
            } else {
                $this->flashmsg('<i class="glyphicon glyphicon-remove"></i> Gagal, Coba lagi!', 'warning');
                redirect('daftar');
                exit();
            }
        }

        $this->data['title']  = 'Daftar - P2UKD';
        $this->data['content'] = 'pages/daftar';
        $this->template($this->data);
    }



    public function cekemail()
    {
        echo $this->User_m->cekemail($this->input->post('email'));
    }
    public function cekpasslama()
    {
        echo $this->User_m->cekpasslama($this->data['email_peserta'], $this->input->post('pass'));
    }
    public function cekpass()
    {
        echo $this->User_m->cek_password_length($this->input->post('pass1'));
    }
    public function cekpass2()
    {
        echo $this->User_m->cek_passwords($this->input->post('pass1'), $this->input->post('pass2'));
    }
}
