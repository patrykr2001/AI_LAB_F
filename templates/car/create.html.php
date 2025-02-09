<?php
/** @var $car \App\Model\Car */
/** @var $router \App\Service\Router */
?>

<h1>Create New Car</h1>
<form action="<?= $router->generatePath('car-create') ?>" method="post" class="edit-form">
    <?php include '_form.html.php'; ?>
</form>
<a href="<?= $router->generatePath('car-index') ?>">Back to list</a>
<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';