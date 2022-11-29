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
            p{
                background-color: white;
                padding: 5px;
                position: relative;
                top: 35px;
                left: 50px;
                margin: 0px;
            }

            form{
                margin: 20px;
                border: 1px solid black;
                padding: 20px;
                width: 80%;

            }
            input{
                display: block;
                margin: 20px 0;
            }

        </style>
    </head>
    <body>     
        <h3>Edit Profile</h3>  
        <div class="update-div">
            
            <p>Edit Information</p>
            <form action="update" method="POST">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                Email address:
                <input type="text" name="email" placeholder="<?= $this->session->userdata('email') ?>">
                First name:
                <input type="text" name="first_name" placeholder="<?= $this->session->userdata('first_name') ?>">
                Last name:
                <input type="text" name="last_name" placeholder="<?= $this->session->userdata('last_name') ?>">
                <input type="submit" value="Save">
            </form>
        </div>
        <div class="update-div">
            <p>Change Password</p>
            <form action="update" method="POST">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                Old Password:
                <input type="password" name="old_password">
                New Password:
                <input type="password" name="new_passord"> 
                Confirm Password:
                <input type="password" name="confirm_password">
                <input type="submit" value="Save">
            </form>
        </div>
    </body>
</html>