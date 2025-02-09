<?php
/** @var $car \App\Model\Car */
/** @var $router \App\Service\Router */
ob_start(); ?>

<h1><?= htmlspecialchars($car->getMake() . ' ' . $car->getModel()) ?></h1>
<p>Year: <?= htmlspecialchars($car->getYear()) ?></p>
<p>Price: <?= htmlspecialchars($car->getPrice()) ?></p>
<p>Engine Capacity: <?= htmlspecialchars($car->getEngineCapacity()) ?></p>
<p>Fuel Type: <?= htmlspecialchars($car->getFuelType()) ?></p>
<p>Horsepower: <?= htmlspecialchars($car->getHorsepower()) ?></p>
<p>Mileage: <?= htmlspecialchars($car->getMileage()) ?></p>
<p>Transmission: <?= htmlspecialchars($car->getTransmission()) ?></p>

<a href="<?= $router->generatePath('car-edit', ['id' => $car->getId()]) ?>">Edit</a>
<a href="<?= $router->generatePath('car-delete', ['id' => $car->getId()]) ?>">Delete</a>
<a href="<?= $router->generatePath('car-index') ?>">Back to list</a>

<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';