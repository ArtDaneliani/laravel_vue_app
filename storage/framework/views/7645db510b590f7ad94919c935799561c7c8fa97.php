<?php $__env->startSection('title'); ?>Продукты <?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>







    <hr>
    <h1>Каталог продуктов</h1>
    <p><a href="<?php echo e(route('products.create')); ?>">Добавить продукт</a></p>
    <div class="container d-flex m-auto">
        <div class="row">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-4">
                <div class="prod-item">
                    <a href="<?php echo e(route('product.show', $prod->id)); ?>">
                        <img src="<?php echo e($prod->image); ?>" alt="image"/><br>
                        <p><?php echo e($prod->id); ?>. <?php echo e($prod->name); ?></p>
                        <p>Цена: $<?php echo e($prod->price); ?></p>
                        <p>Кол-во: <?php echo e($prod->quantity); ?>шт.</p>
                        <p>Описание: <?php echo e($prod->description); ?></p>
                    </a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php
//------------тестовый массив---------------
//$array = [
//    [
//        'name' => 'Иванов',
//        'specialty' => 'хирург'
//    ],
//    [
//        'name' => 'Петров',
//        'specialty' => 'кардиолог'
//    ],
//    [
//        'name' => 'Петров',
//        'specialty' => 'врач'
//    ],
//    [
//        'name' => 'Иванов',
//        'specialty' => 'хирург'
//    ],
//    [
//        'name' => 'Иванов',
//        'specialty' => 'ортопед'
//    ]
//];
//function Ivanov(array $data){
//    foreach($data as $key => $item){
//        if($item['name'] == 'Иванов'){
//            unset($data[$key]);
//        }
//    }
//    return $data;
//}
//$result = Ivanov($array);
//print_r($result);
?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/laravel_app/resources/views/product/index.blade.php ENDPATH**/ ?>