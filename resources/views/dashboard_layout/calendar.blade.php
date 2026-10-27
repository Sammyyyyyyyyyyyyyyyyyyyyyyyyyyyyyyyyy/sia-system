<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Calendar - SIA</title>

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
                radial-gradient(
                    circle at 10% 20%,
                    rgba(37, 99, 235, 0.18),
                    transparent 25%
                ),
                radial-gradient(
                    circle at 90% 80%,
                    rgba(14, 165, 233, 0.18),
                    transparent 25%
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
            z-index: 10;
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
            background:
                linear-gradient(
                    135deg,
                    #0f2f68,
                    #0756b5,
                    #168cf0
                );
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
            transition:
                background 0.2s ease,
                color 0.2s ease,
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
            border: 1px solid #168cf0;
        }

        .nav-links a.logout:hover {
            background: linear-gradient(135deg, #0756b5, #168cf0);
            color: white;
        }

        /* MAIN CONTENT */

        .main-content {
            flex: 1;
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 15px 30px;
            overflow: hidden;
            min-height: 0;
        }

        .content-wrapper {
            width: 96%;
            max-width: 1250px;
            height: 100%;
            display: flex;
            flex-direction: column;
            min-height: 0;
        }

        .page-header {
            text-align: center;
            flex-shrink: 0;
            margin-bottom: 10px;
        }

        .page-header h1 {
            font-size: 25px;
            color: #0f2f68;
            margin-bottom: 3px;
        }

        .page-header p {
            color: #52759c;
            font-size: 11px;
        }

        .blue-line {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #0f2f68, #168cf0);
            border-radius: 10px;
            margin: 6px auto 0;
        }

        /* CALENDAR */

        .calendar-card {
            flex: 1;
            min-height: 0;
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(12px);
            border-radius: 16px;
            padding: 15px;
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 12px 30px rgba(30, 64, 175, 0.14);
            display: flex;
            flex-direction: column;
        }

        .calendar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
            flex-shrink: 0;
        }

        .calendar-header h2 {
            font-size: 16px;
            color: #0f2f68;
        }

        .calendar-label {
            background: #e5f0ff;
            color: #0756b5;
            padding: 6px 11px;
            border-radius: 15px;
            font-size: 10px;
            font-weight: bold;
        }

        .calendar-grid {
            flex: 1;
            min-height: 0;
            display: grid;
            grid-template-columns: 75px repeat(6, minmax(0, 1fr));
            grid-template-rows: 38px repeat(4, minmax(0, 1fr));
            border-top: 1px solid #d6e4f5;
            border-left: 1px solid #d6e4f5;
            overflow: hidden;
            border-radius: 8px;
        }

        .calendar-cell {
            border-right: 1px solid #d6e4f5;
            border-bottom: 1px solid #d6e4f5;
            background: rgba(255, 255, 255, 0.7);
            min-width: 0;
            min-height: 0;
        }

        .day-header {
            background: linear-gradient(135deg, #0f2f68, #168cf0);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: bold;
            text-align: center;
        }

        .time-header {
            background: #0f2f68;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 9px;
            font-weight: bold;
        }

        .time-cell {
            background: #f4f8fd;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 5px;
            color: #45698f;
            font-size: 9px;
            font-weight: bold;
        }

        .schedule-cell {
            padding: 5px;
            background: rgba(255, 255, 255, 0.75);
        }

        .class-event {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #eaf3ff, #dbeafe);
            border-left: 4px solid #168cf0;
            border-radius: 7px;
            padding: 7px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow: hidden;
            transition: 0.2s;
        }

        .class-event:hover {
            background: linear-gradient(135deg, #dbeafe, #c7e1ff);
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(30, 64, 175, 0.12);
        }

        .subject-code {
            font-size: 9px;
            font-weight: bold;
            color: #0756b5;
            margin-bottom: 3px;
        }

        .subject-name {
            font-size: 10px;
            font-weight: bold;
            color: #12345b;
            line-height: 1.2;
            margin-bottom: 4px;
        }

        .class-info {
            font-size: 8px;
            color: #52759c;
            line-height: 1.3;
            overflow-wrap: anywhere;
        }

        .class-info strong {
            color: #315a82;
        }

        .empty-cell {
            background: rgba(255, 255, 255, 0.65);
        }

        /* FOOTER - SAME AS HOME */

        footer {
            min-height: 45px;
            width: 100%;
            flex-shrink: 0;
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

        /* SHORT VIEWPORTS: ADJUST CALENDAR CONTENT ONLY */

        @media (max-height: 750px) {
            .main-content {
                padding-top: 8px;
                padding-bottom: 8px;
            }

            .page-header {
                margin-bottom: 6px;
            }

            .page-header h1 {
                font-size: 22px;
            }

            .page-header p {
                font-size: 10px;
            }

            .calendar-card {
                padding: 11px;
            }

            .calendar-header {
                margin-bottom: 6px;
            }

            .calendar-grid {
                grid-template-rows: 32px repeat(4, minmax(0, 1fr));
            }

            .class-event {
                padding: 5px;
            }

            .subject-code {
                font-size: 8px;
            }

            .subject-name {
                font-size: 9px;
            }

            .class-info {
                font-size: 7px;
            }
        }

        /* TABLET AND NARROW VIEWPORTS */

        @media (max-width: 1100px) {
            .navbar {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
                gap: 10px;
                padding: 12px 16px;
            }

            .brand {
                flex: 0 1 auto;
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
                flex: 1 1 auto;
                min-width: 0;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: flex-end;
                align-items: center;
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
        }

        @media (max-width: 900px) {
            body {
                overflow: auto;
            }

            .main-content {
                overflow: visible;
            }

            .content-wrapper {
                height: auto;
            }

            .calendar-card {
                overflow-x: auto;
            }

            .calendar-grid {
                min-width: 850px;
                height: 500px;
                flex: none;
            }
        }

        /* TABLET AND NARROW NAVBAR - SAME AS HOME */

        @media (max-width: 760px) {
            .navbar {
                flex-direction: row;
                align-items: flex-start;
                justify-content: space-between;
                gap: 8px;
                padding: 12px 10px;
            }

            .brand {
                flex: 0 0 auto;
                width: auto;
                justify-content: flex-start;
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
                max-width: 130px;
                font-size: 8px;
                line-height: 1.35;
            }

            .nav-links {
                flex: 1 1 auto;
                min-width: 0;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: flex-end;
                align-items: center;
                gap: 3px;
            }

            .nav-links a {
                width: auto;
                min-height: 32px;
                padding: 7px 6px;
                font-size: 10px;
                white-space: normal;
                text-align: center;
            }

            .nav-links a.logout {
                margin-left: 0;
            }
        }

        /* VERY NARROW SCREENS - SAME AS HOME */

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
                max-width: 95px;
                font-size: 7px;
            }

            .nav-links {
                gap: 2px;
            }

            .nav-links a {
                min-height: 29px;
                padding: 6px 4px;
                font-size: 9px;
            }
        }

        /* MOBILE CALENDAR CONTENT */

        @media (max-width: 600px) {
            .main-content {
                padding: 15px;
            }

            .calendar-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 6px;
            }

            .calendar-grid {
                min-width: 800px;
            }
        }

        /* MOBILE FOOTER FONT - SAME AS HOME */

        @media (max-width: 480px) {
            footer {
                font-size: 10px;
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

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="brand">
            <div class="logo">SIA</div>

            <div class="brand-text">
                <div class="brand-title">SIA</div>
                <div class="brand-subtitle">
                    System Integration and Architecture
                </div>
            </div>
        </div>

        <div class="nav-links">
            <a href="/dashboard">Home</a>
            <a href="/chat">Chat</a>
            <a href="/calendar" class="active">Calendar</a>
            <a href="/online-classes">Online Classes</a>
            <a href="/logout" class="logout">Logout</a>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="main-content">
        <div class="content-wrapper">

            <div class="page-header">
                <h1>Online Class Calendar</h1>
                <p>
                    View your weekly online class schedule, time,
                    handle blocks, and classroom.
                </p>
                <div class="blue-line"></div>
            </div>

            <div class="calendar-card">
                <div class="calendar-header">
                    <h2>Weekly Class Schedule</h2>
                    <span class="calendar-label">
                        Current Academic Schedule
                    </span>
                </div>

                <div class="calendar-grid">

                    <!-- DAY HEADERS -->
                    <div class="calendar-cell time-header">TIME</div>
                    <div class="calendar-cell day-header">MONDAY</div>
                    <div class="calendar-cell day-header">TUESDAY</div>
                    <div class="calendar-cell day-header">WEDNESDAY</div>
                    <div class="calendar-cell day-header">THURSDAY</div>
                    <div class="calendar-cell day-header">FRIDAY</div>
                    <div class="calendar-cell day-header">SATURDAY</div>

                    <!-- 8:00 AM - 10:00 AM -->
                    <div class="calendar-cell time-cell">
                        8:00 AM<br>10:00 AM
                    </div>

                    <div class="calendar-cell schedule-cell">
                        <div class="class-event">
                            <div class="subject-code">SIA 101</div>
                            <div class="subject-name">System Integration</div>
                            <div class="class-info">
                                <strong>Instructor:</strong>
                                Prof. Samuel Camorongan
                                <br>
                                <strong>Block:</strong> 3-A
                            </div>
                        </div>
                    </div>

                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>

                    <div class="calendar-cell schedule-cell">
                        <div class="class-event">
                            <div class="subject-code">SIA 101</div>
                            <div class="subject-name">System Integration</div>
                            <div class="class-info">
                                <strong>Instructor:</strong>
                                Prof. Samuel Camorongan
                                <br>
                                <strong>Block:</strong> 3-D
                            </div>
                        </div>
                    </div>

                    <div class="calendar-cell schedule-cell">
                        <div class="class-event">
                            <div class="subject-code">SIA 101</div>
                            <div class="subject-name">System Integration</div>
                            <div class="class-info">
                                <strong>Instructor:</strong>
                                Prof. Samuel Camorongan
                                <br>
                                <strong>Block:</strong> 3-E
                            </div>
                        </div>
                    </div>

                    <div class="calendar-cell empty-cell"></div>

                    <!-- 10:00 AM - 12:00 PM -->
                    <div class="calendar-cell time-cell">
                        10:00 AM<br>12:00 PM
                    </div>

                    <div class="calendar-cell empty-cell"></div>

                    <div class="calendar-cell schedule-cell">
                        <div class="class-event">
                            <div class="subject-code">SIA 101</div>
                            <div class="subject-name">System Integration</div>
                            <div class="class-info">
                                <strong>Instructor:</strong>
                                Prof. Samuel Camorongan
                                <br>
                                <strong>Block:</strong> 3-B
                            </div>
                        </div>
                    </div>

                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>

                    <!-- 12:00 PM - 1:00 PM -->
                    <div class="calendar-cell time-cell">
                        12:00 PM<br>1:00 PM
                    </div>

                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>

                    <!-- 1:00 PM - 3:00 PM -->
                    <div class="calendar-cell time-cell">
                        1:00 PM<br>3:00 PM
                    </div>

                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>

                    <div class="calendar-cell schedule-cell">
                        <div class="class-event">
                            <div class="subject-code">SIA 101</div>
                            <div class="subject-name">System Integration</div>
                            <div class="class-info">
                                <strong>Instructor:</strong>
                                Prof. Samuel Camorongan
                                <br>
                                <strong>Block:</strong> 3-C
                            </div>
                        </div>
                    </div>

                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>

                    <!-- 3:00 PM - 5:00 PM -->
                    <div class="calendar-cell time-cell">
                        3:00 PM<br>5:00 PM
                    </div>

                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>

                    <div class="calendar-cell schedule-cell">
                        <div class="class-event">
                            <div class="subject-code">SIA 101</div>
                            <div class="subject-name">System Integration</div>
                            <div class="class-info">
                                <strong>Instructor:</strong>
                                Prof. Samuel Camorongan
                                <br>
                                <strong>Block:</strong> 3-L
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer>
        SIA &nbsp; | &nbsp; System Integration and Architecture
    </footer>

</body>
</html>