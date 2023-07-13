<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('resouces')
</head>
<body class="w-100 ">
<nav class=" navbar navbar-expand-lg navbar-light bg-danger">
    <div class="container container-fluid">
        <a class="navbar-brand text-white" href="/">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="/">Home</a>
                </li>
            </ul>
            <div class="d-flex mb-2 mx-2">
                <form class="inline-block m-0" action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="btn-sm btn-dark m-0 text-white">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>
<div class="h-100 p-0 container">
    @auth
        <hr>
        <div class="row justify-content-center">
            <div class="col-10 mx-2 justify-content-center">
                <form action="/create-post" method="POST">
                    @csrf
                    <h4 class=" mx-1">Create a new Post</h4>
                    <input class="w-100 m-1" type="text" name="title" placeholder="Post title">
                    <textarea class="d-block w-100 m-1" name="body" placeholder="body content.."></textarea>
                    <button class="m-1 btn-dark w-100">Save post</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            @foreach($posts as $post)

                <div class="col-10 border border-secondary m-2 rounded-3">
                    <h4 class="py-2 d-inline-block text-danger">{{$post->title}}</h4>
                    <h6 class="d-inline-block text-danger">({{$post->name}})</h6>
                    <p class="d-inline-block" style="font-size: 12px">submited on <b>{{$post->created_at}}</b></p>
                    @if(@auth()->id() === $post->user_id)
                        <a class="btn-sm btn-outline-light text-dark border border-1 text-decoration-none"
                           href="/edit-post/{{$post->id}}">Edit
                            post</a>
                        <form class="d-inline-block m-0" action="/delete-post/{{$post->id}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn-sm btn-outline-light text-dark border border-1">Delete post</button>
                        </form>
                    @endif
                    <p>
                        {{$post->body}}
                    </p>
                    <div class="m-2">
                        <p class="btn-sm btn-dark d-inline-block p-1 m-0">Comments</p>
                        <hr>
                        <div class=" row m-1 justify-content-center">
                            @foreach($comments as $com)
                                @if($post->id == $com->post_id)
                                    <div class="col-12">
                                        <h6 class="d-inline-block">{{$com->name}} says:</h6>
                                        <p class="d-inline-block">{{$com->comment}}</p>
                                    </div>
                                    <hr>
                                @endif
                            @endforeach
                        </div>
                        <form action="/post-comment/{{$post->id}}" method="POST">
                            @csrf
                            @method("PUT")
                            <input class="w-100" type="text" name="comment" placeholder="Put a comment">
                        </form>
                    </div>
                </div>

            @endforeach
        </div>
    @endauth
    <hr>
    <div class="bg-danger fixed-bottom justify-content-center text-center ">
        <h6 class=" d-inline-block m-2" style="font-family: ' nconsolata', 'Fira Mono', 'Source Code Pro',
        Monaco, Consolas, 'Lucida Console', monospace">Stay cool</h6>
        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="20"
             height="20">
            <path d="M15.045,0c-.037-.001-6.063-.001-6.09,0-2.736,.024-4.955,2.258-4.955,4.999v14c0,2.757,2.243,5,5,5h6c2.757,0,5-2.243,5-5V5C20,2.258,17.781,.025,15.045,0Zm2.955,18.999c0,1.654-1.346,3-3,3h-6c-1.654,0-3-1.346-3-3V5c0-1.453,1.038-2.667,2.411-2.942l.694,1.389c.169,.339,.516,.553,.895,.553h4c.379,0,.725-.214,.895-.553l.694-1.389c1.373,.274,2.411,1.489,2.411,2.942v14Zm-5,1h-2c-.552,0-1-.448-1-1h0c0-.552,.448-1,1-1h2c.552,0,1,.448,1,1h0c0,.552-.448,1-1,1Z"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="20"
             height="20">
            <path d="M12,24A12,12,0,1,1,24,12,12.013,12.013,0,0,1,12,24ZM12,2A10,10,0,1,0,22,12,10.011,10.011,0,0,0,12,2Zm5.666,13.746a1,1,0,0,0-1.33-1.494A7.508,7.508,0,0,1,12,16a7.509,7.509,0,0,1-4.334-1.746,1,1,0,0,0-1.332,1.492A9.454,9.454,0,0,0,12,18,9.454,9.454,0,0,0,17.666,15.746ZM6,10c0,1,.895,1,2,1s2,0,2-1a2,2,0,0,0-4,0Zm8,0c0,1,.895,1,2,1s2,0,2-1a2,2,0,0,0-4,0Z"/>
        </svg>

    </div>
</div>
</body>
</html>
