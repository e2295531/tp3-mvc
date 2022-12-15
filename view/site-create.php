{{ include('header.php', {title: 'nouveau Site', pageHeader: 'Nouveau Site'})}}



<main class="form-signin w-100 m-auto">
    <span class="error">{{ errors|raw }}</span>
    <form action="{{path}}site/store" method="post">

        <h1 class="h3 mb-3 fw-normal">gestion nouveau site</h1>

        <div class="form-floating">
            <input type="text" class="form-control" name="nomSite" value="{{ site.nomSite }}" id=" floatingInput"
                placeholder="name">
            <label for="floatingInput">Nom de site</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" name="prix" value="{{ site.prix }}" id=" floatingInput"
                placeholder="name">
            <label for="floatingInput">prix($)</label>
        </div>

        <div class="col-md-12">
            <select class="form-select" id="country" required name="siteProjetId" value="{{ site.siteProjetId }}">

                {% for projet in projets %}
                <option value="{{projet.projetId}}">{{projet.titre}}</option>
                {% endfor %}
            </select>


            <label for="country" class="form-label"></label>
        </div>





        <button class="w-100 btn btn-lg btn-primary" type="submit">créer un compte</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2022 FENNOUN Samira.</p>
    </form>
</main>
</body>

</html>