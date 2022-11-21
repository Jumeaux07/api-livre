@extends('admin.partials.index')
@section('content')
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
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
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">GESTION DES UTILISATEURS</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Ajouter un utilisateur</h4>
                                <!-- new user -->
                                <div class="card">
                                    <div class="card-body p-20 ">
                                        <form class="form p-t-20" action="{{route('users.store')}}" method="POST" >
                                            {{ csrf_field() }}
                                            @method('POST')
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputuname">Nom</label>
                                                        <div class="input-group mb-3 {{$errors->has('nom')? 'has-error':''}} ">
                                                                <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                                            <input type="text" name="nom" class="form-control" value="{{old('nom')}}" placeholder="Nom" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputuname">Prénoms</label>
                                                        <div class="input-group mb-3 {{$errors->has('prenoms') ? 'has-error' :''}} ">
                                                                <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                                            <input type="text" name="prenoms" class="form-control" value="{{old('prenoms')}}" placeholder="Prénoms" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <h5 class="">Matieres</h5>
                                                    <select class="select2 matieres select2-multiple {{$errors->has('matieres') ? 'has-error' :''}}" id="" name="matieres[]" style="width: 100%" multiple="multiple" data-placeholder="Choose">
                                                        <optgroup label="">
                                                            @foreach ($matieres as $matiere)
                                                            <option value="{{$matiere->id}}">{{$matiere->designation}}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputuname">Adresse Email</label>
                                                        <div class="input-group mb-3 {{$errors->has('email') ? 'has-error' : ''}} ">
                                                                <span class="input-group-text" id="basic-addon1"><i class="ti-email"></i></span>
                                                            <input type="text" name="email" value="{{old('email')}}" class="form-control email-inputmask" id="email-mask" placeholder="Adresse Email" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputuname">Adresse </label>
                                                        <div class="input-group mb-3" {{$errors->has('adresse') ? 'has-error' : ''}} >
                                                                <span class="input-group-text" id="basic-addon1"><i class="ti-direction"></i></span>
                                                            <input type="text" name="adresse" value="{{old('adresse')}}" class="form-control" placeholder="Adresse" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputuname">Telephone</label>
                                                        <div class="input-group mb-3" {{$errors->has('phone') ? 'has-error' : ''}} >
                                                                <span class="input-group-text" id="basic-addon1"><i class="ti-mobile"></i></span>
                                                            <input type="text" name="phone" value="{{old('phone')}}" class="form-control international-inputmask" id="international-mask" placeholder="Telephone" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputuname">Mot de passe</label>
                                                        <div class="input-group mb-3 {{$errors->has('password') ? 'has-error' : ''}} ">
                                                                <span class="input-group-text" id="basic-addon1"><i class="ti-lock"></i></span>
                                                            <input type="password" name="password" class="form-control" placeholder="Mot de passe" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputuname">Confirmation</label>
                                                        <div class="input-group mb-3 {{$errors->has('password_confirmation') ? 'has-error' : ''}} ">
                                                                <span class="input-group-text" id="basic-addon1"><i class="ti-lock"></i></span>
                                                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmation" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" onclick="view();" class="btn btn-lg btn-success waves-effect waves-light m-r-10 text-white">Valider</button>
                                            <button type="reset"  class="btn btn-lg btn-danger waves-effect waves-light">Restaurer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel
                            <span>
                                <i class="ti-close right-side-toggle"></i>
                            </span>
                        </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li>
                                    <b>With Light sidebar</b>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-skin="skin-default"
                                        class="default-theme working">1</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme">4</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a>
                                </li>
                                <li class="d-block m-t-30">
                                    <b>With Dark sidebar</b>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-skin="skin-default-dark"
                                        class="default-dark-theme ">7</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-skin="skin-green-dark"
                                        class="green-dark-theme">8</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-skin="skin-blue-dark"
                                        class="blue-dark-theme">10</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-skin="skin-purple-dark"
                                        class="purple-dark-theme">11</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-skin="skin-megna-dark"
                                        class="megna-dark-theme ">12</a>
                                </li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li>
                                    <b>Chat option</b>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle">
                                        <span>Varun Dhavan
                                            <small class="text-success">online</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle">
                                        <span>Genelia Deshmukh
                                            <small class="text-warning">Away</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle">
                                        <span>Ritesh Deshmukh
                                            <small class="text-danger">Busy</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle">
                                        <span>Arijit Sinh
                                            <small class="text-muted">Offline</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle">
                                        <span>Govinda Star
                                            <small class="text-success">online</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle">
                                        <span>John Abraham
                                            <small class="text-success">online</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle">
                                        <span>Hritik Roshan
                                            <small class="text-success">online</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle">
                                        <span>Pwandeep rajan
                                            <small class="text-success">online</small>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
@endsection
