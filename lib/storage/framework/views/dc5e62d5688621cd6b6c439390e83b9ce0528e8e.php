<?php if(Session::has('error')): ?>
    <p class="alert alert-danger"><?php echo e(Session::get('error')); ?></p>
<?php endif; ?>

<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p class="alert alert-danger"><?php echo e($error); ?></p>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\laravel\lib\resources\views/errors/note.blade.php ENDPATH**/ ?>