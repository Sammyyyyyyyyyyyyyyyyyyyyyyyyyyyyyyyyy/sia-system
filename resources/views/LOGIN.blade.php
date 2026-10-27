<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIA</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        html {
            min-height: 100%;
        }

        body {
            margin: 0;
            padding: 28px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background:
                radial-gradient(circle at 10% 20%, rgba(37, 99, 235, 0.18), transparent 25%),
                radial-gradient(circle at 90% 80%, rgba(14, 165, 233, 0.18), transparent 25%),
                linear-gradient(135deg, #dbeafe, #eff6ff, #bfdbfe);
        }

        .card {
            width: 100%;
            max-width: 920px;
            min-height: 500px;
            display: flex;
            background: rgba(255, 255, 255, 0.88);
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 24px;
            overflow: hidden;
            box-shadow:
                0 25px 60px rgba(30, 64, 175, 0.25),
                0 5px 15px rgba(30, 64, 175, 0.10);
        }

        /* WELCOME PANEL */

        .welcome {
            width: 46%;
            flex-shrink: 0;
            background:
                radial-gradient(circle at 20% 20%, rgba(96, 165, 250, 0.35), transparent 30%),
                radial-gradient(circle at 90% 90%, rgba(56, 189, 248, 0.25), transparent 30%),
                linear-gradient(145deg, #0f2f68, #0756b5, #168cf0);
            color: white;
            padding: 45px 35px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .welcome::before {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.15);
            top: -120px;
            left: -100px;
            pointer-events: none;
        }

        .welcome::after {
            content: "";
            position: absolute;
            width: 330px;
            height: 330px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.12);
            bottom: -180px;
            right: -130px;
            pointer-events: none;
        }

        .logo {
            width: 105px;
            height: 105px;
            flex-shrink: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.95);
            border: 5px solid rgba(255, 255, 255, 0.35);
            box-shadow:
                0 0 0 7px rgba(255, 255, 255, 0.10),
                0 10px 30px rgba(0, 0, 0, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 2;
            margin-bottom: 25px;
        }

        .logo::before {
            content: "";
            position: absolute;
            width: 82px;
            height: 82px;
            border-radius: 50%;
            border: 3px solid #168cf0;
        }

        .logo span {
            color: #0756b5;
            font-size: 25px;
            font-weight: 900;
            letter-spacing: 2px;
            position: relative;
            z-index: 2;
        }

        .welcome h1 {
            margin: 0;
            font-size: clamp(25px, 3vw, 34px);
            letter-spacing: 3px;
            line-height: 1.2;
            position: relative;
            z-index: 2;
        }

        .welcome h2 {
            margin: 12px 0 15px;
            font-size: 17px;
            font-weight: normal;
            line-height: 1.5;
            max-width: 280px;
            position: relative;
            z-index: 2;
        }

        .welcome p {
            font-size: 12px;
            line-height: 1.7;
            max-width: 280px;
            margin: 0;
            opacity: 0.88;
            position: relative;
            z-index: 2;
        }

        /* LOGIN FORM */

        .form-section {
            flex: 1;
            min-width: 0;
            padding: 45px clamp(25px, 5vw, 55px);
            background:
                radial-gradient(circle at 100% 0%, #dbeafe, transparent 35%),
                linear-gradient(145deg, #ffffff, #f8fbff);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Center heading on desktop and mobile */
        .form-section h2 {
            width: 100%;
            margin: 0;
            color: #123d7a;
            font-size: 30px;
            text-align: center;
        }

        .subtitle {
            width: 100%;
            color: #64748b;
            font-size: 12px;
            line-height: 1.6;
            margin-top: 6px;
            margin-bottom: 20px;
            text-align: center;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 10px;
            border-radius: 7px;
            margin-bottom: 10px;
            font-size: 12px;
            line-height: 1.5;
            text-align: center;
            overflow-wrap: anywhere;
        }

        .field {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 7px;
            font-size: 12px;
            font-weight: bold;
            color: #334155;
        }

        input {
            display: block;
            width: 100%;
            min-width: 0;
            height: 44px;
            padding: 8px 12px;
            border: 1px solid #dbeafe;
            border-radius: 8px;
            outline: none;
            background: #f8fbff;
            font-size: 16px;
            transition: 0.2s;
        }

        input:focus {
            border-color: #168cf0;
            background: white;
            box-shadow: 0 0 0 3px rgba(22, 140, 240, 0.10);
        }

        input::placeholder {
            color: #94a3b8;
            font-size: 13px;
        }

        .error {
            color: #dc2626;
            font-size: 11px;
            line-height: 1.5;
            margin-top: 5px;
            overflow-wrap: anywhere;
        }

        .forgot {
            text-align: right;
            margin-top: 8px;
        }

        .forgot a {
            color: #168cf0;
            font-size: 11px;
            text-decoration: none;
        }

        .forgot a:hover,
        .bottom-text a:hover {
            text-decoration: underline;
        }

        .login-button {
            width: 100%;
            min-height: 44px;
            padding: 11px 14px;
            margin-top: 20px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(135deg, #0756b5, #168cf0);
            color: white;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 7px 18px rgba(22, 140, 240, 0.25);
            transition: background 0.2s;
        }

        .login-button:hover {
            background: linear-gradient(135deg, #06428c, #0876d1);
        }

        .bottom-text {
            text-align: center;
            margin-top: 17px;
            font-size: 11px;
            line-height: 1.6;
            color: #64748b;
        }

        .bottom-text a {
            color: #0876d1;
            text-decoration: none;
            font-weight: bold;
        }

        /* TABLET AND MOBILE LAYOUT */

        @media (max-width: 760px) {
            body {
                padding: 18px;
                align-items: flex-start;
            }

            .card {
                max-width: 480px;
                min-height: 0;
                margin: auto;
                flex-direction: column;
                border-radius: 20px;
            }

            .welcome {
                width: 100%;
                padding: 28px 22px;
            }

            .logo {
                width: 76px;
                height: 76px;
                margin-bottom: 18px;
            }

            .logo::before {
                width: 58px;
                height: 58px;
            }

            .logo span {
                font-size: 22px;
            }

            .welcome h1 {
                font-size: 26px;
                letter-spacing: 2px;
            }

            .welcome h2 {
                margin: 9px 0;
                font-size: 15px;
            }

            .welcome p {
                font-size: 12px;
                max-width: 320px;
            }

            .form-section {
                width: 100%;
                padding: 30px 26px;
            }

            .form-section h2 {
                font-size: 26px;
                text-align: center;
            }

            .subtitle {
                margin-bottom: 18px;
                font-size: 13px;
                text-align: center;
            }

            label {
                font-size: 13px;
            }

            .forgot a {
                font-size: 12px;
            }

            .bottom-text {
                font-size: 12px;
            }
        }

        /* SMALL PHONES */

        @media (max-width: 380px) {
            body {
                padding: 12px;
            }

            .card {
                border-radius: 16px;
            }

            .welcome {
                padding: 23px 17px;
            }

            .logo {
                width: 66px;
                height: 66px;
                margin-bottom: 15px;
            }

            .logo::before {
                width: 50px;
                height: 50px;
            }

            .logo span {
                font-size: 19px;
            }

            .welcome h1 {
                font-size: 23px;
            }

            .welcome h2 {
                font-size: 14px;
            }

            .form-section {
                padding: 25px 19px;
            }

            .form-section h2 {
                font-size: 24px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                transition: none !important;
            }
        }
    </style>
</head>

<body>
    <main class="card">

        <section class="welcome">
            <div class="logo">
                <span>SIA</span>
            </div>

            <h1>WELCOME TO</h1>

            <h2>System Integration and Architecture</h2>

            <p>
                Explore technology, integration, and architecture
                through innovative system solutions.
            </p>
        </section>

        <section class="form-section">
            <h2>WELCOME BACK</h2>

            <div class="subtitle">
                Sign in to your account to continue.
            </div>

            @if (session('success'))
                <div class="success" role="status">
                    {{ session('success') }}
                </div>
            @endif

            <form action="/login" method="POST">
                @csrf

                <div class="field">
                    <label for="username">Username</label>

                    <input
                        type="text"
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        placeholder="Enter your username"
                        autocomplete="username"
                        required
                    >

                    @error('username')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="password">Password</label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        autocomplete="current-password"
                        required
                    >

                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="login-button">
                    LOGIN
                </button>
            </form>

            <div class="bottom-text">
                Don't have an account?
                <a href="/signup">Sign Up</a>
            </div>
        </section>

    </main>
</body>
</html>
