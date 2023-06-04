<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteaccount">
        Delete Account
    </button>

    <div class="modal fade" id="deleteaccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        name="confirm-user-deletion" :show="$errors - > userDeletion - > isNotEmpty()" focusable>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete your account?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-sm text-gray-600">Once your account is deleted, all of its resources and data will be
                        permanently deleted. Please enter your password to confirm you would like to permanently delete
                        your account.</p>
                    <form method="post" action="{{ route('profile.destroy') }}">
                        <div class="row mb-3">
                            <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password">
                            </div>
                        </div>
                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger">Delete Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
