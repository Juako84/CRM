@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">{{ trans('adminlte_lang::message.profileTitle') }}</div>

					<div class="panel-body">
					    <!--
					    <img src="/upload/avatars/{{$user -> avatar}}" style="width:150px;height:150px;float:left;border-radius:50%;margin-right:25px;"/>
						<h2>{{ $user ->name}} Profile</h2>
						<form enctype="multipart/form-data" action="/profile" method="POST">
						    <input type="text" class="form-control" placeholder="{{ trans('adminlte_lang::message.fullname') }}" name="name" value="{{ old('name') }}"/>
						    <label>Upload profile image</label>
						    <input type="file" name="avatar"/>
						    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
						    <input type="submit" class="pull-right btn btn-sm btn-primary" value="Submit"/>
						</form>
						-->
						
						
                                <ul id="userTab" class="nav nav-tabs">
                                    <li class="active"><a href="#overview" data-toggle="tab">{{ trans('adminlte_lang::message.profileOverview') }}</a>
                                    </li>
                                    <li class=""><a href="#profile-settings" data-toggle="tab">{{ trans('adminlte_lang::message.profileUpdate') }}</a>
                                    </li>
                                </ul>
                                <div id="userTabContent" class="tab-content">
                                    <div class="tab-pane fade active in" id="overview">

                                        <div class="row">
                                            <br/>
                                            <div class="col-lg-2 col-md-3">
                                                
                                                <img class="img-responsive img-profile" src="upload/avatars/{{$user->avatar}}" alt="">
                                                
                                                <div class="list-group">
                                                    <a href="#" class="list-group-item active">{{ trans('adminlte_lang::message.profileOverview') }}</a>
                                                    <a href="#" class="list-group-item">Campañas<span class="badge green">4</span></a>
                                                    <a href="#" class="list-group-item">Tareas<span class="badge orange">9</span></a>
                                                    <a href="#" class="list-group-item">Alertas<span class="badge blue">10</span></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-5">
                                                <h1>{{$user -> name}} {{$user -> lastname}} </h1>
                                                
                                                <ul class="list-inline">
                                                    
                                                    <li><i class="fa fa-user fa-muted"></i> Administrator</li>
                                                    
                                                    
                                                    
                                                </ul>
                                                
                                                
                                                <p><i class="fa fa-phone fa-muted fa-fw"></i> {{$user -> phonenumber}}</p>
                                                <p><i class="fa fa-building-o fa-muted fa-fw"></i> {{$user -> address}}
                                                    
                                                <p><i class="fa fa-envelope-o fa-muted fa-fw"></i> <a href="#">{{$user -> email}}</a>
                                                <p><i class="fa fa-calendar fa-muted"></i> profiletitleupdateinfo {{ date('d M Y - H:i:s', $user->created_at->timestamp) }}</p>
                                                </p>
                                            </div>
                                            
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="profile-settings">
<br/>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <ul id="userSettings" class="nav nav-pills nav-stacked">
                                                    <li class="active"><a href="#basicInformation" data-toggle="tab"><i class="fa fa-user fa-fw"></i> {{ trans('adminlte_lang::message.profiletitleupdateinfo') }}</a>
                                                    </li>
                                                    <li><a href="#profilePicture" data-toggle="tab"><i class="fa fa-picture-o fa-fw"></i> Profile Picture</a>
                                                    </li>
                                                    <li><a href="#changePassword" data-toggle="tab"><i class="fa fa-lock fa-fw"></i> Change Password</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-9">
                                                <div id="userSettingsContent" class="tab-content">
                                                    <div class="tab-pane fade in active" id="basicInformation">
                                                        <form enctype="multipart/form-data" action="/updateBasicInfo" method="POST">
                                                             <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                                                                                                        <div class="form-group">
                                                                <label>{{ trans('adminlte_lang::message.fullname') }}</label>
                                                                <input type="text" name="name" id="name" class="form-control" value="{{$user -> name}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{ trans('adminlte_lang::message.lastname') }}</label>
                                                                <input type="text" name ="lastname" class="form-control" value="{{$user -> lastname}}">
                                                            </div>
                                                            <div class="form-group">
                                                                
                                                                <label>{{ trans('adminlte_lang::message.profilephonenumber') }}</label>
                                                                <input type="tel" name="phonenumber" class="form-control" value="{{$user -> phonenumber}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{ trans('adminlte_lang::message.address') }}</label>
                                                                <input type="text" name="address" class="form-control" value="{{$user -> address}}">
                                                            </div>
                                                           
                                                            <div class="form-group">
                                                                <label>{{ trans('adminlte_lang::message.email') }}</label>
                                                                <input type="email" name="email" class="form-control" disabled value="{{$user -> email}}">
                                                            </div>
                                                           
                                                            <button type="submit" class="btn btn-default">{{ trans('adminlte_lang::message.btnactualizar') }}</button>
                                                            <button class="btn btn-green">{{ trans('adminlte_lang::message.btncancelar') }}</button>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade" id="profilePicture">
                                                        <h3>Current Picture:</h3>
                                                        
                                                        <img class="img-responsive img-profile" src="upload/avatars/{{$user->avatar}}" alt="" style="width:150px;height:150px;float:left;border-radius:50%;margin-right:25px;"/>
                                                        <br>
                                                        	<form enctype="multipart/form-data" action="/profile" method="POST">

                                                            <div class="form-group">
                                                                <label>Choose a New Image</label>
                                                                <input type="file" name="avatar"/>
                                                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                                                <button type="submit" class="btn btn-default">Update Profile Picture</button>
                                                                <button class="btn btn-green">Cancel</button>
                                                            </div>
                                                                

                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade in" id="changePassword">
                                                        <div class="panel-body">
                @if (Session::has('success'))
                    <div class="alert alert-success">{!! Session::get('success') !!}</div>
                @endif
                @if (Session::has('failure'))
                    <div class="alert alert-danger">{!! Session::get('failure') !!}</div>
                @endif
                <form action="/change-password" method="post" role="form" class="form-horizontal">
                    {{csrf_field()}}

                        <div class="form-group{{ $errors->has('old') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Old Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="old">

                                @if ($errors->has('old'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('old') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary form-control">Submit</button>
                                </div>
                        </div>
                </form>
                </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
