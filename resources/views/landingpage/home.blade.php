@extends('landingpage/index')
@section('content')

<!--awal welcom--->
@include('landingpage/welcome')
<!--awal welcom--->
</br>
<!---awal donasi--->
@include('landingpage/donasi')
<!--akhir donasi-->
</br>
<!--awal about-->
@include('landingpage/about')
<!--akhir about-->
</br>
<!----awal gallery---->
@include('landingpage/gallery')
<!----akhir gallery---->
</br>
<!----awal berita---->
{{-- @include('landingpage/berita') --}}
<!----akhir berita---->
</br>


@endsection