<?php
require_once __DIR__ . '/../../views/header.php';
?>

<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">List of All Products</h1>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <?php foreach($products as $product): ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow" style="background-color: #a0eff8;">
                            <div class="card-body">
                                <div class="card" style="width: 100%;">
                                    <div class="card-body">
                                        <?php if($product->availableQuantity() === 0): ?>
                                            <h3 class="card-title"><?=$product->name()?></h3>
                                            <h6 class="card-subtitle mb-2 text-danger"><b>Product Out of Stock</b></h6>
                                            <h6 class="card-subtitle mb-2 text-muted">Description: <?=$product->description()?></h6>
                                            <a href="#" class="btn btn-md btn-danger">Out of Stock</a>
                                        <?php else: ?>
                                            <h3 class="card-title"><?=$product->name()?></h3>
                                            <h6 class="card-subtitle mb-2 text-muted">Description: <?=$product->description()?></h6>
                                            <h6 class="card-subtitle mb-2 text-muted"><b>Price: $<?=number_format($product->productPrice(), 2)?></b></h6>
                                            <a href="/index.php?action=add-to-cart&productId=<?=$product->productId()?>" class="btn btn-md btn-primary">Add to Cart</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<?php
require_once __DIR__ . '/../../views/footer.php';
?>