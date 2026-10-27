<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat - SIA</title>

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

        .main-content {
            flex: 1;
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 12px 30px;
            min-height: 0;
        }

        .content-wrapper {
            width: 94%;
            max-width: 1120px;
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
            color: #55708f;
            font-size: 11px;
        }

        .blue-line {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #0f2f68, #0756b5, #168cf0);
            border-radius: 10px;
            margin: 7px auto 0;
        }

        /* ============ CHAT CARD ============ */

        .chat-card {
            width: 100%;
            flex: 1;
            min-height: 0;
            background: rgba(255, 255, 255, 0.92);
            border-radius: 14px;
            padding: 16px 18px;
            box-shadow: 0 8px 22px rgba(7, 86, 181, 0.13);
            display: flex;
            gap: 16px;
            border: 1px solid rgba(7, 86, 181, 0.12);
            backdrop-filter: blur(8px);
        }

        .instructor-panel {
            width: 240px;
            flex-shrink: 0;
            border: 1px solid #dbe7f5;
            border-radius: 10px;
            overflow: hidden;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            min-height: 0;
        }

        .instructor-header {
            background: linear-gradient(135deg, #0f2f68, #0756b5, #168cf0);
            color: white;
            padding: 12px 15px;
            font-size: 13px;
            font-weight: bold;
            flex-shrink: 0;
        }

        .instructor-list {
            width: 100%;
            overflow-y: auto;
            flex: 1;
            min-height: 0;
        }

        .instructor {
            padding: 9px 15px;
            border-bottom: 1px solid #e5edf7;
            cursor: pointer;
            transition: 0.2s;
        }

        .instructor:last-child { border-bottom: none; }
        .instructor:hover { background: #eff6ff; }

        .instructor.active {
            background: #dbeafe;
            border-left: 4px solid #0756b5;
            padding-left: 11px;
        }

        .instructor-name {
            font-size: 12px;
            font-weight: bold;
            color: #12345b;
            margin-bottom: 2px;
        }

        .instructor-subject {
            font-size: 10px;
            color: #55708f;
        }

        .conversation {
            flex: 1;
            min-width: 0;
            min-height: 0;
            border: 1px solid #dbe7f5;
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            background: white;
        }

        .conversation-header {
            background: #ffffff;
            border-bottom: 1px solid #dbe7f5;
            padding: 12px 16px;
            flex-shrink: 0;
        }

        .conversation-name {
            font-size: 14px;
            font-weight: bold;
            color: #0f2f68;
            margin-bottom: 2px;
        }

        .conversation-subject {
            font-size: 10px;
            color: #55708f;
        }

        .messages {
            flex: 1;
            min-height: 0;
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            overflow-y: auto;
            background: #f8fbff;
        }

        .message {
            max-width: 68%;
            padding: 9px 12px;
            border-radius: 10px;
            font-size: 12px;
            line-height: 1.4;
        }

        .received {
            align-self: flex-start;
            background: #e5eef9;
            color: #12345b;
        }

        .sent {
            align-self: flex-end;
            background: linear-gradient(135deg, #0f2f68, #0756b5, #168cf0);
            color: white;
        }

        .message-name {
            font-size: 10px;
            font-weight: bold;
            margin-bottom: 3px;
        }

        .chat-input {
            min-height: 56px;
            padding: 10px 12px;
            border-top: 1px solid #dbe7f5;
            background: white;
            display: flex;
            align-items: center;
            gap: 8px;
            flex-shrink: 0;
        }

        .chat-input input {
            flex: 1;
            height: 36px;
            border: 1px solid #cbdced;
            border-radius: 7px;
            padding: 0 12px;
            font-size: 12px;
            outline: none;
        }

        .chat-input input:focus {
            border-color: #0756b5;
            box-shadow: 0 0 0 2px rgba(7, 86, 181, 0.08);
        }

        .chat-input button {
            height: 36px;
            padding: 0 18px;
            border: none;
            border-radius: 7px;
            background: linear-gradient(135deg, #0f2f68, #0756b5, #168cf0);
            color: white;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .chat-input button:hover {
            transform: translateY(-1px);
            box-shadow: 0 5px 12px rgba(7, 86, 181, 0.25);
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

            .main-content { padding: 10px 20px; }
            .content-wrapper { width: 100%; }
            .instructor-panel { width: 220px; }
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

            .main-content { padding: 12px 16px; }

            .chat-card {
                flex-direction: column;
                padding: 12px;
                gap: 12px;
            }

            .instructor-panel {
                width: 100%;
                max-height: 180px;
            }

            .conversation { min-height: 360px; }
        }

        @media (max-width: 480px) {
            html,
            body {
                overflow-y: auto;
            }

            .main-content {
                flex: 1 0 auto;
                padding: 16px 12px;
            }

            .chat-card {
                padding: 10px;
                gap: 10px;
                border-radius: 12px;
            }

            .instructor-panel { max-height: 160px; }
            .conversation { min-height: 340px; }

            .messages {
                padding: 12px;
                gap: 10px;
            }

            .message {
                font-size: 12px;
                max-width: 82%;
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
            <a href="/dashboard">Home</a>
            <a href="/chat" class="active">Chat</a>
            <a href="/calendar">Calendar</a>
            <a href="/online-classes">Online Classes</a>
            <a href="/logout" class="logout">Logout</a>
        </div>
    </nav>

    <main class="main-content">
        <div class="content-wrapper">

            <div class="page-header">
                <h1>Student Chat</h1>
                <p>Communicate with your SIA 101 blocks.</p>
                <div class="blue-line"></div>
            </div>

            <div class="chat-card">

                <div class="instructor-panel">
                    <div class="instructor-header">SIA 101 Blocks</div>

                    <div class="instructor-list">
                        <div class="instructor active">
                            <div class="instructor-name">Block 3-A</div>
                            <div class="instructor-subject">SIA 101</div>
                        </div>
                        <div class="instructor">
                            <div class="instructor-name">Block 3-B</div>
                            <div class="instructor-subject">SIA 101</div>
                        </div>
                        <div class="instructor">
                            <div class="instructor-name">Block 3-C</div>
                            <div class="instructor-subject">SIA 101</div>
                        </div>
                        <div class="instructor">
                            <div class="instructor-name">Block 3-D</div>
                            <div class="instructor-subject">SIA 101</div>
                        </div>
                        <div class="instructor">
                            <div class="instructor-name">Block 3-E</div>
                            <div class="instructor-subject">SIA 101</div>
                        </div>
                        <div class="instructor">
                            <div class="instructor-name">Block 3-L</div>
                            <div class="instructor-subject">SIA 101</div>
                        </div>
                    </div>
                </div>

                <div class="conversation">
                    <div class="conversation-header">
                        <div class="conversation-name">Block 3-A</div>
                        <div class="conversation-subject">
                            SIA 101 — System Integration and Architecture
                        </div>
                    </div>

                    <div class="messages">
                        <div class="message received">
                            <div class="message-name">Block 3-A</div>
                            Good day, Sir!
                        </div>
                        <div class="message sent">
                            <div class="message-name">You</div>
                            Good day.
                        </div>
                    </div>

                    <form class="chat-input" onsubmit="return false;">
                        <input type="text" placeholder="Type your message...">
                        <button type="submit">Send</button>
                    </form>
                </div>

            </div>

        </div>
    </main>

    <footer>
        SIA &nbsp; | &nbsp; System Integration and Architecture
    </footer>

</body>
</html>