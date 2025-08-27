<div class="card card-danger">
	<div class="card-header">
		<h3 class="card-title">Delete Account</h3>
	</div>
	<div class="card-body">
		<p class="mt-1 text-sm text-gray-600">
			{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
		</p>
        
		<form method="post" action="{{ route('profile.destroy') }}" class="p-6">
			@csrf
			@method('delete')
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
                <x-input-error class="mt-2" :messages="$errors->userDeletion->get('password')" />
                
            </div>
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete Account</button>
		</form>
	</div>
</div>