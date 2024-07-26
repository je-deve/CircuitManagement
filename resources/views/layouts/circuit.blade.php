<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عنوان الصفحة</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- تضمين ملفات CSS أخرى حسب الحاجة -->
</head>
<body>
<!-- إضافة التنقل والمحتويات الثابتة هنا -->
@yield('content')
<!-- تضمين ملفات JS حسب الحاجة -->
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
