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

        .logout {
            border: 1px solid #0756b5;
            color: #0756b5 !important;
        }

        .logout:hover {
            background: #0756b5 !important;
            color: white !important;
        }

        .main-content {
            flex: 1;
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 10px 30px 12px;
            overflow: hidden;
            min-height: 0;
        }

        .content-wrapper {
            width: 94%;
            max-width: 1120px;
            height: 100%;
            display: flex;
            flex-direction: column;
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
            color: #55708f;
            font-size: 11px;
        }

        .blue-line {
            width: 60px;
            height: 3px;
            background:
                linear-gradient(
                    90deg,
                    #0f2f68,
                    #0756b5,
                    #168cf0
                );
            border-radius: 10px;
            margin: 7px auto 0;
        }

        .classroom-grid {
            flex: 1;
            min-height: 0;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .classroom-card {
            background: rgba(255, 255, 255, 0.90);
            border-radius: 13px;
            padding: 17px;
            border: 1px solid rgba(7, 86, 181, 0.14);
            border-top: 5px solid #0756b5;
            box-shadow:
                0 6px 17px rgba(7, 86, 181, 0.12);
            display: flex;
            flex-direction: column;
            min-height: 0;
            transition: 0.2s;
            backdrop-filter: blur(8px);
        }

        .classroom-card:hover {
            transform: translateY(-3px);
            box-shadow:
                0 10px 22px rgba(7, 86, 181, 0.20);
            border-color: rgba(22, 140, 240, 0.35);
        }

        .subject-code {
            display: inline-block;
            width: fit-content;
            background:
                linear-gradient(
                    135deg,
                    #0f2f68,
                    #0756b5,
                    #168cf0
                );
            color: white;
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 10px;
            font-weight: bold;
            margin-bottom: 9px;
            box-shadow:
                0 4px 8px rgba(7, 86, 181, 0.18);
        }

        .classroom-card h2 {
            font-size: 15px;
            color: #12345b;
            line-height: 1.3;
            margin-bottom: 13px;
            min-height: 39px;
        }

        .classroom-info {
            border-top: 1px solid #dbe7f5;
            padding-top: 11px;
        }

        .classroom-info p {
            font-size: 10px;
            color: #55708f;
            line-height: 1.4;
            margin-bottom: 6px;
        }

        .classroom-info strong {
            color: #12345b;
        }

        .classroom-button {
            display: block;
            width: 100%;
            margin-top: auto;
            padding: 9px;
            background:
                linear-gradient(
                    135deg,
                    #0f2f68,
                    #0756b5,
                    #168cf0
                );
            color: white;
            text-decoration: none;
            text-align: center;
            border-radius: 7px;
            font-size: 10px;
            font-weight: bold;
            transition: 0.2s;
            box-shadow:
                0 5px 12px rgba(7, 86, 181, 0.20);
        }

        .classroom-button:hover {
            background:
                linear-gradient(
                    135deg,
                    #0756b5,
                    #168cf0
                );
            transform: translateY(-1px);
            box-shadow:
                0 7px 15px rgba(7, 86, 181, 0.28);
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
            box-shadow:
                0 -3px 12px rgba(7, 86, 181, 0.15);
        }

        @media (max-height: 780px) {

            .navbar {
                height: 62px;
            }

            .main-content {
                padding-top: 7px;
                padding-bottom: 8px;
            }

            .page-header {
                margin-bottom: 7px;
            }

            .page-header h1 {
                font-size: 22px;
            }

            .page-header p {
                font-size: 10px;
            }

            .blue-line {
                margin-top: 5px;
            }

            .classroom-grid {
                gap: 10px;
            }

            .classroom-card {
                padding: 13px;
                border-top-width: 4px;
            }

            .subject-code {
                padding: 4px 8px;
                margin-bottom: 6px;
            }

            .classroom-card h2 {
                font-size: 13px;
                margin-bottom: 8px;
            }

            .classroom-info {
                padding-top: 7px;
            }

            .classroom-info p {
                font-size: 9px;
                margin-bottom: 4px;
            }

            .classroom-button {
                padding: 7px;
                font-size: 9px;
            }

            footer {
                height: 42px;
            }
        }

        @media (max-width: 950px) {

            body {
                overflow: auto;
            }

            .main-content {
                overflow: visible;
            }

            .content-wrapper {
                height: auto;
            }

            .classroom-grid {
                grid-template-columns: repeat(2, 1fr);
                grid-template-rows: auto;
            }

            .classroom-card {
                min-height: 220px;
            }
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
                overflow: visible;
                padding: 15px;
            }

            .content-wrapper {
                width: 100%;
            }

            .classroom-grid {
                grid-template-columns: 1fr;
            }

            .classroom-card {
                min-height: 210px;
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
                    SIA
                </div>
                <div class="brand-subtitle">
                    System Integration and Architecture
                </div>
            </div>
        </div>

        <div class="nav-links">
            <a href="/dashboard">Home</a>
            <a href="/chat">Chat</a>
            <a href="/calendar">Calendar</a>
            <a href="/online-classes"class="active">Online Classes</a>
            <a href="/logout"class="logout">Logout</a>
        </div>
    </nav>

    <main class="main-content">
        <div class="content-wrapper">
            <div class="page-header">
                <h1>
                    Online Classes
                </h1>
                <p>
                    Access your SIA 101 online classrooms.
                </p>
                <div class="blue-line"></div>
            </div>

            <div class="classroom-grid">

                <div class="classroom-card">
                    <span class="subject-code">
                        SIA 101
                    </span>
                    <h2>
                        System Integration and Architecture
                    </h2>
                    <div class="classroom-info">
                        <p>
                            <strong>Block:</strong>
                            3-A
                        </p>
                        <p>
                            <strong>Classroom:</strong>
                            SIA 101 Online Classroom
                        </p>
                        <p>
                            <strong>Schedule:</strong>
                            Monday, 8:00 AM – 10:00 AM
                        </p>
                    </div>
                    <a href="#" class="classroom-button">
                        Enter Classroom
                    </a>
                </div>

                <div class="classroom-card">
                    <span class="subject-code">
                        SIA 101
                    </span>
                    <h2>
                        System Integration and Architecture
                    </h2>
                    <div class="classroom-info">
                        <p>
                            <strong>Block:</strong>
                            3-B
                        </p>
                        <p>
                            <strong>Classroom:</strong>
                            SIA 101 Online Classroom
                        </p>
                        <p>
                            <strong>Schedule:</strong>
                            Tuesday, 10:00 AM – 12:00 PM
                        </p>
                    </div>
                    <a href="#" class="classroom-button">
                        Enter Classroom
                    </a>
                </div>

                <div class="classroom-card">
                    <span class="subject-code">
                        SIA 101
                    </span>
                    <h2>
                        System Integration and Architecture
                    </h2>
                    <div class="classroom-info">
                        <p>
                            <strong>Block:</strong>
                            3-C
                        </p>
                        <p>
                            <strong>Classroom:</strong>
                            SIA 101 Online Classroom
                        </p>
                        <p>
                            <strong>Schedule:</strong>
                            Wednesday, 1:00 PM – 3:00 PM
                        </p>
                    </div>
                    <a href="#" class="classroom-button">
                        Enter Classroom
                    </a>
                </div>

                <div class="classroom-card">
                    <span class="subject-code">
                        SIA 101
                    </span>
                    <h2>
                        System Integration and Architecture
                    </h2>
                    <div class="classroom-info">
                        <p>
                            <strong>Block:</strong>
                            3-D
                        </p>
                        <p>
                            <strong>Classroom:</strong>
                            SIA 101 Online Classroom
                        </p>
                        <p>
                            <strong>Schedule:</strong>
                            Thursday, 8:00 AM – 10:00 AM
                        </p>
                    </div>
                    <a href="#" class="classroom-button">
                        Enter Classroom
                    </a>
                </div>

                <div class="classroom-card">
                    <span class="subject-code">
                        SIA 101
                    </span>
                    <h2>
                        System Integration and Architecture
                    </h2>
                    <div class="classroom-info">
                        <p>
                            <strong>Block:</strong>
                            3-E
                        </p>
                        <p>
                            <strong>Classroom:</strong>
                            SIA 101 Online Classroom
                        </p>
                        <p>
                            <strong>Schedule:</strong>
                            Friday, 8:00 AM – 10:00 AM
                        </p>
                    </div>
                    <a href="#" class="classroom-button">
                        Enter Classroom
                    </a>
                </div>

                <div class="classroom-card">
                    <span class="subject-code">
                        SIA 101
                    </span>
                    <h2>
                        System Integration and Architecture
                    </h2>
                    <div class="classroom-info">
                        <p>
                            <strong>Block:</strong>
                            3-L
                        </p>
                        <p>
                            <strong>Classroom:</strong>
                            SIA 101 Online Classroom
                        </p>
                        <p>
                            <strong>Schedule:</strong>
                            Saturday, 3:00 AM – 5:00 PM
                        </p>
                    </div>
                    <a href="#" class="classroom-button">
                        Enter Classroom
                    </a>
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