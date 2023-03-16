<?php
require_once __DIR__ . '/../../views/header.php';
?>

<main class="flex-shrink-0">
    <div class="container">
        <h3 class="mt-5">Orders Details: </h3>
        <div style="height:20px"></div>
        <div class="row align-items-start">
            <table class="table" style="max-width: 800px">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col" style="text-align:center">Price</th>
                    <th scope="col" style="text-align:center">Quantity</th>
                    <th scope="col" style="text-align:center">Product Total</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($ordersDetails as $product): ?>
                    <tr>
                        <th scope="row"><?=$product['name']?></th>
                        <td style="text-align:center">$<?=number_format($product['productPrice'], 2)?></td>
                        <td style="text-align:center"><?=$product['quantity']?></td>
                        <td style="text-align:center">$<?=number_format($product['productTotalPrice'], 2)?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
            <table  style="max-width: 800px; text-align:right;">
                <tr>
                    <td style="padding-right: 30px">
                        <span style="font-size: 30px"><b>TOTAL: &nbsp;</b>$<?=number_format($product['total'], 2)?></span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</main>

<?php
require_once __DIR__ . '/../../views/footer.php';
?>
