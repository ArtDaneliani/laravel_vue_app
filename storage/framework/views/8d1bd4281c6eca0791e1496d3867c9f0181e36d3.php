<?php $__env->startSection('title'); ?>Vue <?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>
    <h1>страница с использованием Vue 3</h1>
    <div>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">
            <welcome/>
        </div>



    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/laravel_app/resources/views/vue.blade.php ENDPATH**/ ?>