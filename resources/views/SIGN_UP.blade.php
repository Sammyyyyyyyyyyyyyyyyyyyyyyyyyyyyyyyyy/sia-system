<!DOCTYPE html>
<html>
<head>
    <title>Sign Up - SIA</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        body {
            background:
                radial-gradient(circle at 10% 20%, rgba(37, 99, 235, 0.18), transparent 25%),
                radial-gradient(circle at 90% 80%, rgba(14, 165, 233, 0.18), transparent 25%),
                linear-gradient(135deg, #dbeafe, #eff6ff, #bfdbfe);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: 920px;
            height: 570px;
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
        }

        .logo {
            width: 105px;
            height: 105px;
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
            font-size: 34px;
            letter-spacing: 3px;
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
            opacity: 0.88;
            position: relative;
            z-index: 2;
        }

        .form-section {
            width: 54%;
            padding: 35px 55px;
            background:
                radial-gradient(circle at 100% 0%, #dbeafe, transparent 35%),
                linear-gradient(145deg, #ffffff, #f8fbff);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-section h2 {
            margin: 0;
            color: #123d7a;
            font-size: 30px;
        }

        .subtitle {
            color: #64748b;
            font-size: 12px;
            margin-top: 6px;
            margin-bottom: 12px;
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
            width: 100%;
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

        .error {
            color: #dc2626;
            font-size: 10px;
            margin-top: 2px;
        }

        button {
            width: 100%;
            height: 40px;
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

        .bottom-text {
            text-align: center;
            margin-top: 10px;
            font-size: 11px;
            color: #64748b;
        }

        .bottom-text a {
            color: #0876d1;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="welcome">
            <div class="logo">
                <span>SIA</span>
            </div>
            <div>
                <h1>WELCOME TO</h1>
                <h2>System Integration and Architecture</h2>
            </div>
            <p>Explore technology, integration, and architecture through innovative system solutions.</p>
        </div>

        <div class="form-section">
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
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                >
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="password_confirmation">Confirm Password</label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Confirm your password"
                >

                <button type="submit">CREATE ACCOUNT</button>
            </form>

            <div class="bottom-text">
                Already have an account? <a href="/login">Login</a>
            </div>
        </div>
    </div>
</body>
</html>