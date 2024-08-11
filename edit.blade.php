<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>
</head>
<body>
    <h1>Edit Contact</h1>

    <form method="POST" action="{{ url('/contacts/' . $contact->id) }}">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $contact->name }}" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $contact->email }}" required><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="{{ $contact->phone }}"><br>

        <label for="address">Address:</label>
        <input type="text" name="address" value="{{ $contact->address }}"><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
