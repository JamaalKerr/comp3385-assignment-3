<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .container {
            width: 80%;
            margin: 20px auto;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .client-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #fff;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .client-card img {
            max-width: 150px;
            height: auto;
            margin-top: 10px;
        }
        .button {
            display: inline-block;
            padding: 10px 15px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Dashboard</h1>
            <p>Welcome to your dashboard. Here you can manage your account, your clients, and much more.</p>
            <a href="{{ route('clients.add') }}" class="button">+ Create Client</a>
        </div>

        @if ($clients->isEmpty())
            <p>No clients available.</p>
        @else
            @foreach ($clients as $client)
                <div class="client-card">
                    <h2>{{ $client->name }}</h2>
                    <p><strong>Email:</strong> {{ $client->email }}</p>
                    <p><strong>Phone:</strong> {{ $client->telephone }}</p>
                    <p><strong>Address:</strong> {{ $client->address }}</p>
                    @if ($client->company_logo)
                        <p><strong>Company Logo:</strong></p>
                        <img src="{{ asset('storage/' . $client->company_logo) }}" alt="{{ $client->name }} Logo">
                    @else
                        <p>No logo uploaded.</p>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
</body>
</html>
