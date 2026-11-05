<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIA Classroom - Block {{ $block }}</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #dbeafe, #eff6ff, #bfdbfe);
            color: #12345b;
        }

        .navbar {
            min-height: 75px;
            padding: 15px 30px;
            background: rgba(255,255,255,.95);
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 5px 20px rgba(30,64,175,.12);
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
            display: grid;
            place-items: center;
            background: linear-gradient(135deg,#0f2f68,#168cf0);
            color: white;
            font-weight: bold;
        }

        .brand-title {
            font-weight: 900;
            color: #123d7a;
        }

        .brand-subtitle {
            font-size: 10px;
            color: #64748b;
            margin-top: 3px;
        }

        .back-link {
            text-decoration: none;
            color: white;
            background: linear-gradient(135deg,#0756b5,#168cf0);
            padding: 11px 17px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: bold;
        }

        main {
            width: 92%;
            max-width: 1100px;
            margin: 30px auto;
        }

        .class-header {
            background: white;
            border-radius: 14px;
            padding: 27px;
            border-left: 6px solid #0756b5;
            box-shadow: 0 6px 18px rgba(7,86,181,.10);
            margin-bottom: 22px;
        }

        .tag {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 6px;
            background: #dbeafe;
            color: #0756b5;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        h1 {
            font-size: 27px;
            margin-bottom: 8px;
            color: #0f2f68;
        }

        .class-header p {
            color: #64748b;
            line-height: 1.6;
            font-size: 14px;
        }

        .section-grid {
            display: grid;
            grid-template-columns: repeat(2,minmax(0,1fr));
            gap: 18px;
        }

        .section-card {
            background: rgba(255,255,255,.95);
            padding: 23px;
            border-radius: 13px;
            border: 1px solid #dbeafe;
            box-shadow: 0 5px 16px rgba(7,86,181,.09);
        }

        .section-card h2 {
            color: #0756b5;
            font-size: 17px;
            margin-bottom: 15px;
        }

        .section-card p {
            color: #526985;
            font-size: 13px;
            line-height: 1.7;
        }

        .notice {
            background: #eff6ff;
            border-left: 4px solid #168cf0;
            padding: 13px;
            margin-top: 12px;
            border-radius: 6px;
        }

        .notice strong {
            display: block;
            color: #123d7a;
            margin-bottom: 5px;
        }

        .empty-message {
            padding: 15px;
            text-align: center;
            background: #f8fafc;
            border: 1px dashed #bfdbfe;
            border-radius: 8px;
            color: #64748b;
            font-size: 13px;
        }

        .classroom-management {
            grid-column: 1 / -1;
        }

        .classroom-description {
            margin-bottom: 18px;
        }

        .link-display {
            padding: 16px;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            border-radius: 9px;
            margin-bottom: 18px;
            overflow-wrap: anywhere;
        }

        .link-display strong {
            display: block;
            margin-bottom: 8px;
            color: #123d7a;
        }

        .link-display a {
            color: #0756b5;
            font-size: 13px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: bold;
            color: #123d7a;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #bfdbfe;
            border-radius: 7px;
            outline: none;
            font-size: 13px;
        }

        .form-group input:focus {
            border-color: #168cf0;
            box-shadow: 0 0 0 3px rgba(22,140,240,.12);
        }

        .button-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }

        .btn {
            display: inline-block;
            border: none;
            padding: 11px 17px;
            border-radius: 7px;
            font-size: 13px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            text-align: center;
        }

        .btn-primary {
            background: linear-gradient(135deg,#0756b5,#168cf0);
            color: white;
        }

        .btn-secondary {
            background: #e2e8f0;
            color: #334155;
        }

        .btn-danger {
            background: #dc2626;
            color: white;
        }

        .btn-success {
            background: #15803d;
            color: white;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .error-text {
            color: #dc2626;
            font-size: 12px;
            margin-top: 7px;
        }

        footer {
            margin-top: 35px;
            padding: 16px;
            text-align: center;
            color: white;
            background: linear-gradient(135deg,#0f2f68,#0756b5,#168cf0);
            font-size: 12px;
        }

        @media(max-width:650px) {
            .navbar {
                padding: 12px 15px;
                gap: 10px;
            }

            .brand-subtitle {
                font-size: 9px;
            }

            .back-link {
                padding: 9px 11px;
                font-size: 11px;
            }

            main {
                width: 92%;
                margin: 20px auto;
            }

            .class-header {
                padding: 20px;
            }

            h1 {
                font-size: 22px;
            }

            .section-grid {
                grid-template-columns: 1fr;
            }

            .classroom-management {
                grid-column: auto;
            }

            .button-group {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="brand">
            <div class="logo">SIA</div>
            <div>
                <div class="brand-title">SIA</div>
                <div class="brand-subtitle">
                    System Integration and Architecture
                </div>
            </div>
        </div>

        <a href="{{ url('/online-classes') }}" class="back-link">
            ← Back to Classes
        </a>
    </nav>

    <main>

        <section class="class-header">
            <span class="tag">SIA 101 | BLOCK {{ $block }}</span>

            <h1>System Integration and Architecture</h1>

            <p>
                Welcome to the SIA Online Classroom.
                This page provides the class information and
                class activities for Block {{ $block }}.
            </p>
        </section>

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- VALIDATION ERRORS --}}
        @if($errors->any())
            <div class="alert alert-error">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <div class="section-grid">

                        {{-- POSTED CLASS ACTIVITIES --}}
            <section class="section-card">
                <h2>Class Activities</h2>

                @forelse($activities as $activity)
                    <div class="notice" style="margin-bottom: 14px;">
                        <strong>{{ $activity->title }}</strong>

                        @if($activity->due_at)
                            <p>
                                <strong>Deadline:</strong>
                                {{ $activity->due_at->format('M d, Y - h:i A') }}
                            </p>
                        @endif

                        @if($activity->instructions)
                            <p style="white-space: pre-line;">
                                {{ $activity->instructions }}
                            </p>
                        @endif

                        <p>
                            <strong>Assigned Blocks:</strong>
                            {{ $activity->blocks->pluck('block')->implode(', ') }}
                        </p>

                        @if($activity->attachment_path)
                            <a href="{{ route('activities.download', $activity->id) }}"
                               style="color: #0756b5; font-weight: bold;">
                                Download: {{ $activity->attachment_name }}
                            </a>
                        @endif
                    </div>
                @empty
                    <div class="empty-message">
                        No activities have been posted for Block {{ $block }} yet.
                    </div>
                @endforelse
            </section>

            <section class="section-card">
                <h2>ℹ️ Classroom Information</h2>

                <div class="notice">
                    <strong>Subject</strong>
                    System Integration and Architecture
                </div>

                <div class="notice">
                    <strong>Subject Code</strong>
                    SIA 101
                </div>

                <div class="notice">
                    <strong>Assigned Block</strong>
                    {{ $block }}
                </div>
            </section>

            {{-- GOOGLE CLASSROOM MANAGEMENT --}}
            <section class="section-card classroom-management">

                <h2>🌐 Google Classroom Link</h2>

                <p class="classroom-description">
                    Manage the Google Classroom link for SIA Block {{ $block }}.
                    Add the link provided for this class to allow users
                    to access its Google Classroom.
                </p>

                @if($classroomLink)

                    {{-- EXISTING LINK --}}
                    <div class="link-display">
                        <strong>Saved Google Classroom Link</strong>

                        <a href="{{ $classroomLink->google_classroom_url }}"
                           target="_blank"
                           rel="noopener noreferrer">
                            {{ $classroomLink->google_classroom_url }}
                        </a>
                    </div>

                    {{-- EDIT LINK --}}
                    <form action="{{ route('sia.classroom.link.update', ['block' => $block]) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="google_classroom_url">
                                Update Google Classroom URL
                            </label>

                            <input
                                type="url"
                                id="google_classroom_url"
                                name="google_classroom_url"
                                value="{{ old('google_classroom_url', $classroomLink->google_classroom_url) }}"
                                placeholder="https://classroom.google.com/..."
                                required
                            >
                        </div>

                        <div class="button-group">
                            <button type="submit" class="btn btn-primary">
                                Save Changes
                            </button>

                            <a href="{{ $classroomLink->google_classroom_url }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="btn btn-success">
                                Open Classroom
                            </a>
                        </div>

                    </form>

                    {{-- DELETE LINK --}}
                    <form action="{{ route('sia.classroom.link.destroy', ['block' => $block]) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this Google Classroom link?');">

                        @csrf
                        @method('DELETE')

                        <div class="button-group">
                            <button type="submit" class="btn btn-danger">
                                Delete Classroom Link
                            </button>
                        </div>

                    </form>

                @else

                    {{-- NO LINK YET --}}
                    <div class="empty-message">
                        No Google Classroom link has been added for
                        Block {{ $block }} yet.
                    </div>

                    {{-- ADD LINK --}}
                    <form action="{{ route('sia.classroom.link.store', ['block' => $block]) }}"
                          method="POST"
                          style="margin-top: 18px;">

                        @csrf

                        <div class="form-group">
                            <label for="google_classroom_url">
                                Google Classroom URL
                            </label>

                            <input
                                type="url"
                                id="google_classroom_url"
                                name="google_classroom_url"
                                value="{{ old('google_classroom_url') }}"
                                placeholder="https://classroom.google.com/..."
                                required
                            >
                        </div>

                        <div class="button-group">
                            <button type="submit" class="btn btn-primary">
                                + Add Classroom Link
                            </button>
                        </div>

                    </form>

                @endif

            </section>

        </div>

    </main>

    <footer>
        SIA | System Integration and Architecture
    </footer>

</body>
</html>
