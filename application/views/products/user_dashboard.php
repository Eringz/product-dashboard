<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Dashboard - User</title>
        <link rel="stylesheet" href="<?= base_url(); ?>assets/css/home_style.css">
    </head>
    <body>
        <div class="dashboard-div">
            <h2>Manage Products</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Inventory Count</th>
                    <th>Quantity Sold</th>
                </tr>
<?php       
            $i = 0;
            foreach($lists as $product){ ?>
            $i++;
                <tr>
                    <td><?= $i; ?></td>
                    <td><a href="/products/show/<?= $product['id'] ?>"><?= $product['name']?></a></td>
                    <td><?= $product['count'] ?></td>
                    <td><?= $product['qty_sold'] ?></td>
                </tr>
<?php       } ?>
            </table>
        </div>
    </body>
</html>