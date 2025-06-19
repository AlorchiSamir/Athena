<?php $__env->startSection('content'); ?>
<div class="container">
   <div class='search-header'>
      <p>Résultat de recherches pour : <span><?php echo e($query); ?></span></p>
      <div>
         <?php if(count($books) > 0): ?>
            <div class='btn-search button-books'>Livres (<?php echo e(count($books)); ?>)</div>
         <?php endif; ?>
         <?php if(count($authors) > 0): ?>
            <div class='btn-search button-authors'>Auteurs (<?php echo e(count($authors)); ?>)</div>
         <?php endif; ?>
      </div>
   </div>
   <div class='search-books'>
   	<?php echo $__env->make('books.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </div>
   <div class='search-authors' <?php echo (count($books)>0) ? 'style="display:none"' : '' ?>>
      <?php echo $__env->make('authors.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </div>
</div>


<script>
   $(function(){
       $('.button-books').click(function(){
         $('.search-books').show();
         $('.search-authors').hide();
       });
       $('.button-authors').click(function(){
         $('.search-authors').show();
         $('.search-books').hide();
       });
   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\athena\resources\views/search/index.blade.php ENDPATH**/ ?>