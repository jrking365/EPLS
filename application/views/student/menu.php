<div class="row wrapper border-bottom white-bg page-heading">

    <div class="col-sm-6">
        <h2>Gestion des élèves</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index-2.html">Accueil</a>
            </li>
            <li class="active">
                <strong>Eleves</strong>
            </li>
        </ol>
    </div>


</div>
<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Choisir le niveau</h5>
                    <span class="label label-primary">Lvl+</span>
                </div>
                <div class="ibox-content">
                    <select class="form-control m-b" id="level" >
                        <option selected="" disabled="">Selectionner le niveau</option>
                        <?php
                        foreach ($levels as $level) {
                            ?>
                            <option value="<?= $level->id ?>" ><?= $level->title ?></option>
                            <?php
                        }
                        ?>
                    </select> 
                </div>

            </div>
        </div>
        <div class="col-lg-9">
            <div  id="element" >


            </div>

        </div>
    </div>
</div>