<meta property="og:type" content="product">
<meta property="og:title" content="{!! $submission->title !!}">
<meta property="og:description" content="{!! $submission->description !!}">
<meta property="og:url" content="{!! url('vote/'.$submission->id.'//fb') !!}">
<meta property="og:image" content="{!! $submission->images[0]->path !!}">
{{--<meta property="product:price:amount" content="">--}}
{{--<meta property="product:price:currency" content="PHP">--}}