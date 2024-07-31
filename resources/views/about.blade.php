<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <!-- Include Bootstrap CSS and custom styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .about-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .about-header {
            text-align: center;
            margin-bottom: 40px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .about-header h1 {
            font-size: 36px;
            color: #172D13; /* Dark Green */
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
            color: #172D13; /* Dark Green */
            text-align: center;
            margin-bottom: 20px;
        }
        .team-members {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .team-member {
            flex: 1 1 calc(33.333% - 20px);
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            overflow: hidden;
            padding: 20px;
        }
        .team-member img {
            width: 100%;
            height: auto;
            border-bottom: 2px solid #D76F30; /* Orange */
        }
        .team-member .info {
            padding: 15px;
        }
        .team-member h3 {
            margin: 0;
            font-size: 20px;
            color: #172D13; /* Dark Green */
        }
        .team-member p {
            color: #666;
        }
    </style>
</head>
<body>
    @include('header')

    <main class="about-container">
        <div class="about-header">
            <h1>About Us</h1>
            <p>Welcome to Jamal Interior Oasis. We are committed to providing the best products and services to our customers. Our mission is to offer high-quality furniture solutions that enhance your living space. We believe in innovation, customer satisfaction, and excellence in all that we do.</p>
        </div>

        <div class="team-section">
            <h2>Meet Our Team</h2>
            <div class="team-members">
                <!-- Example Team Member -->
                <div class="team-member">
                    <img src="{{ asset('images/member1.jpeg') }}" alt="John Maina">
                    <div class="info">
                        <h3>John Maina</h3>
                        <p>Founder & CEO</p>
                        <p>Our CEO, Mr John Maina is passionate about transforming spaces with high-quality furniture. His vision and leadership have been instrumental in the company's growth.</p>
                    </div>
                </div>
                <div class="team-member">
                    <img src="{{ asset('images/member2.jpeg') }}" alt="Kuria Maina">
                    <div class="info">
                        <h3>Kuria Maina</h3>
                        <p>Marketing Director</p>
                        <p>Mr Kuria leads our marketing efforts with a focus on creating impactful campaigns and engaging with our customers to build lasting relationships.</p>
                    </div>
                </div>
                <!-- Add more team members as needed -->
            </div>
        </div>
    </main>

    @include('footer')
</body>
</html>
