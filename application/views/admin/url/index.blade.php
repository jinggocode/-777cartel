@layout('_layout/admin/index')

@section('title')Access URL @endsection

@section('content') 
<iframe src="{{$url->url}}" style="position:fixed; top:0px; left:0px; bottom:0px; right:0px; width:100%; height:100%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;">
  <p>Your browser does not support iframes.</p>
</iframe>
@endsection
