	<div class="container-fluid">
	  <!-- BEGIN NAVBAR TOGGLER -->
	  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <!-- END NAVBAR TOGGLER -->
	  <!-- BEGIN NAVBAR LOGO -->
	  <div class="navbar-brand navbar-brand-autodark">
	    <a href="{{route('home')}}" aria-label="Tabler" wire:navigate>
				<img src="/assets/img/logo.png" alt="" width="180px">
	    </a>
	  </div>
	  <!-- END NAVBAR LOGO -->
	  <div class="navbar-nav flex-row d-lg-none"></div>
	  <div class="collapse navbar-collapse" id="sidebar-menu">
	    <!-- BEGIN NAVBAR MENU -->
	    <ul class="navbar-nav pt-lg-3">
				@foreach($navigation as $item)
					<li class="nav-item">
						<a href="#" class="nav-link">
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<i class="{{$item['icon']}}"></i>
							</span>
							<span class="nav-link-title">{{$item['label']}}</span>
						</a>
					</li>
				@endforeach
	    </ul>
	    <!-- END NAVBAR MENU -->
	  </div>
	</div>
