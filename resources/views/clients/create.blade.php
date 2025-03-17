<!DOCTYPE html>
<html>
<head>
    <title>Add Client</title>
</head>
<body>
    <h1>Create Client</h1>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label for="telephone">Phone:</label>
            <input type="text" id="telephone" name="telephone" value="{{ old('telephone') }}" placeholder="xxx-xxx-xxxx" required>
        </div>
        <div>
            <label for="address">Address:</label>
            <textarea id="address" name="address" required>{{ old('address') }}</textarea>
        </div>
        <div>
            <label for="company_logo">Company Logo:</label>
            <input type="file" id="company_logo" name="company_logo" required>
        </div>
        <button type="submit">Create</button>
    </form>
</body>
</html>
