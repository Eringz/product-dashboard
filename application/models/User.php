<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Model
    {
        /*
            DOCU: This is to get user email for validation purpose.
            Owner: Ron Santos
        */
        function get_user_by_email($email)
        {
            $query = "SELECT * FROM users WHERE email=?";
            return $this->db->query($query, $this->security->xss_clean($email))->result_array()[0];
        }
        /* 
            DOCU: This is to validate input fields, unique email and matching password.
            Owner: Ron Santos
        */
        function validate_registration($email)
        {
            // $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div>', '</div>');
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
            
            if(!$this->form_validation->run()){
                return validation_errors();
            }else if($this->get_user_by_email($email)){
                return "Email already taken.";
            }
        }

        /*
            DOCU: It create user information upon filling up in register page.
            Owner: Ron Santos
        */
        function create_user($user)
        {
            $query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) VALUES (?,?,?,?,NOW(),NOW())";
            $values = array(
                $this->security->xss_clean($user['first_name']),
                $this->security->xss_clean($user['last_name']),
                $this->security->xss_clean($user['email']),
                md5($this->security->xss_clean($user['password']))
            );
            return $this->db->query($query, $values);
        }

        /*
            DOCU: This function will validates the email and password and give result before checking user in database. 
            Owner: Ron Santos
        */
        function validate_login_form()
        {
            $this->form_validation->set_error_delimiters('<div>', '</div>');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            if(!$this->form_validation->run()){
                return validation_errors();
            }else{
                return 'success';
            }
        }

        function validate_login_match($user, $password){
            $hash_password = md5($this->security->xss_clean($password));
            if($user && $user['password'] == $hash_password){
                return 'success';
            }else{
                return 'Incorrect email/password';
            }
        }

        /*
            DOCU: This function is to validate user input
            Owner: Ron Garcia Santos
        */
        function validate_user()
        {
            $this->form_validation->set_error_delimiters('<div>', '</div>');
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');

            if(!$this->form_validation->run()){
                return validation_errors();
            }
        }

        /*
            DOCU: This function update user information in database.
            Owner: Ron Garcia Santos
        */
        function update_user($user, $user_id)
        {
            $query = "UPDATE users SET first_name=?, last_name=?, email=?, updated_at = NOW() WHERE(id=?)";
            $values = array(
                $this->security->xss_clean($user['first_name']),
                $this->security->xss_clean($user['last_name']),
                $this->security->xss_clean($user['email']),
                $this->security->xss_clean($user_id)
            );
            return $this->db->query($query, $values);
        }

        /*
            DOCU: This function validate the input for changing password.
            Owner: Ron Garcia Santos
        */
        function validate_input()
        {
            $this->form_validation->set_error_delimiters('<div>', '</div>');
            $this->form_validation->set_rules('old_password', 'Old Password', 'required');
            $this->form_validation->set_rules('new_password', 'New Password', 'required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

            if(!$this->form_validation->run()){
                return validation_errors();
            }
        }

        function validate_password($user, $old_password)
        {
            $hash_password = md5($this->security->xss_clean($old_password));
            if($user && $user['password'] == $hash_password){
                return "success";
            }else{
                return "Password does'nt match";
            }
        }

        function update_password($new_password, $user_id)
        {
            $query = "UPDATE users SET password =?, updated_at= NOW() WHERE id=?";
            $values = array(
                md5($this->security->xss_clean($new_password)),
                $this->security->xss_clean($user_id)
            );
            return $this->db->query($query, $values);
        }
    
    }
    
?>