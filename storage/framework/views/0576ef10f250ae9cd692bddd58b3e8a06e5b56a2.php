<?php $__env->startSection('title'); ?>Добавить продукт <?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>
    <h1>Добавить продукт</h1>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="<?php echo e(route('product.update', $product->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('patch'); ?>
        <select class="form-select form-control" id="category" name="category_id">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php echo e($category->id === $product->category->id ? 'selected' : ''); ?>

                    value="<?php echo e($category->id); ?>">
                    <?php echo e($category->brand); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><br>
        <label for="tags">Теги</label>
        <select class="form-select form-control" multiple="multiple" id="tags" name="tags[]">
            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    <?php $__currentLoopData = $product->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productTag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php echo e($tag->id === $productTag->id ? 'selected' : ''); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    value="<?php echo e($tag->id); ?>"><?php echo e($tag->tag); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><br>
        <input type="text" id="name" name="name" value="<?php echo e($product->name); ?>" placeholder="Введите название продукта" class="form-control"><br>
        <input type="text" id="price" name="price" value="<?php echo e($product->price); ?>"  placeholder="Введите цену продукта" class="form-control"><br>
        <input type="text" id="sale_price" value="<?php echo e($product->sale_price); ?>" name="sale_price" placeholder="Распродажа" class="form-control"><br>
        <input type="text" id="quantity" value="<?php echo e($product->quantity); ?>" name="quantity" placeholder="Введите количество" class="form-control"><br>
        <textarea name="description" id="description" value="<?php echo e($product->description); ?>" cols="30" rows="5" class="form-control" placeholder="Описание продукта"></textarea><br>
        <input class="form-control" id="image" value="<?php echo e($product->image); ?>" name="image" type="text">
        <input type="number" id="status" value="<?php echo e($product->status); ?>" name="status" placeholder="Наличие товара" min="1" max="2" class="form-control"><br>
        <button type="submit" class="btn btn-success">Сохранить изменения</button>
    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/laravel_app/resources/views/product/edit.blade.php ENDPATH**/ ?>