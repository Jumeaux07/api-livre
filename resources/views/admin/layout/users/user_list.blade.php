@extends('admin.partials.index')
@section('content')
                <!-- Bread crumb and right sidebar toggle -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">UTILISATEURS</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0)">Tableau de bord</a>
                                </li>
                                <li class="breadcrumb-item active">Liste des utilisateurs</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">GESTION DES UTILISATEURS</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Tableau</h4>
                                <h6 class="card-subtitle"> Exporter les données vers, CSV, Excel, PDF & Print</h6>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- sample modal detail user -->
                                            <div id="user_detail" class="modal" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content modal-lg">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="vcenter">Détail utilisateur</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Column -->
                                                            <div class="col-lg-12">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <center class="m-t-30"> <img src="../assets/images/users/5.jpg" class="img-circle" width="150" />
                                                                            <h4 class="card-title m-t-10" id="user_nom">Zouzoua</h4>
                                                                            <h6 class="card-subtitle">STATUS: <b id="user_status"></b></h6>
                                                                            <h4>SCORE = <b id="user_score"></b> </h4>
                                                                            {{-- <div class="row text-center justify-content-md-center">
                                                                                <div class="col-6"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                                                                <div class="col-6"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                                                            </div> --}}
                                                                        </center>
                                                                    </div>
                                                                    <div>
                                                                        <hr> </div>
                                                                    <div class="card-body"> <small class="text-muted">Adresse Email</small>
                                                                        <h6 id="user_email" ></h6> <small id="user_phone" class="text-muted p-t-30 db">Phone</small>
                                                                        <h6 id="user_phone"></h6> <small class="text-muted p-t-30 db">Address</small>
                                                                        <h6 id="user_adresse"></h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Column -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger waves-effect text-white" data-bs-dismiss="modal">Fermer</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!--End sample modal detail user -->
                                            <!-- sample modal edit user -->
                                            <div id="user_edit" class="modal" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="vcenter">EDIT USER</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Column -->
                                                            <div class="col-lg-12">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="form p-t-20" id="user_update">
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputuname">Nom</label>
                                                                                        <div class="input-group mb-3 {{$errors->has('nom')? 'has-error':''}} ">
                                                                                                <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                                                                            <input type="text" id="nom" name="nom" class="form-control" value="{{old('nom')}}" placeholder="Nom" aria-label="Username" aria-describedby="basic-addon1">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputuname">Prénoms</label>
                                                                                        <div class="input-group mb-3 {{$errors->has('prenoms') ? 'has-error' :''}} ">
                                                                                                <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                                                                            <input type="text" id="prenoms" name="prenoms" class="form-control" value="{{old('prenoms')}}" placeholder="Prénoms" aria-label="Username" aria-describedby="basic-addon1">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputuname">Telephone</label>
                                                                                        <div class="input-group mb-3" {{$errors->has('phone') ? 'has-error' : ''}} >
                                                                                                <span class="input-group-text" id="basic-addon1"><i class="ti-mobile"></i></span>
                                                                                            <input type="text" id="phone" name="phone" value="{{old('phone')}}" class="form-control international-inputmask" id="international-mask" placeholder="Telephone" aria-label="Username" aria-describedby="basic-addon1">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputuname">Adresse Email</label>
                                                                                        <div class="input-group mb-3 {{$errors->has('email') ? 'has-error' : ''}} ">
                                                                                                <span class="input-group-text" id="basic-addon1"><i class="ti-email"></i></span>
                                                                                            <input type="text" id="email" name="email" value="{{old('email')}}" class="form-control email-inputmask" id="email-mask" placeholder="Adresse Email" aria-label="Username" aria-describedby="basic-addon1">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputuname">Adresse </label>
                                                                                        <div class="input-group mb-3" {{$errors->has('adresse') ? 'has-error' : ''}} >
                                                                                                <span class="input-group-text" id="basic-addon1"><i class="ti-direction"></i></span>
                                                                                            <input type="text" id="adresse" name="adresse" value="{{old('adresse')}}" class="form-control" placeholder="Adresse" aria-label="Username" aria-describedby="basic-addon1">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputuname">Score</label>
                                                                                        <div class="input-group mb-3" {{$errors->has('score') ? 'has-error' : ''}} >
                                                                                            <input type="number" name="user_id" id='user_id' hidden >
                                                                                                <span class="input-group-text" id="basic-addon1"><i class="ti-server"></i></span>
                                                                                            <input type="number" id="score" name="score" value="{{old('score')}}" class="form-control international-inputmask" id="international-mask" placeholder="Telephone" aria-label="Username" aria-describedby="basic-addon1">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <button onclick="updateUser();" class="btn btn-lg btn-success waves-effect waves-light m-r-10 text-white">Valider</button>
                                                                            <button type="reset" class="btn btn-lg btn-danger waves-effect waves-light">Restaurer</button>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <hr> </div>
                                                                </div>
                                                            </div>
                                                            <!-- Column -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger waves-effect text-white" data-bs-dismiss="modal">Fermer</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- End modal edit user -->
                                        </div>
                                    </div>
                                </div>
                                <!-- statistic of account user -->
                                <div class="row m-t-5">
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-success text-center">
                                                <h1 class="font-light text-white">{{$user_active}}</h1>
                                                <h6 class="text-white">Compte(s) activé(s)</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-warning text-center">
                                                <h1 class="font-light text-white">{{$user_attente}}</h1>
                                                <h6 class="text-white">Compte(s) En attente(s)</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card">
                                            <div class="box bg-danger text-center">
                                                <h1 class="font-light text-white">{{$user_desactive}}</h1>
                                                <h6 class="text-white">Compte(s) Désactivé(s)</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End statistic of account user -->
                                <!-- List user-->
                                <div class="table-responsive m-t-40">
                                    <table id="table_btn"
                                        class="display nowrap table table-hover table-striped border"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Nom</th>
                                                <th>Prenoms</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Adresse</th>
                                                <th>Status</th>
                                                <th>Score</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Nom</th>
                                                <th>Prenoms</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Adresse</th>
                                                <th>Status</th>
                                                <th>Score</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <th></th>
                                                    <th>{{$user->nom}}</th>
                                                    <th>{{$user->prenoms}}</th>
                                                    <th>{{$user->email}}</th>
                                                    <th>{{$user->phone}}</th>
                                                    <th>{{$user->adresse}}</th>
                                                    <th>
                                                        @if ($user->status == 0)
                                                        <span class="label label-table label-danger">Désactivé</span>
                                                        @endif
                                                        @if ($user->status == 1)
                                                        <span class="label label-table label-success">Active</span>
                                                        @endif
                                                        @if ($user->status == 2)
                                                        <span class="label label-table label-warning">En attente</span>
                                                        @endif
                                                    </th>
                                                    <th>{{$user->score}}</th>
                                                    <th>
                                                        <div class="btn-group" role="group" aria-label="First group">
                                                            <button type="button" data-bs-toggle="modal" data-bs-target="#user_edit" onclick="editUser({{$user->id}})" class="btn btn-secondary"><i class="ti-pencil"></i></button>
                                                            <button type="button" data-bs-toggle="modal" data-bs-target="#user_detail" onclick="showUser({{$user->id}});" class="btn btn-secondary"><i class="ti-eye"></i></button>
                                                            <button type="button" class="btn btn-secondary" onclick="activerUser({{$user->id}})" ><i class="ti-check-box"></i></button>
                                                            <button type="button" class="btn btn-secondary" onclick="desactiverUser({{$user->id}})" ><i class="ti-na"></i></button>
                                                        </div>
                                                    </th>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end List user-->
                            </div>
                        </div>
                    </div>
                </div>
@endsection
