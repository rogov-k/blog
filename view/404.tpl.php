<!DOCTYPE html>
<html>
<head>
    <title>@Snowcake</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @font-face {
            font-family: "Plumb";
            src: url('../font/NotoSans-Regular.ttf') format('truetype');
        }

        .body {
            background: #f1f1f1;
            margin: 0;
        }

        .error {
            height: 180px;
            width: 236px;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;

        }

        .error span {
            display: block;
            color: #D58787;
            font: 64px/60px 'Plumb', sans-serif;
        }

        .error span.q {
            color: rgba(0, 0, 0, .6);
            text-align: right;
        }
    </style>
</head>
<body>
<div class="error">
    <span>Четыре</span>
    <span class="q">Ноль</span>
    <span>Четыре</span>
</div>
</body>
</html>