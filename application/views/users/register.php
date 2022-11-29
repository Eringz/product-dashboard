<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="decription" content="Product Dashboard">
        <meta name="author" content="Ron Garcia Santos">
        <link rel="stylesheet" href="/assets/css/user_style.css">
        <title>Register Page</title>
    </head>
    <body>       
        <div class="error"><?= $this->session->flashdata('input_errors');?></div>
        <div class="div-register">
            <h2>Register</h2>
            <form action="/register/validate" method="POST">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="get_csrf_hash()">
                Email Address:
                <input type="text" name="email">
                First Name:
                <input type="text" name="first_name">
                Last Name:
                <input type="text" name="last_name">
                Password:
                <input type="password" name="password">
                Confirm Password:
                <input type="password" name="confirm_password">
                <input type="submit" value="Register" id="btn-register">
            </form>
            <a href="/login">Already have an account? Login</a>
        </div>
    </body>
</html>