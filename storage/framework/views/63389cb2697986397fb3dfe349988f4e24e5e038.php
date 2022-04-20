
<?php if(session('info')): ?>
  <div style="text-align: center" class="alert alert-primary" id="alert">
   <h5>     <?php echo e(session('info')); ?>

       </h5>
  </div>
<?php endif; ?>


<?php if(session('update')): ?>
  <div style="text-align: center"class="alert alert-warning" id="alert">
    <h5>      <?php echo e(session('update')); ?>

    </h5>
  </div>
<?php endif; ?>


<?php if(session('destroy')): ?>
  <div style="text-align: center" class="alert alert-danger" id="alert">
    <h5>  <?php echo e(session('destroy')); ?>

        </h5>
  </div>
<?php endif; ?>


<?php if(session('success')): ?>
  <div style="text-align: center"class="alert alert-success" id="alert">
   <h5>    <?php echo e(session('success')); ?>

      </h5>
  </div>
<?php endif; ?>
<?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/urm/resources/views/common/alerts.blade.php ENDPATH**/ ?>