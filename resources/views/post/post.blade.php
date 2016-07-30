<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BlogByLaravel</title>
    <meta name="description" content="Laravel是一套简洁、优雅的PHP Web开发框架(PHP Web Framework) -- Laravel中文网" />
    <meta name="keywords" content="Laravel中文社区,php框架,laravel中文网,php framework,restful routing,laravel,laravel php">
    <link href="{{ asset("/AdminLTE/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/pika/css/index.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/favicon.ico") }}" rel="Shortcut Icon">
    <link href="{{ asset("/pika/css/pagination.css") }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset ("/AdminLTE/plugins/jQuery/jQuery-2.2.3.min.js") }}"></script>
    <style>
        a,a:hover{ text-decoration:none; color:#000000}
        ul li{
            list-style-type: none;
        }
        .nav-list{
            padding:4px 0;
            margin:0;
        }
        .nav-list li{
            display: inline-block;
            margin-right: 20px;
        }
    </style>
</head>
<body style="background-image: url('{{ asset ("/pika/img/1.jpg") }}')">
<!--header start-->
<header class="container-fluid" style="margin-bottom: 0;padding-top: 10px;padding-bottom: 50px;">
    <div class="row">
        <!--标头-->
        <div class="col-sm-12 text-center">

            <h1 style="color: #ffffff"><span class="hide">Laravel - </span>BlogByLaravel <a href="###"><small style="font-size:0.5em;color: #ffffff">--zeno</small></a></h1>
        </div>
        <div class="col-sm-12" style="text-align: center">
        </div>
    </div>
</header>
<!--header end-->
<!-- start navigation -->
@include('post.header')
<!-- end navigation -->
<!--评论提示-->
@include('layouts.post_topInfo')
<!--main content-->
<section class="content-wrap">
    <div class="container">
        <div class="row" >
            <main class="col-md-8 main-content">
                @yield('content')
            </main>
            <!--main right-->
            @include('post.rightMenu')
        </div><!--end row-->
    </div>
</section>
<!--end main content-->
@include('post.footer')
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <span>Copyright &copy; <a href="http://www.golaravel.com/">FIRSTBLOOD</a></span> |
                <span><a href="http://www.miibeian.gov.cn/" target="_blank">京ICP备11008151号</a></span> |
                <span>京公网安备11010802014853</span>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset ("/AdminLTE/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
<!--<script src="public/js/index.js"></script>-->
<script>
    $(function(){
        $(".main-right-content .post-content p a").addClass("btn btn-default btn-sm");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    })
</script>
</body>
</html>

