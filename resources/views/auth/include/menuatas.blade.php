<ul class="navbar-nav ml-auto">
   <li class="nav-item">
   <form class="form-inline my-2 my-lg-0 mr-lg-2" action="{{url('/homeadmin/cariuser')}}" method="get">
        {{csrf_field()}}>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." name="cari" required>
        <span class="input-group-btn">
          <button class="btn btn-primary" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
  </li>
  <li class="nav-item">
   <a class="nav-link" href="{{url('/homeadminakun')}}">
    <i class="fa fa-fw fa-cog"></i>
    <span class="nav-link-text">
     Setting</span>
   </a>
  </li>
</ul>