<!-- Base Header Here -->
@include('layouts.common.header', ['body_classes' => 'hold-transition skin-green-light sidebar-mini fixed'])


    <div class="wrapper" id="app">
        <!-- Header -->
        @include('layouts.adminlte.header')

        <!-- Sidebar -->
        @include('layouts.adminlte.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">

                @yield('content-header')

                @yield('breadcrumbs')

            </section>

            <!-- Main content -->
            <section class="content">

                @yield('content')

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        @include('layouts.adminlte.footer')
    </div>

<!-- Base Footer Here -->
@include('layouts.common.footer')
