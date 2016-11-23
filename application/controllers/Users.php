<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
  public function __construct()
        {
                parent::__construct();
        }
   public function index()
   {
      
      if($this->user_authentication())
      {
        redirect('/Pokes');
      }
       $errors=$this->session->flashdata('errors');
       $register_message=$this->session->flashdata('register_message');

       $this->load->view('index',Array("errors"=>$errors,
                                        "register_message" => $register_message));
   }
   //processes the user login
   public function register(){      
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->form_validation->set_rules('name', 'Name','required');
        $this->form_validation->set_rules('alias', 'Alias','required|is_unique[users.alias]');
        $this->form_validation->set_rules('register_email', 'Email','required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('register_password', 'Password', 'required');   
        $this->form_validation->set_rules('confirm_pass', 'Password', 'required|matches[register_password]');                
                      // var_dump($this->input->post());
                      // die();
        if ($this->form_validation->run() == FALSE)
               {
                       $this->session->set_flashdata('errors',validation_errors());
                       redirect('/');
               }
               else
               {
                      $id=$this->User->register_user($this->input->post());
                      $this->session->set_userdata('user_id',$id);
                $this->session->set_flashdata('register_message', "You have successfully registered! Please Login");
                $this->session->flashdata('register_message');      
                      redirect('/');                }
       
   }
   public function login()
   {


       $this->load->library('form_validation');
        $this->form_validation->set_rules('login_email', 'Login Email','required|valid_email');
        $this->form_validation->set_rules('login_password', 'Login Password', 'required');                
        if ($this->form_validation->run() == FALSE)
        {
                   $this->session->set_flashdata('errors',validation_errors());
                   redirect('/');
        }
        else
        {
           $email = $this->input->post('login_email');
           $password = $this->input->post('login_password');

           $this->User->get_user_by_email($email,$password);
           $user_found = $this->User->get_user_by_email($email,$password); 
          
          


           if(!$user_found)
          {
            redirect('/');

          } else 
            
          {
              /*$user_found = array(
                               'user_id' => $user['id'],
                               'user_alias' => $user['alias' ],
                               'is_logged_in' => true
                               );*/
              $this->session->set_userdata('user', $user_found['alias']);
              $this->session->set_userdata('user_id', $user_found['id']);
                            
              redirect('/Pokes');    
              
              //$this->load->view('books', array('session_user' => $this->session->userdata('user')));    
           }
          
        }
}
   //simple profile page of a user
  public function profile(){
    
        if (!$this->session->userdata('user')){
            redirect('/');
        }
        $user = $this->session->userdata('user');        
        $this->load->view('welcome', array(
                                'user'=>$this->session->userdata('user'),
                                'register_message' => $this->session->flashdata('register_message')));    }
   
    public function logout()
   {
       $this->session->sess_destroy();
       redirect('/');   
   }
   // public function logoutmessage(){
   //     $this->session->set_flashdata("errors", "You have logged out!");
   //     redirect('/');
   // }
	public function show_user() 
	{
	// 	public function show($id)
	// {
	// 	$data['product'] = $this->Product->find_by($id);
	// 	$this->load->view("product_page", $data);
	// }

	}
}
