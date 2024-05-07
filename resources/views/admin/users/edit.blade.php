@extends('admin.main')

@section('content')
    <div class="card mt-5 mb-5" style="margin-left: 30%; margin-right:30%">
        <div class="card-body register-card-body">
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="password" name="recent_password" class="form-control" placeholder="Recent Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="new_password" class="form-control" placeholder="New Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="retype_new_password" class="form-control" placeholder="Retype New Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary btn-block"
                        style="margin-left: 30%; margin-right:30%">Change Password</button>
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
