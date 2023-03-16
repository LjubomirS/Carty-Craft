<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Jagaad Academy">
    <title>Module 3 Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <?='<a class="navbar-brand btn btn-secondary" href="/index.php?action=cart">Back To Cart</a>'?>
    </div>
</nav>

<main class="flex-shrink-0">
    <div class="container">
        <h3 class="mt-5">Checkout: </h3>
        <div style="height:20px"></div>
        <div class="row align-items-start">
            <table class="table" style="max-width: 800px">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col" style="text-align:center">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col" style="text-align:center">Cart Quantity</th>
                    <th scope="col" style="text-align:center">Total</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($cart->products() as $product): ?>
                    <tr>
                        <th scope="row"><?=$product->name()?></th>
                        <td style="text-align:center"><?=$product->description()?></td>
                        <td>$<?=number_format($product->productPrice(), 2)?></td>
                        <td style="text-align:center">
                            <?=$cart->getCartProductQuantity($product)?>
                        </td>
                        <td style="text-align:center">$<?=number_format($cart->getProductTotal($product), 2)?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
            <table  style="max-width: 800px; text-align:right;">
                <tr>
                    <td style="padding-right: 30px">
                        <span style="font-size: 30px"><b>TOTAL: &nbsp;</b>$<?=number_format($cart->getTotal(), 2)?></span>
                    </td>
                </tr>
            </table>
            <table style="max-width: 800px; text-align:right; margin-top: 30px">
                <tr>
                    <td>
                        <a href="/index.php?action=complete-order" class="btn btn-success">Complete Order</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</main>

<?php
require_once __DIR__ . '/../../views/footer.php';
?>


