<div class="table-responsive">
    <h3>Liste des employés qui ont pour poste : <?= $pos->title?></h3>
    <table class="table table-striped table-bordered table-hover dataTables-example" >
        <thead>
            <tr>
                <th>Prenom & Nom</th>
                <th>Sexe</th>
                <th>Date de recrutement</th>
                <th>Poste</th>
                <th>statut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <!-- mettre le foreach ici-->
            <?php
            foreach ($employees as $employee) {
                ?>
            <td><?= $employee->firstname . ' ' . $employee->name ?></td>
            <td><?= $employee->gender ?></td>
            <td><?= date("l jS \, F Y", strtotime($employee->hiring_date)) ?></td>
            <td><?= $employee->position ?></td>
            <?php
            switch ($employee->status) {
                case 1:
                    echo'<td><span class="label  label-warning">Pas actif</span></td>';
                    break;
                case 2:
                    echo'<td><span class="label label-primary">Actif</span></td>';
                    break;
            }
            $id = $employee->idE;
            ?>
            <td>
                <div class="btn-group">
                    <!--<?//= base_url()?>Employes/Details/<?//=$id?>-->
                    <a href="#" class="btn-white btn btn-xs" data-toggle="modal" data-target="#myModal5">Details</a>
                    <a href="<?= base_url() ?>Employes/Modifier/<?=$employee->idE?>" class="btn-info btn btn-xs">Modifier</a>
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
                <th>Date de recrutement</th>
                <th>Poste</th>
                <th>statut</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>