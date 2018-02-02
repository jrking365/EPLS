<div class="modal inmodal fade" id="myModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-user-plus modal-icon"></i>
                <h4 class="modal-title">Ajouter un étudiant</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">

                            <div class="ibox-content">

                                <form id="form" action="#" class="wizard-big form-horizontal">
                                    <h1>Enfant</h1>
                                    <fieldset>
                                        <h2>Informations sur l'eleve</h2>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Nom*:</label>
                                                    <div class="col-lg-10">
                                                        <input id="lastName" name="lastName" type="text" class="form-control ">  
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Prenom*:</label>
                                                    <div class="col-lg-10">
                                                        <input id="firstName" name="firstName" type="text" class="form-control ">  
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Sexe*:</label> 
                                                    <div class="col-lg-10">
                                                        <select class="form-control m-b"  name="gender"  >
                                                            <option selected=""><?= set_value('gender') ?></option>
                                                            <option>Féminin</option>
                                                            <option>Masculin</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group" id="data_2">
                                                    <label class="col-lg-2 control-label" >Née le*:</label> 
                                                    <div class="col-lg-10">
                                                        <div class="input-group date ">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" placeholder="Date de Naissance"  name="dob" value="<?= set_value('dob') ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">MinistryID*:</label>
                                                    <div class="col-lg-10">
                                                        <input id="ministryid" name="ministryid" type="text" class=" form-control ">  
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">healthcareID*:</label>
                                                    <div class="col-lg-10">
                                                        <input id="healthcareID" name="healthcareID" type="text" class=" form-control ">  
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </fieldset>
                                    <h1>Parents/Tuteurs</h1>
                                    <fieldset>
                                        <h2>Informations sur les parents/tuteurs</h2>
                                        <div class="row">

                                        </div>
                                    </fieldset>

                                    <h1>Eleve</h1>
                                    <fieldset>
                                        <h2>Informations sur l'eleve</h2>
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Categorie*:</label> 
                                                <div class="col-lg-10">
                                                    <select class="form-control m-b"  name="category"  >
                                                        <option selected=""><?= set_value('category') ?></option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Niveau*:</label>
                                                <div class="col-lg-10">
                                                    <input id="level" name="level" disabled="" type="text" class="form-control" value="<?=$level->title?>">  
                                                </div>
                                            </div>


                                        </div>
                                    </fieldset>

                                    <h1>Fin</h1>
                                    <fieldset>
                                        <h2>Verification</h2>
                                        <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">J'ai vérifié les informations entrées et je valide la création de l'eleve.</label>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>  
            </div>


        </div>
    </div>
</div>