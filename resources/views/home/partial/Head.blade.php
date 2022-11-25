<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1">
<meta name="author" content="ghasemi rajabi" />
<!--=============== favicons ===============-->
<meta name="copyright" content="meta_webs" />
<meta name="designer" content="hosein ghasemi, amir rajabi" />
<meta name="apple-mobile-web-app-title" content="meta_webs">
<meta name="application-name" content="meta_webs">
<meta name="robots" content="index, follow" />
<meta property="place:location:latitude" content="32.690131419897455">
<meta property="place:location:longitude" content="51.71408350961521">
<meta property="business:contact_data:street_address" content="Isfahan، Iran">
<meta property="business:contact_data:locality" content="اصفهان">
<meta property="business:contact_data:country_name" content="ایران">
<meta property="business:contact_data:phone_number" content="09139035692 , 09162418808">
<meta property="business:contact_data:website" content="{{env('APP_URL')}}">
<link rel="icon" href="{{asset('images/logo.ico')}}">
{!! SEO::generate() !!}
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-230148298-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-230148298-3');
</script>
<title> @yield('title')
</title>
<link rel="stylesheet" href="{{asset('css/home.css')}}">
