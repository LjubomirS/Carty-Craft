<?php
require_once __DIR__ . '/../../views/header.php';
?>

<main class="flex-shrink-0">
    <div class="container">
        <h3 class="mt-5">Update Products Page: </h3>
        <div style="height:20px"></div>
        <div class="row align-items-start">
            <div class="col">
                <form class="row g-3" action="/index.php?action=update" method="post">
                    <div class="col-auto">
                        <label>Id:
                            <input class="form-control" name="productId" value="<?=$product->productId()?>" type="text" readonly>
                        </label>
                    </div>
                    <div class="col-auto">
                        <label>Name:
                            <input class="form-control" name="name" value="<?=$product->name()?>" type="text" required>
                        </label>
                    </div>
                    <div class="col-auto">
                        <label>Description:
                            <input class="form-control" name="description" value="<?=$product->description()?>" type="text" required/>
                        </label>
                    </div>
                    <div class="col-auto">
                        <label>Price:
                            <input class="form-control" name="productPrice" value="<?=number_format($product->productPrice(), 2)?>" type="number" step="0.01" required/>
                        </label>
                    </div>
                    <div class="col-auto">
                        <label>Available Quantity:
                        <input class="form-control" name="availableQuantity" value="<?=$product->availableQuantity()?>" type="number" required/>
                        </label>
                    </div>
                    <div class="col-auto" style="padding-top:23px">
                        <button type="submit" class="btn btn-primary mb-3">Update product</button>
                    </div>
                </form>
            </div>
            <div style="height:50px"></div>
        </div>
    </div>
</main>

<?php
require_once __DIR__ . '/../../views/footer.php';
?>


