<?php $__env->startComponent('mail::message'); ?>
# Introduction

The body of your message.

<?php $__env->startComponent('mail::button', ['url' => $url]); ?>
Button Text
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\FormationsCode\Laravel\laravelformation\resources\views/emails/markdown-test.blade.php ENDPATH**/ ?>