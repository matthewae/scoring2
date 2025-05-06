<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Scoring Dokumen Konstruksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <style>
        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 1;
            background: linear-gradient(135deg, #06B6D4, #6366F1, #A855F7);
        }
        .login-container {
            position: relative;
            z-index: 2;
        }
        .form-input {
            transition: all 0.3s ease;
        }
        .form-input:focus {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .btn-login {
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div id="particles-js"></div>
    <div class="min-h-screen flex items-center justify-center login-container">
        <div class="bg-white/80 backdrop-blur-md p-8 rounded-xl shadow-[0_8px_30px_rgb(0,0,0,0.12)] w-96 transform transition-all duration-300 hover:scale-[1.02] hover:shadow-[0_20px_40px_rgba(0,0,0,0.12)]">
            <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                    <input type="text" name="username" id="username" class="form-input shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('username') }}" required>
                    @error('username')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" name="password" id="password" class="form-input shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                    @error('password')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-input shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="btn-login bg-gradient-to-r from-cyan-500 via-indigo-500 to-purple-500 text-white font-bold py-3 px-6 rounded-lg focus:outline-none focus:shadow-outline hover:from-cyan-600 hover:via-indigo-600 hover:to-purple-600 shadow-lg hover:shadow-xl transition-all duration-300">
                        Register
                    </button>
                    <a href="{{ route('login') }}" class="inline-block align-baseline font-bold text-sm text-indigo-600 hover:text-indigo-800 transition-colors duration-200">
                        Sudah punya akun?
                    </a>
                </div>
            </form>
        </div>
    </div>
    <script src="/js/particles-config.js"></script>
</body>
</html>
