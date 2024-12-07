<?php
/** @var $car \App\Model\Car */
/** @var $router \App\Service\Router */
?>

<h1>Create New Car</h1>
<form action="<?= $router->generatePath('car-create') ?>" method="post">
    <?php include '_form.html.php'; ?>
</form>
<a href="<?= $router->generatePath('car-index') ?>">Back to list</a>