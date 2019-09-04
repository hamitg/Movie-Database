@extends('layouts.admin')

@section('content')

<div class="col-sm-11">

    @component('admin.includes.title')
        Edit post
    @endcomponent

    @if (!empty($post))
    <form method="POST" action="/admin/posts/{{ $post->id}}" style="text-align:right">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-secondary">Delete post</button>

    </form>
    <form method="POST" action="/admin/posts/{{$post->id}}" enctype="multipart/form-data">

        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-sm-3">

                <div class="form-group">
                    <label for="file">Movie pic</label>
                    <div>
                        <img src="{{ url('images/posts/'.$post->photo['filename']) }}" id="profile-img-tag" width="295px"/>
                    </div>
                    <input type="file" name="file" id="profile-img">
                </div>


            </div>
            <div class="col-sm-9">
    
                    <div class="form-group">
                        <label for="title">Post title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter a title for the post" value="{{ $post->title}}">
                    </div>
    

                    <div class="form-group">
                        <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter a post title" value="{{ $post->name }}">
                    </div>

                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id">
                            <option disabled selected>select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id}}" {{ $post->category_id == $category->id ? 'selected':''}}>{{ $category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                            <label for="description">Description</label>
                    <textarea class="form-control" rows="2" name="description">{{ $post->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="review">Review</label>
                        <textarea id="article-ckeditor" class="form-control" rows="5" name="review">
                            {{ $post->review }}
                        </textarea>
                    </div>

        
                    <button type="submit" class="btn btn-primary">Edit post</button>

               
                @component('admin.includes.formErrors')
                @endcomponent

            </div>
        </div>
      
        
    </form>
        
    @else
        <div>Sorry nothing here</div>
    @endif
</div>

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
    };

    CKEDITOR.replace( 'article-ckeditor', options );

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
                
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#profile-img").change(function(){
        readURL(this);
    });
</script>


@endsection