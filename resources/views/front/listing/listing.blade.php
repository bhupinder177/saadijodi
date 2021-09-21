@include('layouts.header')


		<section class="listing_wpas">
			<div class="container">
				<div class="row">

					<div class="col-md-3">

						<div class="serach_filters">
							<h3 class="mt-0 mb-4"> Search</h3>
		                  <div class="">
												<form action="{{URL::to('/listing')}}"  method="GET">


													<div class="mt-2 mb-2 pl-2">
													 <div class="form_group_wrap">
															<label>Gender</label>
														 <select name="gender"  id="category-1">
													 <option  value="">Select Gender</option>
													 <option @if($gender == 1) selected @endif  value="1" >Male</option>
													 <option @if($gender == 2) selected @endif  value="2" >Female</option>
											 </select>
													 </div>
												 </div>

			                  <div class="mt-2 mb-2 pl-2">
													<div class="form_group_wrap">
                            <label>Religion</label>
			                      <select name="religion"  id="category-1">
	                        <option  value="">Select religion</option>
													@if($allreligion)
													@foreach($allreligion as $rel)
	                        <option @if($relation == $rel->id) selected @endif  value="{{ $rel->id }}" >{{ ucwords($rel->name) }}</option>
													@endforeach
													@endif
	                    </select>
			                    </div>
			                  </div>
			                  <div class="mt-2 mb-2 pl-2">
													<div class="form_group_wrap">
                            <label>Country</label>
			                      <select class="countryChange" name="country"  id="category-1">
	                        <option  value="">Select country</option>
													@if($allcountry)
													@foreach($allcountry as $country)
	                        <option @if($countryId == $country->id) selected @endif  value="{{ $country->id }}" >{{ ucwords($country->name) }}</option>
													@endforeach
													@endif
	                    </select>
			                    </div>
			                  </div>
			                  <div class="mt-2 mb-2 pl-2 statefilter @if(empty($allstates)) @if(empty($allstates))  @endif d-none @endif">
													<div class="form_group_wrap">
                            <label>State</label>
			                      <select class="stateChange" name="state"  id="category-1">
	                        <option  value="">Select State</option>
													@if($allstates)
													@foreach($allstates as $st)
													<option @if($stateId == $st->id) selected @endif  value="{{ $st->id }}" >{{ ucwords($st->name) }}</option>
													@endforeach
													@endif
	                    </select>
			                    </div>
			                  </div>
			                  <div class="mt-2 mb-2 pl-2 cityfilter @if(!empty($allcity))  @else d-none @endif">
													<div class="form_group_wrap">
                            <label>City</label>
			                      <select class="cityChange" name="city"  id="category-1">
	                        <option  value="">Select City</option>
													@if($allcity)
													@foreach($allcity as $ci)
													<option @if($cityId == $ci->id) selected @endif  value="{{ $ci->id }}" >{{ ucwords($ci->name) }}</option>
													@endforeach
													@endif
	                    </select>
			                    </div>
			                  </div>
												<div class="mt-2 mb-2 pl-2">
												 <div class="form_group_wrap">
													<input type="submit" value="Search" class="btn btn-success searchbtn">
													<a href="{{URL::to('/listing')}}"  class="btn btn-success resetbtn">Reset</a>
												 </div>
											 </div>
										 </form>
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

												@if(count($user->UserImage) > 0)
											<div class="listing_imgs">
											<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
											  <div class="carousel-inner">
													@foreach($user->UserImage as $k=>$img)
											    <div class="carousel-item @if($k == 0) active @endif">
											      <img class="d-block w-100" src="{{ asset('profiles/'.$img->image) }}" alt="First slide">
											    </div>
													@endforeach
											  </div>
											  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
											    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
											    <span class="sr-only">Previous</span>
											  </a>
											  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
											    <span class="carousel-control-next-icon" aria-hidden="true"></span>
											    <span class="sr-only">Next</span>
											  </a>
											</div>
										</div>
										<!-- slider -->
										<!-- no image -->
										@else
									 <div class="listing_imgs">
											<img src="{{ asset('front/images/nofound.png') }}" >
										</div>
										<!-- no image -->

										<!-- slider -->
										@endif

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
														<span data-toggle="tooltip" data-placement="bottom" ><i class="fa fa-user"></i> You & Her</span>
													</div>
												</div>
												<div class="listing_details_title">
													<a class="d_flex_title" href="{{URL::to('/user-profile/'.$user->uniqueId)}}">
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
														@if(!empty($user->UserBasicDetail->heightdetail))
                              {{ $user->UserBasicDetail->heightdetail->inch }}
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
														  @if(!empty($user->UserReligious->religiondetail))
								               {{ ucwords($user->UserReligious->religiondetail->name) }}
								                @endif
								                        </span>
														<span>
															@if(!empty($user->UserLocation->citydetail)) {{ $user->UserLocation->citydetail->name }} @endif,
															@if(!empty($user->UserLocation->statedetail)) {{ $user->UserLocation->statedetail->name }} @endif

														</span>
														<span>
															@if(!empty($user->UserReligious->motherTonguedetail))
									                       {{ ucwords($user->UserReligious->motherTonguedetail->name) }}
									                        @endif
									                    </span>
														<span>
															@if(!empty($user->UserEducation->workingAsdetail))
									              {{ $user->UserEducation->workingAsdetail->name }}
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
											<div class="connect_parent">


											<div class="conect_nwwed conect_nwwed{{ $user->id }}">
												<a hand data-id="{{ $user->id }}" class="chatRoomJoin"><i class="fa fa-comment"></i></a>
												<p>Chat</p>
											</div>

											@if(!empty($connect))
											<div class="conect_nwwed conect_nwwed{{ $user->id }}">
												<i class="fa fa-check-circle"></i>
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
								</div>
							<?php } } else
							{ ?>
								<div class="norecordfound">No record found</div>
							<?php } ?>

							<div class="pagination">{{ $users->links() }}</div>




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
										 <h5 class="messagetext">Add our membership plan to get the feature of "Chat &  Invites". You can chat & send invites to people you like.</h5>

										</div>

									 <div class="modal-footer">
										 <a href="{{URL::to('/membership')}}" class="btn btn-success" >Membership</a>
										 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									 </div>
								 </div>

							 </div>
						 </div>
								 <!-- Plan Update -->


    @include('layouts.footer')
