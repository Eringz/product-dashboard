<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="decription" content="Product Dashboard">
        <meta name="author" content="Ron Garcia Santos">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/css/home_style.css">
        <title>Edit Profile</title>
        <style>
            .update-div, form, p{
                display: inline-block;
            }
            .update-div{
                vertical-align: top;
                width: 48%;
            }
            h3{
                margin: 30px 20px;
                padding: 0;
                font-size: 1.75rem;
            }
            .errors, .success{
                font-size: .8rem;
                margin: 10px 0;
            }
            .errors{
                color: red;
            }
            .success{
                color: green;
            }
            p{
                background-color: white;
                vertical-align: top;
                padding: 5px;
                position: relative;
                top: 5px;
                left: 25%;
                margin: 0px;
            }

            form{
                margin: 20px;
                border: 1px solid black;
                padding: 20px;
                width: 40%;

            }
            input{
                display: block;
                margin: 20px 0;
                width: 90%;
            }
            #save{
                background-color: green;
                border: none;
                border-radius: 3px;
                color: white;
                width: 60px;
                height: 25px;
                margin: 10px 0 0 200px;
            }

        </style>
    </head>
    <body>     
        <h3>Edit Profile</h3>  
        <div class="update-div">
            <p>Edit Information</p>
            <form action="<?= base_url(); ?>edit/validate" method="POST">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="errors"><?= $this->session->flashdata('input_errors') ?></div>
                <div class="success"><?= $this->session->flashdata('input_success')?></div>
                Email address:
                <input type="text" name="email" placeholder="<?= $this->session->userdata('email'); ?>" value="<?= $this->session->userdata('email'); ?>">
                First name:
                <input type="text" name="first_name" placeholder="<?= $this->session->userdata('first_name'); ?>" value="<?= $this->session->userdata('first_name'); ?>">
                Last name:
                <input type="text" name="last_name" placeholder="<?= $this->session->userdata('last_name'); ?>" value="<?= $this->session->userdata('last_name'); ?>">
                <input type="submit" value="Save" id="save">
            </form>
        </div>
        <div class="update-div">
            <p>Change Password</p>
            <form action="<?= base_url(); ?>password/validate" method="POST">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="errors"><?= $this->session->flashdata('password_errors'); ?></div>
                <div class="success"><?= $this->session->flashdata('password_success'); ?></div>
                Old Password:
                <input type="password" name="old_password">
                New Password:
                <input type="password" name="new_password"> 
                Confirm Password:
                <input type="password" name="confirm_password">
                <input type="submit" value="Save" id="save">
            </form>
        </div>
    </body>
</html>