@extends('master') @section('content')
<div class="container">
    <div class="main">
    <div class="content">
        @foreach($news as $tt)
    	<div class="image group">
				<div class="grid images_3_of_1">
					<img src="{{Storage::url($tt->image)}}" alt="" />
				</div>
				<div class="grid news_desc">
					<h3>{{$tt->title}} </h3>
                    <small>{{$tt->day}}</small>
{{--					<h4>Posted on Aug 13th, 2013 by <span><a href="#">Finibus Bonorum</a></span></h4>--}}
			   <p>{{$tt->content}}</p>
                </div>
		   </div>
		   @endforeach

         </div>
    </div>
 </div>

@endsection

