<?php
require_once __DIR__ . '/../../views/header.php';
?>

<main class="flex-shrink-0">
    <div class="container">
        <h3 class="mt-5">Cart List: </h3>
        <div style="height:20px"></div>
        <div class="row align-items-start">
            <table class="table" style="max-width: 800px">
                <?php if($cart->products() === []): ?>
                    <tr>
                        <td style="text-align:center">Your Cart is empty</td>
                    </tr>
                <?php else: ?>
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col" style="text-align:center">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col" style="text-align:center">Cart Quantity</th>
                    <th scope="col" style="text-align:center">Product Total</th>
                    <th scope="col" style="text-align:center">Remove product</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($cart->products() as $product): ?>
                    <tr>
                        <th scope="row"><?=$product->name()?></th>
                        <td style="text-align:center"><?=$product->description()?></td>
                        <td>$<?=number_format($product->productPrice(), 2)?></td>
                        <td style="text-align:center">
                            <a style="text-decoration: none" href="/index.php?action=subtract-from-cart&productId=<?=$product->productId()?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
                                </svg>
                            </a>
                            &nbsp;
                            <?=$cart->getCartProductQuantity($product)?>
                            &nbsp;
                            <a style="text-decoration: none" href="/index.php?action=add-to-cart&productId=<?=$product->productId()?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                </svg>
                            </a>
                        </td>
                        <td style="text-align:center">$<?=number_format($cart->getProductTotal($product), 2)?></td>
                        <td style="text-align:center">
                            <a href='/index.php?action=remove-from-cart&productId=<?=$product->productId()?>'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill text-danger" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
                <?php endif ?>
            </table>
            <table class="table" style="max-width: 800px; text-align:right; margin-top: 50px">
                <tr>
                    <td style="padding-right: 40px;">
                        <a href="<?php if($cart->products() === []): echo ''; else: echo '/index.php?action=checkout'; endif ?>" class="btn btn-success">Go To Checkout</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</main>

<?php
require_once __DIR__ . '/../../views/footer.php';
?>

