<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>{{ $title }} · Практическая работа №11</title>
    <style>
        body {
            margin: 0;
            padding: 72px 18px 18px;
            font-family: "Segoe UI", system-ui, sans-serif;
            color: #1f2937;
            background: #f8fafc;
        }
        .card {
            max-width: 100%;
            box-sizing: border-box;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px 22px;
            box-shadow: 0 1px 2px rgba(16, 24, 40, .06);
        }
        h1 {
            margin: 0 0 8px;
            font-size: 24px;
            line-height: 1.2;
        }
        p {
            margin: 0 0 14px;
            font-size: 15px;
        }
        code {
            display: inline-block;
            margin-top: 4px;
            padding: 4px 8px;
            border-radius: 6px;
            background: #eff6ff;
            color: #1d4ed8;
            font-family: Consolas, monospace;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>{{ $title }}</h1>
        <p>{{ $text }}</p>
        <code>маршрут: {{ $route }}</code>
    </div>
</body>
</html>
