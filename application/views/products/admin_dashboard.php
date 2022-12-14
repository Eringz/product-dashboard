<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Dashboard - Admin</title>
        <link rel="stylesheet" href="<?= base_url(); ?>assets/css/home_style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <style>
            .success{
                color: green;
                margin: 20px;
            }
        </style>
    </head>
    
    <body>
        <div class="dashboard-div">
            <h2>Manage Products</h2>
            <a id="add" href="/products/new">Add new</a>
            <div class="success"><?= $this->session->flashdata('input_success')?></div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Inventory Count</th>
                    <th>Quantity Sold</th>
                    <th>Action</th>
                </tr>
<?php 
    $i = 0;
    foreach($lists as $product){
        $i++;
?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><a href="/products/show/<?= $product['id']?>"><?= $product['name']?></a></td>
                    <td><?= $product['count']?></td>
                    <td><?= $product['qty_sold']?></td>
                    <td>
                        <a href="/products/edit/<?= $product['id']; ?>">edit</a>
                        <a href="/products/destroy/<?= $product['id']; ?>" onclick="return confirm('Are you sure?'); ">remove</a>
                    </td>
                </tr>
<?php  } ?>
            </table>
        </div>
    </body>
</html>