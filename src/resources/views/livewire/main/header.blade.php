<header class="navbar navbar-expand-md d-print-none">
  <div class="container-xl">
    <!-- BEGIN NAVBAR TOGGLER -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- END NAVBAR TOGGLER -->

    <div class="navbar-nav flex-row">
      <div class="nav-item d-none d-md-flex me-3">
        <div class="btn-list">
          <a href="https://github.com/tabler/tabler" class="btn btn-5" target="_blank" rel="noreferrer">
            <!-- Download SVG icon from http://tabler.io/icons/icon/brand-github -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
              <path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5"></path>
            </svg> Import File
          </a>
        </div>
      </div>

      <div class="nav-item dropdown">
        <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown" aria-label="Open user menu">
          <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
          <div class="d-none d-xl-block ps-2">
            <div>{{user()->name}}</div>
            <div class="mt-1 small text-secondary">{{user()->email}}</div>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
          <a href="#" class="dropdown-item">Status</a>
          <a href="./profile.html" class="dropdown-item">Profile</a>
          <a href="#" class="dropdown-item">Feedback</a>
          <div class="dropdown-divider"></div>
          <a href="./settings.html" class="dropdown-item">Settings</a>
          <a class="dropdown-item" wire:click="logout">Logout</a>
        </div>
      </div>
    </div>
  </div>
</header>
