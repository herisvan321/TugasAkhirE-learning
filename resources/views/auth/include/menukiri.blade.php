      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      	<li>
      		<div class="w3-container w3-row" >
      			<div class="w3-margin-top" align="center" >
              @if(@count($tampilfoto) > 0)
              <img src="{{asset('/upload/admin/'.$tampilfoto->foto)}}" class="img-thumbnail w3-margin-right w3-animate-top" style="width:110px;height:110px;">
              @else
              <img src="/imgHome/img_avatar2.png" class="img-thumbnail w3-margin-right w3-animate-top" style="width:110px;height:110px;">
              @endif
            </div>
            <div class="" style="color:#fff; margin-top:5px;" align="center">
              <span class="w3-animate-left"><strong>{{ Auth::user()->nama_user }}</strong></span><br>
              <span class="w3-animate-right">{{ Auth::user()->noinduk }}</span><br>
              <span class="w3-animate-bottom">status:online</span><br><br>

            </div>
          </div>
        </li>
        <li class="nav-item active w3-animate-left" >
          <a class="nav-link" href="{{url('/homeadmin')}}">
           <i class="fa fa-fw fa-dashboard"></i>
           <span class="nav-link-text">
            Dashboard</span>
          </a>
        </li>
        <li class="nav-item w3-animate-left" >
         <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-edit"></i>
          <span class="nav-link-text">
           Entry Data</span>
         </a>
         <ul class="sidenav-second-level collapse" id="collapseComponents">
          <li>
            <!--<a href="{{url('/homeadminperiode')}}">Periode</a>-->
          </li>
          <li>
           <a href="{{url('/homeadminentrymahasiswa')}}">Entry Data Mahasiswa</a>
         </li>
         <li>
          <a href="{{url('/homeadminentrydosen')}}">Entry Data Dosen</a>
        </li>
        <li>
          <a href="{{url('/homeadminentryberita')}}">Entry Data Pengumuman</a>
        </li>
      </ul>
    </li>
    <li class="nav-item w3-animate-left"  title="Components">
    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents1" data-parent="#exampleAccordion">
      <i class="fa fa-fw fa-search "></i>
      <span class="nav-link-text">
       Pengolahan Data</span>
     </a>
     <ul class="sidenav-second-level collapse" id="collapseComponents1">
      <li >
        <a class="nav-link" href="#" data-toggle="modal" data-target="#myModaluser">
         <span class="nav-link-text">
          Pencarian User berdasarkan nama User</span>
        </a>
      </li>
      <li >
        <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">
         <span class="nav-link-text">
          Pencarian Group berdasarkan nama Group</span>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item w3-animate-left"  title="Components">
    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents2" data-parent="#exampleAccordion">
      <i class="fa fa-fw fa-book "></i>
      <span class="nav-link-text">
       Laporan</span>
     </a>
     <ul class="sidenav-second-level collapse" id="collapseComponents2">
      <li >
        <a class="nav-link" href="{{url('/homeadmin/user')}}" >
         <span class="nav-link-text">
          Data User</span>
        </a>
      </li>
      <li >
        <a class="nav-link" href="{{url('/homeadmin/group')}}" >
         <span class="nav-link-text">
          Data Group</span>
        </a>
      </li>
      <li >
        <a class="nav-link" href="{{url('/homeadmin/nilai')}}" >
         <span class="nav-link-text">
          Data nilai</span>
        </a>
      </li>
    </ul>
  </li>

  <!--<li class="nav-item w3-animate-left" >
    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
     <i class="fa fa-fw fa-edit"></i>
     <span class="nav-link-text">
      Update Data</span>
    </a>
    <ul class="sidenav-second-level collapse" id="collapseMulti">
      <li>
       <a href="{{url('/homeadminupdatedosen')}}">Dosen</a>
     </li>
     <li>
       <a href="{{url('/homeadminupdatemahasiswa')}}">Mahasiswa</a>
     </li>

   </ul>
 </li>-->
 <li class="nav-item w3-animate-left" >
   <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
    <i class="fa fa-fw fa-sign-out"></i>
    Logout</a>
 </li>

</ul>
