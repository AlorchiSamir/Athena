<div class="modal fade" id="message-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Proposer un livre</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                
            </div>
            <form id='message-pro-form' method="POST" action="{{ url('request/send') }}" enctype="multipart/form-data">
                <div class="modal-body">      
                    
                        @csrf
                       
                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label">Titre</label>
                            <div class="col-md-12">
                                <input id="title" type="text" class="form-control" name="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="author" class="col-md-2 col-form-label">Auteur</label>
                            <div class="col-md-12">
                                <input id="author" type="text" class="form-control" name="author">
                            </div>
                        </div>

                </div>
                <div class='modal-footer'>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </div>
                </div>
            </form>            
        </div>
    </div>
</div> 