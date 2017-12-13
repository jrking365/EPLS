<!DOCTYPE html>
<html>



    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>EPLS</title>

        <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

        <link href="<?= base_url() ?>assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

        <link href="<?= base_url() ?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

        <link href="<?=  base_url()?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
        <link href="<?=  base_url()?>assets/css/plugins/steps/jquery.steps.css" rel="stylesheet">
        
        <link href="<?= base_url() ?>assets/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

        <link href="<?= base_url() ?>assets/css/animate.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

    </head>

    <body class="">

        <div id="wrapper">

            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav metismenu" id="side-menu">
                        <li class="nav-header">
                            <div class="dropdown profile-element"> 
                                <a data-toggle="dropdown" class="dropdown-toggle" src="<?= base_url() ?>assets/#">
                                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?= $utilisateur->nom . ' ' . $utilisateur->prenom ?></strong>
                                        </span> <span class="text-muted text-xs block">Administrateur <b class="caret"></b></span> </span> </a>
                                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                    <li><a href="<?= base_url() ?>assets/profile.html">Profil</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?= base_url() ?>Accueil/deconnexion">Déconnexion</a></li>
                                </ul>
                            </div>
                            <div class="logo-element">
                                EPLSV1
                            </div>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>accueil"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> </a>

                        </li>
                        <li>
                            <a href="<?= base_url() ?>Students"><i class="fa fa-sitemap"></i> <span class="nav-label">Elèves </span></a>

                        </li>
                        <li>
                            <a href="#"><i class="fa  fa-pie-chart"></i> <span class="nav-label">Evaluation (Notes)</span></a>

                        </li>
                        <li>
                            <a href="<?= base_url() ?>Employes"><i class="fa fa-users"></i> <span class="nav-label">Employés</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Enseignant</span><span class="fa arrow"></span> </a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="<?= base_url() ?>Teachers">gestion des Enseignant</a></li>
                                <li><a href="<?= base_url() ?>Teachers/parametre">Parametres</a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">Paramètres</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="<?= base_url() ?>#">Matiere</a></li>
                                <li><a href="<?= base_url() ?>#">Sessions</a></li>
                                <li><a href="<?= base_url() ?>#">Niveau</a></li> 
                                <li><a href="<?= base_url() ?>Adresses">Pays,Région,Ville</a></li>
                                <li><a href="<?= base_url() ?>#">Position Employé</a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-envelope"></i> <span class="nav-label">Discussions </span><span class="label label-warning pull-right">16/24</span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="<?= base_url() ?>#">Inbox</a></li>
                                <li><a href="<?= base_url() ?>#">Compose email</a></li>

                            </ul>
                        </li>
                    </ul>

                </div>
            </nav>

            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " src="<?= base_url() ?>assets/#"><i class="fa fa-bars"></i> </a>

                        </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <span class="m-r-sm text-muted welcome-message">Bienvenue sur votre interface d'administration</span>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" src="<?= base_url() ?>assets/#">
                                    <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                                </a>
                                <ul class="dropdown-menu dropdown-messages">
                                    <li>
                                        <div class="dropdown-messages-box">
                                            <a href="<?= base_url() ?>assets/profile.html" class="pull-left">
                                                <img alt="image" class="img-circle" src="<?= base_url() ?>assets/img/a7.jpg">
                                            </a>
                                            <div class="media-body">
                                                <small class="pull-right">46h ago</small>
                                                <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                                <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="dropdown-messages-box">
                                            <a href="<?= base_url() ?>assets/profile.html" class="pull-left">
                                                <img alt="image" class="img-circle" src="<?= base_url() ?>assets/img/a4.jpg">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right text-navy">5h ago</small>
                                                <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                                <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="divider"></li>
                                    <li>
                                        <div class="text-center link-block">
                                            <a href="<?= base_url() ?>assets/mailbox.html">
                                                <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" src="<?= base_url() ?>assets/#">
                                    <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                                </a>
                                <ul class="dropdown-menu dropdown-alerts">
                                    <li>
                                        <a href="<?= base_url() ?>assets/mailbox.html">
                                            <div>
                                                <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                                <span class="pull-right text-muted small">4 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="<?= base_url() ?>assets/profile.html">
                                            <div>
                                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                                <span class="pull-right text-muted small">12 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="<?= base_url() ?>assets/grid_options.html">
                                            <div>
                                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                                <span class="pull-right text-muted small">4 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="text-center link-block">
                                            <a href="<?= base_url() ?>assets/notifications.html">
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>


                            <li>
                                <a href="<?= base_url() ?>Accueil/deconnexion">
                                    <i class="fa fa-sign-out"></i> Deconnexion
                                </a>
                            </li>
                        </ul>

                    </nav>
                </div>