@include('layouts.header')

@include('front.partials.profile-card-styles')

<section class="sj-listing">
	<div class="container">
		<div class="sj-row">

			<!-- ================= SIDEBAR ================= -->
			<aside class="sj-side">
				<div class="sj-card sj-filter">
					<h3><i class="fa fa-heart"></i> Find Your Perfect Match</h3>
					<p class="sj-sub">Search and connect with like-minded people.</p>

					<form action="{{ URL::to('/listing') }}" method="GET">

						<div class="sj-field">
							<label>Gender</label>
							<select name="gender">
								<option value="">Select Gender</option>
								<option value="1" @if($gender == 1) selected @endif>Male</option>
								<option value="2" @if($gender == 2) selected @endif>Female</option>
							</select>
						</div>

						<div class="sj-field">
							<label>Religion</label>
							<select name="religion">
								<option value="">Select religion</option>
								@if($allreligion)
									@foreach($allreligion as $rel)
										<option value="{{ $rel->id }}" @if($relation == $rel->id) selected @endif>{{ ucwords($rel->name) }}</option>
									@endforeach
								@endif
							</select>
						</div>

						<div class="sj-field">
							<label>Country</label>
							<select class="countryChange" name="country">
								<option value="">Select country</option>
								@if($allcountry)
									@foreach($allcountry as $country)
										<option value="{{ $country->id }}" @if($countryId == $country->id) selected @endif>{{ ucwords($country->name) }}</option>
									@endforeach
								@endif
							</select>
						</div>

						<div class="sj-field statefilter @if(empty($allstates)) d-none @endif">
							<label>State / City</label>
							<select class="stateChange" name="state">
								<option value="">Select state</option>
								@if($allstates)
									@foreach($allstates as $st)
										<option value="{{ $st->id }}" @if($stateId == $st->id) selected @endif>{{ ucwords($st->name) }}</option>
									@endforeach
								@endif
							</select>
						</div>

						<div class="sj-field">
							<label>Age Range</label>
							<div class="sj-slider-wrap">
								<div id="slider-range"></div>
								<input type="hidden" id="amount">
								<input type="hidden" class="ageMin" name="ageMin" value="{{ request('ageMin') }}">
								<input type="hidden" class="ageMax" name="ageMax" value="{{ request('ageMax') }}">
								<div class="sj-range-labels"><span>18 yrs</span><span>50+ yrs</span></div>
							</div>
						</div>

						<button type="button" class="sj-more-toggle" onclick="this.classList.toggle('open');document.getElementById('sjMore').classList.toggle('open');">
							More Filters <i class="fa fa-chevron-down"></i>
						</button>
						<div class="sj-more-panel @if(!empty($allcity)) open @endif" id="sjMore">
							<div class="sj-field cityfilter @if(empty($allcity)) d-none @endif">
								<label>City</label>
								<select class="cityChange" name="city">
									<option value="">Select city</option>
									@if($allcity)
										@foreach($allcity as $ci)
											<option value="{{ $ci->id }}" @if($cityId == $ci->id) selected @endif>{{ ucwords($ci->name) }}</option>
										@endforeach
									@endif
								</select>
							</div>
						</div>

						<button type="submit" class="sj-btn-search"><i class="fa fa-search"></i> Search</button>
						<a href="{{ URL::to('/listing') }}" class="sj-btn-reset">Reset</a>
					</form>
				</div>

				<div class="sj-promo">
					<h4><i class="fa fa-diamond"></i> Upgrade to Premium</h4>
					<ul>
						<li>Connect with more members</li>
						<li>See who liked your profile</li>
						<li>Send unlimited messages</li>
						<li>Premium customer support</li>
					</ul>
					<a href="{{ URL::to('/membership') }}" class="sj-promo-btn">Upgrade Now</a>
				</div>

				<div class="sj-card sj-safety">
					<h4><i class="fa fa-shield"></i> Safety Tips</h4>
					<ul>
						<li><i class="fa fa-check-circle"></i> Never share personal contact details</li>
						<li><i class="fa fa-check-circle"></i> Report suspicious profiles</li>
						<li><i class="fa fa-check-circle"></i> Our team is here to help</li>
					</ul>
					<a href="{{ URL::to('/faqs') }}">Learn more about safety</a>
				</div>
			</aside>

			<!-- ================= MAIN ================= -->
			<div class="sj-main">
				<div class="sj-card sj-head">
					<h2>Showing {{ $users->total() }}{{ $users->total() >= $users->perPage() ? '+' : '' }} matches for you</h2>
					<div class="sj-sort">
						<a href="{{ URL::to('/connections') }}" class="sj-connect-now"><i class="fa fa-users"></i> My Connections</a>
						<span>Sort by:</span>
						<select onchange="if(this.value){window.location.href=this.value;}">
							<option value="">Recently Joined</option>
							<option value="{{ URL::to('/listing') }}">Reset order</option>
						</select>
					</div>
				</div>

				@php $palette = ['#14213d','#e5006d','#1bbf83','#7b2ff7','#f0a500','#d7263d','#3d5cff','#0f766e','#b45309']; @endphp

				@if(count($users) > 0)
					@foreach($users as $user)
						@include('front.partials.profile-card', ['user' => $user, 'palette' => $palette, 'mode' => 'listing'])
					@endforeach

					<div class="pagination">{{ $users->links() }}</div>
				@else
					<div class="sj-card sj-empty">No matching profiles found. Try adjusting your filters.</div>
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
