<?php $__env->startSection('title'); ?>Продукты <?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>
    <h1>Карточка продукта</h1>
    <p><a href="<?php echo e(route('product.index')); ?>">Все продукты</a></p>
    <div class="container">
        <img class="card-pic" src="<?php echo e($product->image); ?>" alt="pic">
        <hr>
        <p>Категория: <b><?php echo e($product->category->brand); ?></b></p>
        <hr>
        <p>Теги:
        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $product->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productTag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($tag->id === $productTag->id): ?>
                        <span class="show_tags"> <?php echo e($tag->tag); ?></span>
                        <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </p>
        <hr>
        <p><?php echo e($product->name); ?></p>
        <hr>
        <p>Цена: $<?php echo e($product->price); ?></p>
        <hr>
        <p>Кол-во: <?php echo e($product->quantity); ?>шт.</p>
        <hr>
    </div>
    <p><a class="btn btn-success" href="<?php echo e(route('product.edit', $product->id)); ?>">Изменить продукт</a></p>
    <form action="<?php echo e(route('product.delete', $product->id)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('delete'); ?>
        <input type="submit" class="btn btn-danger" value="Удалить продукт">
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/laravel_app/resources/views/product/show.blade.php ENDPATH**/ ?>