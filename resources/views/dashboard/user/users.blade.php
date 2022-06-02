@extends('layouts.header')

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <button type="button" data-remodal-target="remodal" class="btn btn-primary waves-effect waves-light" style="margin-bottom:10px !important;">Create User</button>

                    <table id="example" class="table table-striped table-bordered display" style="width:100%; text-align: center;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">{{__('first name')}}</th>
                                <th style="text-align: center;">{{__('last name')}}</th>
                                <th style="text-align: center;">{{__('email')}}</th>
                                <th style="text-align: center;">{{__('mobile')}}</th>
                                <th style="text-align: center;">{{__('option')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->fname}}</td>
                                <td>{{$user->lname}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->mobile}}</td>
                                <td>
                                    <button type="button" data-remodal-target="remodaledit-{{$user->id}}" class="btn btn-success btn-sm" title="edit"><i class="ico mdi mdi-tooltip-edit"></i></button>
                                    <a class="delete" href="/deleteuser/{{$user->id}}"><button type="button" class="btn btn-danger btn-sm" title="delete"><i class="ico mdi mdi-delete-forever"></i></button></a>
                                    <button type="button" data-remodal-target="remodalshow-{{$user->id}}" class="btn btn-primary btn-sm" title="showproduct"><i class="fa fa-eye" aria-hidden="true"></i></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-content -->
            </div>
            <!-- /.col-xs-12 -->
        </div>

        <!-- Start Modal Create -->

        <div class="remodal" data-remodal-id="remodal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
            <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
            <div class="remodal-content">
                <h4 class="box-title">Enter Data</h4>
                <form action="/createuser" method="POST" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label for="inp-type-1" class="col-sm-3 control-label">First Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="fname" class="form-control" id="inp-type-1" placeholder="Enter First Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inp-type-1" class="col-sm-3 control-label">Last Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="lname" class="form-control" id="inp-type-1" placeholder="Enter Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inp-type-2" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control" id="inp-type-2" placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inp-type-2" class="col-sm-3 control-label">Mobile</label>
                        <div class="col-sm-9">
                            <input type="text" name="mobile" class="form-control" id="inp-type-2" placeholder="Enter Mobile Number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inp-type-3" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" id="inp-type-3" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inp-type-3" class="col-sm-3 control-label">Confirmed Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password_confirmation" class="form-control" id="inp-type-3" placeholder="Confirmed Password">
                        </div>
                    </div>
                    <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
                    <button type="submit" class="remodal-confirm">Add</button>
                </form>
            </div>
        </div>
        <!-- End Modal Create -->
        @foreach($users as $user)
        <!-- Start Modal Edit -->
        <div class="remodal" data-remodal-id="remodaledit-{{$user->id}}" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
            <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
            <div class="remodal-content">
                <h4 class="box-title">Enter Data</h4>
                <form action="/edituser/{{$user->id}}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label for="inp-type-1" class="col-sm-3 control-label">First Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="fname" class="form-control" id="inp-type-1" value="{{$user->fname}}" placeholder="Enter First Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inp-type-1" class="col-sm-3 control-label">Last Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="lname" class="form-control" id="inp-type-1" value="{{$user->lname}}" placeholder="Enter Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inp-type-2" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control" id="inp-type-2" value="{{$user->email}}" placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inp-type-2" class="col-sm-3 control-label">Mobile</label>
                        <div class="col-sm-9">
                            <input type="text" name="mobile" class="form-control" id="inp-type-2" value="{{$user->mobile}}" placeholder="Enter Mobile Number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inp-type-3" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" id="inp-type-3" value="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inp-type-3" class="col-sm-3 control-label">Confirmed Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password_confirmation" class="form-control" id="inp-type-3" placeholder="Confirmed Password">
                        </div>
                    </div>
                    <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
                    <button type="submit" class="remodal-confirm">Edit</button>
                </form>
            </div>
        </div>
        @endforeach
        <!-- End Modal Edit -->

        @foreach($users as $user)
        <!-- Start Modal show products  -->
        <div class="remodal" data-remodal-id="remodalshow-{{$user->id}}" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
            <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
            <div class="remodal-content">
            <div class="box-content">
                    <table id="example" class="table table-striped table-bordered display" style="width:100%; text-align: center;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">{{__('Name')}}</th>
                                <th style="text-align: center;">{{__('Image')}}</th>
                                <th style="text-align: center;">{{__('Description')}}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($user['products'] as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td><a href="{{'images/products/'.$product->image}}"><img src="{{'images/products/'.$product->image}}" width="130px" height="100px" alt="image"></a></td>
                                <td>{{$product->description}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-content -->
            </div>
        </div>
        @endforeach
        <!-- End Modal show products -->
        @extends('layouts.footer')