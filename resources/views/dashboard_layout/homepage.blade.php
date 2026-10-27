<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIA - Home</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
        }

        html {
            overflow-x: hidden;
        }

        body {
            min-height: 100vh;
            min-height: 100dvh;
            background:
                radial-gradient(circle at 10% 20%, rgba(37, 99, 235, 0.18), transparent 25%),
                radial-gradient(circle at 90% 80%, rgba(14, 165, 233, 0.18), transparent 25%),
                linear-gradient(135deg, #dbeafe, #eff6ff, #bfdbfe);
            color: #12345b;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* ============ NAVBAR — MATCHED ============ */

        .navbar {
            width: 100%;
            min-height: 78px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            padding: 12px 30px;
            background: rgba(255, 255, 255, 0.94);
            border-bottom: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 8px 25px rgba(30, 64, 175, 0.12);
            position: relative;
            z-index: 10;
            flex-shrink: 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            flex: 0 0 auto;
            min-width: 0;
        }

        .logo {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0f2f68, #0756b5, #168cf0);
            color: white;
            font-size: 13px;
            font-weight: 900;
            letter-spacing: 1px;
            box-shadow: 0 8px 20px rgba(22, 140, 240, 0.25);
            border: 3px solid rgba(255, 255, 255, 0.8);
        }

        .brand-text {
            display: flex;
            flex-direction: column;
            gap: 3px;
            min-width: 0;
        }

        .brand-title {
            color: #123d7a;
            font-size: 16px;
            font-weight: 900;
            letter-spacing: 0.5px;
        }

        .brand-subtitle {
            color: #64748b;
            font-size: 10px;
            line-height: 1.4;
        }

        .nav-links {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex: 0 1 auto;
            min-width: 0;
            gap: 5px;
        }

        .nav-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 40px;
            padding: 9px 12px;
            text-decoration: none;
            color: #334155;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
            border-radius: 9px;
            border: 1px solid transparent;
            transition: background 0.2s ease, color 0.2s ease, box-shadow 0.2s ease;
        }

        .nav-links a:hover {
            background: #dbeafe;
            color: #0756b5;
        }

        .nav-links a.active {
            background: linear-gradient(135deg, #0756b5, #168cf0);
            color: white;
            box-shadow: 0 5px 14px rgba(22, 140, 240, 0.22);
        }

        .nav-links a.logout {
            margin-left: 3px;
            color: #0756b5;
            border: 1px solid #168cf0;
        }

        .nav-links a.logout:hover {
            background: linear-gradient(135deg, #0756b5, #168cf0);
            color: white;
        }

        /* ============ MAIN ============ */

        .main-container {
            width: 100%;
            flex: 1 1 auto;
            min-height: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: clamp(12px, 3vh, 35px) clamp(14px, 3vw, 40px);
            position: relative;
            overflow: hidden;
        }

        .circle-one {
            position: absolute;
            width: 250px;
            height: 250px;
            border-radius: 50%;
            border: 1px solid rgba(22, 140, 240, 0.15);
            top: -100px;
            left: -80px;
            pointer-events: none;
        }

        .circle-two {
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            border: 1px solid rgba(7, 86, 181, 0.12);
            bottom: -160px;
            right: -120px;
            pointer-events: none;
        }

        .hero {
            text-align: center;
            margin-bottom: clamp(14px, 3vh, 30px);
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: clamp(20px, 3vw, 29px);
            color: #123d7a;
            font-weight: 900;
            letter-spacing: 1px;
            line-height: 1.3;
            margin-bottom: 5px;
        }

        .hero h2 {
            font-size: clamp(13px, 1.6vw, 17px);
            color: #334155;
            font-weight: 600;
            line-height: 1.5;
            margin-bottom: 10px;
        }

        .hero-line {
            width: 65px;
            height: 3px;
            background: linear-gradient(90deg, #0756b5, #168cf0);
            border-radius: 10px;
            margin: 0 auto 11px;
        }

        .hero p {
            max-width: 680px;
            margin: auto;
            color: #64748b;
            font-size: clamp(11px, 1.1vw, 13px);
            line-height: 1.6;
        }

        .information {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: clamp(14px, 2.5vw, 25px);
            position: relative;
            z-index: 2;
        }

        .info-card {
            position: relative;
            background: rgba(255, 255, 255, 0.90);
            min-width: 0;
            padding: clamp(16px, 2.4vh, 27px) clamp(18px, 2.5vw, 30px);
            border-radius: 18px;
            border: 1px solid rgba(255, 255, 255, 0.85);
            box-shadow: 0 15px 35px rgba(30, 64, 175, 0.13);
            overflow: hidden;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .info-card::before {
            content: "";
            position: absolute;
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: rgba(22, 140, 240, 0.07);
            top: -65px;
            right: -65px;
            pointer-events: none;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(30, 64, 175, 0.18);
        }

        .info-card h2 {
            font-size: clamp(18px, 2.2vw, 25px);
            color: #123d7a;
            margin-bottom: clamp(8px, 1.4vh, 15px);
            position: relative;
            z-index: 2;
        }

        .info-card p {
            font-size: clamp(11px, 1.1vw, 13px);
            color: #475569;
            line-height: 1.65;
            text-align: justify;
            overflow-wrap: anywhere;
            position: relative;
            z-index: 2;
        }

        /* ============ FOOTER — MATCHED ============ */

        footer {
            min-height: 45px;
            width: 100%;
            flex-shrink: 0;
            margin-top: auto;
            background: linear-gradient(135deg, #0f2f68, #0756b5, #168cf0);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 15px;
            text-align: center;
            font-size: 11px;
            line-height: 1.5;
            box-shadow: 0 -5px 18px rgba(30, 64, 175, 0.12);
        }

        /* ============ RESPONSIVE ============ */

        @media (max-width: 1100px) {
            .navbar {
                gap: 10px;
                padding: 12px 16px;
            }

            .brand { gap: 8px; }
            .logo { width: 40px; height: 40px; }
            .brand-title { font-size: 14px; }
            .brand-subtitle { max-width: 160px; font-size: 9px; }

            .nav-links {
                flex: 1 1 auto;
                min-width: 0;
                flex-wrap: wrap;
                gap: 4px;
            }

            .nav-links a {
                min-height: 36px;
                padding: 8px 9px;
                font-size: 11px;
            }

            .nav-links a.logout { margin-left: 0; }
        }

        @media (max-width: 760px) {
            .navbar {
                align-items: flex-start;
                gap: 8px;
                padding: 12px 10px;
            }

            .brand { gap: 7px; }
            .logo { width: 36px; height: 36px; font-size: 10px; }
            .brand-title { font-size: 12px; }
            .brand-subtitle { max-width: 130px; font-size: 8px; line-height: 1.35; }

            .nav-links {
                flex: 1 1 auto;
                min-width: 0;
                flex-wrap: wrap;
                justify-content: flex-end;
                gap: 3px;
            }

            .nav-links a {
                min-height: 32px;
                padding: 7px 6px;
                font-size: 10px;
                white-space: normal;
                text-align: center;
            }

            .nav-links a.logout { margin-left: 0; }
        }

        @media (max-width: 480px) {
            html,
            body {
                overflow-y: auto;
            }

            .main-container {
                flex: 1 0 auto;
                overflow: visible;
                padding: 20px 14px;
            }

            .information {
                grid-template-columns: minmax(0, 1fr);
                gap: 14px;
            }

            .info-card {
                padding: 20px 18px;
                border-radius: 15px;
            }

            footer { font-size: 10px; }
        }

        @media (max-width: 380px) {
            .navbar { padding: 10px 7px; gap: 5px; }
            .brand { gap: 5px; }
            .logo { width: 30px; height: 30px; font-size: 9px; }
            .brand-title { font-size: 11px; }
            .brand-subtitle { max-width: 95px; font-size: 7px; }

            .nav-links { gap: 2px; }

            .nav-links a {
                min-height: 29px;
                padding: 6px 4px;
                font-size: 9px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { transition: none !important; }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="brand">
            <div class="logo">SIA</div>
            <div class="brand-text">
                <div class="brand-title">SIA</div>
                <div class="brand-subtitle">System Integration and Architecture</div>
            </div>
        </div>

        <div class="nav-links">
            <a href="/dashboard" class="active" aria-current="page">Home</a>
            <a href="/chat">Chat</a>
            <a href="/calendar">Calendar</a>
            <a href="/online-classes">Online Classes</a>
            <a href="/logout" class="logout">Logout</a>
        </div>
    </nav>

    <main class="main-container">
        <div class="circle-one" aria-hidden="true"></div>
        <div class="circle-two" aria-hidden="true"></div>

        <section class="hero">
            <h1>WELCOME TO SIA</h1>
            <h2>System Integration and Architecture</h2>
            <div class="hero-line" aria-hidden="true"></div>
            <p>
               Welcome to SIA. Manage your classes, communicate with students,
    view your teaching schedules, and access your online classrooms.
            </p>
        </section>

        <section class="information">
            <div class="info-card">
                <h2>Vision</h2>
                <p>
                    A leading local university known to develop excellent
                    and virtuous professionals who are catalysts of progress
                    for both the local and global communities.
                </p>
            </div>

            <div class="info-card">
                <h2>Mission</h2>
                <p>
                    University of Eastern Pangasinan is dedicated to producing
                    highly competent and morally responsible UEPians through
                    innovation, industry-focused education, sustainable research,
                    and valued-based curriculum. We commit to shaping ethical
                    trailblazers bringing our principle-centered culture defining
                    our values of Maka-Diyos, Marunong and Malinis.
                </p>
            </div>
        </section>
    </main>

    <footer>
        SIA &nbsp; | &nbsp; System Integration and Architecture
    </footer>

</body>
</html>