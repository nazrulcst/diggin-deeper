<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style type="text/css">
    body {
        margin:50px 0px; padding:0px;
        text-align:center;
        align:center;
    }
    label,input {
        width: 150px;
        float: left;
        margin-bottom: 10px;
    }
    label {
        text-align: right;
        width: 75px;
        padding-right: 20px;
    }
    body {
        text-align: center;
    }
    form {
        display: inline-block;
    }
</style>

<body>
    <h2>Create a new post</h2>
    <form action="{{ route('post.update',$post->id) }}" method="post">
        <div style="color:red">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div style="color:green">
            @if ( Session::get('success') )
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif 
        </div>
        @csrf
        @method('PUT')
        <div class="form-group" style="display: inline-block">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $post->title }}" class="form-control" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" placeholder="Enter description" rows="4" cols="50">{{ $post->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</body>
</html>