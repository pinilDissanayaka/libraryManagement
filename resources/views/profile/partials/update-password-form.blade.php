<h5 class="card-title">Update Password</h5>
<p>Ensure your account is using a long, random password to stay secure.</p>
<form method="POST" action="{{ route('password.update') }}" class="row g-3 needs-validation">
    @csrf
    @method('put')
    <div class="col-12">
        <label for="update_password_current_password" class="form-label">Current Password</label>
        <input type="password" name="current_password" class="form-control" id="update_password_current_password" required  autocomplete="current-password"/>
        <div class="invalid-feedback">{{ "$errors->updatePassword->get('current_password')" }}</div>
    </div>

    <div class="col-12">
        <label for="update_password_password" class="form-label">New Password</label>
        <input type="password" name="password" class="form-control" id="update_password_current_password" required  autocomplete="new-password"/>
        <div class="invalid-feedback">{{ "$errors->updatePassword->get('password')" }}</div>
    </div>

    <div class="col-12">
        <label for="update_password_password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" id="update_password_password_confirmation" required  autocomplete="new-password"/>
        <div class="invalid-feedback">{{ "$errors->updatePassword->get('password_confirmation')" }}</div>
    </div>

    <div class="text-center mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteAccountModel">Save</button>
        <!-- Change Password Modal -->
        <div class="modal fade" id="deleteAccountModel" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Change Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                     <div class="modal-body">
                        Ensure your account is using a long, random password to stay secure.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Change Password Modal-->
        <button type="reset" class="btn btn-secondary">Reset</button>
    </div>

    <div class="col-12">
        @if (session('status') === 'password-updated')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i>
                Password Saved !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
</form>
