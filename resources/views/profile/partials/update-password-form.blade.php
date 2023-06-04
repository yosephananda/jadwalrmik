<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-3">
        @csrf
        @method('put')

        <div>
            <div class="row mb-3">
                <label for="current_password" class="col-sm-3 col-form-label">Current Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="current_password" name="current_password"
                        autocomplete="current-password">
                </div>
            </div>
            <x-input-error class="mt-2" :messages="$errors->updatePassword->get('current_password')" />
        </div>

        <div>
            <div class="row mb-3">
                <label for="password" class="col-sm-3 col-form-label">New Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password"
                        autocomplete="new-password">
                </div>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <div class="row mb-3">
                <label for="password_confirmation" class="col-sm-3 col-form-label">Confirm Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        autocomplete="new-password">
                </div>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-success me-2">Update Password</button>

            @if (session('status') === 'password-updated')
                <div class="alert alert-success mt-2" x-data="{ show: true }" x-show="show" x-transition
                    x-init="setTimeout(() => show = false, 2000)" role="alert">Data Saved</div>
            @endif
        </div>
    </form>
</section>
