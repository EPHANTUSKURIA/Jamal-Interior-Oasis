<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <!-- Include Bootstrap CSS and custom styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .about-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .about-header {
            text-align: center;
            margin-bottom: 40px;
        }
        .about-header h1 {
            font-size: 36px;
            color: #333;
        }
        .about-header p {
            font-size: 18px;
            color: #666;
            line-height: 1.6;
        }
        .team-section {
            margin-top: 40px;
        }
        .team-section h2 {
            font-size: 28px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .team-members {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .team-member {
            flex: 1 1 calc(33.333% - 20px);
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            overflow: hidden;
        }
        .team-member img {
            width: 100%;
            height: auto;
        }
        .team-member .info {
            padding: 15px;
        }
        .team-member h3 {
            margin: 0;
            font-size: 20px;
            color: #333;
        }
        .team-member p {
            color: #666;
        }
    </style>
</head>
<body>
    @include('layouts.header')

    <main class="about-container">
        <div class="about-header">
            <h1>About Us</h1>
            <p>Welcome to [Your Company Name]. We are committed to providing the best products and services to our customers. Our mission is to [insert mission statement or core values]. We believe in [insert values or principles].</p>
        </div>

        <div class="team-section">
            <h2>Meet Our Team</h2>
            <div class="team-members">
                <!-- Example Team Member -->
                <div class="team-member">
                    <img src="{{ asset('images/team/member1.jpg') }}" alt="Team Member 1">
                    <div class="info">
                        <h3>John Doe</h3>
                        <p>Founder & CEO</p>
                        <p>John is passionate about [describe John's role, achievements, or contributions].</p>
                    </div>
                </div>
                <div class="team-member">
                    <img src="{{ asset('images/team/member2.jpg') }}" alt="Team Member 2">
                    <div class="info">
                        <h3>Jane Smith</h3>
                        <p>Marketing Director</p>
                        <p>Jane leads our marketing efforts and is dedicated to [describe Jane's role, achievements, or contributions].</p>
                    </div>
                </div>
                <!-- Add more team members as needed -->
            </div>
        </div>
    </main>

    @include('layouts.footer')
</body>
</html>
