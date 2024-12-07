<?php
/** @var $car \App\Model\Car */
/** @var $router \App\Service\Router */
?>

<h1>Edit Car</h1>
<form action="<?= $router->generatePath('car-edit', ['id' => $car->getId()]) ?>" method="post">
    <?php include '_form.html.php'; ?>
</form>
<a href="<?= $router->generatePath('car-index') ?>">Back to list</a>