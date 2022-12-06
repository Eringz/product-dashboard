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
            margin: 0;
        }
        .reviewer-s{
            margin-left: 78%;
        }

        .comment-div{
            margin: 0 95px;
        }
        .commentator-p{
            margin-bottom: 0;
        }
        .comment-p{
            padding: 20px 0 0 20px;
            margin-top: 0;
            height: 40px;
            border: 1px solid black;
        }
        .commentator-s{
            margin-left: 79%;
        }

        .reviewer-s, .commentator-s{
            font-size: .85rem;
        }
    </style>
    <body>
        <div class="errors"><?= $this->session->userdata('input_errors'); ?></div>
        <h2><?= $product['product_name']; ?>($<?= $product['price']; ?>)</h2>
        <p>Added since: <?= $product['created_at']; ?> </p>
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
    $i = 0;
    foreach($inbox as $review){
        $i++;
?>
        <div class="review-div">
            <form  action="<?= base_url(); ?>products/validate_comment" method="POST">
                <p class="reviewer-p"><?= $review['username']?> wrote: <span class="reviewer-s">7 hours ago</span></p>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <input type="hidden" name="review_id" value="<?= $review['id']; ?>">
                <p><?= $review['review']; ?></p>

                <div class="comment-div">
                    <p class="commentator-p">Commentators wrote: <span class="commentator-s">23 minutes ago</span></p>
                    <p class="comment-p">Thank you for buying</p>
                    <textarea name="comment" id="" cols="200" rows="8"></textarea>
                </div>
                
                <input type="submit" value="Post" id="post">
            </form> 
<?php
    }
?>
        </div>
    </body>
</html>