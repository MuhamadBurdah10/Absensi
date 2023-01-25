<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller 
{
  public function __construct()
	{
		    parent::__construct();
		    $this->load->library('form_validation');
	}

  public function index()

  {

    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Login Page';
      // $this->load->view('templates/header', $data);
      $this->load->view('auth/login');
      // $this->load->view('templates/footer');
    } else {
      //validasi succes
      $this->_login();
    }
  }

  private function _login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user = $this->db->get_where('tbl_pegawai', ['nama_pegawai' => $username])->row_array();

    //var_dump($user); 
    //die;
    # usernya ada..
    if ($user) {
      # jisa user aktif..
      if ($user['is_active'] == 1) {
        # cek password
        if (password_verify($password, $user['password'])) {
          # jika benar
          $data = [
            'nama_pegawai' => $user['nama_pegawai'],
            'id_pegawai' => $user['id'],
            'role_id' => $user['roles'],
            'email' => $user['email'],
            'alamat' => $user['alamat'],
          ];

          $this->session->set_flashdata('message', ' <span class="">Welcome</span>');
          $this->session->set_userdata($data);

          if ($this->input->post($remember)) {
            setcookie('_login', 'true', time() + 86400);
          }

          if ($user['roles'] == 'admin') {
            redirect('admin2');
          } else if ($user['roles'] == 'manager') {
            redirect('manager');
          } else if ($user['roles'] == 'pegawai') {
            redirect('karyawan');
          } else if ($user['role_id'] == 0) {
            redirect('auth');
          }
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
              wrong password</div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
              this email has not been ctiveted</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        email is not registerd</div>');
      redirect('auth');
    }
  }


  public function registration()
  {
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules(
      'email',
      'Email',
      'required|trim|valid_email|is_unique[admin.email]',
      ['is_unique' => 'This Email has already registerd!']
    );
    $this->form_validation->set_rules('password1', 'Password', 'required|trim');
    //|
    //min_length[3]|matches[password2]', [
    //'matches' => 'Password dont match!',
    //'min_length' => 'Password too short!'
    //]);
    //$this->form_validation->set_rules('password2','Password','required|trim|
    //matches[password1]');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Rumah Sakit Ummi Bogor';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('user/registation');
      $this->load->view('templates/auth_footer');
    } else {

      $data = [
        'nama' => htmlspecialchars($this->input->post('name', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'gambar' => 'default.jpg',
        'password' => password_hash(
          $this->input->post('password'),
          PASSWORD_DEFAULT
        ),
        'role_id' => htmlspecialchars($this->input->post('akses', true)),
        'is_active' => 1,
        'date_created' => time()
      ];

      $this->db->insert('admin', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Congratulation has been Created. please Login</div>');
      redirect('auth/registation');
    }
  }
  public function logout()
  {
    $this->session->sess_destroy('email');
    $this->session->sess_destroy('role_id');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          you have been logged out</div>');
    redirect('auth');
  }
}

