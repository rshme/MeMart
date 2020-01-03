<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
      <a class="navbar-brand" href="#">MeMart</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                  <form action="{{ route('logout.user') }}" method="post" id="form-logout">
                      @csrf
                      <button type="submit" class="nav-link btn btn-danger text-white">Logout</button>
                  </form>
              </li>
          </ul>
      </div>
  </div>
</nav>
