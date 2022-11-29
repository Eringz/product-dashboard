<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Product Dashboard">
        <meta name="author" content="Ron Garcia Santos">
        <title>Edit Product - Admin</title>
        <link rel="stylesheet" href="<?= base_url();?>assets/css/home_style.css">
    </head>
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
        #save{
            background-color: green;
            color: white;
            padding: 5px 20px;
            margin-left: 140px;
            border: none;
        }
    </style>
    <body>
        <div class="errors"><?= $this->session->flashdata('input_errors'); ?></div>
        <h2>Add a new Product</h2>
        <a href="/dashboard/admin" id="dashboard">Return to Dashboard</a>
        <form action="<?= base_url(); ?>products/update/<?= $id; ?>" method="POST">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"  value="<?= $this->security->get_csrf_hash(); ?>">
            Name:
            <input type="text" name="product_name" placeholder="<?= $product_name; ?>" value="<?= $product_name; ?>"/>
            Description:
            <textarea name="description" placeholder="<?= $description; ?>" id="" cols="30" rows="10"><?= $description; ?></textarea>
            Price:
            <input type="text" name="price" placeholder="<?= $price; ?>" value="<?= $price; ?>"/>
            Inventory Count:
            <input type="number" name="inventory_count" placeholder="<?= $inventory_count; ?>" value="<?= $inventory_count; ?>"  id="number"/>
            <input type="submit" value="Save" id="save">
        </form>
    </body>
</html>