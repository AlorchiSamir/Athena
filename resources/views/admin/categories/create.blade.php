@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-5 offset-md-1">
            <div class="card">
                <div class="card-header">Ajouter catégorie</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('admin/category/insert') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nom</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="color" class="col-md-4 col-form-label text-md-right">Couleur</label>
                            <div class="col-md-6">
                                <input id="color" type="text" class="form-control" name="color" value="{{ old('color') }}" required>                                
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
@endsection