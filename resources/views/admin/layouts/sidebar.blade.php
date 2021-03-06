<div class="mobile-menu-left-overlay"></div>
<nav class="side-menu">
  <ul class="side-menu-list">

    <!-- *******************Admin start menu ************************-->
    <?php
                $url = URL::to('/');
                $string = request()->route()->getPrefix();
                $getprefix = str_replace('/', '', $string);
                $segment   = Request::segment(2);
                $prefixurl = $url.'/'.$getprefix.'/';
                $authuser = Auth::user();
                ?>


    <li  <?php if(request()->segment(2) == "dashboard"){ ?>class="active" <?php } ?> >
      <a href="{{URL::to($getprefix.'/dashboard')}}">
        <span><i class="fa fa-tachometer"></i><span class="lbl">Dashboard</span></span>
      </a>
    </li>

    <li <?php if(request()->segment(2) == "home" ){ ?>class="active" <?php } ?>>
      <a href="{{URL::to($getprefix.'/home')}}">
        <span><i class="fa fa-home"></i><span class="lbl">Home</span></span>
      </a>

    </li>

    <li <?php if(request()->segment(2) == "userlist" || request()->segment(1) == "user-add" || request()->segment(1) == "user-edit"){ ?>class="active" <?php } ?>>
      <a href="{{URL::to($getprefix.'/userlist')}}">
        <span><i class="fa fa-user" aria-hidden="true"></i><span class="lbl">Users</span></span>
      </a>

    </li>


        <li <?php if(request()->segment(2) == "packages" || request()->segment(1) == "packages-add" || request()->segment(1) == "packages-edit"){ ?>class="active" <?php } ?>>
          <a href="{{URL::to($getprefix.'/packages')}}">
            <span><i class="fa fa-tasks"></i><span class="lbl">Packages</span></span>
          </a>

        </li>
        <li <?php if(request()->segment(2) == "coupon" || request()->segment(1) == "coupon-add" || request()->segment(1) == "coupon-edit"){ ?>class="active" <?php } ?>>
          <a href="{{URL::to($getprefix.'/coupon')}}">
            <span><i class="fa fa-gift"></i><span class="lbl">Coupon</span></span>
          </a>

        </li>

        <li <?php if(request()->segment(2) == "country" ){ ?>class="active" <?php } ?>>
          <a href="{{URL::to($getprefix.'/country')}}">
            <span><i class="fa fa-flag"></i><span class="lbl">Countries</span></span>
          </a>

        </li>

        <li <?php if(request()->segment(2) == "stories" ){ ?>class="active" <?php } ?>>
          <a href="{{URL::to($getprefix.'/stories')}}">
            <span><i class="fa fa-history"></i><span class="lbl">Stories</span></span>
          </a>

        </li>
        <li <?php if(request()->segment(2) == "religions" ){ ?>class="active" <?php } ?>>
          <a href="{{URL::to($getprefix.'/religions')}}">
            <span><i class="fa fa-tasks"></i><span class="lbl">Religions</span></span>
          </a>

        </li>
        <li <?php if(request()->segment(2) == "community" ){ ?>class="active" <?php } ?>>
          <a href="{{URL::to($getprefix.'/community')}}">
            <span><i class="fa fa-tasks"></i><span class="lbl">Community</span></span>
          </a>

        </li>
        <li <?php if(request()->segment(2) == "mothertongue" ){ ?>class="active" <?php } ?>>
          <a href="{{URL::to($getprefix.'/mothertongue')}}">
            <span><i class="fa fa-tasks"></i><span class="lbl">Mother Tongue</span></span>
          </a>

        </li>
        <li <?php if(request()->segment(2) == "qualification" ){ ?>class="active" <?php } ?>>
          <a href="{{URL::to($getprefix.'/qualification')}}">
            <span><i class="fa fa-graduation-cap"></i><span class="lbl">Qualifications</span></span>
          </a>

        </li>

        <li <?php if(request()->segment(2) == "workingsectors" ){ ?>class="active" <?php } ?>>
          <a href="{{URL::to($getprefix.'/workingsectors')}}">
            <span><i class="fa fa-tasks"></i><span class="lbl">Working Sectors</span></span>
          </a>

        </li>

        <li <?php if(request()->segment(2) == "payments" ){ ?>class="active" <?php } ?>>
          <a href="{{URL::to($getprefix.'/payments')}}">
            <span><i class="fa fa-credit-card" aria-hidden="true"></i><span class="lbl">Payments</span></span>
          </a>

        </li>






  </ul>
</nav>

<!--.side-menu-->
