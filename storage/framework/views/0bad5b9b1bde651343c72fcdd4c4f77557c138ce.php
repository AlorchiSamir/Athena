<?php $__env->startSection('content'); ?>
<div class="author view">
    <header class='shadow-sm'>        

        <div class='container'>

              <ol class="breadcrumb-nav">
                <li class='breadcrumb-item'><a href="<?php echo e(url('/')); ?>">Accueil</a></li>
                <li class='breadcrumb-item' ><a href="<?php echo e(url('authors')); ?>">Auteurs</a></li>
                <li class="breadcrumb-item active"><?php echo e($author->name); ?></li>
              </ol>
            <div class='zone-picture'>
                <img class='picture' src="<?php echo e(url('images/author/'.$author->getPicture())); ?>">
            </div> 
           
                <div class="content">    
                    <h1><?php echo e($author->name); ?></h1>

                    <p class='description'><?php echo e($author->bio); ?></p>
                    
            </div>
        </div>
    </header>
   <div class="container">
    <div class='list-books'>
        <h3>Livres</h3>
        <hr>
        <ul class='row'>
        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class='book col-md-2'>
                <a href="<?php echo e(url('book/'.$book->id).'/'.$book->slug); ?>">
                    <img class='cover' src="<?php echo e(url('images/book/'.$book->getCover())); ?>">
                </a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\athena\resources\views/authors/view.blade.php ENDPATH**/ ?>