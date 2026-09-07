@include('layouts.header')

@include('front.partials.profile-card-styles')

<section class="sj-listing">
	<div class="container">
		<div class="sj-row">

			<div class="sj-main" style="margin:0 auto;max-width:900px;">
				<div class="sj-card sj-conn-hero">
					<span class="sj-conn-ico"><i class="fa fa-users"></i></span>
					<div>
						<h2>My Connections</h2>
						<p>
							{{ $users->total() }} {{ \Illuminate\Support\Str::plural('member', $users->total()) }} you are connected with.
							<a href="{{ URL::to('/listing') }}" style="color:#3d5cff;font-weight:500;margin-left:6px;">Find more matches</a>
						</p>
					</div>
				</div>

				@php $palette = ['#14213d','#e5006d','#1bbf83','#7b2ff7','#f0a500','#d7263d','#3d5cff','#0f766e','#b45309']; @endphp

				@if(count($users) > 0)
					@foreach($users as $user)
						@include('front.partials.profile-card', ['user' => $user, 'palette' => $palette, 'mode' => 'connection'])
					@endforeach

					<div class="pagination">{{ $users->links() }}</div>
				@else
					<div class="sj-card sj-empty">
						You haven't connected with anyone yet.
						<br>
						<a href="{{ URL::to('/listing') }}" style="color:#3d5cff;font-weight:600;">Browse matches &rarr;</a>
					</div>
				@endif
			</div>

		</div>
	</div>
</section>

<!-- Plan Update -->
<div id="planalert" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Membership</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body driverdetails">
				<h5 class="messagetext">Add our membership plan to get the feature of "Chat &amp; Invites". You can chat &amp; send invites to people you like.</h5>
			</div>
			<div class="modal-footer">
				<a href="{{ URL::to('/membership') }}" class="btn btn-success">Membership</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>
<!-- Plan Update -->

@include('layouts.footer')
