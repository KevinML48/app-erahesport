<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="/build/assets/css/login.css">

    <title>Beautiful glass login form - Bedimcode</title>
</head>
<body>
    <div class="container">
        <div class="login__content">
            <img src="{{ asset('build/assets/image/bg-login.png') }}" alt="login image" class="login__img">

            <form method="POST" action="{{ route('login') }}" class="login__form">
                @csrf
                <div>
                    <h1 class="login__title">
                        <span>Welcome</span> Back
                    </h1>
                    <p class="login__description">
                        Welcome! Please login to continue.
                    </p>
                </div>

                <div class="login__inputs">
                    <!-- Email Address -->
                    <div>
                        <label for="email" class="login__label">{{ __('Email') }}</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="login__input" />
                        @error('email')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="login__label">{{ __('Password') }}</label>
                        <div class="login__box">
                            <input id="password" type="password" name="password" required autocomplete="current-password" class="login__input" />
                            <i class="ri-eye-off-line login__eye" id="input-icon"></i>
                        </div>
                        @error('password')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="login__check">
                    <input id="remember_me" type="checkbox" name="remember" class="login__check-input" />
                    <label for="remember_me" class="login__check-label">{{ __('Remember me') }}</label>
                </div>

                <div>
                    <!-- Submit Button -->
                    <div class="login__buttons">
                        <button type="submit" class="login__button">{{ __('Log In') }}</button>
                    </div>

                    <!-- Forgot Password -->
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="login__forgot">{{ __('Forgot Password?') }}</a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!--=============== MAIN JS ===============-->
    <script src="{{ asset('build/assets/js/login.js') }}"></script>
</body>
</html>
