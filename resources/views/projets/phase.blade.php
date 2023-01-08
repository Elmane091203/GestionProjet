<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gestion de Projet</title>
    <link rel="stylesheet" href={{ asset('css/bootstrap.css') }}>
</head>

<body class="bg-dark">
    <div class="container mt-5">
        <div class="card m-2 p-2 bg-secondary">
            <div class="card-head h4 bg-warning p-2">
                <div class="text-center text-primary">Veuillez remplir les champs</div>
                @if (session('message')!=null)
                <div class="alert alert-danger">{{ session('message') }}</div>
                @endif
            </div>
        </div>
        <div class="card mt-4 col-md-8 offset-md-2">
            <div class="h4 text-center bg-primary p-2 text-white">Formulaire d'ajout d'une phase</div>
            <div class="card-body text-center">
                <form action="/ajouter" class="align-middle" method="post">
                    @method('head')
                    <div class="row col-md-12 mt-3">
                        <label for="" class="col-md-4 h5 text-left pt-1">Nom de la Phase</label>
                        <input name="nomPhase" type="text" class="form-control col-md-8">
                    </div>
                    <div class="row col-md-12 mt-3">
                        <label for="" class="col-md-4 h5 text-left pt-1">Duree de la Phase</label>
                        <input type="number" value="0" class="form-control col-md-2" placeholder="jour" name="jour" min="0">
                        <input name="heure" value="0" type="number" class="form-control col-md-2" placeholder="h" max="23" min="0">
                        <input name="min" value="0" type="number" class="form-control col-md-2" placeholder="min" max="59" min="0">
                    </div>
                    <div class="row col-md-12 mt-3">
                        <label for="" class="col-md-4 h5 text-left pt-1">Priorite</label>
                        <select name="priorite"  class="form-control col-md-8">
                            <option value="Importante et Urgente">Importante et Urgente</option>
                            <option value="Non-Importante et Urgente">Non-Importante et Urgente</option>
                            <option value="Importante et Non-Urgente">Importante et Non-Urgente</option>
                            <option value="Non-Importante et Non-Urgente">Non-Importante et Non-Urgente</option>
                        </select>
                    </div>
                    <div class="row col-md-12 mt-3">
                        <input name="idProjet" hidden value="{{ $_GET['idP'] }}" class="form-control col-md-8">
                    </div>
                    <button type="submit" class="btn btn-success btn-lg" onclick="window.location='/ajouter'">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>