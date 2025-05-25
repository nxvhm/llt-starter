<div class="row align-items-center">
  <div class="col-lg">
    <div class="container-tight">
      <div class="text-center mb-4">
        <!-- BEGIN NAVBAR LOGO -->
        <a href="." aria-label="Tabler" class="navbar-brand navbar-brand-autodark">
					<img src="/assets/img/logo-blue.png" alt="" width="180px">
        </a>
        <!-- END NAVBAR LOGO -->
      </div>
      <div class="card card-md">
        <div class="card-body">
          <h2 class="h2 text-center mb-4">Login to your account</h2>
						@if(!empty($error))
							<p class="alert alert-danger">{{$error}}</p>
						@endif
          <form wire:submit="requestLogin">
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" class="form-control" placeholder="your@email.com" autocomplete="off" wire:model="email">
							@error('email') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="mb-2">
              <label class="form-label"> Password
								<span class="form-label-description">
                  <a href="./forgot-password.html">I forgot password</a>
                </span>
              </label>
              <div class="input-group input-group-flat">
                <input type="password" class="form-control" placeholder="Your password" autocomplete="off" wire:model="password">
                <span class="input-group-text">
                  <a href="#" class="link-secondary" data-bs-toggle="tooltip" aria-label="Show password" data-bs-original-title="Show password">
                    <!-- Download SVG icon from http://tabler.io/icons/icon/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                      <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                      <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                    </svg>
                  </a>
                </span>
              </div>
							@error('password') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="mb-2">
              <label class="form-check">
                <input type="checkbox" class="form-check-input">
                <span class="form-check-label">Remember me on this device</span>
              </label>
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Sign in</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
