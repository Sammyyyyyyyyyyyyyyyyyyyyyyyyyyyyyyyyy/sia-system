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
            height: 100%;
            overflow: hidden;
        }

        body {
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
            color: #222;
        }

        .navbar {
            width: 100%;
            height: 78px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 45px;
            background: rgba(255, 255, 255, 0.90);
            border-bottom: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow:
                0 8px 25px rgba(30, 64, 175, 0.12);
            position: relative;
            z-index: 10;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .logo {
            width: 50px;
            height: 50px;
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
            box-shadow:
                0 8px 20px rgba(22, 140, 240, 0.25);
            border: 3px solid rgba(255, 255, 255, 0.8);
        }

        .brand-text {
            display: flex;
            flex-direction: column;
        }

        .brand-title {
            color: #123d7a;
            font-size: 16px;
            font-weight: 900;
            letter-spacing: 0.5px;
        }

        .brand-subtitle {
            color: #64748b;
            font-size: 11px;
            margin-top: 3px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .nav-links a {
            text-decoration: none;
            color: #334155;
            font-size: 13px;
            font-weight: 600;
            padding: 11px 14px;
            border-radius: 8px;
            transition: 0.2s ease;
        }

        .nav-links a:hover {
            background: #dbeafe;
            color: #0756b5;
        }

        .nav-links .active {
            background:
                linear-gradient(
                    135deg,
                    #0756b5,
                    #168cf0
                );

            color: white;
            box-shadow:
                0 7px 18px rgba(22, 140, 240, 0.25);
        }

        .nav-links .logout {
            margin-left: 7px;
            color: #0756b5;
            border: 1px solid #168cf0;
        }

        .nav-links .logout:hover {
            background:
                linear-gradient(
                    135deg,
                    #0756b5,
                    #168cf0
                );
            color: white;
        }

        .main-container {
            width: 100%;
            height: calc(100vh - 78px - 45px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 25px 55px;
            position: relative;
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
            margin-bottom: 25px;
            position: relative;
            z-index: 2;
        }

        .hero-logo {
            width: 68px;
            height: 68px;
            margin: 0 auto 12px;
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
            font-size: 17px;
            font-weight: 900;
            letter-spacing: 2px;
            border: 4px solid rgba(255, 255, 255, 0.8);
            box-shadow:
                0 10px 30px rgba(30, 64, 175, 0.25);
        }

        .hero h1 {
            font-size: 29px;
            color: #123d7a;
            font-weight: 900;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .hero h2 {
            font-size: 17px;
            color: #334155;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .hero-line {
            width: 65px;
            height: 3px;
            background:
                linear-gradient(
                    90deg,
                    #0756b5,
                    #168cf0
                );
            border-radius: 10px;
            margin: 0 auto 11px;
        }

        .hero p {
            max-width: 680px;
            margin: auto;
            color: #64748b;
            font-size: 13px;
            line-height: 1.5;
        }

        .information {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            position: relative;
            z-index: 2;
        }

        .info-card {
            position: relative;
            background:
                rgba(255, 255, 255, 0.90);
            min-height: 225px;
            padding: 27px 30px;
            border-radius: 18px;
            border: 1px solid rgba(255, 255, 255, 0.85);
            box-shadow:
                0 15px 35px rgba(30, 64, 175, 0.13);
            overflow: hidden;
            transition: 0.25s ease;
        }

        .info-card::before {
            content: "";
            position: absolute;
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background:
                rgba(22, 140, 240, 0.07);
            top: -65px;
            right: -65px;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow:
                0 20px 40px rgba(30, 64, 175, 0.18);
        }

        .card-label {
            font-size: 11px;
            color: #168cf0;
            font-weight: 900;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 7px;
            position: relative;
            z-index: 2;
        }

        .info-card h2 {
            font-size: 25px;
            color: #123d7a;
            margin-bottom: 15px;
            position: relative;
            z-index: 2;
        }

        .info-card p {
            font-size: 13px;
            color: #475569;
            line-height: 1.7;
            text-align: justify;
            position: relative;
            z-index: 2;
        }

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
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            position: fixed;
            bottom: 0;
            left: 0;
            box-shadow:
                0 -5px 18px rgba(30, 64, 175, 0.12);
        }

        @media (max-width: 900px) {
            html,
            body {
                overflow: auto;
            }

            .navbar {
                padding: 15px 25px;
                height: auto;
                flex-direction: column;
                gap: 12px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }

            .main-container {
                height: auto;
                padding: 35px 20px 70px;
            }

            .information {
                grid-template-columns: 1fr;
            }

            footer {
                position: relative;
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

            <div class="brand-text">
                <div class="brand-title">
                    SIA 
                </div>
                <div class="brand-subtitle">
                    System Integration and Architecture
                </div>
            </div>
        </div>

        <div class="nav-links">

            <a href="/dashboard"class="active"> Home</a>
            <a href="/chat"> Chat</a>
            <a href="/calendar"> Calendar</a>
            <a href="/online-classes"> Online Classes</a>
            <a href="/logout"class="logout"> Logout</a>
        </div>
    </nav>

    <main class="main-container">

        <section class="hero">

            <h1>
                WELCOME TO SIA
            </h1>

            <h2>
                System Integration and Architecture
            </h2>

            <div class="hero-line"></div>
            <p>
                Welcome to the SIA.
                Explore your academic information, communicate
                with instructors, view your class schedules,
                and access your online classes.
            </p>
        </section>

        <section class="information">

            <div class="info-card">
                <h2>
                    Vision
                </h2>
                <p>
                      A leading local university known to develop excellent
    and virtuous professionals who are catalysts of progress
    for both the local and global communities.
                </p>
            </div>

            <div class="info-card">
                <h2>
                    Mission
                </h2>
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
        SIA
        &nbsp; | &nbsp;
        System Integration and Architecture
    </footer>

</body>
</html>