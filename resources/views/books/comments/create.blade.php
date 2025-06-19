<div class='create-comment'>
    <form method="POST" action="{{ url('book/comment/insert') }}" enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="book_id" value='{{ $book->id }}'>
        <div class="row">          
            <div class="col-md-12">
                <textarea id="content" name="content" class="form-control" rows='5'>{{ old('content') }}</textarea>
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
</div>