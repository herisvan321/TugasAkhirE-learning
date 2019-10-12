@extends('index')
@section('main')
  <div class="mbr-section mbr-section-nopadding">
    <div class="container">
      <div class="row">

        <div class="col-xs-12">
@foreach($berita as $b)
          <div class="mbr-testimonial card mbr-testimonial-lg">
            <div class="card-block"><p>{!! $b->berita !!}</p></div>
            <div class="mbr-author card-footer">
              <div class="mbr-author-img"><img src="assetsHome/images/logo-himafortika-160x155.png" class="img-circle"></div>
              <div class="mbr-author-name">Informatika STKIP PGRI Sumbar</div>

            </div>
          </div>
@endforeach

    </div>

  </div>

</div>
</div>
@endsection