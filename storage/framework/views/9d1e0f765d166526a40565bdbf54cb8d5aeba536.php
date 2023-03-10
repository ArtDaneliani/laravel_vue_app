<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <title>
        <?php echo $__env->yieldContent('title'); ?>
    </title>
</head>
<body>
<div class="container header py-3" style="background-image: url('/storage/images/BANNER1.jpg')">
    <header>
        <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
            <a href="<?php echo e(route('main.index')); ?>" class="d-flex align-items-center text-dark text-decoration-none">
                <span class="fs-4">Laravel</span>
            </a>

            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                <a class="me-3 py-2 text-decoration-none" href="<?php echo e(route('welcome.index')); ?>">Vue3</a>
                <a class="me-3 py-2 text-decoration-none" href="<?php echo e(route('product.index')); ?>">Каталог продуктов</a>
                <a class="me-3 py-2 text-decoration-none" href="<?php echo e(route('about.index')); ?>">О нас</a>
                <a class="me-3 py-2 text-decoration-none" href="<?php echo e(route('support.index')); ?>">Поддержка</a>
                <a class="me-3 py-2 text-decoration-none" href="<?php echo e(route('review.index')); ?>">Отзывы</a>
            </nav>
        </div>
    </header>
</div>
<div class="container content"  id="app">
    <?php echo $__env->yieldContent('main_content'); ?>
</div>
<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">© 2021 Company, Inc</p>

        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="<?php echo e(route('welcome.index')); ?>" class="nav-link px-2 text-muted">Vue3</a></li>
            <li class="nav-item"><a href="<?php echo e(route('product.index')); ?>" class="nav-link px-2 text-muted">Каталог продуктов</a></li>
            <li class="nav-item"><a href="<?php echo e(route('about.index')); ?>" class="nav-link px-2 text-muted">О нас</a></li>
            <li class="nav-item"><a href="<?php echo e(route('support.index')); ?>" class="nav-link px-2 text-muted">Поддержка</a></li>
            <li class="nav-item"><a href="<?php echo e(route('review.index')); ?>" class="nav-link px-2 text-muted">Отзыв</a></li>
        </ul>
    </footer>
</div>
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
<?php /**PATH /Applications/MAMP/htdocs/laravel_app/resources/views/layout.blade.php ENDPATH**/ ?>