<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>
</head>

<body>

    <h1>Register</h1>

    <form action="/register" method="POST">

        @csrf

        <div>
            <label>Name</label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
            >

            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label>Email</label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
            >

            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label>Password</label>

            <input
                type="password"
                name="password"
            >

            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label>Confirm Password</label>

            <input
                type="password"
                name="password_confirmation"
            >
        </div>

        <br>

        <button type="submit">
            Register
        </button>

    </form>

    <p>
        Already have an account?
        <a href="/login">Login</a>
    </p>

</body>
</html>