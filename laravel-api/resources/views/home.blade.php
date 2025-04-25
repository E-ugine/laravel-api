<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

  @auth
    <p>Welcome, {{ auth()->user()->name }}. This is your account</p>

    <!-- Success or error message -->
    @if (session('success'))
      <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
      <div style="color: red;">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <!-- Logout Form -->
    <form action="/logout" method="POST">
      @csrf
      <button type="submit">Logout</button>
    </form>

    <!-- Create Post Form -->
    <div style="border: 3px solid black; margin-top: 20px;">
      <h2>Create a New Post</h2>
      <form action="/create-post" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br>
        @error('title')
          <p style="color:red;">{{ $message }}</p>
        @enderror
        <br>

        <label for="content">Content:</label>
        <textarea id="content" name="content" required></textarea><br>
        @error('content')
          <p style="color:red;">{{ $message }}</p>
        @enderror
        <br>

        <button type="submit">Create Post</button>
      </form>
    </div>

  @else
    <p>Welcome. Please register or login to your account</p>

    <!-- Register Form -->
    <div style="border: 3px solid black; margin-top: 20px;">
      <h2>Register Now</h2>
      <form action="/register" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Register</button>
      </form>
    </div>

    <!-- Login Form -->
    <div style="border: 3px solid black; margin-top: 20px;">
      <h2>Login</h2>
      <form action="/login" method="POST">
        @csrf
        <label for="loginname">Name:</label>
        <input type="text" id="loginname" name="loginname" required><br><br>

        <label for="loginpassword">Password:</label>
        <input type="password" id="loginpassword" name="loginpassword" required><br><br>

        <button type="submit">Login</button>
      </form>
    </div>
  @endauth

</body>
</html>
