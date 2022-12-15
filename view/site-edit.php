{{ include('header.php', {title: 'modifier', pageHeader: 'modifier'})}}

<main class=" form-signin w-100 m-auto">

    <span class="error">{{ errors|raw }}</span>

    <form action="{{path }}site/update" method="post">

        <link rel="stylesheet" href="{{path}}css/signin.css">

        <input type="hidden" name="siteId" value="{{site.siteId}} ">
        <div class="form-group">
            <label for="exampleFormControlInput1">Nom de site</label>
            <input type="text" name="nomSite" value="{{site.nomSite}}" class=" form-control"
                id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Prix</label>
            <input type="numbre" name="prix" value="{{site.prix}}" class="form-control" id="exampleFormControlInput1"
                placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Nom du projet</label>
            <select class="form-control" id="exampleFormControlSelect1" name="siteProjetId">
                {% for projet in projets %}
                <option value="{{projet.projetId}}" {% if site.siteProjetId == projet.projetId %} selected {% endif %}>
                    {{projet.titre}}
                </option>
                {% endfor %}
            </select>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">modifier</button>


    </form>
    <form action="{{path }}site/delete" method="POST">
        <input type="hidden" name="siteId" value="{{site.siteId}}">

        <button class="w-100 btn btn-lg btn-danger" type="submit">supprimer</button>
    </form>
</main>
</body>

</html>