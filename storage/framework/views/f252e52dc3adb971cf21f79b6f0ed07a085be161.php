<?php $__env->startSection('content'); ?>

    <div class="row book">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><?php echo e($book->title); ?></div>
                <div class="card-body row">
                    <div class="col-md-4">
                        <img id='cover' src="<?php echo e(url('images/book/'.$book->getCover())); ?>">
                    </div>
                    <div class="col-md-8">
                        <div class='category' style='background-color:<?php echo e($book->category->color); ?>'><?php echo e($book->category->name); ?></div>
                        <div class='description'><?php echo e($book->description); ?></div>
                        <ul>
                            <li><span>Date de sortie</span><?php echo e($book->release_date); ?></li>
                            <li><span>Nombre de pages</span><?php echo e($book->pages); ?></li>
                            <li><span>Pays</span><?php echo e($book->country); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card options">
                <div class="card-header">Options</div>
                <div class="card-body">
                    <div class='status row'>
                        <div  class="col-md-4  offset-md-2">
                        <?php if($book->status == $book::STATUS_ACCEPTED): ?>
                            <a class='btn btn-danger' href="<?php echo e(url('admin/book/status/closed/'.$book->id)); ?>">Fermer</a>
                        <?php elseif($book->status == $book::STATUS_CLOSED): ?>
                            <a class='btn btn-success' href="<?php echo e(url('admin/book/status/accepted/'.$book->id)); ?>">Ouvrir</a>     
                        <?php endif; ?>
                        </div> 
                        <div  class="col-md-4">
                            <a class='btn btn-primary' href="<?php echo e(url('admin/book/update/'.$book->id)); ?>">Modifier</a>
                        </div>  
                    </div>   
                    <hr>                 
                    <div class='buylink'>
                        <?php if(count($book->buyLinks) > 0): ?>
                            <div><?php echo e($book->buyLinks[0]->link); ?></div>
                        <?php else: ?>
                            <form method="POST" action="<?php echo e(url('admin/book/buylink')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="book_id" value='<?php echo e($book->id); ?>'>
                                <div class="form-group row">
                                    <label for="link" class="col-md-3 col-form-label text-md-right">Lien Amazon</label>
                                    <div class="col-md-6">
                                        <input id="link" type="text" class="form-control" name="link" value="<?php echo e(old('link')); ?>" required>                                
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn">
                                            Valider
                                        </button>
                                    </div>
                                </div>    
                            </form>
                        <?php endif; ?> 
                    </div>
                    <hr>
                    <div class='cover'>
                        <form method="POST" action="<?php echo e(url('admin/book/cover')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="book_id" value='<?php echo e($book->id); ?>'>
                            <div class="form-group row">
                                <label for="cover" class="col-md-3 col-form-label text-md-right">Couverture</label>
                                <div class="col-md-6">
                                    <input type="file" id="cover" name="cover" accept="image/*">                                  
                                </div>                            
                                <div class="col-md-2">
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
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\athena\resources\views/admin/books/view.blade.php ENDPATH**/ ?>