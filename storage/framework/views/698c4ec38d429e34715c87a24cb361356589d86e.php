<?php $__env->startSection('title'); ?>Продукты <?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>
    <h2>Загрузить изображения</h2>
    <h5>(тестовая форма загрузки массива изображений на сервер в папку images)</h5>
     <form method="post" class="upload_img" enctype="multipart/form-data" action="/products/upload">
     <?php echo csrf_field(); ?>
         <input class="form-control form-control-lg" id="formFileLg" name="images[]" type="file" multiple="multiple">
         <input type="submit" class="btn btn-primary" value="Загрузить">
     </form>
    <hr>
    <h1>Каталог продуктов</h1>
    <div class="container d-flex m-auto">
        <div class="row">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-4">
                <div class="prod-item">

                    <img src="<?php echo e($prod->image); ?>" alt="image"/><br>
                    <p><?php echo e($prod->name); ?></p>
                    <p>Цена: $<?php echo e($prod->price); ?></p>
                    <p>Кол-во: <?php echo e($prod->quantity); ?>шт.</p>

        
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

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/laravel_app/resources/views/product/products.blade.php ENDPATH**/ ?>