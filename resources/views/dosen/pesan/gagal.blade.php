@if(Session::has('gagal'))
 <div class="alert alert-danger ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{Session::get('gagal')}}
  </div>
 @endif