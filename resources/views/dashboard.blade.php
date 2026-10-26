<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Loker Disnaker Sleman</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md text-center">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang!</h1>
        <p class="text-gray-600 mb-6">Kamu berhasil login menggunakan Akun Google.</p>
        
        <div class="bg-blue-50 border border-blue-200 rounded p-4 mb-6">
            <p class="text-sm text-blue-800 font-medium">
                Logged in as: {{ auth()->user()->email ?? 'User' }}
            </p>
        </div>

        <a href="/" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Kembali ke Beranda
        </a>
    </div>
</body>
</html>