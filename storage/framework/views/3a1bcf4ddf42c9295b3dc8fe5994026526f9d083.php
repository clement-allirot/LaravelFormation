

<?php $__env->startSection('content'); ?>

    <h1>Liste des articles</h1>
    <?php if($posts->count() > 0): ?>
        <table class="table">
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cle => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($post->title); ?></td>
            <td><a class="underlineNone" href="<?php echo e(route('show', $post->id)); ?>"><?php echo e($post->content); ?></a> </td>
            <td><?php echo e(date('d M y à H:i:s', strtotime($post->created_at))); ?></td>
            <td><?php echo e(date('d M y à H:i:s', strtotime($post->updated_at))); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <?php else: ?>
        <span>Aucun post en base</span>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FormationsCode\Laravel\laravelformation\resources\views/articles.blade.php ENDPATH**/ ?>