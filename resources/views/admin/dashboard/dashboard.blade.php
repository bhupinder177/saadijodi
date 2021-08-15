
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<div class="page-content">
       <div class="container-fluid">
           <div class="row">
               <div class="col-md-12">
                 <section class="content-header">
                   <ol class="breadcrumb">
                     <li class="active">Dashboard</li>
                   </ol>
                 </section>
                 <div class="row">
                 <!-- users -->
                 <div class="col-md-4">
                   <a href="{{URL::to($prefix.'/userlist')}}">
                       <div class="emp wow bounceInDown  animated" style="visibility: visible; animation-name: bounceInDown;">
                           <ul class="ul-list unstyle mb-0">
                               <li>
                                   <div class="bg-blue">
                                       <img src="{{ asset('admin/images/driver.png')}}" class="image-fluid">
                                   </div>
                               </li>
                               <li>
                                   <div class="content">
                                       <p>Users</p>
                                       <span>{{ $user }}</span>
                                   </div>
                               </li>
                           </ul>
                       </div>
                       </a>
                   </div>
                   <!-- users -->

                   <!-- vehicle -->
                   <div class="col-md-4">
                     <a href="{{URL::to($prefix.'/packages')}}">
                         <div class="emp wow bounceInDown  animated" style="visibility: visible; animation-name: bounceInDown;">
                             <ul class="ul-list unstyle mb-0">
                                 <li>
                                     <div class="bg-blue">
                                         <img src="{{ asset('admin/images/taxi.png')}}" class="image-fluid">
                                     </div>
                                 </li>
                                 <li>
                                     <div class="content">
                                         <p>Package</p>
                                         <span>{{ $package }}</span>
                                     </div>
                                 </li>
                             </ul>
                         </div>
                         </a>
                     </div>
                     <!-- vehicle -->

                     <!-- coupon -->
                     <div class="col-md-4">
                       <a href="{{URL::to($prefix.'/coupon')}}">
                           <div class="emp wow bounceInDown  animated" style="visibility: visible; animation-name: bounceInDown;">
                               <ul class="ul-list unstyle mb-0">
                                   <li>
                                       <div class="bg-blue">
                                           <img src="{{ asset('admin/images/driver.png')}}" class="image-fluid">
                                       </div>
                                   </li>
                                   <li>
                                       <div class="content">
                                           <p>Coupons</p>
                                           <span>{{ $coupon }}</span>
                                       </div>
                                   </li>
                               </ul>
                           </div>
                           </a>
                       </div>
                       <!-- Coupon -->
                     <!-- stories -->
                     <div class="col-md-4">
                       <a href="{{URL::to($prefix.'/stories')}}">
                           <div class="emp wow bounceInDown  animated" style="visibility: visible; animation-name: bounceInDown;">
                               <ul class="ul-list unstyle mb-0">
                                   <li>
                                       <div class="bg-blue">
                                           <img src="{{ asset('admin/images/driver.png')}}" class="image-fluid">
                                       </div>
                                   </li>
                                   <li>
                                       <div class="content">
                                           <p>Stories</p>
                                           <span>{{ $stories }}</span>
                                       </div>
                                   </li>
                               </ul>
                           </div>
                           </a>
                       </div>
                       <!-- stories -->









                 </div>
               </div>
               <!--.col-->

               <!--.col-->
           </div>
           <!--.row-->


       </div>
       <!--.container-fluid-->
   </div>
   <!--.page-content-->
    @include('admin.layouts.footer')
