<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  public function index() {
    if($this->session->userdata('username')) {
      redirect('app/index');
    } else {
      $this->login();
    }
  }

  public function login() {
    $data['header'] = "Login";
    $data['content'] = 'site/login_view';
    $this->load->view('template/layout', $data);
  }
  
  public function logout() {
    $this->session->sess_destroy();
    redirect('site/login');
  }

    public function login_validation() {
    $this->form_validation->set_rules('username', 'Username',
      'trim|required|callback_login_check');
    $this->form_validation->set_rules('password', 'Password',
      'trim|required|md5');
    
    if($this->form_validation->run()) {
      $user = $this->model_users->get_user_by_username($this->input->post('username'));
      
      $session_data = array(
        'id' => $user->id,
        'username' => $user->username,
        'email' => $user->email
      );
      $this->session->set_userdata($session_data);
      
      redirect('app/index');
    } else {
      $this->login();
    }
  }
  
  public function login_check() {
    if($this->model_users->user_login()) {
      return TRUE;
    } else {
      $this->form_validation->set_message('login_check',
        'Incorrect Username or Password.');
      return FALSE;
    }
  }
  
  public function signup() {
    $data['header'] = 'Sign Up';
    $data['content'] = 'site/signup_view';
    $this->load->view(TEMPLATE, $data);
  }
  
  public function signup_validation() {
    $this->form_validation->set_rules('username', 'Username',
      'required|trim|min_length[5]|max_length[12]|is_unique[users.username]');
    $this->form_validation->set_rules('email', 'E-mail',
      'required|trim|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('password', 'Password',
      'required|trim|min_length[6]|max_length[12]');
    $this->form_validation->set_rules('cpassword', 'Confirm Password',
      'required|trim|matches[password]');
    
    if($this->form_validation->run()) {
      $key = md5(uniqid());
      
      $this->email->from('ivanzvonimirhorvat@gmail.com', 'ToDo List');
      $this->email->to($this->input->post('email'));
      $this->email->subject('Confirm your account');
      
      $body  = '<p>Hello ' . $this->input->post('username') . '</p>';
      $body .= '<p>Please click this <a href="' . base_url() . 'site/register_user/' . $key . '">link</a>';
      $body .= ' to confirm your account</p>';
      
      $this->email->message($body);
      
      if($this->model_users->add_user($key)) {
        if($this->email->send()) {
          $data['message'] = 'Hello, ' . $this->input->post('username') . ' please check your e-mail.';
          $data['content'] = 'site/sent_view';
          $this->load->view(TEMPLATE, $data);
        } else {
          echo $this->email->print_debugger();
        }
      } else {
        echo $this->db->display_error();
      }
    } else {
      $this->signup();
    }
  }

  public function register_user($key) {
    $user = $this->model_users->get_user_by_key($key);
        
    if($this->model_users->activate_user($key)) {
      $session_data = array(
        'id'       => $user->id,
        'username' => $user->username,
        'email'    => $user->email
      );
      $this->session->set_userdata($session_data);
      $this->index();
    } else {
      echo $this->db->display_error();
    }
  }

}