<div class="card card-warning">
	<div class="card-header">
		<h3 class="card-title">Update Password</h3>
	</div>
	<div class="card-body">
		<p class="mt-1 text-sm text-gray-600">
			{{ __("Ensure your account is using a long, random password to stay secure.") }}
		</p>
		<form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
			@csrf
			@method('put')
			<div class="form-group">
				<label for="current_password">Current Password</label>
				<input type="password" name="current_password" id="current_password" class="form-control">
				<x-input-error class="mt-2" :messages="$errors->get('current_password')" />
			</div>
			<div class="form-group">
				<label for="password">New Password</label>
				<input type="password" name="password" id="password" class="form-control">
				<x-input-error class="mt-2" :messages="$errors->get('password')" />
			</div>
			<div class="form-group">
				<label for="password_confirmation">Confirm Password</label>
				<input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
				<x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
			</div>
			<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
			@if (session('status') === 'password-updated')
				<p
					x-data="{ show: true }"
					x-show="show"
					x-transition
					x-init="setTimeout(() => show = false, 2000)"
					class="text-sm text-gray-600"
				>{{ __('Saved.') }}</p>
			@endif
		</form>
	</div>
</div>



