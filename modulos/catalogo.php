<?php
require 'config.php'; 

try {
    $query = "SELECT * FROM products";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $lentes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al obtener datos: " . $e->getMessage());  
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lentes De Sol</title>
  <link rel="stylesheet" href="../css/catalogo.css">
</head>
<body>
  <div class="carousel">
    <div class="carousel-inner">

    
    <?php foreach ($lentes as $lente): ?>
            <article class="card-cat">
                <div class="card-int">
                    <span class="card__span"><?= htmlspecialchars($lente['categoria']) ?></span>
                    <div class="prev-img">
                        <img class="img" src="<?= htmlspecialchars($lente['imagen']) ?>" alt="<?= htmlspecialchars($lente['nombre']) ?>">
                    </div>
                    <div class="card-data">
                        <p class="title"><?= htmlspecialchars($lente['nombre']) ?></p>
                        <p><?= htmlspecialchars($lente['descripcion']) ?></p>
                        <button class="button">Comprar -></button>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>

      </div>
    </div>

    <button class="carousel-control prev" onclick="moveSlide(-1)">&#10094;</button>
    <button class="carousel-control next" onclick="moveSlide(1)">&#10095;</button>
  </div>

  <script src="../js/carrusel.js"></script>
</body>
</html>