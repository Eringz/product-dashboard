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
            DOCU: This function is to store review information.
            Owner: Ron Garcia Santos
        */
        function add_review($current_user_id, $review, $product_id)
        {
            $query = "INSERT INTO reviews(user_id, review, product_id, created_at, updated_at) VALUES(?, ?, ?, NOW(), NOW())";
            $values = array($current_user_id, $review, $product_id);
            return $this->db->query($query, $values);
        }

        /*
            DOCU: This function is to get the review information stored.
            Owner: Ron Garcia Santos
        */
        function get_reviews()
        {
            $query = "SELECT reviews.*,DATE_FORMAT(reviews.created_at, '%M %D %Y') AS created, TIMESTAMPDIFF(MINUTE, reviews.created_at, NOW()) AS time_diff, CONCAT(first_name, ' ', last_name) as username  FROM reviews
                        INNER JOIN products ON products.id = reviews.product_id
                        INNER JOIN users ON users.id = reviews.user_id
                        ORDER BY reviews.created_at DESC";
            return $this->db->query($query)->result_array();
        }

        function get_review_time_diff($now, $created)
        {
            $now *= 60;
            $minute = round($now / 60);
            $hour = round($minute / 60);
            $day = round($hour / 24);
            $week = round($day / 7);
            
            if($now < 60){
                return $now . ' seconds ago';
            }elseif($now >= 60 AND $now < 3600 ){
                return $minute . ' minutes ago';
            }elseif($now >= 3600  AND $now < 86400){
                return $hour . " hours ago";
            }elseif($now >= 86400 AND $now < 604800 ){
                return $day . " days ago";
            }else{
                return $created;
            }

        }
        
    }
?>