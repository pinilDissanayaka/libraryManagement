<h5 class="card-title">Delete Account</h5>
<p>Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>

<form method="POST" action="{{ route('profile_destroy') }}" class="row g-3 needs-validation">
    @csrf
    @method('delete')
    <div class="col-12">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" required  autocomplete="current-password"/>
        <div class="invalid-feedback">{{ "$errors->userDeletion->get('password')" }}</div>
    </div>

    <div class="text-center mb-3">
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModel">Delete</button>
        <!-- Delete Account Modal -->
        <div class="modal fade" id="deleteAccountModel" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                     <div class="modal-body">
                        Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete Account</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Delete Account Modal-->
        <button type="reset" class="btn btn-secondary">Reset</button>
    </div>

</form>


