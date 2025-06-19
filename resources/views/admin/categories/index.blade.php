@extends('admin.layouts.app')

@section('content')
<div>
	<div class="row-fluid">
		<div class="span12">
			<div class="tableau">
				<div class="tableau-title">
					<div class="caption">
						<i class="fa fa-globe"></i> Catégories
					</div>
				</div>
				<div class="tableau-body">
					<div class="clearfix">
						<div class="btn-group">
							<a href="{{ url('admin/category/create') }}" id="create" class="btn green">Ajouter</a>
						</div>
					</div>
					<table class="table table-striped table-bordered table-hover table-full-width" id="category_table">
						<thead>
							<tr>
								<th>Id</th>
								<th>Nom</th>
								<th style="width:30px;">Couleur</th>	
								<th style="width:30px;">Livres</th>	
								<th style="width:30px;"><i class='fa fa-eye'></i></th>							
								<th style="width:55px;"></th>								
							</tr>
						</thead>
						<tbody><?php
							foreach ($categories as $category){ 
								?>
								<tr><td><?php echo $category->id; ?></td>
								<td><?php echo $category->name; ?></td>
								<td><div style='background-color:{{ $category->color }}; height: 26px; width: 100%;' ></div></td>
								<td><?php echo count($category->books); ?></td>
								<td><?php echo $category->getCountVisits(); ?></td>
								<td><a href="{{ url('admin/category/update/'.$category->id) }}" class='btn btn-primary'><i class='icon-edit'></i> Modifier</a></td></tr>
							<?php }
						?></tbody>
					</table>					
				</div>				
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
@endsection