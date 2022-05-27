@extends('layouts.header')
<div class="fixed-navbar">
    <div class="pull-left">
        <button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
        <h1 class="page-title">Products</h1>
        <!-- /.page-title -->
    </div>
    <!-- /.pull-left -->
    <div class="pull-right">
    <a class="ico-item fa fa-power-off" href="{{ route('logout') }}"
								onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
								<span class="link">
								</span>
							</a>							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
    </div>
    <!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-12">
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
                            @foreach($items as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td><a href="{{'images/products/'.$item->image}}"><img src="{{'images/products/'.$item->image}}" width="130px" height="100px" alt="image"></a></td>
                                <td>{{$item->description}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-content -->
            </div>
            <!-- /.col-xs-12 -->
        </div>

        @extends('layouts.footer')