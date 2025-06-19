<?php $__env->startSection('content'); ?>
<div>
	<div class="row-fluid">
		<div class="span12">
			<div class="tableau">
				<div class="tableau-title">
					<div class="caption">
						<i class="fa fa-globe"></i> Tags
					</div>
				</div>
				<div class="tableau-body">
					<div class="clearfix">
						<div class="btn-group">
							<a href="<?php echo e(url('admin/tag/create')); ?>" id="create" class="btn green">Ajouter</a>
						</div>
					</div>
					<table class="table table-striped table-bordered table-hover table-full-width" id="category_table">
						<thead>
							<tr>
								<th>Id</th>
								<th>Nom</th>	
								<th style="width:30px;">Livres</th>	
								<th style="width:30px;"><i class='fa fa-eye'></i></th>							
								<th style="width:55px;"></th>								
							</tr>
						</thead>
						<tbody><?php
							foreach ($tags as $tag){ 
								?>
								<tr><td><?php echo $tag->id; ?></td>
								<td><?php echo $tag->name; ?></td>
								<td><?php echo count($tag->books); ?></td>
								<td><?php echo $tag->getCountVisits(); ?></td>
								<td><a href="<?php echo e(url('admin/tag/update/'.$tag->id)); ?>" class='btn btn-primary'><i class='icon-edit'></i> Modifier</a></td></tr>
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\athena\resources\views/admin/tags/index.blade.php ENDPATH**/ ?>