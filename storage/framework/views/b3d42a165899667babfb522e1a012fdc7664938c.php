<?php $__env->startSection('content'); ?>
<div>
	<div class="row-fluid">
		<div class="span12">
			<div class="tableau">
				<div class="tableau-title">
					<div class="caption">
						<i class="fas fa-book-open"></i> Auteurs
					</div>
				</div>
				<div class="tableau-body">
					<div class="clearfix">
						<div class="btn-group">
							<a href="<?php echo e(url('admin/author/create')); ?>" id="create" class="btn green">Ajouter</a>
						</div>
					</div>
					<table class="table table-striped table-bordered table-hover table-full-width" id="book_table">
						<thead>
							<tr>
								<th style="width:30px;">Id</th>
								<th style="width:280px;">Nom</th>
								<th>Biographie</th>
								<th style="width:130px;">Sexe</th>	
								<th style="width:20px;">Photo</th>
								<th style="width:20px;"><i class='fa fa-heart'></i></th>
								<th style="width:20px;"><i class='fa fa-bookmark'></i></th>
								<th style="width:20px;"><i class='fa fa-comment'></i></th>
								<th style="width:20px;"><i class='fa fa-eye'></i></th>
								<th style="width:200px;">Créateur</th>						
								<th style="width:55px;"></th>								
							</tr>
						</thead>
						<tbody><?php
							foreach ($authors as $author){ 
								?>
								<tr>
									<td><?php echo $author->id; ?></td>
									<td><?php echo $author->name; ?></td>
									<td class='description'><?php echo $author->bio; ?></td>									
									<td><?php echo $author->gender; ?></td>
									<td><?php echo ($author->picture != '') ? 'Y' : 'N'; ?></td>
									<td><?php //echo //$book->likes(); ?></td>
									<td><?php //echo //$book->interests(); ?></td>
									<td><?php //echo// count($book->comments); ?></td>
									<td><?php //echo //$book->getCountVisits(); ?></td>
									<td><?php echo $author->creator->name; ?></td>
									<td><a href="<?php echo e(url('admin/author/update/'.$author->id)); ?>" class='btn btn-primary'><i class='icon-edit'></i> Modifier</a></td>
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\athena\resources\views/admin/authors/index.blade.php ENDPATH**/ ?>