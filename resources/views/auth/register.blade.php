<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ludiflex | Register</title>
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- STYLE -->
    <link rel="stylesheet" href="/build/assets/css/tableau-create.css">
</head>
<body>
    <div class="form-container">
        <div class="col col-1">
            <div class="image-layer">
                <img src="{{ asset('build/assets/image/white-outline.png') }}" class="form-image-main">
                <img src="{{ asset('build/assets/image/dots.png') }}" class="form-image dots">
                <img src="{{ asset('build/assets/image/coin.png') }}" class="form-image coin">
                <img src="{{ asset('build/assets/image/spring.png') }}" class="form-image spring">
                <img src="{{ asset('build/assets/image/rocket.png') }}" class="form-image rocket">
                <img src="{{ asset('build/assets/image/cloud.png') }}" class="form-image cloud">
                <img src="{{ asset('build/assets/image/stars.png') }}" class="form-image stars">
            </div>
        </div>

        <div class="login-form">
            <div class="form-title">
                <span>Create an Account</span>
            </div>
            <div class="form-inputs">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="input-box">
                        <input id="name" type="text" class="input-field" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Name" />
                        @error('name')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="input-box">
                        <input id="email" type="email" class="input-field" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Email Address" />
                        @error('email')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="input-box">
                        <input id="password" type="password" class="input-field" name="password" required autocomplete="new-password" placeholder="Password" />
                        @error('password')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="input-box">
                        <input id="password_confirmation" type="password" class="input-field" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" />
                        @error('password_confirmation')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-box">
                        <button type="submit" class="input-submit">
                            <span>Register</span>
                            <i class="bx bx-right-arrow-alt"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
