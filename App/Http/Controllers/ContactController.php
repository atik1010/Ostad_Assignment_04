namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // List all contacts
    public function index(Request $request)
    {
        $contacts = Contact::query()
            ->when($request->sort_by, function ($query, $sortBy) {
                return $query->orderBy($sortBy, $request->order ?? 'asc');
            })
            ->when($request->search, function ($query, $search) {
                return $query->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            })
            ->get();

        return view('contacts.index', compact('contacts'));
    }

    // Show form to create a new contact
    public function create()
    {
        return view('contacts.create');
    }

    // Store a new contact
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:contacts,email',
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        Contact::create($validated);

        return redirect('/contacts')->with('success', 'Contact created successfully.');
    }

    // Show a specific contact
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    // Show form to edit a contact
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }

    // Update a contact
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:contacts,email,' . $id,
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($validated);

        return redirect('/contacts')->with('success', 'Contact updated successfully.');
    }

    // Delete a contact
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect('/contacts')->with('success', 'Contact deleted successfully.');
    }
}
