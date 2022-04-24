

<?php $__env->startSection('content'); ?>

<h1>Créer un article</h1>

<?php if($errors->any()): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="color:red;"><?php echo e($error); ?></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<form action="<?php echo e(route('posts.store')); ?>" method="POST"
enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="form-group row">
        <div class="col-sm-5">
            <input placeholder="titre" type="text" name="title" class="form-control">
        </div>
    </div>
    <br>
    <div class="form-group row">
        <div class="col-sm-8">
            <textarea placeholder="contenu" name="content" class="form-control" id="" ></textarea>
        </div>    
    </div>
    <label for="avatar"></label>
    <br>
    <input type="file" 
       id="avatar" name="avatar"
       accept="image/png, image/jpeg">
    <br>
    <div>
    <input type="checkbox" id="scales" name="scales"
            checked>
    <label for="scales">Scales</label>
    </div>

    <div>
    <input type="checkbox" id="horns" name="horns">
    <label for="horns">Horns</label>
    </div>

    <br>
    
    <button class="btn btn-success" type="submit">Soumettre</button>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FormationsCode\Laravel\laravelformation\resources\views/form.blade.php ENDPATH**/ ?>