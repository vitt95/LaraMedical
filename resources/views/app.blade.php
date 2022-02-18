<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>AdminKit Demo - Bootstrap 5 Admin Template</title>

    <link href="css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    @inertiaHead
</head>

<body>
    <div id="apps" class="wrapper">
        <div id="sidebarMount">
            <side-bar></side-bar>
        </div>
        <div class="main">
            <div id="navbarMount">
                <nav-bar csrf="{{csrf_token()}}" logout="{{route('logout')}}"></nav-bar>
            </div>
            <main class="content">
                <div id="inertia-c">
                    @inertia
                </div>
            </main>
            <div id="footerMount">
                <footer-component></footer-component>
            </div>
        </div>
    </div>
</body>

</html>
