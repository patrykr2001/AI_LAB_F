<?php
/** @var $car \App\Model\Car */
/** @var $router \App\Service\Router */
ob_start(); ?>

<h1>Edit Car</h1>
<form action="<?= $router->generatePath('car-edit', ['id' => $car->getId()]) ?>" method="post">
    <?php include '_form.html.php'; ?>
</form>
<a href="<?= $router->generatePath('car-index') ?>">Back to list</a>

<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';