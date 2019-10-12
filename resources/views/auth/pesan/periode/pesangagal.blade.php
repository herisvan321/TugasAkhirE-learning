 @if(Session::has('pesangagalperiode'))
 <div class="alert alert-danger ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{Session::get('pesangagalperiode')}}
  </div>
 @endif