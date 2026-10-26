<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Chat - SIA Student Portal</title>


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

            overflow: hidden;
        }


        /* =========================
           NAVIGATION BAR
        ========================= */

        .navbar {

            width: 100%;

            min-height: 70px;

            background: rgba(255, 255, 255, 0.88);

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 10px 35px;

            border-bottom: 3px solid #0756b5;

            box-shadow:
                0 4px 12px rgba(7, 86, 181, 0.15);

            backdrop-filter: blur(10px);
        }


        /* =========================
           BRAND
        ========================= */

        .brand {

            display: flex;

            align-items: center;

            gap: 10px;
        }


        .brand-logo {

            width: 45px;

            height: 45px;

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

            font-size: 14px;

            font-weight: 800;

            color: #0f2f68;
        }


        .brand-subtitle {

            font-size: 10px;

            color: #55708f;

            margin-top: 2px;
        }


        /* =========================
           NAVIGATION LINKS
        ========================= */

        .nav-links {

            display: flex;

            align-items: center;

            gap: 4px;
        }


        .nav-links a {

            text-decoration: none;

            color: #12345b;

            font-size: 12px;

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


        /* Active Chat */

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


        /* Logout */

        .logout {

            border: 1px solid #0756b5;

            color: #0756b5 !important;
        }


        .logout:hover {

            background: #0756b5 !important;

            color: white !important;
        }


        /* =========================
           MAIN CONTENT
        ========================= */

        .main-content {

            width: 100%;

            height: calc(100vh - 115px);

            padding: 22px 30px 20px;

            overflow: hidden;
        }


        .content-wrapper {

            width: 92%;

            max-width: 1050px;

            height: 100%;

            margin: 0 auto;

            display: flex;

            flex-direction: column;
        }


        /* =========================
           PAGE HEADER
        ========================= */

        .page-header {

            text-align: center;

            margin-bottom: 15px;

            flex-shrink: 0;
        }


        .page-header h1 {

            font-size: 26px;

            color: #0f2f68;

            margin-bottom: 6px;
        }


        .page-header p {

            color: #55708f;

            font-size: 13px;
        }


        .blue-line {

            width: 55px;

            height: 3px;

            background:
                linear-gradient(
                    90deg,
                    #0f2f68,
                    #0756b5,
                    #168cf0
                );

            border-radius: 10px;

            margin: 10px auto 0;
        }


        /* =========================
           CHAT CARD
        ========================= */

        .chat-card {

            width: 100%;

            flex: 1;

            min-height: 0;

            background: rgba(255, 255, 255, 0.92);

            border-radius: 14px;

            padding: 18px 20px;

            box-shadow:
                0 8px 22px rgba(7, 86, 181, 0.13);

            display: flex;

            gap: 18px;

            border: 1px solid rgba(7, 86, 181, 0.12);

            backdrop-filter: blur(8px);
        }


        /* =========================
           BLOCK PANEL
        ========================= */

        .instructor-panel {

            width: 265px;

            flex-shrink: 0;

            border: 1px solid #dbe7f5;

            border-radius: 10px;

            overflow: hidden;

            background: #ffffff;
        }


        .instructor-header {

            background:
                linear-gradient(
                    135deg,
                    #0f2f68,
                    #0756b5,
                    #168cf0
                );

            color: white;

            padding: 13px 15px;

            font-size: 14px;

            font-weight: bold;
        }


        .instructor-list {

            width: 100%;
        }


        .instructor {

            padding: 10px 15px;

            border-bottom: 1px solid #e5edf7;

            cursor: pointer;

            transition: 0.2s;
        }


        .instructor:last-child {

            border-bottom: none;
        }


        .instructor:hover {

            background: #eff6ff;
        }


        .instructor.active {

            background: #dbeafe;

            border-left: 4px solid #0756b5;

            padding-left: 11px;
        }


        .instructor-name {

            font-size: 12px;

            font-weight: bold;

            color: #12345b;

            margin-bottom: 3px;
        }


        .instructor-subject {

            font-size: 10px;

            color: #55708f;
        }


        /* =========================
           CONVERSATION
        ========================= */

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


        /* =========================
           CONVERSATION HEADER
        ========================= */

        .conversation-header {

            background: #ffffff;

            border-bottom: 1px solid #dbe7f5;

            padding: 13px 18px;

            flex-shrink: 0;
        }


        .conversation-name {

            font-size: 15px;

            font-weight: bold;

            color: #0f2f68;

            margin-bottom: 3px;
        }


        .conversation-subject {

            font-size: 11px;

            color: #55708f;
        }


        /* =========================
           MESSAGES
        ========================= */

        .messages {

            flex: 1;

            min-height: 0;

            padding: 18px;

            display: flex;

            flex-direction: column;

            gap: 13px;

            overflow: hidden;

            background: #f8fbff;
        }


        .message {

            max-width: 68%;

            padding: 10px 13px;

            border-radius: 10px;

            font-size: 12px;

            line-height: 1.4;
        }


        /* Block message */

        .received {

            align-self: flex-start;

            background: #e5eef9;

            color: #12345b;
        }


        /* Student message */

        .sent {

            align-self: flex-end;

            background:
                linear-gradient(
                    135deg,
                    #0f2f68,
                    #0756b5,
                    #168cf0
                );

            color: white;
        }


        .message-name {

            font-size: 10px;

            font-weight: bold;

            margin-bottom: 4px;
        }


        /* =========================
           MESSAGE INPUT
        ========================= */

        .chat-input {

            min-height: 60px;

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

            height: 38px;

            border: 1px solid #cbdced;

            border-radius: 7px;

            padding: 0 12px;

            font-size: 12px;

            outline: none;
        }


        .chat-input input:focus {

            border-color: #0756b5;

            box-shadow:
                0 0 0 2px rgba(7, 86, 181, 0.08);
        }


        .chat-input button {

            height: 38px;

            padding: 0 18px;

            border: none;

            border-radius: 7px;

            background:
                linear-gradient(
                    135deg,
                    #0f2f68,
                    #0756b5,
                    #168cf0
                );

            color: white;

            font-size: 12px;

            font-weight: bold;

            cursor: pointer;

            transition: 0.2s;
        }


        .chat-input button:hover {

            transform: translateY(-1px);

            box-shadow:
                0 5px 12px rgba(7, 86, 181, 0.25);
        }


        /* =========================
           FOOTER
        ========================= */

        footer {

            height: 45px;

            width: 100%;

            background:
                linear-gradient(
                    135deg,
                    #0f2f68,
                    #0756b5,
                    #168cf0
                );

            color: #ffffff;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 11px;

            position: fixed;

            bottom: 0;

            left: 0;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            body {

                overflow: auto;
            }


            .navbar {

                flex-direction: column;

                gap: 10px;

                padding: 12px 20px;
            }


            .nav-links {

                flex-wrap: wrap;

                justify-content: center;
            }


            .main-content {

                height: auto;

                min-height: calc(100vh - 115px);

                padding: 20px 15px 70px;
            }


            .content-wrapper {

                width: 100%;
            }


            .chat-card {

                min-height: 500px;
            }

        }


        @media (max-width: 700px) {

            .chat-card {

                flex-direction: column;
            }


            .instructor-panel {

                width: 100%;
            }


            .conversation {

                min-height: 400px;
            }

        }


        @media (max-width: 600px) {

            .brand {

                justify-content: center;
            }


            .nav-links a {

                font-size: 11px;

                padding: 8px 9px;
            }


            .page-header h1 {

                font-size: 24px;
            }

        }

    </style>

</head>


<body>


    <!-- =========================
         NAVIGATION BAR
    ========================= -->

    <nav class="navbar">


        <!-- SIA BRAND -->

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


        <!-- NAVIGATION -->

        <div class="nav-links">

            <a href="/dashboard">
                Home
            </a>


            <a
                href="/chat"
                class="active"
            >
                Chat
            </a>


            <a href="/calendar">
                Calendar
            </a>


            <a href="/online-classes">
                Online Classes
            </a>


            <a
                href="/logout"
                class="logout"
            >
                Logout
            </a>

        </div>

    </nav>



    <!-- =========================
         MAIN CONTENT
    ========================= -->

    <main class="main-content">

        <div class="content-wrapper">


            <!-- PAGE HEADER -->

            <div class="page-header">

                <h1>
                    Student Chat
                </h1>

                <p>
                    Communicate with your SIA 101 blocks.
                </p>

                <div class="blue-line"></div>

            </div>



            <!-- =========================
                 CHAT CARD
            ========================= -->

            <div class="chat-card">


                <!-- =========================
                     BLOCK LIST
                ========================= -->

                <div class="instructor-panel">


                    <div class="instructor-header">
                        SIA 101 Blocks
                    </div>


                    <div class="instructor-list">


                        <!-- BLOCK 3-A -->

                        <div class="instructor active">

                            <div class="instructor-name">
                                Block 3-A
                            </div>

                            <div class="instructor-subject">
                                SIA 101
                            </div>

                        </div>



                        <!-- BLOCK 3-B -->

                        <div class="instructor">

                            <div class="instructor-name">
                                Block 3-B
                            </div>

                            <div class="instructor-subject">
                                SIA 101
                            </div>

                        </div>



                        <!-- BLOCK 3-C -->

                        <div class="instructor">

                            <div class="instructor-name">
                                Block 3-C
                            </div>

                            <div class="instructor-subject">
                                SIA 101
                            </div>

                        </div>



                        <!-- BLOCK 3-D -->

                        <div class="instructor">

                            <div class="instructor-name">
                                Block 3-D
                            </div>

                            <div class="instructor-subject">
                                SIA 101
                            </div>

                        </div>



                        <!-- BLOCK 3-E -->

                        <div class="instructor">

                            <div class="instructor-name">
                                Block 3-E
                            </div>

                            <div class="instructor-subject">
                                SIA 101
                            </div>

                        </div>



                        <!-- BLOCK 3-L -->

                        <div class="instructor">

                            <div class="instructor-name">
                                Block 3-L
                            </div>

                            <div class="instructor-subject">
                                SIA 101
                            </div>

                        </div>


                    </div>

                </div>



                <!-- =========================
                     CONVERSATION
                ========================= -->

                <div class="conversation">


                    <!-- CONVERSATION HEADER -->

                    <div class="conversation-header">

                        <div class="conversation-name">
                            Block 3-A
                        </div>

                        <div class="conversation-subject">
                            SIA 101 — System Integration and Architecture
                        </div>

                    </div>



                    <!-- =====================
                         MESSAGES
                    ====================== -->

                    <div class="messages">


                        <!-- Block message -->

                        <div class="message received">

                            <div class="message-name">
                                Block 3-A
                            </div>

                            Good day, Sir! 

                        </div>



                        <!-- Student -->

                        <div class="message sent">

                            <div class="message-name">
                                You
                            </div>

                            Good day.

                        </div>
                    </div>



                    <!-- =====================
                         MESSAGE INPUT
                    ====================== -->

                    <form
                        class="chat-input"
                        onsubmit="return false;"
                    >

                        <input
                            type="text"
                            placeholder="Type your message..."
                        >


                        <button type="submit">
                            Send
                        </button>

                    </form>


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