@extends('layouts.header')

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <button type="button" data-remodal-target="remodal" class="btn btn-primary waves-effect waves-light" style="margin-bottom:10px !important;">Create</button>

                    <table id="example" class="table table-striped table-bordered display" style="width:100%; text-align: center;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">{{__('Name')}}</th>
                                <th style="text-align: center;">{{__('Image')}}</th>
                                <th style="text-align: center;">{{__('Description')}}</th>
                                <th style="text-align: center;">{{__('user')}}</th>
                                <th style="text-align: center;">{{__('option')}}</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td><a href="{{'images/products/'.$product->image}}"><img src="{{'images/products/'.$product->image}}" width="130px" height="100px" alt="image"></a></td>
                                <td>{{$product->description}}</td>
                                <td>
                                    @foreach($product['users'] as $user)
                                    {{$user->fname}}
                                    <br>
                                    @endforeach
                                </td>
                                <td>
                                    <button type="button" data-remodal-target="remodaledit-{{$product->id}}" class="btn btn-success btn-sm" title="edit"><i class="ico mdi mdi-tooltip-edit"></i></button>
                                    <a class="delete" href="/deleteproduct/{{$product->id}}"><button type="button" class="btn btn-danger btn-sm" title="delete"><i class="ico mdi mdi-delete-forever"></i></button></a>
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
                <form action="/createproduct" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="inp-type-1" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" id="inp-type-1" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inp-type-1" class="col-sm-3 control-label">Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control" id="inp-type-1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inp-type-2" class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-9">
                            <input type="text" name="description" class="form-control" id="inp-type-2" placeholder="Enter Description">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inp-type-3" class="col-sm-3 control-label">User</label>
                        <div class="col-sm-9">
                            <select class="form-control select2_1" name="user[]" multiple="multiple" required>
                                <option>select user</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->fname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
                    <button type="submit" class="remodal-confirm">Add</button>
                </form>
            </div>
        </div>
        <!-- End Modal Create -->
        @foreach($products as $product)
        <!-- Start Modal Edit -->
        <div class="remodal" data-remodal-id="remodaledit-{{$product->id}}" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
            <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
            <div class="remodal-content">
                <h4 class="box-title">Enter Data</h4>
                <form action="/editproduct/{{$product->id}}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label for="inp-type-1" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" id="inp-type-1" value="{{$product->name}}" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inp-type-1" class="col-sm-3 control-label">Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control" value="{{$product->image}}" id="inp-type-1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inp-type-2" class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-9">
                            <input type="text" name="description" class="form-control" value="{{$product->description}}" id="inp-type-2" placeholder="Enter Description">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inp-type-3" class="col-sm-3 control-label">User</label>
                        <div class="col-sm-9">
                            <select class="form-control select2_1" name="user[]" multiple="multiple" aria-label="Default select example" required>
                                <option>select user</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->fname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
                    <button type="submit" class="remodal-confirm">Edit</button>
                </form>
            </div>
        </div>
        @endforeach
        <!-- End Modal Edit -->
        @extends('layouts.footer')
        