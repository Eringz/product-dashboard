<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Comment extends CI_Model
    {
        /*
            DOCU: This function is to validate comment input from a user.
            Owner: Ron Garcia Santos
        */
        function validate_comment()
        {
            $this->form_validation->set_error_delimiters('<div>', '</div>');
            $this->form_validation->set_rules('comment', 'Comment', 'required');

            if(!$this->form_validation->run()){
                return validation_errors();
            }else{
                return 'success';
            }
        }

    }
?>