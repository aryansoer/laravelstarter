<!-- Base Header Here -->
@include('layouts.common.header', ['body_classes' => 'hold-transition skin-green-light sidebar-mini fixed'])


    <div class="wrapper" id="app">
        <!-- Header -->
        @include('layouts.admin.header')

        <!-- Sidebar -->
        @include('layouts.admin.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    {{ $page_title or "Page Title" }}
                    <small>{{ $page_description or "Description" }}</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                    <li class="active">Here</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                @yield('content')

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        @include('layouts.admin.footer')
    </div>

<!-- Base Footer Here -->
@include('layouts.common.footer')
