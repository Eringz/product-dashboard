<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Product-dashboard">
        <meta name="author" content="Ron Garcia Santos">
        <title>Product Information</title>
        <link rel="stylesheet" href="<?= base_url();?>assets/css/home_style.css">
    </head>
    <style>
        p, h3, form{
            margin: 20px;
        }

        input{
            background-color: green;
            color: white;
            display: block;
            padding: 8px 30px;
            margin: 10px 0 0 1270px;
            border: none;
            border-radius: 3px;
        }
        
        .reviewer-p{
            display: inline-block;
            margin: 0;
            width: 85%;
        }
        .reviewer-content{
            display: inline-block;
            padding: 20px;
            margin: 5px 0;
            width: 89%;
            border: 1px solid black;

        }

        .comment-div{
            margin: 0 95px;
        }
        .commentator-p{
            display: inline-block;
            margin-bottom: 0;
            width: 86%;
        }
        .comment-p{
            padding: 20px 0 0 20px;
            margin-top: 0;
            height: 40px;
            border: 1px solid black;
        }
        .reviewer-s, .commentator-s{
            color: gray;
        }

        .reviewer-s, .commentator-s{
            font-size: .85rem;
        }

        .comment-input{
            margin: 20px 0 0 115px;
        }
    </style>
    <body>
        <div class="errors"><?= $this->session->userdata('input_errors'); ?></div>
        <h2><?= $product['product_name']; ?>($<?= $product['price']; ?>)</h2>
        <p>Added since: <?= $product['created']; ?> </p>
        <p>Product ID #<?= $product['id']; ?></p>
        <p>Description: <?= $product['description']; ?> </p>
        <p>Total sold: <?= $product['qty_sold']; ?></p>
        <p>Number of available stocks: <?= $product['inventory_count']; ?></p>
        <h3>Leave a Review</h3>
        <form action="<?= base_url(); ?>products/validate_review" method="POST">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <textarea name="review" id="" cols="200" rows="8"></textarea>
            <input type="submit" value="Post" id="post">
        </form>
<?php
    foreach($inbox as $review){
?>
        <div class="review-div">
            <form  action="<?= base_url(); ?>products/validate_comment" method="POST">
                <p class="reviewer-p"><?= $review['username']?> wrote:</p> <span class="reviewer-s"><?= $review['review_time']?></span>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <input type="hidden" name="review_id" value="<?= $review['id']; ?>">
                <p class="reviewer-content"><?= $review['review']; ?></p>
    <?php

        foreach($review['comments'] as $comment){
            $comment_time_diff = $this->comment->get_comment_time_diff($comment['time_diff'], $comment['created']);
            $comment['comment_time'] = $comment_time_diff;
    ?>
                <div class="comment-div">
                    <p class="commentator-p"><?= $comment['commentator']; ?> wrote: </p>
                    <span class="commentator-s"><?= $comment['comment_time']; ?></span>
                    <p class="comment-p"><?= $comment['comment']; ?></p>
                </div>
    <?php
        }
    ?>
                <textarea name="comment" class="comment-input" cols="183" rows="8"></textarea>
                
                
                <input type="submit" value="Post" id="post">
            </form> 
<?php
    }
?>
        </div>
    </body>
</html>