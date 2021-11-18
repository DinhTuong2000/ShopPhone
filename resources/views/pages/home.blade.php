
<li><a id="logout" action="#"><i class="fas fa-power-off"></i> <?php echo e(__('header.Logout')); ?></a></li>

<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
    <?php echo csrf_field(); ?>
</form>
