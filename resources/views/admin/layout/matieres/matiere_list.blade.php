@extends('admin.partials.index')
@section('content')
    <!-- Bread crumb and right sidebar toggle -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">MATIERE</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0)">Tableau de bord</a>
                    </li>
                    <li class="breadcrumb-item active">Liste des matière</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- End Bread crumb and right sidebar toggle-->
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">GESTION DES MATIERES</h4>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Tableau</h4>
                    <h6 class="card-subtitle"> Exporter les données vers, CSV, Excel, PDF & Print</h6>
                    <button type="button" class="btn waves-effect waves-light btn-dark btn-lg m-t-10 float-end text-white" data-bs-toggle="modal" data-bs-target="#new_matiere"><i class="ti-plus"></i>Ajouter un livre</button>
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
                                <!--End sample modal detail matiere -->
                                <!-- sample modal new matiere -->
                                <div id="new_matiere" class="modal" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="vcenter">AJOUTER UNE MATIERE</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Column -->
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <form method="POST" action="{{route('matieres.store')}}" class="form p-t-20" id="">
                                                                {{ csrf_field() }}
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputuname">Designation</label>
                                                                            <div class="input-group mb-3 {{$errors->has('designation')? 'has-error':''}} ">
                                                                                    <span class="input-group-text" id="basic-addon1"><i class="ti-pencil"></i></span>
                                                                                <input type="text" name="designation" class="form-control" value="{{old('designation')}}" placeholder="Nom" aria-label="Username" aria-describedby="basic-addon1">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button class="btn btn-lg btn-success waves-effect waves-light m-r-10 text-white">Valider</button>
                                                                <button type="reset" class="btn btn-lg btn-danger waves-effect waves-light">Restaurer</button>
                                                            </form>
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
                                <!-- End modal edit matiere -->
                                <!-- sample modal edit matiere -->
                                <div id="matiere_edit" class="modal" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="vcenter">EDIT MATIERE</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Column -->
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="form p-t-20" id="matiere_update">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputuname">Designation</label>
                                                                            <div class="input-group mb-3 {{$errors->has('designation')? 'has-error':''}} ">
                                                                                    <span class="input-group-text" id="basic-addon1"><i class="ti-pencil"></i></span>
                                                                                <input type="number" name="" id="matiere_id" hidden>
                                                                                <input type="text" id="designation_matiere" name="designation" class="form-control" value="{{old('designation')}}" placeholder="Nom" aria-label="Username" aria-describedby="basic-addon1">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button onclick="updateMatiere();" class="btn btn-lg btn-success waves-effect waves-light m-r-10 text-white">Valider</button>
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
                                <!-- End modal edit matiere -->
                            </div>
                        </div>
                    </div>
                    <!-- statistic of account matiere -->
                    <!--End statistic of account matiere -->
                    <!-- List matiere-->
                    <div class="table-responsive m-t-40">
                        <table id="table_btn"
                            class="display nowrap table table-hover table-striped border"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Designation</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Designation</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($matieres as $matiere)
                                    <tr>
                                        <th>{{$matiere->id}}</th>
                                        <th>{{$matiere->designation}}</th>
                                        <th>
                                            @if ($matiere->status == 0)
                                            <span class="label label-table label-danger">Désactivé</span>
                                            @endif
                                            @if ($matiere->status == 1)
                                            <span class="label label-table label-success">Active</span>
                                            @endif
                                        </th>
                                        <th>
                                            <div class="btn-group" role="group" aria-label="First group">
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#matiere_edit" onclick="editMatiere({{$matiere->id}})" class="btn btn-secondary"><i class="ti-pencil"></i></button>
                                                {{-- <button type="button" data-bs-toggle="modal" data-bs-target="#user_detail" onclick="showUser({{$matiere->id}});" class="btn btn-secondary"><i class="ti-eye"></i></button> --}}
                                                <button type="button" class="btn btn-secondary" onclick="activerMatiere({{$matiere->id}})" ><i class="ti-check-box"></i></button>
                                                <button type="button" class="btn btn-secondary" onclick="desactiverMatiere({{$matiere->id}})" ><i class="ti-na"></i></button>
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
