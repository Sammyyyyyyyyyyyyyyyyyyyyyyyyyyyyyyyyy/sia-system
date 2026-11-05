<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - SIA</title>

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
            background:
                radial-gradient(circle at 10% 20%, rgba(37, 99, 235, 0.18), transparent 25%),
                radial-gradient(circle at 90% 80%, rgba(14, 165, 233, 0.18), transparent 25%),
                linear-gradient(135deg, #dbeafe, #eff6ff, #bfdbfe);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: 100%;
            max-width: 920px;
            min-height: 570px;
            display: flex;
            background: rgba(255, 255, 255, 0.88);
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 24px;
            overflow: hidden;
            box-shadow:
                0 25px 60px rgba(30, 64, 175, 0.25),
                0 5px 15px rgba(30, 64, 175, 0.10);
        }

        .welcome {
            width: 46%;
            flex-shrink: 0;
            background:
                radial-gradient(circle at 20% 20%, rgba(96, 165, 250, 0.35), transparent 30%),
                radial-gradient(circle at 90% 90%, rgba(56, 189, 248, 0.25), transparent 30%),
                linear-gradient(145deg, #0f2f68, #0756b5, #168cf0);
            color: white;
            padding: 50px 40px;
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
            line-height: 1.4;
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

        .form-section {
            flex: 1;
            min-width: 0;
            padding: 35px clamp(25px, 5vw, 55px);
            background:
                radial-gradient(circle at 100% 0%, #dbeafe, transparent 35%),
                linear-gradient(145deg, #ffffff, #f8fbff);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

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
            margin-bottom: 12px;
            text-align: center;
        }

        form {
            width: 100%;
        }

        label {
            display: block;
            margin-top: 7px;
            margin-bottom: 4px;
            font-size: 12px;
            font-weight: bold;
            color: #334155;
        }

        input {
            display: block;
            width: 100%;
            min-width: 0;
            height: 34px;
            padding: 8px 12px;
            border: 1px solid #dbeafe;
            border-radius: 8px;
            outline: none;
            background: #f8fbff;
            font-size: 12px;
            transition: 0.2s;
        }

        input:focus {
            border-color: #168cf0;
            background: white;
            box-shadow: 0 0 0 3px rgba(22, 140, 240, 0.10);
        }

        input::placeholder {
            color: #94a3b8;
        }

        /* ADDED: PASSWORD EYE ICON */

        .password-field {
            position: relative;
            width: 100%;
        }

        .password-field input {
            padding-right: 42px;
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 8px;
            transform: translateY(-50%);
            width: 28px;
            height: 28px;
            min-height: 0;
            margin: 0;
            padding: 4px;
            border: none;
            border-radius: 5px;
            background: transparent;
            color: #64748b;
            box-shadow: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .password-toggle:hover {
            background: #dbeafe;
            color: #0756b5;
        }

        .password-toggle:focus-visible {
            outline: 2px solid #168cf0;
            outline-offset: 1px;
        }

        .password-toggle svg {
            display: block;
            width: 18px;
            height: 18px;
            fill: none;
            stroke: currentColor;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
            pointer-events: none;
        }

        .error {
            color: #dc2626;
            font-size: 10px;
            line-height: 1.5;
            margin-top: 2px;
            overflow-wrap: anywhere;
        }

        button {
            width: 100%;
            min-height: 40px;
            padding: 10px 12px;
            margin-top: 15px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(135deg, #0756b5, #168cf0);
            color: white;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 7px 18px rgba(22, 140, 240, 0.25);
        }

        button:hover {
            background: linear-gradient(135deg, #06428c, #0876d1);
        }

        /* Keep the eye toggle separate from the submit button style */
        .password-toggle,
        .password-toggle:hover {
            box-shadow: none;
        }

        .bottom-text {
            text-align: center;
            margin-top: 10px;
            font-size: 11px;
            line-height: 1.6;
            color: #64748b;
        }

        .bottom-text a {
            color: #0876d1;
            text-decoration: none;
            font-weight: bold;
        }

        .bottom-text a:hover {
            text-decoration: underline;
        }

        /* TABLET AND MOBILE */
        @media (max-width: 760px) {
            body {
                padding: 18px;
                align-items: flex-start;
            }

            .card {
                width: 100%;
                max-width: 480px;
                height: auto;
                min-height: 0;
                margin: auto;
                flex-direction: column;
                border-radius: 20px;
            }

            .welcome {
                width: 100%;
                flex-shrink: 0;
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
                flex: none;
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
                margin-top: 10px;
            }

            input {
                height: 40px;
                font-size: 14px;
            }

            input::placeholder {
                font-size: 12px;
            }

            .error {
                font-size: 11px;
            }

            button:not(.password-toggle) {
                min-height: 42px;
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
                text-align: center;
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

            <div>
                <h1>WELCOME TO</h1>
                <h2>System Integration and Architecture</h2>
            </div>

            <p>
                Explore technology, integration, and architecture
                through innovative system solutions.
            </p>
        </section>

        <section class="form-section">
            <h2>CREATE ACCOUNT</h2>
            <div class="subtitle">Fill in your information to get started.</div>

            <form action="/signup" method="POST">
                @csrf

                <label for="fullname">Full Name</label>
                <input
                    type="text"
                    id="fullname"
                    name="fullname"
                    value="{{ old('fullname') }}"
                    placeholder="Enter your full name"
                >
                @error('fullname')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="address">Address</label>
                <input
                    type="text"
                    id="address"
                    name="address"
                    value="{{ old('address') }}"
                    placeholder="Enter your address"
                >
                @error('address')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="age">Age</label>
                <input
                    type="number"
                    id="age"
                    name="age"
                    value="{{ old('age') }}"
                    placeholder="Enter your age"
                >
                @error('age')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="username">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    value="{{ old('username') }}"
                    placeholder="Enter your username"
                >
                @error('username')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="password">Password</label>
                <div class="password-field">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        autocomplete="new-password"
                    >

                    <button
                        type="button"
                        class="password-toggle"
                        data-target="password"
                        aria-label="Show password"
                        aria-pressed="false"
                    >
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                    </button>
                </div>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="password_confirmation">Confirm Password</label>
                <div class="password-field">
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Confirm your password"
                        autocomplete="new-password"
                    >

                    <button
                        type="button"
                        class="password-toggle"
                        data-target="password_confirmation"
                        aria-label="Show confirm password"
                        aria-pressed="false"
                    >
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                    </button>
                </div>
                <label for="invite_code">Instructor Invitation Code</label>
                <input
                type="password"
                id="invite_code"
                name="invite_code"
                placeholder="Enter your invitation code"
                autocomplete="off"
            >
                @error('invite_code')
                    <div class="error">{{ $message }}</div>
                @enderror

                <button type="submit">CREATE ACCOUNT</button>
            </form>

            <div class="bottom-text">
                Already have an account? <a href="/login">Login</a>
            </div>
        </section>
    </main>

    <!-- ADDED: INDEPENDENT SHOW / HIDE FOR BOTH PASSWORD FIELDS -->
    <script>
        document.querySelectorAll('.password-toggle').forEach(function (button) {
            button.addEventListener('click', function () {
                const input = document.getElementById(button.dataset.target);
                const showing = input.type === 'password';

                input.type = showing ? 'text' : 'password';

                button.setAttribute('aria-pressed', String(showing));
                button.setAttribute(
                    'aria-label',
                    showing ? 'Hide password' : 'Show password'
                );

                button.innerHTML = showing
                    ? `<svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M3 3l18 18"/>
                        <path d="M10.6 10.6a2 2 0 0 0 2.8 2.8"/>
                        <path d="M9.9 5.2A10.8 10.8 0 0 1 12 5c6.5 0 10 7 10 7a14 14 0 0 1-3.1 3.8"/>
                        <path d="M6.2 6.2C3.5 8 2 12 2 12s3.5 7 10 7a10.5 10.5 0 0 0 4-.8"/>
                       </svg>`
                    : `<svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/>
                        <circle cx="12" cy="12" r="3"/>
                       </svg>`;
            });
        });
    </script>
</body>
</html>