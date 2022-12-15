<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="samira fennoun">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/blog/">
    <link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <meta name="theme-color" content="#712cf9">
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link href="{{path}}css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="{{path}}css/style.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <title>{{title}}</title>
    <link rel="stylesheet" href="{{path}}css/style.css">

</head>

<body>

    <div class="container">
        <header class="blog-header lh-1 py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-2 pt-1">
                    <a class="link-secondary" href="{{path}}home">Accueil</a>
                </div>
                {% if guest==false %}
                <div class="col-2 pt-1">
                    <a class="link-secondary" href="{{path}}site">liste des Sites</a>
                </div>
                {% endif %}
                <div class="col-4 text-center blog-header-logo text-dark">
                    {{ pageHeader}}
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">

                    {% if guest %}
                    <a class="btn btn-sm btn-outline-secondary" href="{{path}}user/login">login</a>
                    {% else %}
                    {% if session['privilege_id']=="1" %}
                    <a class="btn btn-sm btn-outline-secondary" href="{{path}}user/create">creer un compte</a>
                    {%endif%}
                    <a class="btn btn-sm btn-outline-secondary" href="{{path}}user/logout">logout</a>
                    {% endif %}
                </div>
            </div>
        </header>
        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">

                {% if guest==false %}

                {% if session['privilege_id']=="1" %}
                <a class="p-2 link-secondary" href="{{path}}journal">journal de bord</a>

                {%endif%}
                {% endif %}

            </nav>
        </div>