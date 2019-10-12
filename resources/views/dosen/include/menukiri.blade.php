      <ul class="navbar-nav navbar-sidenav " id="exampleAccordion">
      	<li>
      		<div class="w3-container w3-row " style=" padding:10px;"> 
      			<div class="" align="center" >
             @if(($user->jenkel == 'L') && ($user->foto == 'foto'))
             <img src="/imgHome/img_avatar3.png" class="img-thumbnail w3-margin-right w3-animate-top" style="width:130px;height:130px;">
             @elseif(($user->jenkel == 'P') && ($user->foto == 'foto'))
             <img src="/imgHome/img_avatar2.png w3-animate-top" class="img-thumbnail w3-margin-right" style="width:130px;height:130px;">
             @else
             <img src="{{ asset('/upload/home/'.$user->foto) }}" class="img-thumbnail w3-margin-right w3-animate-top" style="width:130px;height:130px;">
             @endif

           </div>
           <div class="" style="color:#fff; margin-top:5px;" align="center">
            @if($user->namabelakang == 'kosong')
            <span class="w3-animate-left"><strong>{{ $user->namadepan}}</strong> </span>
            @else
            <span class="w3-animate-left"><strong>{{ $user->namadepan.' '.$user->namabelakang}}</strong> </span>
            @endif
            <br>
            <span class="w3-animate-right">{{ $user->noinduk }}</span><br>
            <span class="w3-animate-bottom">status:online</span><br><br>
          </div>
        </div>
      </li>
      <li class="nav-item active w3-animate-left" >
        <a class="nav-link" href="{{url('/homedosen')}}">
         <i class="fa fa-fw fa-dashboard"></i>
         <span class="nav-link-text">
          Dashboard</span>
        </a>
      </li>
      <li class="nav-item w3-animate-left" >
       <a class="nav-link" href="{{url('/homedosen/view/buatgroup')}}">
        <i class="fa fa-fw 

        fa-pencil-square-o "></i>
        <span class="nav-link-text">
         Entry Group</span>
       </a>
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
        <i class="fa fa-fw  fa-book "></i>
        <span class="nav-link-text">
         Laporan</span>
       </a>
       <ul class="sidenav-second-level collapse" id="collapseComponents2">
        <li >
          <a class="nav-link" href="{{url('/homedosen/view/rekapnilai')}}">
           <span class="nav-link-text">
            Data Nilai</span>
          </a>
        </li>
        <li >
          <a class="nav-link" href="{{url('/homedosen/view/daftarhadir')}}">
            <span class="nav-link-text">
             Data Absen</span>
           </a>
         </li>
       </ul>
     </li>
     <li class="nav-item w3-animate-left" >
       <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-fw fa-sign-out"></i>
          Logout</a>
    </li>

  </ul>