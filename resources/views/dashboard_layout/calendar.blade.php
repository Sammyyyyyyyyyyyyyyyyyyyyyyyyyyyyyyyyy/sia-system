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

        /* HAMBURGER */

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
            background: #ffffff;
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

        /* MAIN CONTENT - SCROLL FIX */

        .main-content {
            flex: 1 0 auto;
            width: 100%;
            min-height: 0;
            display: flex;
            justify-content: center;
            padding: 15px 30px;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .content-wrapper {
            width: 96%;
            max-width: 1250px;
            height: auto;
            min-height: 100%;
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

        /* WEEKLY CALENDAR CARD */

        .calendar-card {
            flex: 0 0 440px;
            min-height: 400px;
            min-width: 0;
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
            gap: 10px;
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

        .calendar-scroll {
            flex: 1 1 auto;
            min-height: 0;
            min-width: 0;
            overflow: auto;
            border-radius: 8px;
            scrollbar-width: thin;
            scrollbar-color: #9bbde8 #eaf3ff;
            -webkit-overflow-scrolling: touch;
        }

        .calendar-grid {
            width: 100%;
            height: 100%;
            min-height: 350px;
            display: grid;
            grid-template-columns: 75px repeat(6, minmax(0, 1fr));
            grid-template-rows: 38px repeat(5, minmax(0, 1fr));
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

        /* EVENT MANAGEMENT CARD */

        .event-management-card {
            width: 100%;
            flex: 0 0 auto;
            margin-top: 18px;
            padding: 22px;
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 16px;
            box-shadow: 0 12px 30px rgba(30, 64, 175, 0.12);
        }

        .event-section-header {
            margin-bottom: 18px;
        }

        .event-section-header h2 {
            color: #0f2f68;
            font-size: 20px;
            margin-bottom: 6px;
        }

        .event-section-header p {
            color: #64748b;
            font-size: 12px;
            line-height: 1.5;
        }

        .event-message {
            padding: 12px 15px;
            margin-bottom: 15px;
            border-radius: 9px;
            font-size: 13px;
            line-height: 1.5;
        }

        .event-message.success {
            background: #dcfce7;
            border: 1px solid #86efac;
            color: #166534;
        }

        .event-message.error {
            background: #fee2e2;
            border: 1px solid #fca5a5;
            color: #991b1b;
        }

        .event-message ul {
            padding-left: 20px;
        }

        .event-form {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
            min-width: 0;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-group label {
            color: #315a82;
            font-size: 12px;
            font-weight: 700;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            min-height: 42px;
            padding: 11px 12px;
            border: 1px solid #cbdced;
            border-radius: 8px;
            background: #ffffff;
            color: #12345b;
            font-size: 13px;
            outline: none;
            transition: border 0.2s ease, box-shadow 0.2s ease;
        }

        .form-group textarea {
            min-height: 90px;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #168cf0;
            box-shadow: 0 0 0 3px rgba(22, 140, 240, 0.12);
        }

        .field-error {
            color: #dc2626;
            font-size: 11px;
        }

        .event-submit-button {
            min-height: 43px;
            padding: 11px 20px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(135deg, #0756b5, #168cf0);
            color: #ffffff;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 5px 14px rgba(22, 140, 240, 0.2);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .event-submit-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 7px 17px rgba(22, 140, 240, 0.28);
        }

        .events-list-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin: 25px 0 12px;
            padding-bottom: 10px;
            border-bottom: 1px solid #dbeafe;
        }

        .events-list-heading h3 {
            color: #0f2f68;
            font-size: 16px;
        }

        .event-count {
            background: #e5f0ff;
            color: #0756b5;
            border-radius: 20px;
            padding: 5px 10px;
            font-size: 11px;
            font-weight: bold;
        }

        .empty-events {
            padding: 25px 15px;
            text-align: center;
            background: #f4f8fd;
            border: 1px dashed #b8cde5;
            border-radius: 10px;
            color: #64748b;
            font-size: 13px;
            line-height: 1.6;
        }

        .event-item {
            padding: 16px;
            margin-bottom: 12px;
            background: #f8fbff;
            border: 1px solid #dbeafe;
            border-left: 4px solid #168cf0;
            border-radius: 10px;
        }

        .event-item:last-child {
            margin-bottom: 0;
        }

        .event-item-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
        }

        .event-item h4 {
            color: #123d7a;
            font-size: 15px;
            margin-bottom: 7px;
            overflow-wrap: anywhere;
        }

        .event-type-badge {
            display: inline-block;
            padding: 5px 9px;
            background: #e5f0ff;
            color: #0756b5;
            border-radius: 20px;
            font-size: 10px;
            font-weight: bold;
            white-space: nowrap;
        }

        .event-details {
            display: flex;
            flex-wrap: wrap;
            gap: 8px 18px;
            margin-top: 8px;
            color: #52759c;
            font-size: 12px;
        }

        .event-description {
            margin-top: 10px;
            color: #45698f;
            font-size: 12px;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .event-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 14px;
        }

        .edit-toggle-button,
        .delete-event-button {
            min-height: 34px;
            padding: 8px 13px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: bold;
            cursor: pointer;
        }

        .edit-toggle-button {
            background: #e5f0ff;
            color: #0756b5;
            border: 1px solid #bfdbfe;
        }

        .edit-toggle-button:hover {
            background: #dbeafe;
        }

        .delete-event-button {
            background: #fff1f2;
            color: #be123c;
            border: 1px solid #fecdd3;
        }

        .delete-event-button:hover {
            background: #ffe4e6;
        }

        .edit-event-panel {
            display: none;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #dbeafe;
        }

        .edit-event-panel.open {
            display: block;
        }

        .edit-event-form {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .edit-event-form .form-group textarea {
            min-height: 75px;
        }

        .edit-event-form .event-submit-button {
            align-self: end;
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
        }

        /* MOBILE */

        @media (max-width: 760px) {
            html,
            body {
                min-height: 100%;
                height: auto;
            }

            body {
                min-height: 100vh;
                min-height: 100dvh;
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
                max-width: 130px;
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
                padding: 10px;
                overflow-x: hidden;
                overflow-y: visible;
            }

            .content-wrapper {
                width: 100%;
                height: auto;
                min-height: 0;
            }

            .page-header {
                margin-bottom: 8px;
            }

            .page-header h1 {
                font-size: 21px;
            }

            .page-header p {
                font-size: 10px;
                line-height: 1.4;
            }

            .calendar-card {
                flex-basis: 420px;
                min-height: 380px;
                padding: 10px;
                overflow: hidden;
            }

            .calendar-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 6px;
            }

            .calendar-header h2 {
                font-size: 15px;
            }

            .calendar-label {
                font-size: 9px;
            }

            .calendar-grid {
                width: 850px;
                min-width: 850px;
                height: 100%;
                min-height: 350px;
                grid-template-columns: 75px repeat(6, minmax(0, 1fr));
                grid-template-rows: 35px repeat(5, minmax(0, 1fr));
            }

            .event-management-card {
                margin-top: 12px;
                padding: 16px;
            }

            .event-section-header h2 {
                font-size: 18px;
            }

            .event-form,
            .edit-event-form {
                grid-template-columns: 1fr;
            }

            .form-group.full-width {
                grid-column: auto;
            }

            .event-item-top {
                flex-direction: column;
                align-items: flex-start;
            }

            footer {
                min-height: 42px;
                padding: 8px 10px;
                font-size: 10px;
            }
        }

        /* VERY NARROW SCREENS */

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

            .menu-toggle {
                width: 38px;
                height: 38px;
            }

            .main-content {
                padding: 8px;
            }

            .page-header h1 {
                font-size: 19px;
            }

            .calendar-card {
                padding: 8px;
            }

            .event-management-card {
                padding: 12px;
            }

            footer {
                font-size: 9px;
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
            aria-expanded="false"
            aria-controls="navLinks"
        >
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div class="nav-links" id="navLinks">
            <button
                class="nav-close"
                id="navClose"
                type="button"
                aria-label="Close navigation menu"
            >&times;</button>

            <a href="/dashboard">Home</a>
            <a href="/chat">Chat</a>
            <a href="/calendar" class="active" aria-current="page">Calendar</a>
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

            <!-- WEEKLY CLASS SCHEDULE -->
            <div class="calendar-card">
                <div class="calendar-header">
                    <h2>Weekly Class Schedule</h2>
                    <span class="calendar-label">
                        Current Academic Schedule
                    </span>
                </div>

                <div class="calendar-scroll">
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

            <!-- EVENT MANAGEMENT -->
            <section class="event-management-card">

                <div class="event-section-header">
                    <h2>Event Management</h2>
                    <p>
                        Add and manage your personal academic events,
                        examinations, deadlines, meetings, and activities.
                    </p>
                </div>

                <!-- SUCCESS MESSAGE -->
                @if (session('success'))
                    <div class="event-message success" role="status">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- VALIDATION ERRORS -->
                @if ($errors->any())
                    <div class="event-message error" role="alert">
                        <strong>Please check the following:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- ADD EVENT FORM -->
                <form
                    action="{{ route('calendar.store') }}"
                    method="POST"
                    class="event-form"
                >
                    @csrf

                    <div class="form-group">
                        <label for="title">Event Title *</label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="{{ old('title') }}"
                            placeholder="Example: SIA Long Quiz"
                            maxlength="255"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="event_type">Event Type *</label>
                        <select id="event_type" name="event_type" required>
                            <option value="">Select event type</option>
                            <option value="Exam" {{ old('event_type') == 'Exam' ? 'selected' : '' }}>
                                Exam
                            </option>
                            <option value="Deadline" {{ old('event_type') == 'Deadline' ? 'selected' : '' }}>
                                Deadline
                            </option>
                            <option value="Meeting" {{ old('event_type') == 'Meeting' ? 'selected' : '' }}>
                                Meeting
                            </option>
                            <option value="Activity" {{ old('event_type') == 'Activity' ? 'selected' : '' }}>
                                Activity
                            </option>
                            <option value="Other" {{ old('event_type') == 'Other' ? 'selected' : '' }}>
                                Other
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="event_date">Event Date *</label>
                        <input
                            type="date"
                            id="event_date"
                            name="event_date"
                            value="{{ old('event_date') }}"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="event_time">Event Time</label>
                        <input
                            type="time"
                            id="event_time"
                            name="event_time"
                            value="{{ old('event_time') }}"
                        >
                    </div>

                    <div class="form-group full-width">
                        <label for="description">Description</label>
                        <textarea
                            id="description"
                            name="description"
                            maxlength="2000"
                            placeholder="Add additional information about this event..."
                        >{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group full-width">
                        <button type="submit" class="event-submit-button">
                            + Add Event
                        </button>
                    </div>
                </form>

                <!-- SAVED EVENTS -->
                <div class="events-list-heading">
                    <h3>Saved Events</h3>
                    <span class="event-count">
                        {{ $events->count() }} {{ $events->count() === 1 ? 'Event' : 'Events' }}
                    </span>
                </div>

                @forelse ($events as $event)

                    <article class="event-item">

                        <div class="event-item-top">
                            <div>
                                <h4>{{ $event->title }}</h4>
                                <span class="event-type-badge">
                                    {{ $event->event_type }}
                                </span>
                            </div>
                        </div>

                        <div class="event-details">
                            <span>
                                <strong>Date:</strong>
                                {{ $event->event_date->format('F d, Y') }}
                            </span>

                            <span>
                                <strong>Time:</strong>
                                {{ $event->event_time
                                    ? \Carbon\Carbon::parse($event->event_time)->format('h:i A')
                                    : 'Not specified' }}
                            </span>
                        </div>

                        @if ($event->description)
                            <div class="event-description">
                                {{ $event->description }}
                            </div>
                        @endif

                        <div class="event-actions">

                            <!-- EDIT BUTTON -->
                            <button
                                type="button"
                                class="edit-toggle-button"
                                onclick="toggleEditForm({{ $event->id }})"
                            >
                                Edit Event
                            </button>

                            <!-- DELETE FORM -->
                            <form
                                action="{{ route('calendar.destroy', $event->id) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this event?');"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="delete-event-button">
                                    Delete Event
                                </button>
                            </form>

                        </div>

                        <!-- EDIT EVENT FORM -->
                        <div
                            class="edit-event-panel"
                            id="edit-panel-{{ $event->id }}"
                        >
                            <form
                                action="{{ route('calendar.update', $event->id) }}"
                                method="POST"
                                class="edit-event-form"
                            >
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="edit-title-{{ $event->id }}">
                                        Event Title *
                                    </label>

                                    <input
                                        type="text"
                                        id="edit-title-{{ $event->id }}"
                                        name="title"
                                        value="{{ $event->title }}"
                                        maxlength="255"
                                        required
                                    >
                                </div>

                                <div class="form-group">
                                    <label for="edit-type-{{ $event->id }}">
                                        Event Type *
                                    </label>

                                    <select
                                        id="edit-type-{{ $event->id }}"
                                        name="event_type"
                                        required
                                    >
                                        <option value="Exam" {{ $event->event_type == 'Exam' ? 'selected' : '' }}>
                                            Exam
                                        </option>

                                        <option value="Deadline" {{ $event->event_type == 'Deadline' ? 'selected' : '' }}>
                                            Deadline
                                        </option>

                                        <option value="Meeting" {{ $event->event_type == 'Meeting' ? 'selected' : '' }}>
                                            Meeting
                                        </option>

                                        <option value="Activity" {{ $event->event_type == 'Activity' ? 'selected' : '' }}>
                                            Activity
                                        </option>

                                        <option value="Other" {{ $event->event_type == 'Other' ? 'selected' : '' }}>
                                            Other
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="edit-date-{{ $event->id }}">
                                        Event Date *
                                    </label>

                                    <input
                                        type="date"
                                        id="edit-date-{{ $event->id }}"
                                        name="event_date"
                                        value="{{ $event->event_date->format('Y-m-d') }}"
                                        required
                                    >
                                </div>

                                <div class="form-group">
                                    <label for="edit-time-{{ $event->id }}">
                                        Event Time
                                    </label>

                                    <input
                                        type="time"
                                        id="edit-time-{{ $event->id }}"
                                        name="event_time"
                                        value="{{ $event->event_time
                                            ? \Carbon\Carbon::parse($event->event_time)->format('H:i')
                                            : '' }}"
                                    >
                                </div>

                                <div class="form-group full-width">
                                    <label for="edit-description-{{ $event->id }}">
                                        Description
                                    </label>

                                    <textarea
                                        id="edit-description-{{ $event->id }}"
                                        name="description"
                                        maxlength="2000"
                                        placeholder="Add event details..."
                                    >{{ $event->description }}</textarea>
                                </div>

                                <div class="form-group full-width">
                                    <button type="submit" class="event-submit-button">
                                        Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>

                    </article>

                @empty

                    <div class="empty-events">
                        <strong>No events added yet.</strong>
                        <br>
                        Your saved events will appear here after you add one.
                    </div>

                @endforelse

            </section>

        </div>
    </main>

    <!-- FOOTER -->
    <footer>
        SIA &nbsp; | &nbsp; System Integration and Architecture
    </footer>

    <!-- NAVBAR AND EVENT INTERACTIONS -->
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

        // SHOW / HIDE EDIT EVENT FORM
        function toggleEditForm(eventId) {
            const panel = document.getElementById("edit-panel-" + eventId);

            if (!panel) {
                return;
            }

            panel.classList.toggle("open");
        }
    </script>

</body>
</html>