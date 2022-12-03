<?php
    defined('BASEPATH') OR exit('No direct script access is allowed');

    class Review extends CI_Model
    {

        /*
            DOCU: This function is to validate review input from a user.
            Owner: Ron Garcia santos
        */
        function validate_review()
        {
            $this->form_validation->set_error_delimiters('<div>', '</div>');
            $this->form_validation->set_rules('review', 'Review', 'required');
            
            if(!$this->form_validation->run()){
                return validation_errors();
            }else{
                return 'success';
            }
        }

        /*
            DOCU: This function is to store review data.
            Owner: Ron Garcia Santos
        */
        function add_review($user_id, $review)
        {
            $query = 'INSERT INTO reviews(user_id, review, created_at, updated_at) VALUES(?,?,NOW(),NOW())';
            $values = array($user_id, $review);
            return $this->db->query($query, $values);
        }

        function get_reviews()
        {
            $query = "SELECT reviews.id as review_id ";
        }
    }
?>