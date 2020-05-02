<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Công cụ cho mọi người</title>
    <link rel="stylesheet" href="{{ get_frontend_asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ get_frontend_asset('assets/css/style.css') }}">
</head>
<body>

<div id="app">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#">Link</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item dropdown">--}}
{{--                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"--}}
{{--                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                Dropdown--}}
{{--                            </a>--}}
{{--                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                                <a class="dropdown-item" href="#">Action</a>--}}
{{--                                <a class="dropdown-item" href="#">Another action</a>--}}
{{--                                <div class="dropdown-divider"></div>--}}
{{--                                <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>--}}
{{--                        </li>--}}
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <main class="mt-4 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="menu-bar card">
                        <div class="card-header">
                            Các công cụ
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item dropright">
                                <div class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                     aria-expanded="false">
                                    Văn bản
                                </div>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ url('/text-tool/convert-blank-space-to-break-line') }}">Chuyển đổi khoảng cách thành xuống dòng</a>
                                    <a class="dropdown-item" href="{{ url('/text-tool/convert-break-line-to-blank-space') }}">Chuyển đổi xuống dòng thành khoảng cách</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ url('/text-tool/count-chars') }}">Đếm ký tự</a>
                                    <a class="dropdown-item" href="{{ url('/text-tool/convert-chars') }}">Chuyển đổi ký tự (Hoa/Thường/Kết hợp)</a>
                                </div>
                            </li>
                            <li class="list-group-item dropright">
                                <div class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                     aria-expanded="false">
                                    Mã hóa và giải mã
                                </div>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Chuyển đổi văn bản thành Base64</a>
                                    <a class="dropdown-item" href="#">Chuyển đổi Base64 thành văn bản</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Chuyển đổi văn bản thành Hex</a>
                                    <a class="dropdown-item" href="#">Chuyển đổi Hex thành văn bản</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="page-content card">
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-center">
        Copyright © {{ date('Y') }} <a href="https://thienanblog.com">Thienanblog</a>
    </footer>
</div>

<script type="text/javascript" src="{{ get_frontend_asset('assets/js/jquery.slim.min.js') }}"></script>
<script type="text/javascript" src="{{ get_frontend_asset('assets/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ get_frontend_asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>