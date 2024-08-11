<!DOCTYPE html>
<html>
<head>
    <title>Create Contact</title>
</head>
<body>
    <h1>Create Contact</h1>

    <form method="POST" action="{{ url('/contacts') }}">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone"><br>

        <label for="address">Address:</label>
        <input type="text" name="address"><br>

        <button type="submit">Create</button>
    </form>
</body>
</html>
