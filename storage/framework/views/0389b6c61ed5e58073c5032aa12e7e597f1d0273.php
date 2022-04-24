

<?php $__env->startSection('content'); ?>
<h1>Article  :  <?php echo e($post->title); ?></h1>
        <table class="table">
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        <tr>
            <td><?php echo e($post->title); ?></td>
            <td><?php echo e($post->content); ?></td>
            <td><?php echo e($post->created_at->format('d/m/Y à H:i:s')); ?></td>
            <td><?php echo e($post->updated_at->format('d/m/Y à H:i:s')); ?></td>
        </tr>
        <table>
    
    
    <?php if(empty(!$post->image)): ?>
        <img src="<?php echo e(Storage::url($post->image->path)); ?>" />
    <?php endif; ?>
    <hr>
    <span>Nom de l'artiste de l'image : 
        <?php if(!empty($post->imageArtist)): ?>
            <?php echo e($post->imageArtist->name); ?>

        <?php else: ?>
            Aucun
        <?php endif; ?> 
    </span>

    <hr>
    <h3>Tags </h3>
    <?php $__empty_1 = true; $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div><?php echo e($tag->name); ?> | crée le <?php echo e($tag->created_at->format('d/m/Y à H:i:s')); ?></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div>Aucun tag pour cet article</div>
    <?php endif; ?>

    <hr>
    <h3>Commentaires </h3>
    <?php $__empty_1 = true; $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div><?php echo e($comment->body); ?> | crée le <?php echo e($comment->created_at->format('d/m/Y à H:i:s')); ?></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div>Aucun commentaire pour cet article</div>
    <?php endif; ?>

     <hr>
    <h3>Vidéos </h3>
    <?php $__empty_1 = true; $__currentLoopData = $video->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div><?php echo e($video->url); ?> <?php echo e($comment->body); ?> | crée le <?php echo e($comment->created_at->format('d/m/Y à H:i:s')); ?></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div>Aucun commentaire pour cette vidéo</div>
    <?php endif; ?> 

    <hr>

    <button type="button"
    onclick="location.href='<?php echo e(route('showAll')); ?>'" class="btn btn-primary">
    Liste des articles <span class="badge badge-light"><?php echo e($countPosts); ?></span>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FormationsCode\Laravel\laravelformation\resources\views/article.blade.php ENDPATH**/ ?>