
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
            background: white;
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
            padding: 16px 30px;
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
            margin-bottom: 14px;
        }

        .page-header h1 {
            font-size: 25px;
            color: #0f2f68;
            margin-bottom: 4px;
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

        /* CHAT CARD */

        .chat-card {
            width: 100%;
            flex: 1;
            min-height: 440px;
            background: rgba(255, 255, 255, 0.92);
            border-radius: 14px;
            padding: 16px 18px;
            box-shadow: 0 8px 22px rgba(7, 86, 181, 0.13);
            display: flex;
            gap: 16px;
            border: 1px solid rgba(7, 86, 181, 0.12);
            backdrop-filter: blur(8px);
        }

        /* BLOCK LIST */

        .instructor-panel {
            width: 240px;
            flex-shrink: 0;
            border: 1px solid #dbe7f5;
            border-radius: 10px;
            overflow: hidden;
            background: white;
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
            width: 100%;
            padding: 11px 15px;
            border: none;
            border-bottom: 1px solid #e5edf7;
            background: white;
            text-align: left;
            cursor: pointer;
            transition: background 0.2s ease;
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

        /* CONVERSATION */

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
            background: white;
            border-bottom: 1px solid #dbe7f5;
            padding: 12px 16px;
            flex-shrink: 0;
        }

        .conversation-name {
            font-size: 14px;
            font-weight: bold;
            color: #0f2f68;
            margin-bottom: 3px;
        }

        .conversation-subject {
            font-size: 10px;
            color: #55708f;
            line-height: 1.5;
        }

        .messages {
            flex: 1;
            min-height: 200px;
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            overflow-y: auto;
            background: #f8fbff;
        }

        .message {
            max-width: 75%;
            padding: 10px 12px;
            border-radius: 10px;
            font-size: 12px;
            line-height: 1.5;
            overflow-wrap: anywhere;
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

        .message-time {
            display: block;
            margin-top: 4px;
            font-size: 9px;
            opacity: 0.75;
            text-align: right;
        }

        .empty-message {
            margin: auto;
            color: #64748b;
            font-size: 12px;
            text-align: center;
            padding: 20px;
        }

        /* MESSAGE INPUT */

        .chat-input {
            min-height: 58px;
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
            min-width: 0;
            height: 38px;
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
            min-width: 70px;
            height: 38px;
            padding: 0 16px;
            border: none;
            border-radius: 7px;
            background: linear-gradient(135deg, #0f2f68, #0756b5, #168cf0);
            color: white;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .chat-input button:hover {
            transform: translateY(-1px);
            box-shadow: 0 5px 12px rgba(7, 86, 181, 0.25);
        }

        .chat-input button:focus-visible,
        .instructor:focus-visible,
        .nav-close:focus-visible {
            outline: 2px solid #168cf0;
            outline-offset: 2px;
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

        /* SMALL LAPTOPS */

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

            .nav-links a.logout {
                margin-left: 0;
            }

            .main-content {
                padding: 14px 20px;
            }

            .content-wrapper {
                width: 100%;
            }

            .instructor-panel {
                width: 215px;
            }

            .chat-card {
                padding: 14px;
                gap: 12px;
            }
        }

        /* MOBILE NAVBAR AND CHAT */

        @media (max-width: 760px) {
            .navbar {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
                gap: 8px;
                padding: 12px 10px;
            }

            .brand {
                flex: 1 1 auto;
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
                padding: 14px 12px;
            }

            .content-wrapper {
                width: 100%;
            }

            .page-header {
                margin-bottom: 12px;
            }

            .page-header h1 {
                font-size: 23px;
            }

            .chat-card {
                flex-direction: column;
                min-height: 560px;
                padding: 12px;
                gap: 12px;
            }

            .instructor-panel {
                width: 100%;
                max-height: 170px;
                flex: 0 0 auto;
            }

            .instructor-list {
                overflow-y: auto;
            }

            .instructor {
                padding: 10px 12px;
            }

            .instructor.active {
                padding-left: 8px;
            }

            .conversation {
                width: 100%;
                flex: 1 1 auto;
                min-height: 350px;
            }

            .messages {
                min-height: 180px;
                padding: 12px;
            }
        }

        /* SMALL PHONES */

        @media (max-width: 480px) {
            .main-content {
                flex: 1 0 auto;
                padding: 14px 10px;
            }

            .page-header h1 {
                font-size: 22px;
            }

            .page-header p {
                font-size: 11px;
                line-height: 1.6;
            }

            .chat-card {
                min-height: 570px;
                padding: 9px;
                gap: 10px;
                border-radius: 12px;
            }

            .instructor-panel {
                max-height: 145px;
            }

            .conversation {
                min-height: 370px;
            }

            .conversation-header {
                padding: 11px 12px;
            }

            .conversation-name {
                font-size: 13px;
            }

            .conversation-subject {
                font-size: 10px;
            }

            .messages {
                padding: 10px;
                gap: 9px;
            }

            .message {
                max-width: 86%;
                padding: 9px 10px;
                font-size: 12px;
            }

            .chat-input {
                padding: 9px;
                gap: 6px;
            }

            .chat-input input {
                padding: 0 9px;
                font-size: 11px;
            }

            .chat-input button {
                min-width: 58px;
                padding: 0 10px;
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
                padding: 12px 8px;
            }

            .chat-card {
                padding: 8px;
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
            <a href="/chat" class="active" aria-current="page">Chat</a>
            <a href="/calendar">Calendar</a>
            <a href="/online-classes">Online Classes</a>
            <a href="/logout" class="logout">Logout</a>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="main-content">
        <div class="content-wrapper">

            <div class="page-header">
                <h1>Student Chat</h1>
                <p>Communicate with your SIA 101 blocks.</p>
                <div class="blue-line"></div>
            </div>

            <div class="chat-card">

                <!-- BLOCK LIST -->
                <div class="instructor-panel">
                    <div class="instructor-header">SIA 101 Blocks</div>

                    <div class="instructor-list">
                        <button class="instructor active" type="button" data-block="3-A">
                            <div class="instructor-name">Block 3-A</div>
                            <div class="instructor-subject">SIA 101</div>
                        </button>

                        <button class="instructor" type="button" data-block="3-B">
                            <div class="instructor-name">Block 3-B</div>
                            <div class="instructor-subject">SIA 101</div>
                        </button>

                        <button class="instructor" type="button" data-block="3-C">
                            <div class="instructor-name">Block 3-C</div>
                            <div class="instructor-subject">SIA 101</div>
                        </button>

                        <button class="instructor" type="button" data-block="3-D">
                            <div class="instructor-name">Block 3-D</div>
                            <div class="instructor-subject">SIA 101</div>
                        </button>

                        <button class="instructor" type="button" data-block="3-E">
                            <div class="instructor-name">Block 3-E</div>
                            <div class="instructor-subject">SIA 101</div>
                        </button>

                        <button class="instructor" type="button" data-block="3-L">
                            <div class="instructor-name">Block 3-L</div>
                            <div class="instructor-subject">SIA 101</div>
                        </button>
                    </div>
                </div>

                <!-- CONVERSATION -->
                <section class="conversation" aria-label="Chat conversation">
                    <div class="conversation-header">
                        <div class="conversation-name" id="conversationName">Block 3-A</div>
                        <div class="conversation-subject">
                            SIA 101 — System Integration and Architecture
                        </div>
                    </div>

                    <div class="messages" id="messages" aria-live="polite">
                        <div class="message received">
                            <div class="message-name">Block 3-A</div>
                            Good day, Sir!
                        </div>

                        <div class="message sent">
                            <div class="message-name">You</div>
                            Good day.
                        </div>
                    </div>

                    <form class="chat-input" id="chatForm">
                        <input
                            type="text"
                            id="messageInput"
                            placeholder="Type your message..."
                            aria-label="Type your message"
                            autocomplete="off"
                            maxlength="1000"
                            required
                        >
                        <button type="submit">Send</button>
                    </form>
                </section>

            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer>
        SIA &nbsp; | &nbsp; System Integration and Architecture
    </footer>

    <script>
        /* MOBILE NAVIGATION */
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

        /* DEMO CHAT: SWITCH BETWEEN BLOCKS */
        const blockButtons = document.querySelectorAll(".instructor");
        const conversationName = document.getElementById("conversationName");
        const messagesContainer = document.getElementById("messages");
        const chatForm = document.getElementById("chatForm");
        const messageInput = document.getElementById("messageInput");

        const blockMessages = {
            "3-A": [
                { sender: "Block 3-A", text: "Good day, Sir!", type: "received" },
                { sender: "You", text: "Good day.", type: "sent" }
            ],
            "3-B": [],
            "3-C": [],
            "3-D": [],
            "3-E": [],
            "3-L": []
        };

        let selectedBlock = "3-A";

        function renderMessages() {
            messagesContainer.replaceChildren();

            const messages = blockMessages[selectedBlock];

            if (messages.length === 0) {
                const emptyMessage = document.createElement("div");
                emptyMessage.className = "empty-message";
                emptyMessage.textContent = "No messages yet. Start the conversation!";
                messagesContainer.appendChild(emptyMessage);
                return;
            }

            messages.forEach(function (message) {
                const messageElement = document.createElement("div");
                messageElement.className = "message " + message.type;

                const senderElement = document.createElement("div");
                senderElement.className = "message-name";
                senderElement.textContent = message.sender;

                const textElement = document.createElement("div");
                textElement.textContent = message.text;

                messageElement.appendChild(senderElement);
                messageElement.appendChild(textElement);

                if (message.time) {
                    const timeElement = document.createElement("span");
                    timeElement.className = "message-time";
                    timeElement.textContent = message.time;
                    messageElement.appendChild(timeElement);
                }

                messagesContainer.appendChild(messageElement);
            });

            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }

        blockButtons.forEach(function (button) {
            button.addEventListener("click", function () {
                selectedBlock = button.dataset.block;

                blockButtons.forEach(function (item) {
                    const isActive = item === button;
                    item.classList.toggle("active", isActive);
                    item.setAttribute("aria-pressed", String(isActive));
                });

                conversationName.textContent = "Block " + selectedBlock;
                renderMessages();
            });

            button.setAttribute(
                "aria-pressed",
                String(button.dataset.block === selectedBlock)
            );
        });

        /* DEMO SEND BUTTON */
        chatForm.addEventListener("submit", function (event) {
            event.preventDefault();

            const text = messageInput.value.trim();

            if (!text) {
                messageInput.focus();
                return;
            }

            blockMessages[selectedBlock].push({
                sender: "You",
                text: text,
                type: "sent",
                time: new Date().toLocaleTimeString([], {
                    hour: "numeric",
                    minute: "2-digit"
                })
            });

            renderMessages();
            messageInput.value = "";
            messageInput.focus();
        });
    </script>

</body>
</html>
