<?php $__env->startSection('content'); ?>
<div class="container">
            <div class="card">
                <div class="card-header">Paramètres</div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(url('settings')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                       
                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">Avatar</label>
                            <div class="col-md-6">
                                <input type="file" id="avatar" name="avatar" accept="image/*">                                  
                            </div>
                        </div>
                                            

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Valider
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\athena\resources\views/settings/index.blade.php ENDPATH**/ ?>