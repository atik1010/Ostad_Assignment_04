<!DOCTYPE html>
<html>
<head>
    <title>View Contact</title>
</head>
<body>
    <h1>View Contact</h1>

    <p><strong>Name:</strong> {{ $contact->name }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Phone:</strong> {{ $contact->phone }}</p>
    <p><strong>Address:</strong> {{ $contact->address }}</p>

    <a href="{{ url('/contacts/' . $contact->id . '/edit') }}">Edit</a>
    <form method="POST" action="{{ url('/contacts/' . $contact->id) }}" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

    <a href="{{ url('/contacts') }}">Back to Contacts</a>
</body>
</html>
