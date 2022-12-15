{{ include('header.php', {title: 'detail', pageHeader: 'details'})}}



<div class="col-md-12">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">Projet</strong>
            <h3 class="mb-0">{% for projet in projets %}

                {% if site.siteProjetId == projet.projetId %}

                {{projet.titre}}

                {% endif %}

                {% endfor %}
            </h3>
            <div class="mb-1 text-muted">site</div>
            <p class="card-text mb-auto">le nom du site est : {{site.nomSite}} </p>
            <a href=" {{path}}site" class="stretched-link">retour à la liste</a>
        </div>
        <div class="col-auto d-none d-lg-block">
            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img"
                aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text>
            </svg>

        </div>
    </div>
</div>

</body>

</html>