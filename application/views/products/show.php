<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Product-dashboard">
    <meta name="author" content="Ron Garcia Santos">
    <title>Product Information</title>
</head>
<body>
    <h2><?= $product_name ?>($<?= $price ?>)</h2>
    <p>Added since: <?= $created_at ?> </p>
    <p>Product ID #<?= $id ?></p>
    <p>Description: <?= $description ?> </p>
    <p>Total sold: <?= $qty_sold ?></p>
    <p>Number of available stocks</p>
    <h3>Leave a Review</h3>
    <form action="">
        <input type="hidden" name="<?= $this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash(); ?>">
        <textarea name="review" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="Post">
    </form>
    
</body>
</html>