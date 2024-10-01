<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-blue-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89-3.64a2 2 0 011.62 0L21 8M5 10v10a2 2 0 002 2h10a2 2 0 002-2V10m-12 0h12" />
                </svg>
                <h2 class="text-2xl font-bold text-gray-800 mt-4">Verifikasi Email Anda</h2>
                <p class="mt-2 text-gray-600">
                    Terima kasih telah mendaftar! Sebelum melanjutkan, silakan periksa email Anda untuk tautan verifikasi.
                </p>
                @if (session('status') == 'verification-link-sent')
                    <div class="mt-4 p-4 bg-green-100 text-green-600 rounded-lg">
                        Tautan verifikasi baru telah dikirim ke email Anda.
                    </div>
                @endif
            </div>

            <div class="mt-6 flex justify-center items-center">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
                       Kirim Ulang Email Verifikasi
                    </button>
                </form>
            </div>

            <div class="mt-6 text-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                        {{ __('Logout') }}
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
