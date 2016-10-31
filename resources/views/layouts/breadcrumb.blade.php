<div class="container">
	<div class="row">
		<div class="col-sm-12 breadcrumb">
			<ul>
				<li><a href="{{ url('dashboard')}}"><i class="material-icons">home</i> </a></li>
				@if ($user->type == 'admin')
					<!--admin-->
					@include('layouts.breadcrumbs.bread-admin')
				@endif

				@if ($user->type == 'opd')
					<!--opds-->
					@include('layouts.breadcrumbs.bread-opd')
				@endif

				@if ($user->type == 'puebla')
					<!--secotrade-->
					@include('layouts.breadcrumbs.bread-secotrade')
				@endif

				@if ($user->type == 'company')
					<!--company-->
					@include('layouts.breadcrumbs.bread-company')
				@endif

				@if ($user->type == 'student')
					<!--students-->
					@include('layouts.breadcrumbs.bread-student')
				@endif
				@if ($user->type == 'chamber')
					<!--students-->
					@include('layouts.breadcrumbs.bread-chamber')
				@endif
			</ul>
		</div>
	</div>
</div>
