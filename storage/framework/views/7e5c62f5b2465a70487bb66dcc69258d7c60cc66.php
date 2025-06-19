<?php $__env->startSection('content'); ?>
<div>
	<div class="row-fluid">
		<div class="span12">
			<div class="tableau">
				<div class="tableau-title">
					<div class="caption">
						<i class="fas fa-book-open"></i> Requêtes
					</div>
				</div>
				<div class="tableau-body">
					<div class='btn-search inwait'>En attente</div>
					<div class='btn-search valid'>Validés</div>
					<div class='btn-search cancel'>Refusés</div>
					<table class="table table-striped table-bordered table-hover table-full-width table-inwait" id="request_table inwait">
						<thead>
							<tr>
								<th style="width:30px;">Id</th>
								<th>Titre</th>
								<th style="width:130px;">Auteur</th>
								<th style="width:120px;">Status</th>					
								<th style="width:55px;"></th>
								<th style="width:55px;"></th>								
							</tr>
						</thead>
						<tbody><?php
							foreach ($requests_inwait as $request){ ?>
								<tr >
									<td><?php echo $request->id; ?></td>
									<td><?php echo $request->book; ?></td>
									<td><?php echo $request->author; ?></td>
									<td><?php echo $request->status; ?></td>
									<td><i class='icon-edit'></i><a href='request/<?php echo $request->id ?>/valid'>Valider</a></td>
									<td><i class='icon-edit'></i><a href='request/<?php echo $request->id ?>/cancel'>Ignorer</a></td>
								</tr>
							<?php }
						?></tbody>
					</table>

					<table class="table table-striped table-bordered table-hover table-full-width table-valid" id="request_table valid">
						<thead>
							<tr>
								<th style="width:30px;">Id</th>
								<th>Titre</th>
								<th style="width:130px;">Auteur</th>
								<th style="width:120px;">Status</th>					
								<th style="width:55px;"></th>
								<th style="width:55px;"></th>								
							</tr>
						</thead>
						<tbody><?php
							foreach ($requests_valid as $request){ ?>
								<tr >
									<td><?php echo $request->id; ?></td>
									<td><?php echo $request->book; ?></td>
									<td><?php echo $request->author; ?></td>
									<td><?php echo $request->status; ?></td>
									<td><i class='icon-edit'></i><a href='request/<?php echo $request->id ?>/valid'>Valider</a></td>
									<td><i class='icon-edit'></i><a href='request/<?php echo $request->id ?>/cancel'>Ignorer</a></td>
								</tr>
							<?php }
						?></tbody>
					</table>

					<table class="table table-striped table-bordered table-hover table-full-width table-cancel" id="request_table">
						<thead>
							<tr>
								<th style="width:30px;">Id</th>
								<th>Titre</th>
								<th style="width:130px;">Auteur</th>
								<th style="width:120px;">Status</th>					
								<th style="width:55px;"></th>
								<th style="width:55px;"></th>								
							</tr>
						</thead>
						<tbody><?php
							foreach ($requests_cancel as $request){ ?>
								<tr >
									<td><?php echo $request->id; ?></td>
									<td><?php echo $request->book; ?></td>
									<td><?php echo $request->author; ?></td>
									<td><?php echo $request->status; ?></td>
									<td><i class='icon-edit'></i><a href='request/<?php echo $request->id ?>/valid'>Valider</a></td>
									<td><i class='icon-edit'></i><a href='request/<?php echo $request->id ?>/cancel'>Ignorer</a></td>
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

<script>
   $(function(){
   		$('.table-valid').hide();
        $('.table-cancel').hide();

       $('.inwait').click(function(){
         $('.table-inwait').show();
         $('.table-valid').hide();
         $('.table-cancel').hide();
       });
       $('.valid').click(function(){
         $('.table-inwait').hide();
         $('.table-valid').show();
         $('.table-cancel').hide();
       });
       $('.cancel').click(function(){
         $('.table-inwait').hide();
         $('.table-valid').hide();
         $('.table-cancel').show();
       });
   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\athena\resources\views/admin/requests/index.blade.php ENDPATH**/ ?>