@extends ('template')

@section ('content')
	<!-- ad-profile-page -->
	<section id="main" class="clearfix  ad-profile-page">
		<div class="container">
			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li>Ad Post</li>
				</ol><!-- breadcrumb -->						
				<h2 class="title">Mi Perfil</h2>
			</div><!-- banner -->
			<p>
				@if(Session::get('danger'))
			        <div id="danger" class="alert alert-danger">
			          <strong>¡Error! </strong>{{Session::get('danger')}}
			        </div>
			    @endif
			</p> 
			<p>
				@if(Session::get('success'))
			        <div class="alert alert-success" role="alert">
			          <strong>¡Exito! </strong>{{Session::get('success')}}
			        </div>
			    @endif
			</p> 
			<div class="profile">
				<div class="row">
					<div class="col-sm-12">
						<div class="user-pro-section">
							<!-- profile-details -->
							<div class="profile-details section">
								<h2>Profile Details</h2>
								<!-- form -->
						{{ Form::open(array('url' => 'admin/actualizar_pefil','name' => 'actualizar', 'method' => 'post')) }}
									<div class="form-group">
										<label>Username</label>
										<input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Jhon Doe">
										@if($errors->has('name'))
							                @foreach($errors->get('name') as $error)
							                  <span class="messageerror2">× {{ $error }}</span>
							                @endforeach
							            @endif
									</div>
									<div class="form-group">
										<label>Email ID</label>
										<input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="jhondoe@mail.com">
										@if($errors->has('email'))
							                @foreach($errors->get('email') as $error)
							                  <span class="messageerror2">× {{ $error }}</span>
							                @endforeach
							            @endif
									</div>
									<div class="form-group">
										<label for="name-three">Mobile</label>
										<input type="text" class="form-control" name="celphone" value="{{$user->celphone}}" placeholder="+213 1234 56789">
										@if($errors->has('celphone'))
							                @foreach($errors->get('celphone') as $error)
							                  <span class="messageerror2">× {{ $error }}</span>
							                @endforeach
							            @endif
									</div>
								</div><!-- profile-details -->
								<!-- change-password -->
								<div class="change-password section">
									<h2>Change password</h2>
									<!-- form -->
									<div class="form-group">
										<label>Old Password</label>
										<input type="password" name="old-password" class="form-control" >
										@if($errors->has('old-password'))
							                @foreach($errors->get('old-password') as $error)
							                  <span class="messageerror2">× {{ $error }}</span>
							                @endforeach
							            @endif
									</div>
									<div class="form-group">
										<label>New password</label>
										<input type="password" name="new-password" class="form-control">
										@if($errors->has('new-password'))
							                @foreach($errors->get('new-password') as $error)
							                  <span class="messageerror2">× {{ $error }}</span>
							                @endforeach
							            @endif	
									</div>
									<div class="form-group">
										<label>Confirm password</label>
										<input type="password" name="confirm-password" class="form-control">
										@if($errors->has('confirm-password'))
							                @foreach($errors->get('confirm-password') as $error)
							                  <span class="messageerror2">× {{ $error }}</span>
							                @endforeach
							            @endif
									</div>															
								</div><!-- change-password -->
								<a class="btn" onclick="document.forms.actualizar.submit()">Actualizar Perfil</a>
								<a href="#" class="btn cancle">Cancelar</a>
							</div><!-- user-pro-edit -->
						{{ Form::close() }}
					</div><!-- profile -->
				</div><!-- row -->	
			</div>				
		</div><!-- container -->
	</section><!-- ad-profile-page -->
@stop