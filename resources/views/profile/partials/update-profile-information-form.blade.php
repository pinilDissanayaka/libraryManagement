<h5 class="card-title">Profile Information</h5>
<p>Update your account's profile information and email address.</p>
<form id="send-verification" method="POST" action="{{ route('verification.send') }}">
    @csrf
</form>
<form method="POST" action="{{ route('profile_update') }}" class="row g-3 needs-validation">
    @csrf
    @method('patch')
    <div class="col-12">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name"/>
        <div class="invalid-feedback">{{ "$errors->get('name')" }}</div>
    </div>

    <div class="col-12">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $user->email) }}" required autofocus autocomplete="username"/>
        <div class="invalid-feedback">{{ "$errors->get('email')" }}</div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p>Your email address is unverified.<button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Click here to re-send the verification email.</button></p>
                @if (session('status') === 'verification-link-sent')
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle"></i>
                        A new verification link has been sent to your email address.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        @endif
    </div>

    <div class="text-center mb-3">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </div>

    <div class="col-12">
        @if (session('status') === 'profile-updated')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i>
                Profile Updated
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
</form>





