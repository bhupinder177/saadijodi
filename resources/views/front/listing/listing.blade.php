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
														<span><i class="fa fa-comments"></i> Online now</span>
														<span data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom"><i class="fa fa-user"></i> You & Her</span>
													</div>
												</div>
												<div class="listing_details_title">
													<a class="d_flex_title" href="#">
														<span>24 yrs,
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
											            @else
											            -
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
									                        @else
									                        -
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
								                          @else
								                          -
								                          @endif
								                        </span>
														<span>Kapurthala, Punjab</span>
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
									                        @else
									                        -
									                        @endif</span>
														<span>Software Developer / Programmer</span>
													</a>
												</div>
												<div class="ListItemStyles__Bios">
												@if(!empty($user->UserBasicDetail->about))	{{ str_limit($user->UserBasicDetail->about, $limit = 150, $end = '...')  }} @endif
													<a class="ListItemStyles__ReadMoreLink" href="{{URL::to('/user-profile/'.$user->uniqueId)}}">More</a>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="conect_nww">
												<p>Like this profile?</p>
												<i class="fa fa-check-circle"></i>
												<p>Connect Now</p>
											</div>
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
