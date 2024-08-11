<!DOCTYPE html>
<html>
<head>
    <title>Contact Management</title>
</head>
<body>
    <h1>All Contacts</h1>

    <form method="GET" action="{{ url('/contacts') }}">
        <input type="text" name="search" placeholder="Search by name or email" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th><a href="{{ url('/contacts?sort_by=name&order=' . (request('order') === 'asc' ? 'desc' : 'asc')) }}">Name</a></th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th><a href="{{ url('/contacts?sort_by=created_at&order=' . (request('order') === 'asc' ? 'desc' : 'asc')) }}">Created At</a></th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->phone }}</td>
                <td>{{ $contact->address }}</td>
                <td>{{ $contact->created_at }}</td>
                <td>
                    <a href="{{ url('/contacts/' . $contact->id) }}">View</a>
                    <a href="{{ url('/contacts/' . $contact->id . '/edit') }}">Edit</a>
                    <form method="POST" action="{{ url('/contacts/' . $contact->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
