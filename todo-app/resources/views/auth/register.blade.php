<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 flex items-center justify-center h-screen text-gray-300">
    <div class="w-full max-w-md">
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-center">Registreren</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium">Naam</label>
                    <input type="text" class="form-input mt-1 block w-full bg-gray-700 text-white border-gray-600 rounded p-2" id="name" name="name" required autofocus>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium">Email Address</label>
                    <input type="email" class="form-input mt-1 block w-full bg-gray-700 text-white border-gray-600 rounded p-2" id="email" name="email" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium">Wachtwoord</label>
                    <input type="password" class="form-input mt-1 block w-full bg-gray-700 text-white border-gray-600 rounded p-2" id="password" name="password" required>
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium">Herhaal Wachtwoord</label>
                    <input type="password" class="form-input mt-1 block w-full bg-gray-700 text-white border-gray-600 rounded p-2" id="password_confirmation" name="password_confirmation" required>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded w-full">Registreren</button>
            </form>
        </div>
    </div>
</body>

</html>