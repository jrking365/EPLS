<div class="modal inmodal fade" id="myModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-user-plus modal-icon"></i>
                <h4 class="modal-title">Ajouter un employé</h4>
                <small class="font-bold">Remplissez tous les informations du formulaire pour ajouter un employé</small>
            </div>
            <div class="modal-body">
                <div class="ibox-content">
                    <small>*: Obligatoire</small><br><br>
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('Employes/addEmploye'); ?>
                    <!--<form role="form" id="form ">-->
                        <div class="form-group">
                            <label class="label-primary"><h3 class="">Informations sur la personne:</h3></label>
                        </div>

                        <div class="form-group"><label>Prenom*:</label> 
                            <input type="text" placeholder="Entrez le prénom" class="form-control"  required name="firstname" value="<?= set_value('firstname'); ?>" >
                        </div>
                        <div class="form-group"><label>Nom*:</label> 
                            <input type="text" placeholder="Entrez le Nom" class="form-control" required name="lastname" value="<?= set_value('lastname') ?>"  >
                        </div>


                        <div class="form-group" id="data_2">
                            <label>Date de Naissance*:</label> 
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" placeholder="Date de Naissance" required name="dob" value="<?= set_value('dob') ?>">
                            </div>
                        </div>

                        <label>Sexe*:</label>  <select class="form-control m-b" required="" name="gender"  >
                            <option selected=""><?= set_value('gender') ?> </option>
                            <option>Féminin</option>
                            <option>Masculin</option>

                        </select>
                        <div class="form-group"><label>Email*:</label> 
                            <input type="email" placeholder="Entrer l'adresse email" class="form-control" required name="email" value="<?= set_value('email') ?>">
                        </div>
                        
                        <div class="form-group"> <!-- http://jasny.github.io/bootstrap/ pour gérer les numeros -->
                            <label>Téléphone*:</label>
                            <div>
                                <input type="text"  placeholder="Entrer le numéro de telephone" class="form-control" data-mask="(999) 999-9999" required name="phone" value="<?= set_value('phone') ?>">
                                <span class="help-block">(999) 999-9999</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label-primary"><h3 class="">Adresse et numero civique:</h3></label>
                        </div>
                        <label>Région*:</label>  <select class="form-control m-b" required="" id="region" name="region" >
                            <option selected="" ><?= set_value('region'); ?></option>
                            <?php
                            foreach ($regions as $region) {
                                ?>
                                <option value="<?= $region->id ?>"><?= $region->name ?></option>
                                <?php
                            }
                            ?>

                        </select>
                        <label>Ville*:</label>  <select class="form-control m-b" required="" id="ville" name="city" >
                            <option  selected=""><?= set_value('city') ?></option>


                        </select>
                        <div class="form-group"><label>Rue:</label> 
                            <input type="text" placeholder="Entrer la rue" class="form-control" name="street" value="<?= set_value('street') ?>" >
                        </div>
                        <div class="form-group"><label>Civic Number*:</label> 
                            <input type="number" placeholder="Entrer le Civic Number" class="form-control" required name="civicnumber" value="<?= set_value('civicnumber') ?>">
                        </div>
                        <div class="form-group"><label>Code Postal:</label> 
                            <input type="text" placeholder="Entrer le code postal" class="form-control" name="postalcode" value="<?= set_value('postalcode') ?>" >
                        </div>

                        <div class="form-group">
                            <label class="label-primary"><h3 class="">Information sur l'emploi:</h3></label>
                        </div>

                        <label>Poste*:</label>  <select class="form-control m-b" required="" name="position"  >
                            <option selected="" ><?= set_value('position') ?></option>
                            <?php
                            foreach ($positions as $position) {
                                ?>
                                <option value="<?= $position->id ?>"><?= $position->title ?></option>
                                <?php
                            }
                            ?>
                        </select>




                        <div class="form-group" id="data_1">
                            <label>Date d'embauche*:</label> 
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" placeholder="date d'embauche" required name="hiring_date" value="<?= set_value('hiring_date') ?>">
                            </div>
                        </div>


                        <div class="form-group"><label>Commentaires:</label> 

                            <textarea  title="Commentaire" class="form-control" name="comment"><?= set_value('comment') ?></textarea>
                        </div>




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