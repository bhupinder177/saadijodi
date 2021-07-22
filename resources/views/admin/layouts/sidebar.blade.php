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

    <li <?php if(request()->segment(2) == "userlist" || request()->segment(1) == "user-add" || request()->segment(1) == "user-edit"){ ?>class="active" <?php } ?>>
      <a href="{{URL::to($getprefix.'/userlist')}}">
        <span><i class="fa fa-tasks"></i><span class="lbl">Users</span></span>
      </a>

    </li>


        <li <?php if(request()->segment(2) == "packages" || request()->segment(1) == "packages-add" || request()->segment(1) == "packages-edit"){ ?>class="active" <?php } ?>>
          <a href="{{URL::to($getprefix.'/packages')}}">
            <span><i class="fa fa-tasks"></i><span class="lbl">Packages</span></span>
          </a>

        </li>

  </ul>
</nav>

<!--.side-menu-->
