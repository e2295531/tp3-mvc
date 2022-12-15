<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{path}}css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <title>Document</title>
    <style>
    h1 {
        text-align: center;
    }
    </style>
</head>

<body>
    <h1><?= $selectSite['nomSite'] ?> </h1>
    <div class="col-md-12">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary">detail de site</strong>
                <h3 class="mb-0"> </h3>

                <p class="card-text mb-auto">le nom du site est :<?= $selectSite['nomSite'] ?> </p>
                <p class="card-text mb-auto">le prix du site est :<?= $selectSite['prix'] ?> </p>
                <p class="card-text mb-auto">le nom du projet est :<?php

                  foreach ($selectProjet as $row) {
                    if($row['projetId']== $selectSite['siteProjetId']){
                        echo $row['titre'];
                    }
                  }
                                                                    
                
                ?> </p>

            </div>
            <div class="col-auto d-none d-lg-block">
                <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img"
                    aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                        dy=".3em"></text>
                </svg>

            </div>
        </div>
    </div>

</body>

</html>