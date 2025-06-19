<?php $__env->startSection('content'); ?>
<div>
	<div class="row-fluid">
		<div class="span12">
			<div class="tableau">
				<div class="tableau-title">
					<div class="caption">
						<i class="fas fa-book-open"></i> Livres
					</div>
				</div>
				<div class="tableau-body">
					<div class="clearfix">
						<div class="btn-group">
							<a href="<?php echo e(url('admin/book/create')); ?>" id="create" class="btn green">Ajouter</a>
						</div>
					</div>
					<table class="table table-striped table-bordered table-hover table-full-width" id="book_table">
						<thead>
							<tr>
								<th style="width:30px;">Id</th>
								<th style="width:280px;">Titre</th>
								<th>Description</th>
								<th style="width:130px;">Catégorie</th>
								<th style="width:120px;">Sortie</th>
								<th style="width:100px;">Pages</th>		
								<th style="width:20px;">Couverture</th>
								<th style="width:20px;"><i class='fa fa-heart'></i></th>
								<th style="width:20px;"><i class='fa fa-bookmark'></i></th>
								<th style="width:20px;"><i class='fa fa-comment'></i></th>
								<th style="width:20px;"><i class='fa fa-eye'></i></th>
								<th style="width:200px;">Créateur</th>						
								<th style="width:55px;"></th>								
							</tr>
						</thead>
						<tbody><?php
							foreach ($books as $book){ 
								?>
								<tr onclick="location.href='<?php echo e(url('admin/book/'.$book->id)); ?>'">
									<td><?php echo $book->id; ?></td>
									<td><?php echo $book->title; ?></td>
									<td class='description'><?php echo $book->description; ?></td>
									<td><?php echo $book->category->name; ?></td>
									<td><?php echo $book->release_date; ?></td>
									<td><?php echo $book->pages; ?></td>
									<td><?php echo ($book->cover != '') ? 'Y' : 'N'; ?></td>
									<td><?php echo $book->likes(); ?></td>
									<td><?php echo $book->interests(); ?></td>
									<td><?php echo count($book->comments); ?></td>
									<td><?php echo $book->getCountVisits(); ?></td>
									<td><?php echo $book->creator->name; ?></td>
									<td><a href="<?php echo e(url('admin/book/update/'.$book->id)); ?>" class='btn btn-primary'><i class='icon-edit'></i> Modifier</a></td>
								</tr>
							<?php }
						?></tbody>
					</table>					
				</div>				
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\athena\resources\views/admin/books/index.blade.php ENDPATH**/ ?>