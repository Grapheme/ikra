<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
</head>
<body>
	<div>
        @if (isset($email) && $email)
            <p>
                email: {{ $email }}<br/>
            </p>
        @endif
        @if (isset($text) && $text)
            <p>
                Вопрос: {{ $text }}<br/>
            </p>
        @endif
	</div>
</body>
</html>