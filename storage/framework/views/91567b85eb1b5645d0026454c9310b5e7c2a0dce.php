<?php $__env->startSection('title'); ?>Добавить продукт <?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>
    <h1>Добавить продукт</h1>
    <form method="post" action="<?php echo e(route('product.store')); ?>">
        <?php echo csrf_field(); ?>
        <select class="form-select form-control" id="category" name="category_id">
            <option selected>Категория</option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>

                    value="<?php echo e($category->id); ?>"><?php echo e($category->brand); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><br>
        <label for="tags">Теги</label>
        <select class="form-select form-control" multiple="multiple" id="tags" name="tags[]">
            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->tag); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><br>
        <input value="<?php echo e(old('name')); ?>" type="text" id="name" name="name" placeholder="Введите название продукта"
               class="form-control">
        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-danger">Введите название продукта</p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <br>
        <input value="<?php echo e(old('price')); ?>" type="text" id="price" name="price" placeholder="Введите цену продукта"
               class="form-control">
        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-danger">Введите цену продукта</p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <br>
        <input value="<?php echo e(old('sale_price')); ?>" type="text" id="sale_price" name="sale_price" placeholder="Распродажа"
               class="form-control">
        <?php $__errorArgs = ['sale_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-danger">Укажите цену после скидки (мин значение 0)</p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <br>
        <input value="<?php echo e(old('quantity')); ?>" type="text" id="quantity" name="quantity" placeholder="Введите количество"
               class="form-control">
        <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-danger">Введите количество</p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <br>
        <textarea  name="description" id="description" cols="30" rows="5"
                  class="form-control"
                  placeholder="Описание продукта"><?php echo e(old('description')); ?></textarea>
        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-danger"> Добавьте изображение продукта (~image.jpg)</p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <br>
        <input value="<?php echo e(old('image')); ?>" class="form-control" id="image" name="image" type="text"
               placeholder="Название картинки (пока)">
        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-danger"> Добавьте изображение продукта (~image.jpg)</p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <br>
        <input value="<?php echo e(old('status')); ?>" type="number" id="status" name="status" placeholder="Наличие товара" min="1"
               max="2"
               class="form-control">
        <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-danger">Укажите наличие товара (1- есть на складе, 2 - нет на складе)</p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <br>
        <button type="submit" class="btn btn-success">Добавить продукт</button>
    </form>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/laravel_app/resources/views/product/create.blade.php ENDPATH**/ ?>