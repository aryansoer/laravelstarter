<!-- Base Header Here -->
@include('layouts.common.header', ['body_classes' => 'layout-top-nav skin-green-light fixed'])

    <div class="wrapper" id="app">

        <!-- Header -->
        @include('layouts.visitor.header')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Top Navigation
                        <small>Example 2.0</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Layout</a></li>
                        <li class="active">Top Navigation</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    @yield('content')

                </section>
                <!-- /.content -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        @include('layouts.visitor.footer')
    </div>


<!-- Base Footer Here -->
@include('layouts.common.footer')