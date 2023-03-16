<?php
    require_once __DIR__ . '/../../views/header.php';
?>

<main class="flex-shrink-0">
    <div class="container">
        <h3 class="mt-5">Manage Products Page: </h3>
        <div style="height:20px"></div>
        <div class="row align-items-start">
            <div class="col">
                <form class="row g-3" action="/index.php?action=add-product" method="post">
                    <div class="col-auto">
                        <label>Name:
                            <input class="form-control" name="name" placeholder="Name" type="text" required/>
                        </label>
                    </div>
                    <div class="col-auto">
                        <label>Description:
                            <input class="form-control" name="description" placeholder="Description" type="text" required/>
                        </label>
                    </div>
                    <div class="col-auto">
                        <label>Price:<br>
                            <input class="form-control" name="productPrice" placeholder="Price" type="number" step="0.01" required/>
                        </label>
                    </div>
                    <div class="col-auto">
                        <label>Available Quantity:<br>
                            <input class="form-control" name="availableQuantity" placeholder="Available Quantity" type="number" inputmode="numeric" required/>
                        </label>
                    </div>
                    <div class="col-auto" style="padding-top:23px">
                        <button type="submit" class="btn btn-primary mb-3">Add product</button>
                    </div>
                </form>

            </div>
            <div style="height:50px"></div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col" style="text-align:center">Available Quantity</th>
                        <th scope="col" style="text-align:center">Update Product</th>
                        <th scope="col" style="text-align:center">Delete Product</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($products as $product): ?>
                    <tr>
                        <th scope="row"><?=$product->name()?></th>
                        <td><?=$product->description()?><br></td>
                        <td>$<?=number_format($product->productPrice(), 2)?></td>
                        <td style="text-align:center"><?=$product->availableQuantity()?><br></td>
                        <td style="text-align:center">
                            <a href='/index.php?action=update&productId=<?=$product->productId()?>'>
                                <button type="submit" class="btn btn-outline-warning btn-sm">Update</button>
                            </a>
                        </td>
                        <td style="text-align:center">
                            <a href='/index.php?action=delete&productId=<?=$product->productId()?>'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-octagon-fill text-danger" viewBox="0 0 16 16">
                                    <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php
require_once __DIR__ . '/../../views/footer.php';
?>