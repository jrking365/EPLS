
<div class="row wrapper border-bottom white-bg page-heading">

    <div class="col-sm-6">
        <h2>Parametrages / Gestion des enseignants</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index-2.html">Enseignants</a>
            </li>
            <li class="active">
                <strong>Parametres</strong>
            </li>
        </ol>
    </div>


</div>
<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-content">
                    <h3>Grade d'enseignant</h3>
                    <p class="small"><i class="fa fa-hand-o-up"></i> Enregistrer un nouveau grade</p>

                     <?php echo validation_errors(); ?>
                     <?php echo form_open('Teachers/addGrade'); ?>
                        <div class="input-group">
                            <input type="text" placeholder="Ajouter un grade. " class="input input-sm form-control" name="grade" value="<?= set_value("grade")?>" required="">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-sm btn-white"> <i class="fa fa-plus"></i> ajouter grade</button>
                            </span>
                        </div>
                    </form>

                    <ul class="sortable-list connectList agile-list" id="todo">
                       <?php
                       foreach ($grades as $grade){
                        ?>
                         <li class="success-element" id="task2">
                           <?= strtoupper($grade->title) ?>
                            <div class="agile-detail">
                                <a href="#" class="pull-right btn btn-xs btn-info" style="margin-left:  10px"> <i class="fa fa-edit"></i></a>
                                <a href="#" class="pull-right btn btn-xs btn-danger"> <i class="fa fa-times"></i></a><br>
                                
                            </div>
                        </li>
                        <?php
                       }
                       ?>
                    </ul>
                </div>
            </div>
        </div>

         <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-content">
                    <h3>Niveau d'enseignement</h3>
                    <p class="small"><i class="fa fa-hand-o-up"></i> Enregistrer un nouveau Niveau</p>

                    <?php echo validation_errors(); ?>
                     <?php echo form_open('Teachers/addLevel'); ?>
                        <div class="input-group">
                            <input type="text" placeholder="Ajouter un Niveau. " class="input input-sm form-control" name="level" value="<?= set_value("level")?>" required="">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-sm btn-white"> <i class="fa fa-plus"></i> ajouter Niveau</button>
                            </span>
                        </div>
                    </form>

                    <ul class="sortable-list connectList agile-list" id="todo">
                       <?php
                       foreach ($levels as $level){
                        ?>
                         <li class="success-element" id="task2">
                           <?= strtoupper($level->title) ?>
                            <div class="agile-detail">
                                <a href="#" class="pull-right btn btn-xs btn-info" style="margin-left:  10px"> <i class="fa fa-edit"></i></a>
                                <a href="#" class="pull-right btn btn-xs btn-danger"> <i class="fa fa-times"></i></a><br>
                                
                            </div>
                        </li>
                        <?php
                       }
                       ?>
                    </ul>
                </div>
            </div>
        </div>


    </div>

</div>




