<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>EPLS Connexion</title>

        <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

        <link href="<?= base_url() ?>assets/css/animate.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

    </head>

    <body class="gray-bg">

        <div class="loginColumns animated fadeInDown">
            <div class="row">

                <div class="col-md-6">
                    <h2 class="font-bold">Bienvenu sur EPLSV1</h2>
                    <small>Gestion Scolaire</small> <br><br><br>

                    <p>
                        Gérez vos élèves, de leur enregistrement jusqu'a leur notes et l'établissement de leur relevé de note
                    </p>

                    <p>
                        Donnez la possibilité aux parents de consulter l'évolution de leurs enfants (notes, conduite)
                    </p>

                    <p>
                        Gérez vos employés et vos enseignants, leur salles de cours, leur niveau
                    </p>

                    <p>
                        <small>Nous dématérialisons la gestion de votre institut</small>
                    </p>

                </div>
                <div class="col-md-6">
                    <div class="ibox-content">
                        <?php echo validation_errors(); ?>
                        <?php if (isset($error)) : ?>
                            <div class="alert alert-danger">
                                <strong> <?= $error ?> </strong>
                            </div>
                        <?php endif; ?>
                        <?php echo form_open('login'); ?>
                        <!--<form class="m-t" role="form" action="">-->
                        <div class="form-group">
                            <input type="text" name="login" required="" placeholder="Nom Utilisateur " class="form-control"  value="<?php echo set_value('login') ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" name="motpasse" class="form-control" placeholder="Mot de passe" required="" value="<?php echo set_value('motpasse') ?>">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Se connecter</button>

                        
                        </form>
                        <p class="m-t">
                            <small>EPLSV1 By JrKing &copy; 2017</small>
                        </p>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-6">
                    Copyright JrKing365
                </div>
                <div class="col-md-6 text-right">
                    <small>© 2017</small>
                </div>
            </div>
        </div>

    </body>



</html>
