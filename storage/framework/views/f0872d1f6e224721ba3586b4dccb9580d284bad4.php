<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8 offset-md-1">
            <div class="card">
                <div class="card-header">Modifier livre</div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(url('admin/book/update/'.$book->id)); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Titre</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="<?php echo e($book->title); ?>" required autofocus>                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">Catégorie</label>
                            <div class="col-md-6">
                                <select class="form-control" id='category' name='category'>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>" <?php if($book->category_id == $category->id){ echo 'selected'; } ?>>
                                            <?php echo e($category->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div> 

                        <!--<div class="form-group row">
                            <label for="cover" class="col-md-4 col-form-label text-md-right">Couverture</label>
                            <div class="col-md-6">
                                <input type="file" id="cover" name="cover" accept="image/*">                                  
                            </div>
                        </div>  -->

                        <div class="form-group row">
                            <label for="release_date" class="col-md-4 col-form-label text-md-right">Date de sortie</label>
                            <div class="col-md-6">
                                <input id="datepicker" type="text" class="form-control" name="release_date" value="<?php echo e($book->release_date); ?>">                                
                            </div>
                        </div>                   

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                            <div class="col-md-6">
                                <textarea id="description" name="description" class="form-control"><?php echo e($book->description); ?></textarea>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pages" class="col-md-4 col-form-label text-md-right">Pages</label>
                            <div class="col-md-6">
                                <input id="pages" type="number" class="form-control" name="pages" value="<?php echo e($book->pages); ?>">                                
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\athena\resources\views/admin/books/update.blade.php ENDPATH**/ ?>