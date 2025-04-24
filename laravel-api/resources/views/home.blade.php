<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @auth 
    <p>Welcome. This is your account</p>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    @else 
    <p>Welcome. Please register or login to your account</p>
    <div style=" border: 3px solid black">
        <h2>Register Now.</h2>
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

    <div style=" border: 3px solid black">
        <h2>LOGIN.</h2>
        <form action="/login" method="POST">
            @csrf
            <label for="loginname">Name:</label>
            <input type="text" id="name" name="loginname" required><br><br>

            <label for="loginpassword">Password:</label>
            <input type="password" id="password" name="loginpassword" required><br><br>

            <button type="submit">LOGIN</button>
        </form>
    </div>


    @endauth
</body>
</html>