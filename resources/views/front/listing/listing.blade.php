@include('layouts.header')


		<section class="listing_wpas">
			<div class="container">
				<div class="row">

					<div class="col-md-3">

						<div class="serach_filters">
							<h3 class="mt-0 mb-4">Refine Search</h3>

		                  <div class="serach_filters_col">
		                  	<h6 class="text-uppercase font-weight-bold mb-3">Photo Settings</h6>
			                  <div class="mt-2 mb-2 pl-2">
			                    <div class="custom-control custom-checkbox">
			                      <input type="checkbox" class="custom-control-input" id="category-1">
			                      <label class="custom-control-label" for="category-1">All</label>
			                    </div>
			                  </div>
			                  <div class="mt-2 mb-2 pl-2">
			                    <div class="custom-control custom-checkbox">
			                      <input type="checkbox" class="custom-control-input" id="category-2">
			                      <label class="custom-control-label" for="category-2">Visible to all(34)</label>
			                    </div>
			                  </div>
			                  <div class="mt-2 mb-2 pl-2">
			                    <div class="custom-control custom-checkbox">
			                      <input type="checkbox" class="custom-control-input" id="category-3">
			                      <label class="custom-control-label" for="category-3">Protected Phot...(12)</label>
			                    </div>
			                  </div>
		                  </div>


						</div>

					</div>


					<div class="col-md-9">
						<div class="listing_wrapps">
							<?php
							if(count($users) > 0)
							{
							foreach ($users as $key => $user) { ?>
								<div class="listing_st">
									<div class="row">
										<div class="col-md-3">
											<div class="listing_imgs">
												@if(!empty($user->UserImage->image))
				                   <img src="{{ asset('profiles/'.$user->UserImage->image) }}" >
												@else
												<img src="{{ asset('front/images/nofound.png') }}" >
				                @endif
											</div>
										</div>
										<div class="col-md-6">
											<div class="listing_details">
												<div class="listing_details_head">
													<h3>{{ucfirst($user->firstName) ?? "-"}} {{ucfirst($user->lastName) ?? "-"}}</h3>
													<div class="d_flex_head">
														@php
														$date = Date('Y-m-d H:i:s');
														$time = 0;
														if(isset($m->UserOnline))
														{
														$time = strtotime($date) - strtotime($m->detail->online->date);
														}
														else
														{
														$time = 22;
														 }
														 @endphp
														@if($time > 20)
														@else
														<span><i class="fa fa-comments"></i> Online now</span>
														@endif
														<span data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom"><i class="fa fa-user"></i> You & Her</span>
													</div>
												</div>
												<div class="listing_details_title">
													<a class="d_flex_title" href="#">
														<?php
														if(!empty($user->UserBasicDetail))
														{
														$dateOfBirth = $user->UserBasicDetail->dateOfBirth;
														$today = date("Y-m-d");
														$diff = date_diff(date_create($dateOfBirth), date_create($today));
														$age = $diff->format('%y');
													 }
													 else{
														 $age ='';
													 }
														?>

														<span>@if($age){{ $age }} yrs, @endif
														@if(!empty($user->UserBasicDetail->height))

                          								@if($user->UserBasicDetail->height == 1)
											            4' 5"
											            @endif
											            @if($user->UserBasicDetail->height == 2)
											            4' 6"
											            @endif
											            @if($user->UserBasicDetail->height == 3)
											            4' 7"
											            @endif
											            @if($user->UserBasicDetail->height == 4)
											            4' 8"
											            @endif
											            @if($user->UserBasicDetail->height == 5)
											            4' 9"
											            @endif
											            @if($user->UserBasicDetail->height == 6)
											            4' 10"
											            @endif
											            @if($user->UserBasicDetail->height == 7)
											            4' 11"
											            @endif
											            @if($user->UserBasicDetail->height == 8)
											            5'
											            @endif
											            @if($user->UserBasicDetail->height == 9)
											            5' 1"
											            @endif
											            @if($user->UserBasicDetail->height == 10)
											            5' 2"
											            @endif
											            @if($user->UserBasicDetail->height == 11)
											            5' 3"
											            @endif
											            @if($user->UserBasicDetail->height == 12)
											            5' 4"
											            @endif
											            @if($user->UserBasicDetail->height == 13)
											            5' 5"
											            @endif
											            @if($user->UserBasicDetail->height == 14)
											            5' 6"
											            @endif
											            @if($user->UserBasicDetail->height == 15)
											            5' 7"
											            @endif
											            @if($user->UserBasicDetail->height == 16)
											            5' 8"
											            @endif
											            @if($user->UserBasicDetail->height == 17)
											            5' 9"
											            @endif
											            @if($user->UserBasicDetail->height == 18)
											            5' 10"
											            @endif
											            @if($user->UserBasicDetail->height == 19)
											            5' 11"
											            @endif
											            @if($user->UserBasicDetail->height == 20)
											            6'
											            @endif
											            @if($user->UserBasicDetail->height == 21)
											            6' 1"
											            @endif
											            @if($user->UserBasicDetail->height == 22)
											            6' 2"
											            @endif
											            @if($user->UserBasicDetail->height == 23)
											            6' 3"
											            @endif
											            @if($user->UserBasicDetail->height == 24)
											            6' 4"
											            @endif
											            @if($user->UserBasicDetail->height == 25)
											            6' 5"
											            @endif
											            @if($user->UserBasicDetail->height == 26)
											            6' 6"
											            @endif
											            @if($user->UserBasicDetail->height == 27)
											            6' 7"
											            @endif
											            @if($user->UserBasicDetail->height == 28)
											            6' 8"
											            @endif
											            @if($user->UserBasicDetail->height == 29)
											            6' 9"
											            @endif
											            @if($user->UserBasicDetail->height == 30)
											            6' 10"
											            @endif
											            @if($user->UserBasicDetail->height == 31)
											            6' 11"
											            @endif
											            @if($user->UserBasicDetail->height == 32)
											            7'
											            @endif
											            @endif
														</span>
														<span>
															@if(!empty($user->UserBasicDetail->maritalStatus))
									                        @if($user->UserBasicDetail->maritalStatus == 1)
									                        Never Married
									                        @endif
									                        @if($user->UserBasicDetail->maritalStatus == 2)
									                        Divorced
									                        @endif
									                        @if($user->UserBasicDetail->maritalStatus == 3)
									                        Awaiting Divorce
									                        @endif
									                        @endif
									                    </span>
														<span>
														  @if(!empty($user->UserReligious->Religion))
								                          @if($user->UserReligious->Religion == 1)
								                          Hindu
								                          @endif
								                          @if($user->UserReligious->Religion == 2)
								                          Muslim
								                          @endif
								                          @if($user->UserReligious->Religion == 3)
								                          Christian
								                          @endif
								                          @if($user->UserReligious->Religion == 4)
								                          Sikh
								                          @endif
								                          @if($user->UserReligious->Religion == 5)
								                          Parsi
								                          @endif
								                          @endif
								                        </span>
														<span>
															@if(!empty($user->UserLocation->citydetail)) {{ $user->UserLocation->citydetail->name }} @endif,
															@if(!empty($user->UserLocation->statedetail)) {{ $user->UserLocation->statedetail->name }} @endif

														</span>
														<span>
															@if(!empty($user->UserReligious->motherTongue))
									                        @if($user->UserReligious->motherTongue == 1)
									                        Hindi
									                        @endif
									                        @if($user->UserReligious->motherTongue == 2)
									                        Marathi
									                        @endif
									                        @if($user->UserReligious->motherTongue == 3)
									                        Punjabi
									                        @endif
									                        @if($user->UserReligious->motherTongue == 4)
									                        Bengali
									                        @endif
									                        @if($user->UserReligious->motherTongue == 5)
									                        Gujarati
									                        @endif
									                        @if($user->UserReligious->motherTongue == 6)
									                        Urdu
									                        @endif
									                        @endif
									                    </span>
														<span>
															@if(!empty($user->UserEducation->workingAs))
									                        @if($user->UserEducation->workingAs == 1) Banking Professional @endif
									                        @if($user->UserEducation->workingAs == 2) Chartered Accountant @endif
									                        @if($user->UserEducation->workingAs == 3) Company Secretary @endif
									                        @if($user->UserEducation->workingAs == 4) Finance Professional @endif
									                        @if($user->UserEducation->workingAs == 5) Investment Professional @endif
									                        @if($user->UserEducation->workingAs == 6) Accounting Professional (Others) @endif
									                        @if($user->UserEducation->workingAs == 7) Admin Professional @endif
									                        @if($user->UserEducation->workingAs == 8) Human Resources Professional @endif
									                        @if($user->UserEducation->workingAs == 9) Actor @endif
									                        @if($user->UserEducation->workingAs == 10) Advertising Professional @endif
									                        @if($user->UserEducation->workingAs == 11) Entertainment Professional @endif
									                        @if($user->UserEducation->workingAs == 12) Event Manager @endif
									                        @if($user->UserEducation->workingAs == 13) Journalist @endif
									                        @if($user->UserEducation->workingAs == 14) Media Professional @endif
									                        @if($user->UserEducation->workingAs == 15) Public Relations Professional @endif
									                        @if($user->UserEducation->workingAs == 16) Farming @endif
									                        @if($user->UserEducation->workingAs == 17) Horticulturist @endif
									                        @if($user->UserEducation->workingAs == 18) Agricultural Professional (Others) @endif
									                        @if($user->UserEducation->workingAs == 19) Air Hostess / Flight Attendant @endif
									                        @if($user->UserEducation->workingAs == 20) Pilot / Co-Pilot @endif
									                        @if($user->UserEducation->workingAs == 21) Other Airline Professional @endif
									                        @if($user->UserEducation->workingAs == 22) Architect @endif
									                        @if($user->UserEducation->workingAs == 23) Interior Designer @endif
									                        @if($user->UserEducation->workingAs == 24) Landscape Architect @endif
									                        @if($user->UserEducation->workingAs == 25) Animator @endif
									                        @if($user->UserEducation->workingAs == 26) Commercial Artist @endif
									                        @if($user->UserEducation->workingAs == 27) Web / UX Designers @endif
									                        @if($user->UserEducation->workingAs == 28) Artist (Others) @endif
									                        @if($user->UserEducation->workingAs == 29) Beautician @endif
									                        @if($user->UserEducation->workingAs == 30) Fashion Designer @endif
									                        @if($user->UserEducation->workingAs == 31) Hairstylist @endif
									                        @if($user->UserEducation->workingAs == 32) Jewellery Designer @endif
									                        @if($user->UserEducation->workingAs == 33) Designer (Others) @endif
									                        @if($user->UserEducation->workingAs == 34) Customer Support / BPO / KPO Professional @endif
									                        @if($user->UserEducation->workingAs == 35) IAS / IRS / IES / IFS @endif
									                        @if($user->UserEducation->workingAs == 36) Indian Police Services (IPS) @endif
									                        @if($user->UserEducation->workingAs == 37) Law Enforcement Employee (Others) @endif
									                        @if($user->UserEducation->workingAs == 38) Airforce @endif
									                        @if($user->UserEducation->workingAs == 39) Army @endif
									                        @if($user->UserEducation->workingAs == 40) Navy @endif
									                        @if($user->UserEducation->workingAs == 41) Defense Services (Others) @endif
									                        @if($user->UserEducation->workingAs == 42) Lecturer @endif
									                        @if($user->UserEducation->workingAs == 43) Professor @endif
									                        @if($user->UserEducation->workingAs == 44) Research Assistant @endif
									                        @if($user->UserEducation->workingAs == 45) Research Scholar @endif
									                        @if($user->UserEducation->workingAs == 46) Teacher @endif
									                        @if($user->UserEducation->workingAs == 47) Training Professional (Others) @endif
									                        @if($user->UserEducation->workingAs == 48) Civil Engineer @endif
									                        @if($user->UserEducation->workingAs == 49) Electronics / Telecom Engineer @endif
									                        @if($user->UserEducation->workingAs == 50) Mechanical / Production Engineer @endif
									                        @if($user->UserEducation->workingAs == 51) Non IT Engineer (Others) @endif
									                        @if($user->UserEducation->workingAs == 52) Chef / Sommelier / Food Critic @endif
									                        @if($user->UserEducation->workingAs == 53) Catering Professional @endif
									                        @if($user->UserEducation->workingAs == 54) Hotel &amp; Hospitality Professional (Others) @endif
									                        @if($user->UserEducation->workingAs == 55) Software Developer / Programmer @endif
									                        @if($user->UserEducation->workingAs == 56) Software Consultant @endif
									                        @if($user->UserEducation->workingAs == 57) Hardware &amp; Networking professional @endif
									                        @if($user->UserEducation->workingAs == 58) Software Professional (Others) @endif
									                        @if($user->UserEducation->workingAs == 59) Lawyer @endif
									                        @if($user->UserEducation->workingAs == 60) Legal Assistant @endif
									                        @if($user->UserEducation->workingAs == 61) Legal Professional (Others) @endif
									                        @if($user->UserEducation->workingAs == 62) Dentist @endif
									                        @if($user->UserEducation->workingAs == 63) Doctor @endif
									                        @if($user->UserEducation->workingAs == 64) Medical Transcriptionist @endif
									                        @if($user->UserEducation->workingAs == 65) Nurse @endif
									                        @if($user->UserEducation->workingAs == 66) Pharmacist @endif
									                        @if($user->UserEducation->workingAs == 67) Physician Assistant @endif
									                        @if($user->UserEducation->workingAs == 68) Psychologist @endif
									                        @if($user->UserEducation->workingAs == 69) Surgeon @endif
									                        @if($user->UserEducation->workingAs == 70) Veterinary Doctor @endif
									                        @if($user->UserEducation->workingAs == 71) Therapist (Others) @endif
									                        @if($user->UserEducation->workingAs == 72) Medical / Healthcare Professional (Others) @endif
									                        @if($user->UserEducation->workingAs == 73) Merchant Naval Officer @endif
									                        @if($user->UserEducation->workingAs == 74) Mariner @endif
									                        @if($user->UserEducation->workingAs == 75) Marketing Professional @endif
									                        @if($user->UserEducation->workingAs == 76) Sales Professional @endif
									                        @if($user->UserEducation->workingAs == 77) Biologist / Botanist @endif
									                        @if($user->UserEducation->workingAs == 78) Physicist @endif
									                        @if($user->UserEducation->workingAs == 79) Science Professional (Others) @endif
									                        @if($user->UserEducation->workingAs == 80) CxO / Chairman / Director / President @endif
									                        @if($user->UserEducation->workingAs == 81) VP / AVP / GM / DGM @endif
									                        @if($user->UserEducation->workingAs == 82) Sr. Manager / Manager @endif
									                        @if($user->UserEducation->workingAs == 83) Consultant / Supervisor / Team Leads @endif
									                        @if($user->UserEducation->workingAs == 84) Team Member / Staff @endif
									                        @if($user->UserEducation->workingAs == 85) Agent / Broker / Trader / Contractor @endif
									                        @if($user->UserEducation->workingAs == 86) Business Owner / Entrepreneur @endif
									                        @if($user->UserEducation->workingAs == 87) Politician @endif
									                        @if($user->UserEducation->workingAs == 88) Social Worker / Volunteer / NGO @endif
									                        @if($user->UserEducation->workingAs == 89) Sportsman @endif
									                        @if($user->UserEducation->workingAs == 90) Travel &amp; Transport Professional @endif
									                        @if($user->UserEducation->workingAs == 91) Writer @endif
									                        @if($user->UserEducation->workingAs == 92) Student @endif
									                        @if($user->UserEducation->workingAs == 93) Retired @endif
									                        @if($user->UserEducation->workingAs == 94) Not working @endif

									                        @endif
														</span>
													</a>
												</div>
												<div class="ListItemStyles__Bios">
												@if(!empty($user->UserBasicDetail->about))	{{ str_limit($user->UserBasicDetail->about, $limit = 150, $end = '...')  }} @endif
													<a class="ListItemStyles__ReadMoreLink" href="{{URL::to('/user-profile/'.$user->uniqueId)}}">More</a>
												</div>
											</div>
										</div>
										<?php $connect = App\Helpers\GlobalFunctions::getnotificationInvite(Auth::User()->id,$user->id); ?>

										<div class="col-md-3">
											<div class="conect_nwwed conect_nwwed{{ $user->id }}">
												<a data-id="{{ $user->id }}" class="chatRoomJoin"><i class="fa fa-comment"></i></a>
												<p>Chat</p>
											</div>

											@if(!empty($connect))
											<div class="conect_nwwed conect_nwwed{{ $user->id }}">
												<i  class="fa fa-check-circle"></i>
												<p>Connected</p>
											</div>
											@else
											<div class="conect_nww conect_nww{{ $user->id }}">
												<p>Like this profile?</p>
												<a data-id="{{ $user->id }}" class="inviteUser"><i class="fa fa-check-circle"></i></a>
												<p>Connect Now</p>
											</div>

											<div class="d-none conect_nwwed conect_nwwed{{ $user->id }}">
												<i class="fa fa-check-circle"></i>
												<p>Connected</p>
											</div>
											@endif

										</div>
									</div>
								</div>
							<?php } } ?>

							<div class="pagination">{{ $users->links() }}</div>




						</div>
					</div>

				</div>
			</div>
		</section>

    @include('layouts.footer')
