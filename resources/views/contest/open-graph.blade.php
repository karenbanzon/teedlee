<meta property="fb:app_id" content="{!! config('services.facebook.client_id') !!}">
<meta property="og:type" content="product">
<meta property="og:title" content="{!! $contest->title !!}">
<meta property="og:description" content="Teedlee is a clothing brand powered by artists. We produce and sell crowd-sourced graphic designs from our community, where the artist of this design will earn a profit from your purchases.">
<meta property="og:url" content="{!! url('contest/'.$contest->id) !!}">
<meta property="og:image" content="{!! url('contests/'.$contest->id.'/'.$contest->banner) !!}">
{{--<meta property="product:price:amount" content="">--}}
{{--<meta property="product:price:currency" content="PHP">--}}