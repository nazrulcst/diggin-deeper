<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 style="text-align:center">All Post are here!</h2>
    <div>
        @if ( Session::get('success') )
            <div class="alert alert-success">
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif
    </div>
    <table class="table">
        <thead>
            <tr style="background: aliceblue;">
                <th scope="col">SL</th>
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $sl = 1;
            @endphp
            @foreach($posts as $post)
                <tr style="border:1px solid black">
                    <th scope="row">{{ $post->id }}</th>
                    <td style="background: aliceblue;">{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>
                        <a href="{{ route('post.edit',$post->id) }}">Edit</a>

                        <form action="{{ route('post.destroy',$post->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:red;border:none">Delete</button>
                        </form>
                    </td>   
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        
    </div>
</body>
</html>