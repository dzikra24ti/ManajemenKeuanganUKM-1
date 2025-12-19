<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="bg-white p-8 rounded-lg shadow-lg w-96">
    <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.process') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label>Nama</label>
            <input type="text" name="name" class="w-full px-3 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label>Email</label>
            <input type="email" name="email" class="w-full px-3 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label>Password</label>
            <input type="password" name="password" class="w-full px-3 py-2 border rounded" required>
        </div>

        <div class="mb-6">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="w-full px-3 py-2 border rounded" required>
        </div>

        <button class="w-full bg-blue-600 text-white py-2 rounded">
            Daftar
        </button>
    </form>

    <p class="text-sm text-center mt-4">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="text-blue-600">Login</a>
    </p>
</div>

</body>
</html>
