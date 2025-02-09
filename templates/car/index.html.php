<?php
/** @var $cars \App\Model\Car[] */
/** @var $router \App\Service\Router */
ob_start(); ?>

<h1>Cars Listing</h1>
<a href="<?= $router->generatePath('car-create') ?>">Create New Car</a>
<ul class="index-list">
    <?php foreach ($cars as $car): ?>
        <li>
            <h3>
                <a href="<?= $router->generatePath('car-show', ['id' => $car->getId()]) ?>">
                    <?= htmlspecialchars($car->getMake() . ' ' . $car->getModel()) ?>
                </a>
            </h3>
        </li>
    <?php endforeach; ?>
</ul>

<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';