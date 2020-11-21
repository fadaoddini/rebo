@include('back.headeradmin')
<body id="kt_body"
      class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed aside-enabled aside-static page-loading">
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">
          @include('back.menusidebare')
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
               @include('back.inmenutopadmin')
               <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
                <div class="d-flex flex-column-fluid">
                    <div class=" container ">
                        @include('back.message')
                        @yield('content')

                    </div>
                </div>
            </div>
            @include('back.footeradmin')
        </div>
     </div>
</div>
{{--@include('back.qicknotifadmin')
@include('back.quickactionadmin')
@include('back.qiuckuseradmin')
@include('back.quickhesab')
@include('back.quickchat')
@include('back.quickscrolltop')
@include('back.quicktoolbar')--}}


@include('back.footeradminfinish')
