<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ path }}css/style.css">
    <link rel="stylesheet" href="{{ path }}css/signin.css">
    <title>login</title>
</head>

<body class="text-center">

    <main class="form-signin w-100 m-auto">
        <span class="error">{{ errors|raw }}</span>
        <form action="{{ path }}user/auth" method="post">

            <h1 class="h3 mb-3 fw-normal">connectez-vous</h1>

            <div class="form-floating">
                <input type="email" class="form-control" name="username" value="{{user.username}}" id="floatingInput"
                    placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>


            <button class="w-100 btn btn-lg btn-primary" type="submit">Connecter</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2022 FENNOUN Samira.</p>
        </form>
    </main>



</body>

</html>