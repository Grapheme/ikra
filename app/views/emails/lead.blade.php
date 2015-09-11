<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
</head>
<body>
	<div>

        <p>
            Курс:
            <a href="{{ URL::route('page.course', ['city_slug' => $city->slug, 'course_id' => $course->id]) }}">{{ $course->name }}</a>
            ({{ $city->name }})
        </p>

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
	</div>
</body>
</html>