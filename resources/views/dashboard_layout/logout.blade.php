<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Logout - SIA</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            height: 100%;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background:
                radial-gradient(
                    circle at top left,
                    rgba(22, 140, 240, 0.18),
                    transparent 35%
                ),
                radial-gradient(
                    circle at bottom right,
                    rgba(7, 86, 181, 0.16),
                    transparent 35%
                ),
                linear-gradient(
                    135deg,
                    #dbeafe,
                    #eff6ff,
                    #bfdbfe
                );
            color: #12345b;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .navbar {
            width: 100%;
            height: 68px;
            flex-shrink: 0;
            background: rgba(255, 255, 255, 0.88);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px 45px;
            border-bottom: 3px solid #0756b5;
            box-shadow:
                0 3px 15px rgba(7, 86, 181, 0.15);
            backdrop-filter: blur(10px);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-logo {
            width: 43px;
            height: 43px;
            border-radius: 50%;
            background:
                linear-gradient(
                    135deg,
                    #0f2f68,
                    #0756b5,
                    #168cf0
                );
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            font-weight: 900;
            box-shadow:
                0 5px 12px rgba(7, 86, 181, 0.28);
        }

        .brand-title {
            font-size: 15px;
            font-weight: 800;
            color: #0f2f68;
        }

        .brand-subtitle {
            font-size: 9px;
            color: #55708f;
            margin-top: 2px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 3px;
        }

        .nav-links a {
            text-decoration: none;
            color: #12345b;
            font-size: 11px;
            font-weight: 600;
            padding: 8px 11px;
            border-radius: 7px;
            white-space: nowrap;
            transition: 0.2s;
        }

        .nav-links a:hover {
            background: #dbeafe;
            color: #0756b5;
        }

        .nav-links .active {
            background:
                linear-gradient(
                    135deg,
                    #0f2f68,
                    #0756b5,
                    #168cf0
                );
            color: white;
            box-shadow:
                0 4px 10px rgba(7, 86, 181, 0.25);
        }

        .logout-nav {
            border: 1px solid #0756b5;
            color: #0756b5 !important;
        }

        .logout-nav:hover {
            background: #0756b5 !important;
            color: white !important;
        }

        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .logout-card {
            width: 430px;
            background: rgba(255, 255, 255, 0.92);
            border-radius: 20px;
            padding: 40px 35px;
            text-align: center;
            border: 1px solid rgba(7, 86, 181, 0.15);
            box-shadow:
                0 15px 35px rgba(7, 86, 181, 0.18);
            backdrop-filter: blur(10px);
        }

        .logout-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background:
                linear-gradient(
                    135deg,
                    #0f2f68,
                    #0756b5,
                    #168cf0
                );
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: bold;
            box-shadow:
                0 8px 18px rgba(7, 86, 181, 0.25);
        }

        .logout-card h1 {
            color: #0f2f68;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .logout-card p {
            color: #55708f;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 12px;
        }

        .btn {
            min-width: 130px;
            padding: 11px 18px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .cancel {
            background: #dbeafe;
            color: #0756b5;
            border: 1px solid #b8d5f5;
        }
        .cancel:hover {
            background: #c7ddf8;
        }

        .logout-button {
            border: none;
            background:
                linear-gradient(
                    135deg,
                    #0f2f68,
                    #0756b5,
                    #168cf0
                );
            color: white;
            box-shadow:
                0 5px 12px rgba(7, 86, 181, 0.22);
        }

        .logout-button:hover {
            transform: translateY(-1px);
            box-shadow:
                0 8px 16px rgba(7, 86, 181, 0.30);
        }

        footer {
            width: 100%;
            height: 52px;
            flex-shrink: 0;
            background:
                linear-gradient(
                    135deg,
                    #0f2f68,
                    #0756b5,
                    #168cf0
                );
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 11px;
        }

        @media (max-width: 650px) {
            body {
                overflow: auto;
            }

            .navbar {
                height: auto;
                flex-direction: column;
                gap: 9px;
                padding: 10px 15px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }

            .main-content {
                padding: 20px 15px;
            }

            .logout-card {
                width: 100%;
                max-width: 430px;
                padding: 30px 20px;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

            footer {
                height: 45px;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="brand">
            <div class="brand-logo">
                SIA
            </div>
            <div>
                <div class="brand-title">
                    SIA STUDENT PORTAL
                </div>
                <div class="brand-subtitle">
                    System Integration and Architecture
                </div>
            </div>
        </div>

        <div class="nav-links">
            <a href="/dashboard"> Home</a>
            <a href="/chat"> Chat</a>
            <a href="/calendar"> Calendar</a>
            <a href="/online-classes"> Online Classes</a>
            <a href="/logout" class="active"> Logout</a>
        </div>
    </nav>

    <main class="main-content">
        <div class="logout-card">
            <div class="logout-icon">
                →
            </div>
            <h1>
                Logout
            </h1>
            <p>
                Are you sure you want to logout from the
                SIA Student Portal?
            </p>

            <div class="buttons">
                <a href="/dashboard" class="btn cancel"> Cancel</a>
                <form
                    action="/logout" method="POST">

                    @csrf

                    <button type="submit"class="btn logout-button">Yes, Logout</button>
                </form>
            </div>
        </div>
    </main>

    <footer>
        SIA
        &nbsp; | &nbsp;
        System Integration and Architecture
    </footer>

</body>
</html>