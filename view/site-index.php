{{ include('header.php', {title: 'liste des sites', pageHeader: 'liste des sites'})}}






{% if guest==false %}
{% if session['privilege_id']=="1" %}
<h2> <a href="site/create" class="font-18 text-dark me-2"><i class="fi fi-rr-add"></i>Nouveau</a></h2>

{% endif %}
{% endif %}

<div class="table-responsive">
    <table class="table-centered mb-0 table">
        <thead>
            <tr>
                <th scope="col">Nom de site</th>
                <th scope="col">Nom du projet</th>
                <th scope="col">Prix($)</th>
                {% if guest==false %}
                <th scope="col">Action</th>

                {% endif %}
            </tr>
        </thead>
        <tbody>
            {% for site in sites %}
            <tr>
                <td>
                    <div class="d-flex align-items-center">

                        <div class="flex-grow-1 ms-2">{{site.nomSite}}</div>
                    </div>
                </td>
                <td><i class="uil uil-calender me-1"></i> {% for projet in projets %}

                    {% if site.siteProjetId == projet.projetId %}

                    {{projet.titre}}

                    {% endif %}

                    {% endfor %}
                </td>
                <td><span class="bg-dark bg-gradient text-light badge bg-primary">{{site.prix}}</span></td>
                {% if guest==false %}

                <td><a class="font-18 text-info me-2" href="site/show/{{site.siteId}}"><i class="fi fi-ss-eye"></i></a>

                    {% if session['privilege_id']=="1" %}
                    <a class="font-18 text-danger" href="{{path}}site/edit/{{site.siteId}}"><i
                            class="fi fi-rr-edit"></i></a>
                    {% endif %}
                    <a target="_blank" href="site/print/{{site.siteId}}"><i class="fi fi-br-download"></i> </a>
                </td>{% endif %}
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>

</body>

</html>