@extends('admin.main')

@section('content')
    <div class="card mt-5 mb-5" style="margin-left: 30%; margin-right:30%">
        <div class="card-body register-card-body">
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="retype_password" class="form-control" placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                        <button type="submit" class="btn btn-primary btn-block" style="margin-left: 30%; margin-right:30%">Register</button>
                    <!-- /.col -->
                </div>
                @csrf
            </form>
        </div>
    </div>

    <div class="card-footer clearfix">
        {{-- {!! $users->links() !!} --}}
    </div>
@endsection
