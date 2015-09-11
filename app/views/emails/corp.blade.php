<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
</head>
<body>
	<div>
        @if (isset($name) && $name)
            <p>
                Имя: {{ $name }}
            </p>
        @endif
        @if (isset($email) && $email)
            <p>
                email: {{ $email }}
            </p>
        @endif
        @if (isset($phone) && $phone)
            <p>
                Телефон: {{ $phone }}
            </p>
        @endif
        @if (isset($company) && $company)
            <p>
                Компания: {{ $company }}
            </p>
        @endif
        @if (isset($topic) && $topic)
            <p>
                Интересующая тема: {{ $topic }}
            </p>
        @endif
    </div>
</body>
</html>