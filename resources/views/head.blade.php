<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>{{$title}}</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Favicons -->
<link rel="shortcut icon" href="/backend/admin/favicon.ico">
<!-- Fontawesome css -->
<link rel="stylesheet" href="/frontend/css/font-awesome.min.css ">
<!-- Ionicons css -->
<link rel="stylesheet" href="/frontend/css/ionicons.min.css ">
<!-- linearicons css -->
<link rel="stylesheet" href="/frontend/css/linearicons.css ">
<!-- Nice select css -->
<link rel="stylesheet" href="/frontend/css/nice-select.css ">
<!-- Jquery fancybox css -->
<link rel="stylesheet" href="/frontend/css/jquery.fancybox.css ">
<!-- Jquery ui price slider css -->
<link rel="stylesheet" href="/frontend/css/jquery-ui.min.css ">
<!-- Meanmenu css -->
<link rel="stylesheet" href="/frontend/css/meanmenu.min.css ">
<!-- Nivo slider css -->
<link rel="stylesheet" href="/frontend/css/nivo-slider.css ">
<!-- Owl carousel css -->
<link rel="stylesheet" href="/frontend/css/owl.carousel.min.css ">
<!-- Bootstrap css -->
<link rel="stylesheet" href="/frontend/css/bootstrap.min.css ">
<!-- Custom css -->
<link rel="stylesheet" href="/frontend/css/default.css ">
<!-- Main css -->
<link rel="stylesheet" href="/frontend/style.css ">
<!-- Responsive css -->
<link rel="stylesheet" href="/frontend/css/responsive.css ">

<link rel="stylesheet" href="/frontend/bosung.css ">

<!-- Modernizer js -->
<script src="/frontend/js/vendor/modernizr-3.5.0.min.js "></script>

<meta name="csrf-token" content="{{ csrf_token() }}">

<!--profile-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script>
    function initMap() {
        // The location of Uluru
        const uluru = { lat: -25.344, lng: 131.036 };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 4,
            center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
            position: uluru,
            map: map,
        });
    }
</script>

