<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if(!$this->session->userdata('username')) {
      redirect('site/login');
    }
  }
  
  public function index() {
    $all_list = $this->model_list->all_list($this->session->userdata('id'));
    
    if(!$all_list) {
      $data['content'] = 'app/empty_view';
    } else {
      $data['content'] = 'app/index_view';

      foreach($all_list as $list) {
        $username = $this->model_users->get_user_by_id($list->users_id);
        $data['all_list']['list']['user_id'][] = $username->id;
        $data['all_list']['list']['username'][] = $username->username;
        $data['all_list']['list']['list_id'][] = $list->id;
        $data['all_list']['list']['title'][] = $list->title;
        $priority = $this->model_priority->priority_by_id($list->priority_id);
        $data['all_list']['list']['priority'][] = $priority->level;
        $data['all_list']['list']['date_added'][] = $list->date_added;
        $data['all_list']['list']['date_complete'][] = $list->date_complete;
        $data['all_list']['list']['status'][] = $list->status;
      }
    }
   $this->load->view(TEMPLATE, $data);
  }
  
  public function check($list_id, $status) {
    if($this->model_list->check_user($list_id, $this->session->userdata('id'))) {
      $this->model_list->check_by_id($list_id, $status);
    }
    redirect('app/index');
  }
  
  public function add_todo() {
    $data['header'] = 'Add New Item To List';
    $data['content'] = 'app/add_view';
    $this->load->view(TEMPLATE, $data);
  }
  
  public function add_validation() {
    $this->form_validation->set_rules('title', 'Task',
      'required|trim|min_length[6]|max_length[255]');
    
    $date = $this->input->post('year') . '-' . $this->input->post('month')
      . '-' . $this->input->post('day');
    
    if($this->form_validation->run()) {
      $add_task = $this->model_list->add_task($this->session->userdata('id'), $date);
      if($add_task) {
        redirect('app/index');
      } else {
        $this->add_todo();
      }
       
    } else {
      $this->add_todo();
    }
  }
  
  public function remove_task($list_id) {
    if($this->model_list->check_user($list_id, $this->session->userdata('id'))) {
      $this->model_list->remove_task($list_id);
    }
    redirect('app/index');
  }
  
  public function edit_task($list_id) {
    if($this->model_list->check_user($list_id, $this->session->userdata('id'))) {
      $data['content'] = 'app/edit_view';
      $data['edit_form'] = $this->model_list->list_by_id($list_id);
      list($data['form_year'], $data['form_month'], $data['form_day']) = explode('-', $data['edit_form']->date_complete);
      $this->load->view(TEMPLATE, $data);
    } else {
      redirect('app/index');
    }
  }
  
  public function edit_validation() {
    $this->form_validation->set_rules('title', 'Task',
      'required|trim|min_length[6]|max_length[255]');
    
    $date = $this->input->post('year') . '-' . $this->input->post('month')
      . '-' . $this->input->post('day');
    
    if($this->form_validation->run()) {
      $edit_task = $this->model_list->update_task($this->input->post('id'), $date);
      if($edit_task) {
        redirect('app/index');
      } else {
        $this->edit_task($this->input->post('id'));
      }
    } else {
      $this->edit_task($this->input->post('id'));
    }
  }
  
  public function user_info() {
    $data['header'] = 'Your Info';
    $data['content'] = 'app/user_view';
    $data['user_info'] = $this->model_users->get_user_by_id($this->session->userdata('id'));
    $data['date'] = date_parse($data['user_info']->date);
    
    $this->load->view(TEMPLATE, $data);
  }
  
}