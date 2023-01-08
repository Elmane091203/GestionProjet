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
        <div class="card m-2 p-2 text-center">
            <div class="card-head h4 bg-warning p-2">
                <div class="text-center text-primary">Details du projet {{$detP["projet"][0]->nomProjet}}</div>
            </div>
            <div class="card-body">
                <div class="row col-md-12 mt-3">
                    <label for="" class="col-md-4 h5 text-left pt-1">Nom du Projet</label>
                    <label for="" class="col-md-8 h5 text-left pt-1">{{ $detP["projet"][0]->nomProjet}}</label>
                </div>
                <div class="row col-md-12 mt-3">
                    <label for="" class="col-md-4 h5 text-left pt-1">Description du Projet</label>
                    <textarea name="description" readonly cols="30" rows="1" class="form-control col-md-8">{{ $detP["projet"][0]->description}}</textarea>
                </div>
                <div class="row col-md-12 mt-3">
                    <label for="" class="col-md-4 h5 text-left pt-1">Date de debut du Projet</label>
                    <label for="" class="col-md-8 h5 text-left pt-1">{{ $detP["projet"][0]->date_debut}}</label>
                </div>
                <div class="row col-md-12 mt-3">
                    <label for="" class="col-md-4 h5 text-left pt-1">Date de fin du Projet</label>
                    <label for="" class="col-md-8 h5 text-left pt-1">{{ $detP["projet"][0]->date_fin}}</label>
                </div>
            </div>
            <div class="card-footer text-center">
                <button class="btn btn-success btn-lg col-md-4" onclick="window.location=`/ajoutPhase?idP={{$detP['projet'][0]->id}}`">Ajouter une phase</button>
                <span class="col-md-2 offset-3"></span>
                <button class="btn btn-secondary btn-lg col-md-4" onclick="window.location='/'">Afficher les projets</button>

            </div>
        </div>
        <div class="card m-2 mt-4">
            <div class="card-body">
                
            <div class="card-head h4 bg-primary p-2">
                <div class="text-center text-warning">Listes des phases du projet {{$detP["projet"][0]->nomProjet}}</div>
            </div>
                @if (empty($detP["phases"]))
                <div class="alert alert-secondary text-center">Aucunne phase n'a été ajouté à ce projet!</div>
                @else
                <table id="example" class="table-bordered table-striped thead-light w-100 text-center">
                    <thead>
                        <th>Id</th>
                        <th>Nom de la phase</th>
                        <th>Duree</th>
                        <th>Priorite</th>
                    </thead>
                    <tbody>
                        @foreach ($detP['phases'] as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->nomPhase }}</td>
                            <td>{{ $p->durree }}</td>
                            <td>{{ $p->priorite }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</body>

</html>