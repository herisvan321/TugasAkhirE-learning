 @if(Session::has('pesansuksesperiode'))
 <div class="alert alert-success ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{Session::get('pesansuksesperiode')}}
  </div>
 @endif