<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class login extends CI_Controller
{
 
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'Recaptcha'));
        $this->load->model('m_login');
    }
 
    public function index()
    {   
        if($this->m_login->logged_id())
            {
                //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
                redirect("entry");

            }else{
         $data = array(
             'action' => site_url('login/aksi_login'),
            // 'username' => set_value('username'),
            // 'password' => set_value('password'),
            'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
            'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
        );
 
        $this->load->view('v_login', $data);
        }
    }
 
    public function aksi_login()
    {
        // validasi form
        $username = $this->input->post('username');
     $password = $this->input->post('pass');
        // $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
 
        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($recaptcha);
    
        // if ($this->form_validation->run() == FALSE || !isset($response['success']) || $response['success'] <> true) {
       
         if ($response['success'] <> true  ) {
             // echo "Silahkan isi Recaptcha terlebih dahulu";
             $data = array(
             'action' => site_url('login/aksi_login'),
            'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
            'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
            'pesan' => 'Silahkan Isi Recapthca terlebih dahulu',
            'class_alert' =>'alert alert-warning'
        );
 
        $this->load->view('v_login', $data);
            // echo "gagal";
        } else {
            // lakukan proses validasi login disini
            // pada contoh ini saya anggap login berhasil dan saya hanya menampilkan pesan berhasil
            // tapi ini jangan di contoh ya menulis echo di controller hahahaha
        $where = array(
            'username' => $username,
            'password' => md5($password)
            );
        $cek = $this->m_login->cek_login("users",$where);
        // if($cek > 0){
 
        //     $data_session = array(
        //         'nama' => $username,
        //         'password' => md5($password),
        //         'status' => "login"
        //         );

            if ($cek->num_rows() > 0) {
                    foreach ($cek ->result() as $apps) {

                        $session_data = array(
                            'user_id'   => $apps->id_user,
                            'user_name' => $apps->username,
                            'user_pass' => $apps->password
                           
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);

            
           
            $data['user'] = $this->m_login->tampil_data()->result();

          
            // $password_bener=md5($password);
            // $id=$this->m_login->get_id($username);
            //  foreach ($id->result() as $key) {
            //     echo $key ->id;
            redirect('entry');
        }
             }else
             {
            $data = array(
             'action' => site_url('login/aksi_login'),
            'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
            'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
            'pesan' => 'Username atau password salah !',
            'class_alert' =>'alert alert-danger'
        );
 
        $this->load->view('v_login', $data);
        }
            
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
 
}	
