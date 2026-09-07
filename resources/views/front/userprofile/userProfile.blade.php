@include('layouts.header')

@php
	$show = fn($v) => (!is_null($v) && $v !== '') ? $v : '—';

	$maritalMap      = [1=>'Never Married', 2=>'Divorced', 3=>'Awaiting Divorce'];
	$createdByMap    = [1=>'Self', 2=>'Parent / Guardian', 3=>'Sibling', 4=>'Friend', 5=>'Other', 6=>'Other'];
	$dietMap         = [1=>'Veg', 2=>'Non-Veg', 3=>'Occasionally Non-Veg', 4=>'Eggetarian', 5=>'Jain', 6=>'Vegan'];
	$parentStatusMap = [1=>'Employed', 2=>'Business', 3=>'Retired', 4=>'Not Employed'];
	$familyTypeMap   = [1=>'Joint', 2=>'Nuclear'];
	$incomeMap       = [1=>'Upto INR 1 Lakh', 2=>'INR 1 Lakh to 2 Lakh', 3=>'INR 2 Lakh to 4 Lakh', 4=>'INR 4 Lakh to 7 Lakh', 5=>'INR 7 Lakh to 10 Lakh'];
	$workingWithMap  = [1=>'Private Company', 2=>'Government / Public Sector', 3=>'Defense / Civil Services', 4=>'Business / Self Employed', 5=>'Not Working'];
	$manglikMap      = [1=>'Yes', 2=>'No', 3=>"Don't Know"];

	$basic     = $user->UserBasicDetail ?? null;
	$religion  = $user->UserReligious ?? null;
	$education = $user->UserEducation ?? null;
	$family    = $user->UserFamilyDetail ?? null;
	$location  = $user->UserLocation ?? null;
	$birth     = $user->UserBirthDetail ?? null;
	$contact   = $user->UserContactDetail ?? null;

	$fn = trim((string) ($user->firstName ?? ''));
	$ln = trim((string) ($user->lastName ?? ''));
	$initials = strtoupper(substr($fn,0,1).substr($ln,0,1)) ?: 'SJ';
	$palette = ['#14213d','#e5006d','#1bbf83','#7b2ff7','#f0a500','#d7263d','#3d5cff','#0f766e','#b45309'];
	$color = $palette[($user->id ?? 0) % count($palette)];

	$gallery = collect();
	foreach(($user->UserImage ?? []) as $img){ if(!empty($img->image)) $gallery->push($img->image); }
	$gallery = $gallery->unique()->values();

	$age = null;
	if(!empty($basic) && !empty($basic->dateOfBirth)){
		$age = date_diff(date_create($basic->dateOfBirth), date_create(date('Y-m-d')))->format('%y');
	}
	$heightStr = (!empty($basic) && !empty($basic->heightdetail)) ? $basic->heightdetail->inch : null;
	$ageHeight = trim(implode(', ', array_filter([$age ? $age.' yrs' : null, $heightStr]))) ?: '—';
	$marital   = (!empty($basic->maritalStatus) && isset($maritalMap[$basic->maritalStatus])) ? $maritalMap[$basic->maritalStatus] : '—';
	$religionNm  = (!empty($religion) && !empty($religion->religiondetail)) ? ucwords($religion->religiondetail->name) : '—';
	$communityNm = (!empty($religion) && !empty($religion->communitydetail)) ? ucwords($religion->communitydetail->name) : '—';
	$tongue      = (!empty($religion) && !empty($religion->motherTonguedetail)) ? ucwords($religion->motherTonguedetail->name) : '—';
	$occupation  = (!empty($education) && !empty($education->workingAsdetail)) ? $education->workingAsdetail->name : '—';
	$qualif      = (!empty($education) && !empty($education->educationdetail)) ? $education->educationdetail->name : '—';

	$locBits = [];
	if(!empty($location->citydetail))  $locBits[] = $location->citydetail->name;
	if(!empty($location->statedetail)) $locBits[] = $location->statedetail->name;
	$locationShort = count($locBits) ? implode(', ', $locBits) : '—';
	$locBitsFull = $locBits;
	if(!empty($location->countrydetail)) $locBitsFull[] = $location->countrydetail->name;
	$locationFull = count($locBitsFull) ? implode(', ', $locBitsFull) : '—';

	$dob = (!empty($basic) && !empty($basic->dateOfBirth)) ? date('d M Y', strtotime($basic->dateOfBirth)) : '—';
	$tob = (!empty($birth) && !empty($birth->birthHours)) ? ($birth->birthHours.':'.$birth->birthminute.' '.$birth->birthAmPm) : '—';
	$createdBy = (!empty($basic->profileCreatedBy) && isset($createdByMap[$basic->profileCreatedBy])) ? $createdByMap[$basic->profileCreatedBy] : 'Self';
@endphp

@include('front.partials.profile-detail-styles')

<section class="sj-profile-page">
	<div class="container">

		<!-- ===================== HERO ===================== -->
		<div class="sj-pcard sj-hero">
			<div class="sj-hero-photo" style="background:{{ $color }}">
				@if($gallery->count() > 0)
					<img id="sjHeroImg" src="{{ asset('profiles/'.$gallery[0]) }}" alt="{{ ucfirst($fn) }}">
					@if($gallery->count() > 1)
						<button type="button" class="sj-hero-nav prev" onclick="sjHeroStep(-1)"><i class="fa fa-chevron-left"></i></button>
						<button type="button" class="sj-hero-nav next" onclick="sjHeroStep(1)"><i class="fa fa-chevron-right"></i></button>
					@endif
				@else
					<span class="sj-initials">{{ $initials }}</span>
				@endif
				<span class="sj-photocount"><i class="fa fa-picture-o"></i> {{ $gallery->count() }} {{ \Illuminate\Support\Str::plural('Photo', $gallery->count()) }}</span>
			</div>

			<div class="sj-hero-body">
				<div class="sj-hero-top">
					<div>
						<h1 class="sj-hero-name">{{ ucfirst($fn) ?: '—' }} {{ ucfirst($ln) }} <i class="fa fa-check-circle sj-verified" title="Verified"></i></h1>
						<div class="sj-hero-meta">
							<span class="sj-online">Online Now</span>
							<span class="sj-youher"><i class="fa fa-user"></i> You &amp; Her</span>
						</div>
					</div>
					<div class="sj-hero-actions">
						@if(!empty($connect))
							<span class="sj-btn sj-btn-ghost" style="cursor:default"><i class="fa fa-check-circle" style="color:#1bbf83"></i> Interest Sent</span>
						@else
							<a href="javascript:void(0)" data-id="{{ $user->id }}" class="inviteUser sj-btn sj-btn-primary conect_nww conect_nww{{ $user->id }}"><i class="fa fa-heart"></i> Send Interest</a>
							<span class="sj-btn sj-btn-ghost d-none conect_nwwed conect_nwwed{{ $user->id }}" style="cursor:default"><i class="fa fa-check-circle" style="color:#1bbf83"></i> Interest Sent</span>
						@endif
						<a href="javascript:void(0)" data-id="{{ $user->id }}" class="chatRoomJoin sj-btn sj-btn-ghost"><i class="fa fa-comment-o"></i> Chat Now</a>
						<a href="javascript:void(0)" onclick="sjToggleShortlist(this)" class="sj-btn sj-btn-ghost"><i class="fa fa-bookmark-o"></i> Shortlist</a>
					</div>
				</div>

				<div class="sj-hero-facts">
					<span><i class="fa fa-user-o"></i> {{ $ageHeight }}</span>
					<span><i class="fa fa-heart-o"></i> {{ $marital }}</span>
					<span><i class="fa fa-star-o"></i> {{ $religionNm }}</span>
					<span><i class="fa fa-map-marker"></i> {{ $locationShort }}</span>
					<span><i class="fa fa-comment-o"></i> {{ $tongue }}</span>
					<span><i class="fa fa-briefcase"></i> {{ $occupation }}</span>
				</div>
			</div>
		</div>

		<!-- ===================== GRID ===================== -->
		<div class="sj-grid">

			<!-- ---------- SIDEBAR ---------- -->
			<aside class="sj-aside">

				<div class="sj-pcard sj-aside-card">
					<div class="sj-aside-head"><h4>Photos</h4></div>
					@if($gallery->count() > 0)
						<img class="sj-photo-main" src="{{ asset('profiles/'.$gallery[0]) }}" alt="{{ ucfirst($fn) }}">
						@if($gallery->count() > 1)
							<div class="sj-photo-thumbs">
								@foreach($gallery->slice(1, 4) as $g)
									<img src="{{ asset('profiles/'.$g) }}" alt="photo">
								@endforeach
							</div>
						@endif
					@else
						<div class="sj-photo-main sj-initials-box" style="background:{{ $color }}">{{ $initials }}</div>
						<p style="font-size:12.5px;color:#9aa1b4;margin:0;">No photos uploaded.</p>
					@endif
				</div>

				<div class="sj-pcard sj-aside-card">
					<div class="sj-aside-head"><h4>Quick Actions</h4></div>
					<ul class="sj-qa">
						@if(empty($connect))
							<li><a data-id="{{ $user->id }}" class="inviteUser"><i class="fa fa-heart-o"></i> Send Interest</a></li>
						@else
							<li><a style="cursor:default"><i class="fa fa-check-circle" style="color:#1bbf83"></i> Interest Sent</a></li>
						@endif
						<li><a data-id="{{ $user->id }}" class="chatRoomJoin"><i class="fa fa-comment-o"></i> Chat Now</a></li>
						<li><a onclick="sjToggleShortlist(this)"><i class="fa fa-bookmark-o"></i> Add to Shortlist</a></li>
						<li><a onclick="sjShareProfile()"><i class="fa fa-share-alt"></i> Share Profile</a></li>
						<li><a class="danger" href="{{ URL::to('/contact-us') }}"><i class="fa fa-flag"></i> Report Profile</a></li>
					</ul>
				</div>

				<div class="sj-pcard sj-aside-card sj-vis">
					<h4>Unlock Full Access</h4>
					<p>Premium members can view contact details and send unlimited messages.</p>
					<span class="sj-vis-tag">Go Premium</span>
					<a href="{{ URL::to('/membership') }}" class="sj-btn sj-btn-ghost"><i class="fa fa-diamond"></i> Upgrade Now</a>
				</div>

			</aside>

			<!-- ---------- DETAILED PROFILE ---------- -->
			<div class="sj-pcard sj-detail">
				<h2 class="sj-detail-title">Detailed Profile</h2>

				<!-- About -->
				<div class="sj-sec">
					<div class="sj-sec-head">
						<span class="sj-sec-ico"><i class="fa fa-info"></i></span>
						<h3>About {{ ucfirst($fn) ?: 'Member' }}</h3>
					</div>
					<p class="sj-sec-sub">{{ $user->uniqueId ?? '—' }} &nbsp;|&nbsp; Profile created by {{ $createdBy }}</p>
					<div class="sj-sec-body">
						<p class="sj-sec-text">
							@if(!empty($basic) && !empty($basic->about))
								{{ $basic->about }}
							@else
								{{ ucfirst($fn) ?: 'This member' }} is looking for a compatible life partner with similar values and outlook towards life.
							@endif
						</p>
					</div>
				</div>

				<!-- Contact -->
				<div class="sj-sec">
					<div class="sj-sec-head">
						<span class="sj-sec-ico"><i class="fa fa-phone"></i></span>
						<h3>Contact Details</h3>
					</div>
					<div class="sj-sec-body">
						@if($phoneshowing == 1)
							<div class="sj-kv">
								<div><p class="sj-k">Email ID</p><p class="sj-v">{{ $show($user->email ?? null) }}</p></div>
								<div><p class="sj-k">Phone Number</p><p class="sj-v">{{ $show($contact->mobile ?? null) }}</p></div>
								<div><p class="sj-k">Contact Person</p><p class="sj-v">{{ $show($contact->nameContactPerson ?? null) }}</p></div>
							</div>
						@else
							<p class="sj-locked">
								<i class="fa fa-lock" style="color:#e5006d"></i>
								Contact details are visible to premium members only.
								<a href="{{ URL::to('/membership') }}">Upgrade your plan &rarr;</a>
							</p>
						@endif
					</div>
				</div>

				<!-- Lifestyle -->
				<div class="sj-sec">
					<div class="sj-sec-head">
						<span class="sj-sec-ico"><i class="fa fa-cutlery"></i></span>
						<h3>Lifestyle</h3>
					</div>
					<div class="sj-sec-body">
						<div class="sj-kv">
							<div><p class="sj-k">Diet</p><p class="sj-v">{{ (!empty($basic->diet) && isset($dietMap[$basic->diet])) ? $dietMap[$basic->diet] : '—' }}</p></div>
							<div><p class="sj-k">Blood Group</p><p class="sj-v">{{ $show($basic->bloodGroup ?? null) }}</p></div>
							<div><p class="sj-k">Grew Up In</p><p class="sj-v">{{ $show($location->grewUpdetail->name ?? null) }}</p></div>
						</div>
					</div>
				</div>

				<!-- Background -->
				<div class="sj-sec">
					<div class="sj-sec-head">
						<span class="sj-sec-ico"><i class="fa fa-book"></i></span>
						<h3>Background</h3>
					</div>
					<div class="sj-sec-body">
						<div class="sj-kv">
							<div><p class="sj-k">Religion</p><p class="sj-v">{{ $religionNm }}</p></div>
							<div><p class="sj-k">Community</p><p class="sj-v">{{ $communityNm }}</p></div>
							<div><p class="sj-k">Sub Community</p><p class="sj-v">{{ $show($religion->subCommunity ?? null) }}</p></div>
							<div><p class="sj-k">Mother Tongue</p><p class="sj-v">{{ $tongue }}</p></div>
							<div><p class="sj-k">Location</p><p class="sj-v">{{ $locationFull }}</p></div>
						</div>
					</div>
				</div>

				<!-- Horoscope -->
				<div class="sj-sec">
					<div class="sj-sec-head">
						<span class="sj-sec-ico"><i class="fa fa-sun-o"></i></span>
						<h3>Horoscope Details</h3>
					</div>
					<div class="sj-sec-body">
						<div class="sj-kv">
							<div><p class="sj-k">Born On</p><p class="sj-v">{{ $dob }}</p></div>
							<div><p class="sj-k">Time of Birth</p><p class="sj-v">{{ $tob }}</p></div>
							<div><p class="sj-k">City of Birth</p><p class="sj-v">{{ $show($birth->birthCity ?? null) }}</p></div>
							<div><p class="sj-k">Manglik</p><p class="sj-v">{{ (!empty($birth->manglik) && isset($manglikMap[$birth->manglik])) ? $manglikMap[$birth->manglik] : '—' }}</p></div>
						</div>
					</div>
				</div>

				<!-- Family -->
				<div class="sj-sec">
					<div class="sj-sec-head">
						<span class="sj-sec-ico"><i class="fa fa-home"></i></span>
						<h3>Family Details</h3>
					</div>
					<div class="sj-sec-body">
						<div class="sj-kv">
							<div><p class="sj-k">Father's Status</p><p class="sj-v">{{ (!empty($family->fatherStatus) && isset($parentStatusMap[$family->fatherStatus])) ? $parentStatusMap[$family->fatherStatus] : '—' }}</p></div>
							<div><p class="sj-k">Mother's Status</p><p class="sj-v">{{ (!empty($family->motherStatus) && isset($parentStatusMap[$family->motherStatus])) ? $parentStatusMap[$family->motherStatus] : '—' }}</p></div>
							<div><p class="sj-k">No. of Siblings</p><p class="sj-v">{{ $show($family->sibling ?? null) }}</p></div>
							<div><p class="sj-k">Family Type</p><p class="sj-v">{{ (!empty($family->familyType) && isset($familyTypeMap[$family->familyType])) ? $familyTypeMap[$family->familyType] : '—' }}</p></div>
							<div><p class="sj-k">Family Location</p><p class="sj-v">{{ $show($family->familyLocation ?? null) }}</p></div>
							<div><p class="sj-k">Native Place</p><p class="sj-v">{{ $show($family->nativePlace ?? null) }}</p></div>
						</div>
					</div>
				</div>

				<!-- Education & Career -->
				<div class="sj-sec">
					<div class="sj-sec-head">
						<span class="sj-sec-ico"><i class="fa fa-graduation-cap"></i></span>
						<h3>Education &amp; Career</h3>
					</div>
					<div class="sj-sec-body">
						<div class="sj-kv">
							<div><p class="sj-k">Highest Qualification</p><p class="sj-v">{{ $qualif }}</p></div>
							<div><p class="sj-k">Working With</p><p class="sj-v">{{ (!empty($education->workingWith) && isset($workingWithMap[$education->workingWith])) ? $workingWithMap[$education->workingWith] : '—' }}</p></div>
							<div><p class="sj-k">Annual Income</p><p class="sj-v">{{ (!empty($education->income) && isset($incomeMap[$education->income])) ? $incomeMap[$education->income] : '—' }}</p></div>
							<div><p class="sj-k">Occupation</p><p class="sj-v">{{ $occupation }}</p></div>
							<div><p class="sj-k">Employer Name</p><p class="sj-v">{{ $show($education->employerName ?? null) }}</p></div>
						</div>
					</div>
				</div>

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

<script>
	@if($gallery->count() > 1)
	(function(){
		var imgs = @json($gallery->map(fn($g) => asset('profiles/'.$g))->values());
		var i = 0;
		window.sjHeroStep = function(dir){
			i = (i + dir + imgs.length) % imgs.length;
			var el = document.getElementById('sjHeroImg');
			if(el) el.src = imgs[i];
		};
	})();
	@endif

	window.sjToggleShortlist = function(el){
		el.classList.toggle('sj-shortlisted');
		var on = el.classList.contains('sj-shortlisted');
		var icon = el.querySelector('i');
		if(icon){ icon.className = on ? 'fa fa-bookmark' : 'fa fa-bookmark-o'; }
		if(typeof jQuery !== 'undefined' && jQuery.toast){
			jQuery.toast({ text: on ? 'Added to shortlist' : 'Removed from shortlist', showHideTransition:'fade', hideAfter:2000, position:'top-right', icon: on ? 'success' : 'info' });
		}
	};

	window.sjShareProfile = function(){
		var url = window.location.href;
		if(navigator.clipboard){
			navigator.clipboard.writeText(url).then(function(){
				if(typeof jQuery !== 'undefined' && jQuery.toast){
					jQuery.toast({ text:'Profile link copied to clipboard', showHideTransition:'fade', hideAfter:2000, position:'top-right', icon:'success' });
				}
			});
		} else {
			window.prompt('Copy this profile link:', url);
		}
	};
</script>

@include('layouts.footer')
