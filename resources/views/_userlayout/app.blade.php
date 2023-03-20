<!DOCTYPE html>
<html lang="en">
<head>
    @include('_userlayout.head')
  @yield('css')
</head>
<body>
    <div>
        <div>
            <header>
                @include('_userlayout.navbar')
            </header>
        </div>
    </div>
    <div class="content-wrapper">
        @yield('content')
    </div>

</body>
</html>
