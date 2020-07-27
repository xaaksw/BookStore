 <div class= "container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="text"> Add Book</h1>
                </div>
                    <div class="col-md-6">
                        <Span class="glyphicon glyphicon-plus"></Span>
                    </div>
            </div>

             <label class="label control-label">Book Title</label>
             <input type="text" class= "form-control" name=" title" id="title" placeholder="Title" value="{{$book->title ?? ''}}">

             <label class="label control-label">Author</label>
             <input type="text" class= "form-control" name=" author" id="author" placeholder="Author" value="{{$book->author ?? ''}}">

            <label class="label control-label">Book Description</label>
            <input type="text" class= "form-control" name="description" id="description" placeholder="Description" value="{{$book->description ??''}}">

            <label class="label control-label">Book Price</label>
            <input type="number" class= "form-control" id="price" name="price" placeholder="Price" value="{{$book->price ?? ''}}">

            <label class="label control-label">Book Cover</label>
            <span class="btn btn-primary btn-file">choose file <input type="file" class="form-control" id="cover" name="cover" value="{{$book->cover ?? ''}}">
            </span>
         <br>
         <br>
        <div class="row">
            <button class="btn btn-danger" type="submit">Add Book</button>
        </div>
        </div>
            <div class="col-md-3"></div>
      </div>
    </div>


