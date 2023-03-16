<?php
require_once __DIR__ . '/../../views/header.php';
?>

<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">List of All Orders</h1>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <?php foreach($orders as $order): ?>

<!--            --><?php //   echo '<pre>';
//        var_dump($orders);
//        die; ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow" style="background-color: #a0eff8;">
                            <div class="card-body">
                                <div class="card" style="width: 100%;">
                                    <div class="card-body">
                                        <h3 class="card-title">Order Id: <?=$order['orderId']?></h3>
                                        <h6 class="card-subtitle mb-2 text-muted">Total: $<?=number_format($order['total'], 2)?></h6>
                                        <h6 class="card-subtitle mb-2 text-muted">Completed at: <?=$order['completedAt']?></h6>
                                        <a href="/index.php?action=see-orders-details&orderId=<?=$order['orderId']?>" class="btn btn-sm btn-success">See Details</a>
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
