
<div class="row wrapper border-bottom white-bg page-heading">

    <div class="col-sm-4">
        <h2>Gestion des Enseignants</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index-2.html">Accueil</a>
            </li>
            <li class="active">
                <strong>Enseignants</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false"><i class="fa fa-user-plus"></i> Ajouter un enseignant</a>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">
            <div class=" animated fadeInRightBig">
                <div class="ibox">
                    <div class="ibox-title">
                        <div class="row">
                            <div class="col-lg-2">
                                <a href="#" class="btn   btn-primary" id="btn_generalList"><i class="fa fa-1x fa-address-book"></i> Liste Générale</a>
                            </div>
                            <div class="col-lg-offset-1 col-lg-4">

                                <select class="form-control m-b" id="typeGrade" >
                                    <option selected="" disabled="">En fonction du grade</option>
                                    <?php
                                    foreach ($grades as $grade) {
                                        ?>
                                        <option value="<?= $grade->id ?>"><?= $grade->title ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-offset-1 col-lg-4">

                                <select class="form-control m-b" id="typeLevel" >
                                    <option selected="" disabled="">En fonction du niveau</option>
                                    <?php
                                    foreach ($levels as $level) {
                                        ?>
                                        <option value="<?= $level->id ?>"><?= $level->title ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="ibox-content" id="show_element">

                    </div>

                </div>
            </div>
        </div>
    </div>



