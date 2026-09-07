@php
	$mode = $mode ?? 'listing';
	$palette = $palette ?? ['#14213d','#e5006d','#1bbf83','#7b2ff7','#f0a500','#d7263d','#3d5cff','#0f766e','#b45309'];

	$connect = App\Helpers\GlobalFunctions::getnotificationInvite(Auth::User()->id, $user->id);

	$age = '';
	if(!empty($user->UserBasicDetail) && !empty($user->UserBasicDetail->dateOfBirth)){
		$diff = date_diff(date_create($user->UserBasicDetail->dateOfBirth), date_create(date('Y-m-d')));
		$age = $diff->format('%y');
	}
	$fn = trim((string) $user->firstName);
	$ln = trim((string) $user->lastName);
	$initials = strtoupper(substr($fn,0,1) . substr($ln,0,1));
	if($initials === '') $initials = 'SJ';
	$color = $palette[$user->id % count($palette)];
	$photos = count($user->UserImage);

	$ageHeight = $age ? ($age.' yrs') : 'Age N/A';
	if(!empty($user->UserBasicDetail) && !empty($user->UserBasicDetail->heightdetail)){
		$ageHeight .= ', '.$user->UserBasicDetail->heightdetail->inch;
	}

	$maritalMap = [1 => 'Never Married', 2 => 'Divorced', 3 => 'Awaiting Divorce'];
	$marital = '—';
	if(!empty($user->UserBasicDetail) && !empty($user->UserBasicDetail->maritalStatus) && isset($maritalMap[$user->UserBasicDetail->maritalStatus])){
		$marital = $maritalMap[$user->UserBasicDetail->maritalStatus];
	}

	$religionName = (!empty($user->UserReligious) && !empty($user->UserReligious->religiondetail)) ? ucwords($user->UserReligious->religiondetail->name) : '—';

	$locParts = [];
	if(!empty($user->UserLocation) && !empty($user->UserLocation->citydetail)) $locParts[] = $user->UserLocation->citydetail->name;
	if(!empty($user->UserLocation) && !empty($user->UserLocation->statedetail)) $locParts[] = $user->UserLocation->statedetail->name;
	$location = count($locParts) ? implode(', ', $locParts) : '—';

	$motherTongue = (!empty($user->UserReligious) && !empty($user->UserReligious->motherTonguedetail)) ? ucwords($user->UserReligious->motherTonguedetail->name) : '—';

	$occupation = (!empty($user->UserEducation) && !empty($user->UserEducation->workingAsdetail)) ? $user->UserEducation->workingAsdetail->name : '—';

	$bio = (!empty($user->UserBasicDetail) && !empty($user->UserBasicDetail->about))
		? \Illuminate\Support\Str::limit($user->UserBasicDetail->about, 150, '...')
		: (ucfirst($fn).' is looking for a compatible life partner with similar values and outlook towards life.');
@endphp

<div class="sj-card sj-profile">

	<div class="sj-avatar">
		@if($mode === 'listing')
			<span class="sj-badge-new">New</span>
		@endif
		@if($photos > 0)
			<img src="{{ asset('profiles/'.$user->UserImage[0]->image) }}" alt="{{ ucfirst($fn) }}">
			<span class="sj-badge-photos"><i class="fa fa-camera"></i> {{ $photos }}</span>
		@else
			<span class="sj-initials" style="background:{{ $color }}">{{ $initials }}</span>
		@endif
	</div>

	<div class="sj-info">
		<div class="sj-name-row">
			<h3>
				<a href="{{ URL::to('/user-profile/'.$user->uniqueId) }}" style="color:inherit;text-decoration:none;">
					{{ ucfirst($fn) ?: '-' }} {{ ucfirst($ln) }}
				</a>
				<i class="fa fa-check-circle sj-verified" title="Verified"></i>
			</h3>
			<button type="button" class="sj-bookmark" title="Save profile"><i class="fa fa-bookmark-o"></i></button>
		</div>
		<span class="sj-youher" data-toggle="tooltip" data-placement="bottom" title="Compatibility"><i class="fa fa-user"></i> You &amp; Her</span>

		<div class="sj-details">
			<span><i class="fa fa-birthday-cake"></i> {{ $ageHeight }}</span>
			<span><i class="fa fa-heart-o"></i> {{ $marital }}</span>
			<span><i class="fa fa-star-o"></i> {{ $religionName }}</span>
			<span><i class="fa fa-map-marker"></i> {{ $location }}</span>
			<span><i class="fa fa-comment-o"></i> {{ $motherTongue }}</span>
			<span><i class="fa fa-briefcase"></i> {{ $occupation }}</span>
		</div>

		<p class="sj-bio">
			{{ $bio }}
			<a href="{{ URL::to('/user-profile/'.$user->uniqueId) }}">Read more</a>
		</p>
	</div>

	<div class="sj-actions">
		<div class="sj-act">
			<a href="javascript:void(0)" data-id="{{ $user->id }}" class="chatRoomJoin sj-icon-btn sj-chat"><i class="fa fa-comment"></i></a>
			<p>Chat</p>
		</div>

		@if($mode === 'connection' || !empty($connect))
			<div class="sj-act">
				<i class="fa fa-check-circle sj-connected-ico"></i>
				<p>Connected</p>
			</div>
		@else
			<div class="sj-act conect_nww conect_nww{{ $user->id }}">
				<p>Like this profile?</p>
				<a href="javascript:void(0)" data-id="{{ $user->id }}" class="inviteUser sj-icon-btn sj-like"><i class="fa fa-heart"></i></a>
				<a href="javascript:void(0)" data-id="{{ $user->id }}" class="inviteUser sj-connect-now"><i class="fa fa-user-plus"></i> Connect Now</a>
			</div>
			<div class="sj-act d-none conect_nwwed conect_nwwed{{ $user->id }}">
				<i class="fa fa-check-circle sj-connected-ico"></i>
				<p>Connected</p>
			</div>
		@endif
	</div>

</div>
