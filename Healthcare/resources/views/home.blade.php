<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Care </title>  
</head>
<body>
  @auth
  <p>Congrats you are loggedd in.</p>
    <form action="/logout" method="POST">
        @csrf
        <button>Log out</button>
    </form>
       <br>
    <div style="border: 3px solid black;">
        <h2>Create a New Post</h2>
        <form action="/create-post" method="POST">
          @csrf
          <input type="text" name="dname" placeholder="name"><br>
          <textarea name="ddetail" placeholder="body content..."></textarea><br>
          <input type="text" name="dtime" placeholder="name"><br>
          <button>Save Post</button>
        </form>
      </div>


      <div style="border: 3px solid black;">
        <h2>All Posts</h2>
        @foreach($posts as $post)
        <div style="background-color: gray; padding: 10px; margin: 10px;">
          <h2>{{$post['dname']}} <h4> by</h4> {{$post->user->name}}</h2>
          <h4>{{$post['dtime']}}</h4>
          {{$post['ddetail']}}
          <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
          <form action="/delete-post/{{$post->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button>Delete</button>
          </form>
        </div>
        @endforeach
      </div>      
   


  @else
  <div style="border: 3px solid black;">
    <h2>Register</h2><br>
    <form action="/register" method="POST">
      @csrf 
     <input name="name" type="text" placeholder="name"><br>
     <br>
     <input name="email" type="text" placeholder="email"><br>
     <br>
     <input name="password" type="text" placeholder="password"><br>
     <br>
     <button>Register</button>
     <br>
     
    </form>
</div>

<div style="border: 3px solid black;">
    <h2>Log In</h2><br>
    <form action="/login" method="POST">
      @csrf 
     <input name="loginname" type="text" placeholder="name"><br>
     <br>
     <input name="loginpassword" type="text" placeholder="password"><br>
     <br>
     <button>Login</button>
     <br>
    </form>
</div>

    @endauth
</body>
</html>