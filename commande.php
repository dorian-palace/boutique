<?php
session_start();
require('app/Commande.php');
require_once('setting/data.php');
require('app/Panier.php');
$panier = new Panier();
$commande = new Commande();
$id_user = $_SESSION['id'];

echo "<pre>";
var_dump($_SESSION['id']);
echo "</pre>";

// if (isset($_POST['submit'])) {
if (!empty($_POST['adr_ftr']) && !empty($_POST['adr_liv'])) {

    $commande->valide();

    // if ($commande->valide()) {

        // session_destroy($_SESSION['panier']);
    // }


    // if (!empty($_SESSION['panier'])) {

    //     unset($_SESSION['panier']);
    // }
}

// echo 'ok ';
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/css/commande.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Commande</title>
</head>

<body>

    <div class="container">
        <h1 class="h3 mb-5">Validation de commande</h1>

        <form action="#" method="post">
            <div class="row">

                <!-- Left -->
                <div class="col-lg-9">
                    <div class="mb-3">
                        <label class="form-label">Adresse de facturation</label>
                        <input type="text" name="adr_ftr" class="form-control" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Adresse de livraison</label>
                        <input type="text" name="adr_liv" class="form-control" placeholder="">
                    </div>
                    <div class="accordion" id="accordionPayment">
                        <!-- Credit card -->
                        <div class="accordion-item mb-3">
                            <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
                                <div class="form-check w-100 collapsed" data-bs-toggle="collapse" data-bs-target="#collapseCC" aria-expanded="false">
                                    <input class="form-check-input" type="radio" name="payment" id="payment1">
                                    <label class="form-check-label pt-1" for="payment1">
                                        Credit Card
                                    </label>
                                </div>
                                <span>
                                    <svg width="34" height="25" xmlns="http://www.w3.org/2000/svg">
                                        <g fill-rule="nonzero" fill="#333840">
                                            <path d="M29.418 2.083c1.16 0 2.101.933 2.101 2.084v16.666c0 1.15-.94 2.084-2.1 2.084H4.202A2.092 2.092 0 0 1 2.1 20.833V4.167c0-1.15.941-2.084 2.102-2.084h25.215ZM4.203 0C1.882 0 0 1.865 0 4.167v16.666C0 23.135 1.882 25 4.203 25h25.215c2.321 0 4.203-1.865 4.203-4.167V4.167C33.62 1.865 31.739 0 29.418 0H4.203Z"></path>
                                            <path d="M4.203 7.292c0-.576.47-1.042 1.05-1.042h4.203c.58 0 1.05.466 1.05 1.042v2.083c0 .575-.47 1.042-1.05 1.042H5.253c-.58 0-1.05-.467-1.05-1.042V7.292Zm0 6.25c0-.576.47-1.042 1.05-1.042H15.76c.58 0 1.05.466 1.05 1.042 0 .575-.47 1.041-1.05 1.041H5.253c-.58 0-1.05-.466-1.05-1.041Zm0 4.166c0-.575.47-1.041 1.05-1.041h2.102c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042H5.253c-.58 0-1.05-.466-1.05-1.042Zm6.303 0c0-.575.47-1.041 1.051-1.041h2.101c.58 0 1.051.466 1.051 1.041 0 .576-.47 1.042-1.05 1.042h-2.102c-.58 0-1.05-.466-1.05-1.042Zm6.304 0c0-.575.47-1.041 1.051-1.041h2.101c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042h-2.101c-.58 0-1.05-.466-1.05-1.042Zm6.304 0c0-.575.47-1.041 1.05-1.041h2.102c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042h-2.101c-.58 0-1.05-.466-1.05-1.042Z"></path>
                                        </g>
                                    </svg>
                                </span>
                            </h2>
                            <div id="collapseCC" class="accordion-collapse collapse show" data-bs-parent="#accordionPayment">
                                <div class="accordion-body">
                                    <div class="mb-3">
                                        <label class="form-label">Card Number</label>
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Name on card</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label">Expiry date</label>
                                                <input type="text" class="form-control" placeholder="MM/YY">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label">CVV Code</label>
                                                <input type="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Right -->
                <div class="col-lg-3">
                    <div class="card position-sticky top-0">
                        <div class="p-3 bg-light bg-opacity-10">
                            <h6 class="card-title mb-3">Commande</h6>
                            <div class="d-flex justify-content-between mb-1 small">
                                <div class="count">Nombre d'articles : <?= ($panier->count()) ?></div>

                            </div>

                            <hr>
                            <div class="d-flex justify-content-between mb-4 small">
                                <div class="total">total :<?= number_format($panier->total(), 2, ',', ' '); ?>€</div>
                            </div>

                            <input type="submit" name="submit" class="btn btn-primary w-100 mt-2">
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </form>
</body>


</html>