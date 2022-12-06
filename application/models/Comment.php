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

        /*
            DOCU: This function is to store information provided by user input.
            Owner: Ron Garcia Santos
        */
        function add_comment($current_user_id, $post)
        {
            $query = "INSERT INTO comments(user_id, review_id, comment, created_at, updated_at) VALUES(?, ?, ?, NOW(), NOW())";
            $values = array($current_user_id, $post['review_id'], $post['comment']);
            return $this->db->query($query, $values);
        }

        function get_comments_by_review_id($review_id)
        {
            $query = "SELECT comments.*,DATE_FORMAT(comments.created_at, '%M %D %Y') AS created, 
                        TIMESTAMPDIFF(MINUTE, comments.created_at, NOW()) AS time_diff,
                        CONCAT(first_name, ' ' , last_name) AS commentator
                        FROM comments
                        INNER JOIN users ON users.id = comments.user_id
                        INNER JOIN reviews ON reviews.id = comments.review_id
                        WHERE reviews.id = ? ORDER BY comments.created_at DESC";
            return $this->db->query($query, $review_id)->result_array();
        }

        function get_comment_time_diff($now, $created)
        {
            $now *= 60;
            $minute = round($now / 60);
            $hour = round($minute / 60);
            $day = round($hour / 24);

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