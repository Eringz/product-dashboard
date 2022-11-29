<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{

    /*
        DOCU: it displays dashboard when user signed in and log in if not already signed in. 
    */
    public function index()
    {
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id){
            $this->load->view("templates/login_header");
            $this->load->view('users/login');
        }else{
            redirect('products');
        }
        
    }
    /* 
        Docu: It displays the register page when currently user not signed in.
    */
    public function register()
    {
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id){
            $this->load->view('templates/register_header');
            $this->load->view('users/register');
        }else if($current_user_id == 1){
            redirect('dashboard/admin');
        }else{
            redirect('dashboard');
        }
        
    }

    public function login()
    {
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id){
            $this->load->view('templates/login_header');
            $this->load->view('users/login');
        }else if($current_user_id == 1){
            redirect('dashboard/admin');
        }else{
            redirect('dashboard');
        }
    }
    /*
        DOCU: It logs out the current user and then redirect to login page.
    */
    public function logoff()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    /*
        DOCU: triggered when the login button is clicked
        Email and password validation requires to proceed in product dashboard.
    */
    function process_login()
    {
        $result = $this->user->validate_login_form();
        if($result != 'success'){
            $this->session->set_flashdata('input_errors', $result);
            redirect('login');
        }else{
            $email = $this->input->post('email');
            $user = $this->user->get_user_by_email($email);
            $result = $this->user->validate_login_match($user, $this->input->post('password'));

            if($result == 'success'){
                $this->session->set_userdata(array(
                                                'user_id' => $user['id'], 
                                                'first_name' => $user['first_name'], 
                                                'last_name' => $user['last_name'],
                                                'email' => $user['email'],
                                                'password' => $user['password']
                    )
                );

                $current_user_id = $this->session->userdata('user_id');
                if($current_user_id == 1){
                    redirect('dashboard/admin');
                }else{
                    redirect('dashboard');
                }
                
            }else{
                $this->session->set_flashdata('input_errors', $result);
                redirect('/login');
            }
        }
    }

    /*  DOCU: Triggered when the register button is clicked.
        Email validation requires if already taken.
    */
    public function process_registration()
    {
        $email = $this->input->post('email');
        $result = $this->user->validate_registration($email);
        if($result != null){
            $this->session->set_flashdata('input_errors', $result);
            redirect('/register');
        }else{
            $user_data = $this->input->post();
            $this->user->create_user($user_data);
            $new_user = $this->user->get_user_by_email($user_data['email']);
            $this->session->set_userdata(array(
                                                'user_id' => $new_user['id'], 
                                                'first_name' => $new_user['first_name'],
                                                'last_name' => $new_user['last_name'],
                                                'email' => $new_user['email'],
                                                'password' => $new_user['password'],
                                            )
                                        );
            
            $current_user_id = $this->session->userdata('user_id');
            if($current_user_id == 1){
                redirect('/dashboard/admin');
            }else{
                redirect('/dashboard');
            }
            
        }
    }

    /*
        DOCU: This is to show the edit form of a user when clicked.
        Owner: Ron Santos
    */
    public function edit()
    {
        $current_user_id = $this->session->userdata('user_id');
        if($current_user_id == 1){
            $this->load->view('templates/admin_header');
        }else{
            $this->load->view('templates/user_header');
        }
        $this->load->view('products/edit');
        $this->output->enable_profiler();
    }

    /* 
        DOCU: This is to update the information of a user.
        Owner: Ron Santos
    */
    public function update(){
        $user_data = $this->input->post();
    }

}
    