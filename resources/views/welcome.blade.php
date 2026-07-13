<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aashi Venture</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0b1220 0%, #142238 60%, #1a2c4a 100%);
            color: #f5f7fa;
            text-align: center;
            padding: 24px;
        }

        .wrap {
            max-width: 640px;
        }

        .eyebrow {
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 13px;
            color: #6ea8fe;
            font-weight: 600;
            margin-bottom: 18px;
        }

        h1 {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: clamp(32px, 6vw, 52px);
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        p.lede {
            font-size: 17px;
            color: #c7d0dd;
            line-height: 1.6;
            margin-bottom: 36px;
        }

        .actions {
            display: flex;
            gap: 14px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 12px 28px;
            border-radius: 999px;
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            transition: transform 0.15s ease, opacity 0.15s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
            opacity: 0.92;
        }

        .btn-primary {
            background: #2f6fed;
            color: #ffffff;
        }

        .btn-outline {
            background: transparent;
            color: #f5f7fa;
            border: 1px solid rgba(245, 247, 250, 0.35);
        }

        footer {
            margin-top: 56px;
            font-size: 13px;
            color: #7c8aa0;
        }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="eyebrow">Aashi Venture</div>
        <h1>Welcome to Aashi Venture</h1>
        <p class="lede">
            Built on decades of expertise, we create dependable products for protection,
            packaging, and everyday use.
        </p>
        <div class="actions">
            <a href="{{ route('login') }}" class="btn btn-primary">Admin Login</a>
            <a href="mailto:info@aashiventure.com" class="btn btn-outline">Contact Us</a>
        </div>
        <footer>&copy; {{ date('Y') }} Aashi Venture. All rights reserved.</footer>
    </div>
</body>
</html>
