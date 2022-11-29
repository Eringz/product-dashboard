<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="decription" content="Product Dashboard">
        <meta name="author" content="Ron Garcia Santos">
        <link rel="stylesheet" href="/assets/css/user_style.css">
        <title>LogIn Page</title>
    </head>
    <body>
        <div class="error"><?= $this->session->flashdata('input_errors');?></div>
        <div class="div-login">
            <h2>Log In</h2>
            <form action="<?=base_url();?>/login/validate" method="post">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                Email Address: <input type="text" name="email">
                Password: <input type="password" name="password">
                <input type="submit" value="Login" id="btn-login">
            </form>
            <a href="/register">Don't have an account? Register</a>
        </div>
    </body>
</html>