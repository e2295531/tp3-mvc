{{ include('header.php', {title: 'journal de bord', pageHeader: 'journal de bord'})}}




<div class="table-responsive">
    <table class="table-centered mb-0 table">
        <thead>
            <tr>
                <th scope="col">adresseIP</th>
                <th scope="col">date</th>
                <th scope="col">userName</th>


                <th scope="col">page</th>
                <th scope="col">suprimer</th>


            </tr>
        </thead>
        <tbody>
            {% for journal in journals %}
            <tr>
                <td>
                    <div class="d-flex align-items-center">

                        <div class="flex-grow-1 ms-2">{{journal.ip}}</div>
                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 ms-2">{{journal.date}}</div>
                    </div>

                </td>

                <td>
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 ms-2">{{journal.userName}}</div>
                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 ms-2">{{journal.page}}</div>
                    </div>
                </td>


                <td>
                    <form action="{{path }}journal/delete" method="POST">
                        <input type="hidden" name="id" value="{{journal.id}}">

                        <button class="btn btn-danger" type="submit">supprimer</button>
                    </form>
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>


</body>

</html>