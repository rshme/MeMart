<form action="{{ route('post.login') }}" method="post" id="form-login">
    @csrf
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="********">
    </div>
    <div class="d-flex">
        <button type="submit" class="btn btn-primary ml-auto mt-3">Sign In</button>
    </div>
</form>
