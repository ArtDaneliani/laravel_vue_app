<?php $__env->startSection('title'); ?>Отзывы <?php $__env->stopSection(); ?>


<?php $__env->startSection('main_content'); ?>
    <h1>Форма добавления отзыва</h1>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="/review/check">
        <?php echo csrf_field(); ?>
        <input type="email" id="email" name="email" placeholder="Введите email" class="form-control"><br>
        <input type="text" id="subject" name="subject" placeholder="Добавьте тему отзыв" class="form-control"><br>
        <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Сообщение"></textarea><br>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>



    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $el): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h1>Все отзывы</h1>
        <div class="alert alert-warning">
            <p><?php echo e($el->email); ?></p><br>
            <h3><?php echo e($el->subject); ?></h3><br>
            <p><?php echo e($el->message); ?></p>
            <button type="button" class="btn btn-warning"><a href='/review/<?php echo e($el->id); ?>'>Удалить</a></button>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/laravel_app/resources/views/review.blade.php ENDPATH**/ ?>