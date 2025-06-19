@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-5 offset-md-1">
            <div class="card">
                <div class="card-header">Ajouter auteur</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('admin/author/insert') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nom</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>                                
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="picture" class="col-md-4 col-form-label text-md-right">Photo</label>
                            <div class="col-md-6">
                                <input type="file" id="picture" name="picture" accept="image/*">                                  
                            </div>
                        </div>                                      

                        <div class="form-group row">
                            <label for="bio" class="col-md-4 col-form-label text-md-right">Biographie</label>
                            <div class="col-md-6">
                                <textarea id="bio" name="bio" class="form-control">{{ old('bio') }}</textarea>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Sexe</label>
                            <div class="col-md-6">
                                <select class="form-control" id='gender' name='gender'>
                                    <option value="m">Homme</option>
                                    <option value="f">Femme</option>
                                </select>
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