@if (session()->has('flash_notification.message'))
	<div class="container">
		<div class="alert alert-{{ session()->get('flash_notification.level') }}">
			{!! session()->get('flash_notification.message') !!}
		</div>
	</div>
@endif