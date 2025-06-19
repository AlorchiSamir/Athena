<div class='create-comment'>
    <form method="POST" action="<?php echo e(url('book/comment/insert')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
        <input type="hidden" name="book_id" value='<?php echo e($book->id); ?>'>
        <div class="row">          
            <div class="col-md-12">
                <textarea id="content" name="content" class="form-control" rows='5'><?php echo e(old('content')); ?></textarea>
             </div>
       </div>
       <div class="row mb-0">
            <div class="col-md-12">
                <button type="submit" class="col-md-12 btn btn-primary">
                    Valider
                </button>
            </div>
        </div>
    </form>
</div><?php /**PATH C:\wamp64\www\athena\resources\views/books/comments/create.blade.php ENDPATH**/ ?>