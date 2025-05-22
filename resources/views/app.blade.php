<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    @routes
    @inertiaHead

</head>

<body class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-300">
    @inertia
</body>



</html>