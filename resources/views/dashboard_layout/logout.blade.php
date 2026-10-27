
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
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
            color: #12345b;
            background:
                radial-gradient(circle at 10% 20%, rgba(37, 99, 235, 0.18), transparent 25%),
                radial-gradient(circle at 90% 80%, rgba(14, 165, 233, 0.18), transparent 25%),
                linear-gradient(135deg, #dbeafe, #eff6ff, #bfdbfe);
        }

        /* NAVBAR */
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
            z-index: 1000;
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
            transition: background 0.2s ease, color 0.2s ease,
                        box-shadow 0.2s ease;
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
            background: white;
            border: 1px solid #168cf0;
            box-shadow: none;
        }

        .nav-links a.logout.active {
            background: white;
            color: #0756b5;
            box-shadow: none;
        }

        .nav-links a.logout:hover {
            background: linear-gradient(135deg, #0756b5, #168cf0);
            color: white;
        }

        /* HAMBURGER BUTTON */
        .menu-toggle {
            display: none;
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 5px;
            border: 1px solid #dbeafe;
            border-radius: 10px;
            background: white;
            cursor: pointer;
        }

        .menu-toggle span {
            display: block;
            width: 21px;
            height: 2.5px;
            border-radius: 5px;
            background: #0756b5;
        }

        .nav-close {
            display: none;
        }

        /* MAIN CONTENT */
        .main-content {
            flex: 1;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            min-height: 0;
        }

        .logout-card {
            width: 430px;
            max-width: 100%;
            background: rgba(255, 255, 255, 0.92);
            border-radius: 20px;
            padding: 40px 35px;
            text-align: center;
            border: 1px solid rgba(7, 86, 181, 0.15);
            box-shadow: 0 15px 35px rgba(7, 86, 181, 0.18);
            backdrop-filter: blur(10px);
        }

        .logout-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0f2f68, #0756b5, #168cf0);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: bold;
            box-shadow: 0 8px 18px rgba(7, 86, 181, 0.25);
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
            margin-bottom: 22px;
        }

        /* CONFIRMATION BUTTONS */
        .confirmation-buttons {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .confirmation-buttons button {
            min-height: 42px;
            padding: 11px 20px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .cancel-btn {
            background: #e2e8f0;
            color: #334155;
            border: 1px solid #cbd5e1;
        }

        .cancel-btn:hover {
            background: #cbd5e1;
        }

        .confirm-btn {
            background: linear-gradient(135deg, #0756b5, #168cf0);
            color: white;
            border: 1px solid transparent;
        }

        .confirm-btn:hover {
            background: linear-gradient(135deg, #0f2f68, #0756b5);
            transform: translateY(-1px);
        }

        .confirmation-buttons button:focus-visible,
        .menu-toggle:focus-visible,
        .nav-close:focus-visible {
            outline: 3px solid #38bdf8;
            outline-offset: 3px;
        }

        /* LOADING SCREEN */
        #loadingScreen {
            display: none;
        }

        .loading {
            width: 28px;
            height: 28px;
            margin: 22px auto 0;
            border: 3px solid #dbeafe;
            border-top-color: #0756b5;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* FOOTER */
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

        /* TABLET */
        @media (max-width: 1100px) and (min-width: 761px) {
            .navbar {
                padding: 12px 16px;
                gap: 10px;
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
        }

        /* MOBILE NAVBAR AND DRAWER */
        @media (max-width: 760px) {
            .navbar {
                min-height: 66px;
                padding: 10px 14px;
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
                gap: 10px;
            }

            .brand {
                gap: 8px;
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
                max-width: 145px;
                font-size: 8px;
                line-height: 1.35;
            }

            .menu-toggle {
                display: flex;
                border: none;
                border-radius: 11px;
                background: linear-gradient(135deg, #0756b5, #168cf0);
                box-shadow: 0 5px 14px rgba(7, 86, 181, 0.28);
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .menu-toggle:hover {
                transform: translateY(-1px);
                box-shadow: 0 7px 17px rgba(7, 86, 181, 0.32);
            }

            .menu-toggle span {
                width: 19px;
                height: 2px;
                background: #ffffff;
                transition: transform 0.25s ease, opacity 0.2s ease;
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

            /* UPDATED DRAWER COLORS TO MATCH HOME */
            .nav-links {
                position: fixed;
                top: 0;
                right: 0;
                width: min(260px, 78vw);
                height: 100vh;
                height: 100dvh;
                padding: 22px 16px;
                padding-top: max(22px, env(safe-area-inset-top));
                background: rgba(255, 255, 255, 0.98);
                border-left: 1px solid rgba(22, 140, 240, 0.22);
                box-shadow: -12px 0 32px rgba(15, 47, 104, 0.20);
                display: flex;
                flex-direction: column;
                align-items: stretch;
                justify-content: flex-start;
                gap: 7px;
                overflow-y: auto;
                z-index: 1100;
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
                position: static;
                display: flex;
                align-self: flex-end;
                align-items: center;
                justify-content: center;
                width: 36px;
                height: 36px;
                flex-shrink: 0;
                margin-bottom: 12px;
                border: 0;
                border-radius: 9px;
                background: #eaf3ff;
                color: #0756b5;
                font-size: 25px;
                line-height: 1;
                cursor: pointer;
            }

            .nav-links a,
            .nav-links a.logout,
            .nav-links a.logout.active {
                width: 100%;
                min-height: 44px;
                display: flex;
                align-items: center;
                justify-content: flex-start;
                padding: 12px 14px;
                margin-left: 0;
                border-radius: 9px;
                font-size: 13px;
                white-space: normal;
                text-align: left;
            }

            .nav-links a.active {
                background: linear-gradient(135deg, #0756b5, #168cf0);
                color: white;
            }

            .nav-links a.logout.active {
                background: white;
                color: #0756b5;
                border: 1px solid #168cf0;
                box-shadow: none;
            }

            .main-content {
                padding: 24px 15px;
            }

            .logout-card {
                padding: 30px 20px;
            }
        }

        /* VERY NARROW SCREENS */
        @media (max-width: 380px) {
            .navbar {
                padding: 10px 9px;
                gap: 5px;
            }

            .brand {
                gap: 6px;
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
                max-width: 115px;
                font-size: 7px;
            }

            .menu-toggle {
                width: 38px;
                height: 38px;
            }

            .logout-card {
                padding: 26px 16px;
            }
        }

        @media (max-width: 480px) {
            .logout-card h1 {
                font-size: 22px;
            }

            .logout-card p {
                font-size: 12px;
            }

            .confirmation-buttons {
                gap: 8px;
            }

            .confirmation-buttons button {
                padding: 10px 14px;
            }

            footer {
                font-size: 10px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar" aria-label="Main navigation">
        <div class="brand">
            <div class="logo" aria-label="SIA logo">SIA</div>

            <div class="brand-text">
                <div class="brand-title">SIA</div>
                <div class="brand-subtitle">
                    System Integration and Architecture
                </div>
            </div>
        </div>

        <button
            class="menu-toggle"
            id="menuToggle"
            type="button"
            aria-label="Open navigation menu"
            aria-controls="navLinks"
            aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div class="nav-links" id="navLinks">
            <button
                class="nav-close"
                id="navClose"
                type="button"
                aria-label="Close navigation menu">
                &times;
            </button>

            <a href="/dashboard">Home</a>
            <a href="/chat">Chat</a>
            <a href="/calendar">Calendar</a>
            <a href="/online-classes">Online Classes</a>
            <a href="/logout" class="logout active" aria-current="page">
                Logout
            </a>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="main-content">

        <section
            class="logout-card"
            id="confirmationScreen"
            aria-labelledby="confirmationTitle">

            <div class="logout-icon" aria-hidden="true">?</div>

            <h1 id="confirmationTitle">Confirm Logout</h1>

            <p>
                Are you sure you want to log out of your SIA Portal account?
            </p>

            <div class="confirmation-buttons">
                <button
                    type="button"
                    class="cancel-btn"
                    onclick="cancelLogout()">
                    Cancel
                </button>

                <button
                    type="button"
                    class="confirm-btn"
                    onclick="confirmLogout()">
                    Yes, Logout
                </button>
            </div>
        </section>

        <section
            class="logout-card"
            id="loadingScreen"
            aria-live="polite"
            aria-labelledby="loadingTitle">

            <div class="logout-icon" aria-hidden="true">✓</div>

            <h1 id="loadingTitle">Logging Out...</h1>

            <p>You are being redirected to the login screen.</p>

            <div class="loading" role="status" aria-label="Loading"></div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer>
        SIA &nbsp; | &nbsp; System Integration and Architecture
    </footer>

    <!-- EXISTING LARAVEL LOGOUT FORM -->
    <form id="logoutForm" action="/logout" method="POST" style="display: none;">
        @csrf
    </form>

    <script>
        // MOBILE NAVIGATION
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

        // LOGOUT ACTIONS
        function cancelLogout() {
            window.location.href = "/dashboard";
        }

        function confirmLogout() {
            const confirmationScreen =
                document.getElementById("confirmationScreen");

            const loadingScreen =
                document.getElementById("loadingScreen");

            const logoutForm = document.getElementById("logoutForm");
            const confirmButton = document.querySelector(".confirm-btn");

            if (confirmButton.disabled) return;

            confirmButton.disabled = true;
            confirmationScreen.style.display = "none";
            loadingScreen.style.display = "block";

            window.setTimeout(function () {
                logoutForm.submit();
            }, 1000);
        }
    </script>

</body>
</html>
