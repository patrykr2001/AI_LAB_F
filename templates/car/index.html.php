<?php
/** @var $cars \App\Model\Car[] */
/** @var $router \App\Service\Router */
?>

<h1>Cars Listing</h1>
<a href="<?= $router->generatePath('car-create') ?>">Create New Car</a>
<ul>
    <?php foreach ($cars as $car): ?>
        <li>
            <a href="<?= $router->generatePath('car-show', ['id' => $car->getId()]) ?>">
                <?= htmlspecialchars($car->getMake() . ' ' . $car->getModel()) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>