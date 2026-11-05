
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Classes - SIA</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        html, body {
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

        /* NAVBAR - SAME AS HOME */

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
            z-index: 20;
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

        /* HAMBURGER BUTTON - SAME AS HOME */

        .menu-toggle {
            display: none;
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 5px;
            padding: 8px;
            background: linear-gradient(135deg, #0756b5, #168cf0);
            border: none;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 0 5px 14px rgba(22, 140, 240, 0.22);
        }

        .menu-toggle span {
            display: block;
            width: 21px;
            height: 2px;
            border-radius: 2px;
            background: #fff;
            transition: transform 0.2s ease, opacity 0.2s ease;
        }

        .menu-toggle.open span:nth-child(1) {
            transform: translateY(7px) rotate(45deg);
        }

        .menu-toggle.open span:nth-child(2) {
            opacity: 0;
        }

        .menu-toggle.open span:nth-child(3) {
            transform: translateY(-7px) rotate(-45deg);
        }

        .menu-toggle:focus-visible {
            outline: 3px solid #123d7a;
            outline-offset: 3px;
        }

        .nav-close {
            display: none;
        }

        /* MAIN CONTENT */

        .main-content {
            flex: 1 0 auto;
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 20px 30px;
            min-height: 0;
        }

        .content-wrapper {
            width: 94%;
            max-width: 1120px;
            display: flex;
            flex-direction: column;
        }

        .page-header {
            text-align: center;
            flex-shrink: 0;
            margin-bottom: 18px;
        }

        .page-header h1 {
            font-size: 25px;
            color: #0f2f68;
            margin-bottom: 5px;
        }

        .page-header p {
            color: #55708f;
            font-size: 11px;
            line-height: 1.5;
        }

        .blue-line {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #0f2f68, #0756b5, #168cf0);
            border-radius: 10px;
            margin: 7px auto 0;
        }

        /* CLASSROOM GRID */

        .classroom-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
        }

        .classroom-card {
            background: rgba(255, 255, 255, 0.90);
            border-radius: 13px;
            padding: 17px;
            border: 1px solid rgba(7, 86, 181, 0.14);
            border-top: 5px solid #0756b5;
            box-shadow: 0 6px 17px rgba(7, 86, 181, 0.12);
            display: flex;
            flex-direction: column;
            min-width: 0;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            backdrop-filter: blur(8px);
        }

        .classroom-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 22px rgba(7, 86, 181, 0.20);
            border-color: rgba(22, 140, 240, 0.35);
        }

        .subject-code {
            display: inline-block;
            width: fit-content;
            background: linear-gradient(135deg, #0f2f68, #0756b5, #168cf0);
            color: white;
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 10px;
            font-weight: bold;
            margin-bottom: 9px;
            box-shadow: 0 4px 8px rgba(7, 86, 181, 0.18);
        }

        .classroom-card h2 {
            font-size: 15px;
            color: #12345b;
            line-height: 1.4;
            margin-bottom: 13px;
        }

        .classroom-info {
            border-top: 1px solid #dbe7f5;
            padding-top: 11px;
        }

        .classroom-info p {
            font-size: 10px;
            color: #55708f;
            line-height: 1.6;
            margin-bottom: 6px;
            overflow-wrap: anywhere;
        }

        .classroom-info strong {
            color: #12345b;
        }

        .classroom-button {
            display: block;
            width: 100%;
            margin-top: auto;
            padding: 10px;
            background: linear-gradient(135deg, #0f2f68, #0756b5, #168cf0);
            color: white;
            text-decoration: none;
            text-align: center;
            border-radius: 7px;
            font-size: 10px;
            font-weight: bold;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 5px 12px rgba(7, 86, 181, 0.20);
        }

        .classroom-button:hover {
            background: linear-gradient(135deg, #0756b5, #168cf0);
            transform: translateY(-1px);
            box-shadow: 0 7px 15px rgba(7, 86, 181, 0.28);
        }

        /* FOOTER - SAME AS HOME */

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

        /* TABLET / SMALL LAPTOP */

        @media (max-width: 1100px) {
            .navbar {
                gap: 10px;
                padding: 12px 16px;
            }

            .brand {
                gap: 8px;
            }

            .logo {
                width: 40px;
                height: 40px;
            }

            .brand-title {
                font-size: 14px;
            }

            .brand-subtitle {
                max-width: 160px;
                font-size: 9px;
            }

            .nav-links {
                gap: 4px;
            }

            .nav-links a {
                min-height: 36px;
                padding: 8px 9px;
                font-size: 11px;
            }

            .nav-links a.logout {
                margin-left: 0;
            }

            .main-content {
                padding: 18px 20px;
            }

            .content-wrapper {
                width: 100%;
            }

            .classroom-grid {
                gap: 12px;
            }

            .classroom-card {
                padding: 15px;
            }
        }

        /* MOBILE MENU - SAME RIGHT-SIDE DRAWER AS HOME */

        @media (max-width: 760px) {
            html,
            body {
                width: 100%;
                min-height: 100%;
                overflow-x: hidden;
            }

            .navbar {
                flex-wrap: nowrap;
                align-items: center;
                justify-content: space-between;
                gap: 10px;
                padding: 12px 10px;
            }

            .brand {
                flex: 1 1 auto;
                min-width: 0;
                gap: 7px;
            }

            .logo {
                width: 36px;
                height: 36px;
                font-size: 10px;
            }

            .brand-title {
                font-size: 12px;
            }

            .brand-subtitle {
                max-width: 190px;
                font-size: 8px;
                line-height: 1.35;
            }

            .menu-toggle {
                display: flex;
            }

            .nav-links {
                position: fixed;
                top: 0;
                right: 0;
                width: min(260px, 78vw);
                height: 100vh;
                height: 100dvh;
                display: flex;
                flex-direction: column;
                align-items: stretch;
                justify-content: flex-start;
                gap: 7px;
                padding: 22px 16px;
                padding-top: max(22px, env(safe-area-inset-top));
                background: rgba(255, 255, 255, 0.98);
                box-shadow: -12px 0 32px rgba(15, 47, 104, 0.20);
                border-left: 1px solid rgba(22, 140, 240, 0.22);
                z-index: 100;
                overflow-y: auto;
                transform: translateX(105%);
                visibility: hidden;
                pointer-events: none;
                transition: transform 0.25s ease, visibility 0.25s ease;
            }

            .nav-links.open {
                transform: translateX(0);
                visibility: visible;
                pointer-events: auto;
            }

            .nav-close {
                display: flex;
                align-self: flex-end;
                align-items: center;
                justify-content: center;
                width: 36px;
                height: 36px;
                margin-bottom: 12px;
                border: 0;
                border-radius: 9px;
                background: #eaf3ff;
                color: #0756b5;
                font-size: 25px;
                line-height: 1;
                cursor: pointer;
            }

            .nav-links a {
                width: 100%;
                min-height: 44px;
                justify-content: flex-start;
                padding: 12px 14px;
                font-size: 13px;
                white-space: normal;
                text-align: left;
            }

            .nav-links a.logout {
                margin-left: 0;
            }

            .main-content {
                padding: 18px 14px;
            }

            .content-wrapper {
                width: 100%;
            }

            .page-header {
                margin-bottom: 16px;
            }

            .page-header h1 {
                font-size: 22px;
            }

            .page-header p {
                font-size: 11px;
                line-height: 1.6;
            }

            .classroom-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px;
            }

            .classroom-card {
                padding: 14px;
            }

            .classroom-card h2 {
                font-size: 14px;
                margin-bottom: 10px;
            }

            .classroom-info p {
                font-size: 10px;
            }
        }

        /* SMALL PHONES */

        @media (max-width: 480px) {
            .main-content {
                padding: 20px 14px;
            }

            .page-header {
                margin-bottom: 18px;
            }

            .page-header h1 {
                font-size: 22px;
            }

            .page-header p {
                font-size: 11px;
            }

            .classroom-grid {
                grid-template-columns: minmax(0, 1fr);
                gap: 14px;
            }

            .classroom-card {
                padding: 18px;
                border-radius: 15px;
            }

            .subject-code {
                font-size: 10px;
            }

            .classroom-card h2 {
                font-size: 15px;
                margin-bottom: 12px;
            }

            .classroom-info {
                padding-top: 10px;
            }

            .classroom-info p {
                font-size: 12px;
                line-height: 1.65;
            }

            .classroom-button {
                margin-top: 12px;
                padding: 11px;
                font-size: 11px;
            }

            footer {
                font-size: 10px;
            }
        }

        @media (max-width: 380px) {
            .navbar {
                padding: 10px 7px;
                gap: 5px;
            }

            .brand {
                gap: 5px;
            }

            .logo {
                width: 30px;
                height: 30px;
                font-size: 9px;
            }

            .brand-title {
                font-size: 11px;
            }

            .brand-subtitle {
                max-width: 130px;
                font-size: 7px;
            }

            .menu-toggle {
                width: 38px;
                height: 38px;
            }

            .main-content {
                padding: 16px 10px;
            }

            .classroom-card {
                padding: 16px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                transition: none !important;
                animation: none !important;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="brand">
            <div class="logo">SIA</div>
            <div class="brand-text">
                <div class="brand-title">SIA</div>
                <div class="brand-subtitle">System Integration and Architecture</div>
            </div>
        </div>

        <button
            class="menu-toggle"
            id="menuToggle"
            type="button"
            aria-label="Open navigation menu"
            aria-expanded="false"
            aria-controls="navLinks"
        >
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div class="nav-links" id="navLinks">
            <button class="nav-close" id="navClose" type="button" aria-label="Close navigation menu">&times;</button>
            <a href="/dashboard">Home</a>
            <a href="/chat">Chat</a>
            <a href="/calendar">Calendar</a>
            <a href="/online-classes" class="active" aria-current="page">Online Classes</a>
            <a href="/logout" class="logout">Logout</a>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="main-content">
        <div class="content-wrapper">

            <div class="page-header">
                <h1>Online Classes</h1>
                <p>Access your SIA 101 online classrooms.</p>
                <div class="blue-line"></div>
            </div>

            <div class="classroom-grid">

                <div class="classroom-card">
                    <span class="subject-code">SIA 101</span>
                    <h2>System Integration and Architecture</h2>
                    <div class="classroom-info">
                        <p><strong>Block:</strong> 3-A</p>
                        <p><strong>Classroom:</strong> SIA 101 Online Classroom</p>
                        <p><strong>Schedule:</strong> Monday, 8:00 AM – 10:00 AM</p>
                    </div>
                    <a href="{{ route('sia.classroom', ['block' => '3-A']) }}" class="classroom-button">Enter Classroom</a>
                </div>

                <div class="classroom-card">
                    <span class="subject-code">SIA 101</span>
                    <h2>System Integration and Architecture</h2>
                    <div class="classroom-info">
                        <p><strong>Block:</strong> 3-B</p>
                        <p><strong>Classroom:</strong> SIA 101 Online Classroom</p>
                        <p><strong>Schedule:</strong> Tuesday, 10:00 AM – 12:00 PM</p>
                    </div>
                    <a href="{{ route('sia.classroom', ['block' => '3-B']) }}" class="classroom-button">Enter Classroom</a>
                </div>

                <div class="classroom-card">
                    <span class="subject-code">SIA 101</span>
                    <h2>System Integration and Architecture</h2>
                    <div class="classroom-info">
                        <p><strong>Block:</strong> 3-C</p>
                        <p><strong>Classroom:</strong> SIA 101 Online Classroom</p>
                        <p><strong>Schedule:</strong> Wednesday, 1:00 PM – 3:00 PM</p>
                    </div>
                    <a href="{{ route('sia.classroom', ['block' => '3-C']) }}" class="classroom-button">Enter Classroom</a>
                </div>

                <div class="classroom-card">
                    <span class="subject-code">SIA 101</span>
                    <h2>System Integration and Architecture</h2>
                    <div class="classroom-info">
                        <p><strong>Block:</strong> 3-D</p>
                        <p><strong>Classroom:</strong> SIA 101 Online Classroom</p>
                        <p><strong>Schedule:</strong> Thursday, 8:00 AM – 10:00 AM</p>
                    </div>
                    <a href="{{ route('sia.classroom', ['block' => '3-D']) }}" class="classroom-button">Enter Classroom</a>
                </div>

                <div class="classroom-card">
                    <span class="subject-code">SIA 101</span>
                    <h2>System Integration and Architecture</h2>
                    <div class="classroom-info">
                        <p><strong>Block:</strong> 3-E</p>
                        <p><strong>Classroom:</strong> SIA 101 Online Classroom</p>
                        <p><strong>Schedule:</strong> Friday, 8:00 AM – 10:00 AM</p>
                    </div>
                    <a href="{{ route('sia.classroom', ['block' => '3-E']) }}" class="classroom-button">Enter Classroom</a>
                </div>

                <div class="classroom-card">
                    <span class="subject-code">SIA 101</span>
                    <h2>System Integration and Architecture</h2>
                    <div class="classroom-info">
                        <p><strong>Block:</strong> 3-L</p>
                        <p><strong>Classroom:</strong> SIA 101 Online Classroom</p>
                        <p><strong>Schedule:</strong> Saturday, 3:00 PM – 5:00 PM</p>
                    </div>
                    <a href="{{ route('sia.classroom', ['block' => '3-L']) }}" class="classroom-button">Enter Classroom</a>
                </div>

            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer>
        SIA &nbsp; | &nbsp; System Integration and Architecture
    </footer>

    <!-- NAVBAR SCRIPT - SAME AS HOME -->
    <script>
        const menuToggle = document.getElementById("menuToggle");
        const navLinks = document.getElementById("navLinks");
        const navClose = document.getElementById("navClose");

        function setMenuOpen(isOpen) {
            navLinks.classList.toggle("open", isOpen);
            menuToggle.classList.toggle("open", isOpen);

            menuToggle.setAttribute("aria-expanded", String(isOpen));
            menuToggle.setAttribute(
                "aria-label",
                isOpen ? "Close navigation menu" : "Open navigation menu"
            );
        }

        menuToggle.addEventListener("click", function () {
            setMenuOpen(!navLinks.classList.contains("open"));
        });

        navClose.addEventListener("click", function () {
            setMenuOpen(false);
            menuToggle.focus();
        });

        navLinks.querySelectorAll("a").forEach(function (link) {
            link.addEventListener("click", function () {
                setMenuOpen(false);
            });
        });

        document.addEventListener("keydown", function (event) {
            if (event.key === "Escape") {
                setMenuOpen(false);
            }
        });

        window.addEventListener("resize", function () {
            if (window.innerWidth > 760) {
                setMenuOpen(false);
            }
        });
    </script>

</body>
</html>
