<div class="table-responsive">
    <h3>Liste générale des Enseignants</h3>
    <table class="table table-striped table-bordered table-hover dataTables-example" >
        <thead>
            <tr>
                <th>Prenom & Nom</th>
                <th>Sexe</th>
                <th>Grade d'enseignant</th>
                <th>Niveau d'enseignement</th>
                <th>statut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <!-- mettre le foreach ici-->
            <?php
            foreach ($teachers as $teacher) {
                ?>
            <td><?= $teacher->firstname . ' ' . $teacher->name ?></td>
            <td><?= $teacher->gender ?></td>
            <td><?= $teacher->grade ?></td>
            <td><?= $teacher->level ?></td>
            <?php
            switch ($teacher->status) {
                case 1:
                    echo'<td><span class="label  label-warning">Pas actif</span></td>';
                    break;
                case 2:
                    echo'<td><span class="label label-primary">Actif</span></td>';
                    break;
            }
            $id = $teacher->idE;
            ?>
            <td>
                <div class="btn-group">
                    <!--<?//= base_url()?>Employes/Details/<?//=$id?>-->
                    <a href="#" class="btn-white btn btn-xs" data-toggle="modal" data-target="#myModal5">Details</a>
                    <a href="<?= base_url() ?>Employes/Modifier/<?=$teacher->idE?>" class="btn-info btn btn-xs">Modifier</a>
                </div>
            </td>
            <?php
        }
        ?>

        </tbody>
        <tfoot>
            <tr>
                <th>Prenom & Nom</th>
                <th>Sexe</th>
                <th>Grade d'enseignant</th>
                <th>Niveau d'enseignement</th>
                <th>statut</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>