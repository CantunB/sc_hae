 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <?php if(isset($title)): ?>
                    <li class="breadcrumb-item text-uppercase"><a href="javascript: void(0);"><?php echo e($title); ?></a></li>
                    <?php endif; ?>
                    <?php if(isset($subtitle)): ?>
                    <li class="breadcrumb-item text-uppercase"><a href="javascript: void(0);"><?php echo e($subtitle); ?></a></li>
                    <?php endif; ?>
                    <?php if(isset($teme)): ?>
                    <li class="breadcrumb-item active text-uppercase"><?php echo e($teme); ?></li>
                    <?php endif; ?>
                </ol>
            </div>
            <?php if(isset($teme)): ?>
                <h4 class="page-title text-uppercase"><?php echo e($teme); ?></h4>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- end page title -->
<?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/sc_hae/resources/views/layouts/partials/breadcrumb.blade.php ENDPATH**/ ?>