<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">



        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- ChartJS -->
        <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
        <!-- Sparkline -->
        <script src="{{ asset('assets/plugins/sparklines/sparkline.js') }}"></script>
        <!-- JQVMap -->
        <script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
        <!-- daterangepicker -->
        <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <!-- Summernote -->
        <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="#" class="nav-link"></a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="/logout" onclick="event.preventDefault();
                                        this.closest('form').submit();" class="nav-link">
                                <p>
                                    D??connexion
                                </p>
                            </a>
                        </form>
                    </li>
                </ul>
            </nav>
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="#" class="brand-link">
                    <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">GesAllocations</span>
                </a>

                <div class="sidebar">
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="assets/dist/img/t??l??chargement.png" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                        </div>
                    </div>
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            @if(Auth::user()->isUser())
                                <li class="nav-item">
                                    <a href="/dashboard" class="nav-link"> 
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Accueil
                                    </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/verifiedInfos" class="nav-link active"> 
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        V??rifier ses informations
                                    </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="faire_demande" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Faire une demande
                                    </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/suivre_demande" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Suivre ma demande
                                    </p>
                                    </a>
                                </li>
                            @elseif(Auth::user()->isAdmin())
                                <li class="nav-item">
                                    <a href="envoitresor" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Valider demande
                                    </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="envoitresor" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Liste des demandes
                                    </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="envoitresor" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                    Envoyer les demandes ?? la DBAU
                                    </p>
                                    </a>
                                </li>
                                
                            @endif

                        </ul>
                    </nav>
                </div>
            </aside>

            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                  <div class="container-fluid">
                    <div class="row mb-2">
                      <div class="col-sm-6">
                        <h1>Mettre ?? jour ses informations</h1>
                      </div>
                      <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                          <li class="breadcrumb-item active">Mettre ?? jour ses informations</li>
                        </ol>
                      </div>
                    </div>
                  </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title text-center">Mettre ?? jour ses informations</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          @if ($errors->has('message'))
                                <span class="text-center text-danger">{{ $errors->first('message')}}</span>
                            @endif
                          <form action="/updateInfos" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Num??ro matricule</label>
                                            <input disabled  type="text" value="{{ $infos->matricule }}" class="form-control" name="numMat" id="exampleInputEmail1" placeholder="Entrez matricule">
                                            <input hidden type="text" value="{{ $infos->matricule }}" class="form-control" name="numMatricule" id="exampleInputEmail1" placeholder="Entrez matricule">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nom </label>
                                            <input  required type="text" class="form-control" name="nom" value="{{ $infos->nom }}"  id="exampleInputEmail1" placeholder="Entrez matricule">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pr??nom </label>
                                            <input type="text" value="{{ $infos->prenom }}" class="form-control"  name="prenom" id="exampleInputEmail1" placeholder="Entrez matricule">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Date de naissance</label>
                                            <input type="text" value="{{ $infos->dateNais }}" class="form-control"  name="dateNais" id="exampleInputEmail1" placeholder="Entrez matricule">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Lieu de naissance</label>
                                            <input type="text" value="{{ $infos->lieuNais }}" class="form-control"  name="lieuNais" id="exampleInputEmail1" placeholder="Entrez matricule">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Sexe </label>
                                            <input type="text" value="{{ $infos->sexe }}" class="form-control"  name="sexe" id="exampleInputEmail1" placeholder="Entrez matricule">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Date inscription</label>
                                            <input type="text" value="{{ $infos->dateIns }}" class="form-control"  name="dateIns" id="exampleInputEmail1" placeholder="Entrez matricule">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Universite </label>
                                            <input disabled type="text" value="{{ $infos->universite }}" class="form-control"  name="universite" id="exampleInputEmail1" placeholder="Entrez matricule">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Etablissement </label>
                                            <input disabled type="text" value="{{ $infos->etablissement }}" class="form-control"  name="etablissement" id="exampleInputEmail1" placeholder="Entrez matricule">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Fili??re </label>
                                            <input type="text" value="{{ $infos->filliereAnnee }}" class="form-control"  name="filliereAnnee" id="exampleInputEmail1" placeholder="Entrez matricule">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Taux mensuel </label>
                                            <input disabled type="text" value="{{ $infos->tauxMensuel }}" class="form-control"  name="tauxMensuel" id="exampleInputEmail1" placeholder="Entrez matricule">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Type allocations </label>
                                            <input disabled type="text" value="{{ $infos->typeAllocat }}" class="form-control"  name="typeAllocat" id="exampleInputEmail1" placeholder="Entrez matricule">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">RIB </label>
                                            <input type="text" value="{{ $infos->RIB }}" class="form-control"  name="RIB" id="exampleInputEmail1" placeholder="Entrez matricule">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Banque </label>
                                            <input type="text" value="{{ $infos->banque }}" class="form-control"  name="banque" id="exampleInputEmail1" placeholder="Entrez matricule">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Montant net </label>
                                            <input disabled type="text" value="{{ $infos->montantNet }}" class="form-control"  name="montantNet" id="exampleInputEmail1" placeholder="Entrez matricule">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Retenue</label>
                                            <input type="text" value="{{ $infos->retenue }}" class="form-control"  name="retenue" id="exampleInputEmail1" placeholder="Entrez matricule">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Annee Academique</label>
                                            <input type="text" value="{{ $infos->anneeAcademique }}" class="form-control"  name="anneeAcademique" id="exampleInputEmail1" placeholder="Entrez matricule">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Intitul?? etat</label>
                                            <input type="text" value="{{ $infos->intitul??Etat }}" class="form-control"  name="intitul??Etat" id="exampleInputEmail1" placeholder="Entrez matricule">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">D??but echeance</label>
                                            <input type="text" value="{{ $infos->debutEcheance }}" class="form-control"  name="debutEcheance" id="exampleInputEmail1" placeholder="Entrez matricule">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Fin echeance</label>
                                            <input type="text" value="{{ $infos->finEcheance }}" class="form-control"  name="finEcheance" id="exampleInputEmail1" placeholder="Entrez matricule">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Mettre ?? jour</button>
                            </div>
                          </form>
                        </div>
                      </div>

                    </div>
                    <!-- /.row -->
                  </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
              </div>
        </div>
    </body>
</html>
