<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Product - Admin</title>
    <link rel="stylesheet" href="<?= base_url();?>assets/css/home_style.css">
    <style>
        .errors{
            color: red;
            margin: 20px;
        }
        #dashboard{
            background-color: blue;
            color: white;
            border: none;
            border-radius: 3px; 
            text-decoration: none;
            padding: 5px 10px;
        }
        form{
            display: inline-block;
            padding: 20px;
        }
        input,textarea{
            display: block;
            margin: 5px 0;
        }

        #number{
            width: 50px;
            height: 30px;
        }
        #create{
            background-color: green;
            color: white;
            padding: 5px 20px;
            margin-left: 140px;
            border: none;
        }
    </style>
</head>
<body>
    <div class="errors"><?= $this->session->flashdata('input_errors'); ?></div>
    <h2>Add a new Product</h2>
    <a href="/dashboard/admin" id="dashboard">Return to Dashboard</a>
    <form action="/create" method="POST">
        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"  value="<?= $this->security->get_csrf_hash(); ?>">
        Name:
        <input type="text" name="product_name"/>
        Description:
        <textarea name="description" id="" cols="30" rows="10"></textarea>
        Price:
        <input type="text" name="price"/>
        Inventory Count:
        <input type="number" name="inventory_count" id="number"/>
        <input type="submit" value="Create" id="create">
    </form>
</body>
</html>