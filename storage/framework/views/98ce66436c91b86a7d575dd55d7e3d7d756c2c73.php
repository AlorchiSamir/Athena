<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-5 offset-md-1">
            <div class="card">
                <div class="card-header">Ajouter auteur</div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(url('admin/author/update/'.$author->id)); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nom</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e($author->name); ?>" required autofocus>                                
                            </div>
                        </div>
                        
                                                       

                        <div class="form-group row">
                            <label for="bio" class="col-md-4 col-form-label text-md-right">Biographie</label>
                            <div class="col-md-6">
                                <textarea id="bio" name="bio" class="form-control"><?php echo e($author->bio); ?></textarea>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Sexe</label>
                            <div class="col-md-6">
                                <select class="form-control" id='gender' name='gender'>
                                    <option value="m" <?php if($author->gender == 'm'){ echo 'selected'; } ?>>Homme</option>
                                    <option value="f" <?php if($author->gender == 'f'){ echo 'selected'; } ?>>Femme</option>
                                </select>
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
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\athena\resources\views/admin/authors/update.blade.php ENDPATH**/ ?>