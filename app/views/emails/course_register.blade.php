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

        @if ((isset($direction) && $direction) || (isset($custom_topic) && $custom_topic))
            <p>
                Хочет обучаться:
                @if (isset($direction) && $direction)
                    {{ $direction }}
                @elseif (isset($custom_topic) && $custom_topic)
                    {{ $custom_topic }}
                @endif
            </p>
        @endif
	</div>
</body>
</html>