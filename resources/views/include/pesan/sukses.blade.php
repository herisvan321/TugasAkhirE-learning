 @if(Session::has('sukses'))
 <div class="alert alert-success ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{Session::get('sukses')}}
  </div>
 @endif