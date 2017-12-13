<div class="ibox-content table-responsive animated fadeInRightBig">
    <div class="row" style="margin-bottom: 20px">
        <div class="col-sm-8">
            <h2>Liste des etudiants du niveau : <strong><?= strtoupper($level->title) ?></strong></h2>
        </div>
        <div class="col-sm-offset-1 col-sm-3">
            <a href="#" class="btn btn-primary"data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false"><i class="fa fa-user-plus"></i> Ajouter un eleve</a>
        </div>
    </div>    
    <table class="table table-striped table-bordered table-hover dataTables-example" >
        <thead>
            <tr>
                <th>Matricule</th>
                <th>Prenom & Nom</th>
                <th>Sexe</th>
                <th>Née le</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- mettre le foreach ici -->


        </tbody>
        <tfoot>
            <tr>
                <th>Matricule</th>
                <th>Prenom & Nom</th>
                <th>Sexe</th>
                <th>Date de naissance</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>