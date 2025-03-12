<?php
include '../resources/head.php';
include '../resources/navbar.php';
?>

<section class="faq-opti py-5" style="background: #f8f9fa;">
    <div class="container">
        <h1 class="display-4 fw-bold text-center mb-5" style="color: #33b1e3;">Preguntas Frecuentes</h1>

        <div class="row g-4">

            <div class="col-md-6">

                <div class="card faq-card border-0 mb-4">
                    <div class="card-header bg-azul-opti d-flex align-items-center">
                        <i class="fas fa-shopping-cart fa-2x text-white me-3"></i>
                        <h2 class="h4 mb-0 text-white">Pedidos</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-ruler fa-fw me-2" style="color: #f18500;"></i>
                                Tamaño
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="card faq-card border-0">
                    <div class="card-header bg-naranja-opti d-flex align-items-center">
                        <i class="fas fa-file-invoice-dollar fa-2x text-white me-3"></i>
                        <h2 class="h4 mb-0 text-white">Receta</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-credit-card fa-fw me-2" style="color: #33b1e3;"></i>
                                Pagos
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-md-6">

                <div class="card faq-card border-0 mb-4">
                    <div class="card-header bg-azul-opti d-flex align-items-center">
                        <i class="fas fa-store fa-2x text-white me-3"></i>
                        <h2 class="h4 mb-0 text-white">Tienda</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-truck fa-fw me-2" style="color: #f18500;"></i>
                                Envíos y devoluciones
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card faq-card border-0">
                    <div class="card-header bg-naranja-opti d-flex align-items-center">
                        <i class="fas fa-glasses fa-2x text-white me-3"></i>
                        <h2 class="h4 mb-0 text-white">Productos</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-newspaper fa-fw me-2" style="color: #33b1e3;"></i>
                                Prensa
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .faq-card {
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .faq-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(51, 177, 227, 0.2);
    }

    .bg-azul-opti {
        background-color: #33b1e3 !important;
        border-radius: 15px 15px 0 0 !important;
    }

    .bg-naranja-opti {
        background-color: #f18500 !important;
        border-radius: 15px 15px 0 0 !important;
    }

    .list-group-item {
        border: none;
        padding: 1rem 1.5rem;
        background: transparent;
    }

    .list-group-item:hover {
        background-color: rgba(241, 133, 0, 0.05);
    }

    .card-header {
        padding: 1.5rem;
    }
</style>

<?php
include '../resources/footer.php';
include '../resources/JS.php';
?>