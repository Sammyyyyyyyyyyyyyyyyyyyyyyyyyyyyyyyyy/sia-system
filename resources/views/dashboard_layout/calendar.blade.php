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
                    rgba(59, 130, 246, 0.25),
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
            height: 72px;
            flex-shrink: 0;
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(15px);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px 45px;
            border-bottom: 1px solid rgba(37, 99, 235, 0.15);
            box-shadow:
                0 5px 25px rgba(30, 64, 175, 0.12);
            position: relative;
            z-index: 10;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo {
            width: 45px;
            height: 45px;
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
            font-size: 16px;
            font-weight: 800;
            box-shadow:
                0 6px 15px rgba(7, 86, 181, 0.3);
        }

        .brand-title {
            font-size: 16px;
            font-weight: 800;
            color: #0f2f68;
            letter-spacing: 0.4px;
        }

        .brand-subtitle {
            font-size: 10px;
            color: #4773a5;
            margin-top: 2px;
        }


        .nav-links {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .nav-links a {
            text-decoration: none;
            color: #214d7d;
            font-size: 12px;
            font-weight: 600;
            padding: 9px 13px;
            border-radius: 9px;
            white-space: nowrap;
            transition: 0.2s ease;
        }

        .nav-links a:hover {
            background: #e5f0ff;
            color: #0756b5;
        }

        .nav-links .active {
            background:
                linear-gradient(
                    135deg,
                    #0f2f68,
                    #168cf0
                );
            color: white;
            box-shadow:
                0 5px 14px rgba(7, 86, 181, 0.25);
        }

        .logout {
            border: 1px solid #168cf0;
            color: #0756b5 !important;
        }

        .logout:hover {
            background:
                linear-gradient(
                    135deg,
                    #0f2f68,
                    #168cf0
                ) !important;
            color: white !important;
        }

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
            background:
                linear-gradient(
                    90deg,
                    #0f2f68,
                    #168cf0
                );

            border-radius: 10px;
            margin: 6px auto 0;
        }

        .calendar-card {
            flex: 1;
            min-height: 0;
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(12px);
            border-radius: 16px;
            padding: 15px;
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow:
                0 12px 30px rgba(30, 64, 175, 0.14);
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
            grid-template-columns: 75px repeat(6, 1fr);
            grid-template-rows:
                38px
                repeat(4, 1fr);
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
            background:
                linear-gradient(
                    135deg,
                    #0f2f68,
                    #168cf0
                );
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
            background:
                linear-gradient(
                    135deg,
                    #eaf3ff,
                    #dbeafe
                );
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
            background:
                linear-gradient(
                    135deg,
                    #dbeafe,
                    #c7e1ff
                );
            transform: translateY(-1px);
            box-shadow:
                0 4px 10px rgba(30, 64, 175, 0.12);
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
        }

        .class-info strong {
            color: #315a82;
        }

        .empty-cell {
            background: rgba(255, 255, 255, 0.65);
        }

        footer {
            width: 100%;
            height: 45px;
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
            font-size: 10px;
        }

        @media (max-height: 750px) {

            .navbar {
                height: 64px;
            }

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
                grid-template-rows:
                    32px
                    repeat(4, 1fr);
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

            footer {
                height: 40px;
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
            }
        }

        @media (max-width: 600px) {

            .navbar {
                height: auto;
                flex-direction: column;
                gap: 8px;
                padding: 10px 15px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }

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
    </style>
</head>

<body>

    <nav class="navbar">

        <div class="brand">
            <div class="logo">
                SIA
            </div>

            <div>
                <div class="brand-title">
                    SIA
                </div>

                <div class="brand-subtitle">
                    System Integration and Architecture
                </div>
            </div>
        </div>

        <div class="nav-links">

            <a href="/dashboard"> Home</a>
            <a href="/chat"> Chat</a>
            <a href="/calendar"  class="active"> Calendar</a>
            <a href="/online-classes"> Online Classes</a>
            <a href="/logout" class="logout"> Logout</a>

        </div>
    </nav>

    <main class="main-content">
        <div class="content-wrapper">
            <div class="page-header">
                <h1>
                    Online Class Calendar
                </h1>
                <p>
                    View your weekly online class schedule, time,
                    instructor, and classroom.
                </p>
                <div class="blue-line"></div>
            </div>

            <div class="calendar-card">
                <div class="calendar-header">
                    <h2>
                        Weekly Class Schedule
                    </h2>
                    <span class="calendar-label">
                        Current Academic Schedule
                    </span>
                </div>

                <div class="calendar-grid">
                    <div class="calendar-cell time-header">
                        TIME
                    </div>
                    <div class="calendar-cell day-header">
                        MONDAY
                    </div>
                    <div class="calendar-cell day-header">
                        TUESDAY
                    </div>
                    <div class="calendar-cell day-header">
                        WEDNESDAY
                    </div>
                    <div class="calendar-cell day-header">
                        THURSDAY
                    </div>
                    <div class="calendar-cell day-header">
                        FRIDAY
                    </div>
                    <div class="calendar-cell day-header">
                        SATURDAY
                    </div>
                    <div class="calendar-cell time-cell">
                        8:00 AM<br>
                        10:00 AM
                    </div>

                    <div class="calendar-cell schedule-cell">
                        <div class="class-event">
                            <div class="subject-code">
                                SIA 101
                            </div>
                            <div class="subject-name">
                                System Integration
                            </div>
                            <div class="class-info">
                                <strong>Instructor:</strong>
                                Prof. Samuel Camorongan
                                <br>
                                <strong>Block:</strong>
                                3-A
                            </div>
                        </div>
                    </div>

                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>

                    <div class="calendar-cell schedule-cell">
                        <div class="class-event">
                            <div class="subject-code">
                                SIA 101
                            </div>
                            <div class="subject-name">
                                System Integration
                            </div>
                            <div class="class-info">
                                <strong>Instructor:</strong>
                                Prof. Samuel Camorongan
                                <br>
                                <strong>Block:</strong>
                                3-B
                            </div>
                        </div>
                    </div>

                    <div class="calendar-cell schedule-cell">
                        <div class="class-event">
                            <div class="subject-code">
                                SIA 101
                            </div>
                            <div class="subject-name">
                                System Integration
                            </div>
                            <div class="class-info">
                                <strong>Instructor:</strong>
                                Prof. Samuel Camorongan
                                <br>
                                <strong>Block:</strong>
                                3-C
                            </div>
                        </div>
                    </div>

                    <div class="calendar-cell empty-cell"></div>

                    <div class="calendar-cell time-cell">
                        10:00 AM<br>
                        12:00 PM
                    </div>

                    <div class="calendar-cell empty-cell"></div>

                    <div class="calendar-cell schedule-cell">
                        <div class="class-event">
                            <div class="subject-code">
                                SIA 101
                            </div>
                            <div class="subject-name">
                                System Integration
                            </div>
                            <div class="class-info">
                                <strong>Instructor:</strong>
                                Prof. Samuel Camorongan
                                <br>
                                <strong>Block:</strong>
                                3-D
                                <
                            </div>
                        </div>
                    </div>

                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>

                    <div class="calendar-cell time-cell">
                        12:00 PM<br>
                        1:00 PM
                    </div>

                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>

                    <div class="calendar-cell time-cell">
                        1:00 PM<br>
                        3:00 PM
                    </div>

                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>

                    <div class="calendar-cell schedule-cell">
                        <div class="class-event">
                            <div class="subject-code">
                                SIA 101
                            </div>
                            <div class="subject-name">
                                System Integration
                            </div>
                            <div class="class-info">
                                <strong>Instructor:</strong>
                                Prof. Samuel Camorongan
                                <br>
                                <strong>Block:</strong>
                                3-E
                            </div>
                        </div>
                    </div>

                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>

                    <div class="calendar-cell time-cell">
                        3:00 PM<br>
                        5:00 PM
                    </div>

                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>
                    <div class="calendar-cell empty-cell"></div>

                    <div class="calendar-cell schedule-cell">
                        <div class="class-event">
                            <div class="subject-code">
                                SIA 101
                            </div>
                            <div class="subject-name">
                                SIA 101
                            </div>
                            <div class="class-info">
                                <strong>Instructor:</strong>
                                Prof. Samuel Camorongan
                                <br>
                                <strong>Block:</strong>
                                3-L
                            </div>
                        </div>
                    </div>
                </div>
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