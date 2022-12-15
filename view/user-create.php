<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ path }}css/style.css">
    <link rel="stylesheet" href="{{ path }}css/signin.css">
    <title>creation du compte</title>
</head>

<body class="text-center">

    <main class="form-signin w-100 m-auto">
        <span class="error">{{ errors|raw }}</span>
        <form action="{{ path }}user /store" method="post">

            <h1 class="h3 mb-3 fw-normal">créer nouveau utilisateur</h1>

            <div class="form-floating">
                <input type="text" class="form-control" name="nom" value="{{ user.nom }}" id=" floatingInput"
                    placeholder="name">
                <label for="floatingInput">Nom</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="username" value="{{ user.username }}" id=" floatingInput"
                    placeholder="name">
                <label for="floatingInput">Nom d'utilisateur</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="col-md-12">
                {%  if session.privilege_id == 1 %}

                <select class="form-select" id="country" required name="privilege_id">
                    <option value="">Privilege</option>
                    {% for privilege in privileges%}
                    <option value="{{ privilege.id }}" {% if privilege.id == user.privilege_id %} selected {% endif %}>
                        {{ privilege.privilege }}
                    </option>
                    {% endfor %}
                </select>
                {% endif %}

                <label for="country" class="form-label"></label>
            </div>





            <button class="w-100 btn btn-lg btn-primary" type="submit">créer un compte</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2022 FENNOUN Samira.</p>
        </form>
    </main>
</body>

</html>