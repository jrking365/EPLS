<div class="modal inmodal fade" id="myModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-user-plus modal-icon"></i>
                <h4 class="modal-title">Ajouter un Enseignant</h4>
                <small class="font-bold">Remplissez tous les informations du formulaire pour ajouter un Enseignant</small>
            </div>
            <div class="modal-body">
                <div class="ibox-content">
                    <small>*: Obligatoire</small><br><br>
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('Teachers/add'); ?>
                    <!--<form role="form" id="form ">-->
                        
                        <div class="form-group"><label>employe*:</label> 
                            <input type="text" placeholder="employe" class="typeahead_2 form-control" name="employe" value="<?= set_value('employe')?>"/>
                        </div>
                        <label>Grade*:</label>  <select class="form-control m-b" required="" id="region" name="grade" >
                            <option selected="" ><?= set_value('grade'); ?></option>
                            <?php
                            foreach ($grades as $grade) {
                                ?>
                                <option value="<?= $grade->id ?>"><?= $grade->title ?></option>
                                <?php
                            }
                            ?>

                        </select>
                        <label>NIveau d'enseignement*:</label>  <select class="form-control m-b" required="" id="region" name="niveau" >
                            <option selected="" ><?= set_value('niveau'); ?></option>
                            <?php
                            foreach ($levels as $level) {
                                ?>
                                <option value="<?= $level->id ?>"><?= $level->title ?></option>
                                <?php
                            }
                            ?>
                        </select>

                       
                       

                       


                        <div>
                            <button class="btn btn-md btn-primary m-t-n-xs" type="submit" id="enregistrer"><strong>Submit</strong></button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>

            </div>
        </div>
    </div>
</div>