{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation"
                          required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" required />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/images/digital-techno-background-with-connecting-lines-dots.jpg');
            background-size: cover;
            background-position: center;
            font-family: "Poppins", sans-serif;
        }

        .wrapper {
            width: 620px;
            height: auto;
            background: rgba(19, 46, 21, 0.5);
            border: 2px solid rgb(0, 252, 13);
            backdrop-filter: blur(30px);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #fff;
            border-radius: 10px;
            padding: 30px 40px;
            margin: 0 auto;
            margin-top: 100px;
        }

        .wrapper h2 {
            font-size: 36px;
            text-align: center;
        }

        .input-box {
            position: relative;
            margin: 30px 0;
        }

        .input-box input {
            width: 100%;
            height: 50px;
            background: transparent;
            outline: none;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            font-size: 16px;
            color: #fff;
            padding: 20px 45px 20px 20px;
        }

        .input-box input::placeholder {
            color: #fff;
        }

        .input-box i {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
        }

        .btn {
            width: 100%;
            height: 45px;
            background: #fff;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            color: #333;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Validation Errors -->
        {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}

        <h2 class="mb-4">Inscription</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <div class="input-box">
                    <input id="name" class="form-control" placeholder="Nom d'utilisateur" type="text"
                        name="name" value="{{ old('name') }}" required autocomplete="name" />
                    <i class='bx bxs-user'></i>
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mb-3">
                <div class="input-box">
                    <input id="email" class="form-control" type="email" placeholder="Email" name="email"
                        value="{{ old('email') }}" required autocomplete="email" />
                    <i class='bx bx-envelope'></i>
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-3">
                <div class="input-box">
                    <input id="password" class="form-control" placeholder="Mot de passe" type="password"
                        name="password" required autocomplete="new-password" />
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mb-3">
                <div class="input-box">
                    <input id="password_confirmation" class="form-control" placeholder="Confirmer mot de passe"
                        type="password" name="password_confirmation" required autocomplete="new-password" />
                    <i class='bx bx-lock-alt'></i>
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="mb-3">
                <div class="input-box">
                    <input id="phone" class="form-control" type="tel" placeholder="Téléphone" name="phone"
                        value="{{ old('phone') }}" required />
                    <i class='bx bxs-phone'></i>
                </div>
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <div class="mb-3">
                <div class="input-box">
                    <input id="address" class="form-control" type="text" placeholder="Résidence" name="address"
                        value="{{ old('address') }}" required />
                    <i class='bx bxs-home-alt-2'></i>
                </div>
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('login') }}" class="text-decoration-none">Déja inscrit ?</a>
                <button type="submit" class="btn btn-success">S'inscrire</button>
            </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>

</html>
