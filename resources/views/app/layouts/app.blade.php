<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--begin::Head-->
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" href="/manage/media/logos/favicon.ico"/>

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
    <!--end::Fonts-->

    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="/manage/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/manage/plugins/custom/vis-timeline/vis-timeline.bundle.css" rel="stylesheet" type="text/css"/>
    <!--end::Vendor Stylesheets-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.9.2/jquery.contextMenu.min.css"/>
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="/manage/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/manage/css/style.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/manage/css/custom.css" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->
    @stack('style')
</head>
<!--end::Head-->

<!--begin::Body-->
<body id="kt_app_body" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true"
      data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
      data-kt-app-sidebar-push-footer="true" class="app-default">
<!--begin::Theme mode setup on page load-->
<script>
    var defaultThemeMode = "light";
    var themeMode;

    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
            if (localStorage.getItem("data-bs-theme") !== null) {
                themeMode = localStorage.getItem("data-bs-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }

        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }

        document.documentElement.setAttribute("data-bs-theme", themeMode);
    }
</script>
<!--end::Theme mode setup on page load-->

<!--begin::App-->
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <!--begin::Page-->
    <div class="app-page flex-column flex-column-fluid " id="kt_app_page">


        @include('app.sections.header')
        <!--begin::Wrapper-->
        <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">

            @include('app.sections.sidebar')

            <!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
                <!--begin::Content wrapper-->
                <div class="d-flex flex-column flex-column-fluid">


                    <!--begin::Content-->
                    <div id="kt_app_content" class="app-content  flex-column-fluid ">


                        <!--begin::Content container-->
                        <div id="kt_app_content_container" class="app-container  container-fluid ">
                            @yield('content')
                        </div>
                        <!--end::Content container-->
                    </div>
                    <!--end::Content-->

                </div>
                <!--end::Content wrapper-->

                <!--begin::Footer-->
                @include('app.sections.footer')

            </div>
            <!--end:::Main-->


        </div>
        <!--end::Wrapper-->


    </div>
    <!--end::Page-->
</div>
<!--end::App-->


<!--begin::App layout builder-->
<div
    id="kt_app_layout_builder"
    class="bg-body"

    data-kt-drawer="true"
    data-kt-drawer-name="app-settings"
    data-kt-drawer-activate="true"
    data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'300px', 'lg': '380px'}"
    data-kt-drawer-direction="end"
    data-kt-drawer-toggle="#kt_app_layout_builder_toggle"
    data-kt-drawer-close="#kt_app_layout_builder_close">

    <!--begin::Card-->
    <div class="card border-0 shadow-none rounded-0 w-100">
        <!--begin::Card header-->
        <div
            class="card-header bgi-position-y-bottom bgi-position-x-end bgi-size-cover bgi-no-repeat rounded-0 border-0 py-4"
            id="kt_app_layout_builder_header"
            style="background-image:url('/manage/media/misc/layout/customizer-header-bg.jpg')">

            <!--begin::Card title-->
            <h3 class="card-title fs-3 fw-bold text-white flex-column m-0">
                Metronic Builder

                <small class="text-white opacity-50 fs-7 fw-semibold pt-1">
                    Get your product deeply customized
                </small>
            </h3>
            <!--end::Card title-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <button
                    type="button"
                    class="btn btn-sm btn-icon btn-color-white p-0 w-20px h-20px rounded-1"
                    id="kt_app_layout_builder_close"
                >
                    <i class="ki-outline ki-cross-square fs-2"></i></button>
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body position-relative" id="kt_app_layout_builder_body">
            <!--begin::Content-->
            <div id="kt_app_settings_content"
                 class="position-relative scroll-y me-n5 pe-5"

                 data-kt-scroll="true"
                 data-kt-scroll-height="auto"
                 data-kt-scroll-wrappers="#kt_app_layout_builder_body"
                 data-kt-scroll-dependencies="#kt_app_layout_builder_header, #kt_app_layout_builder_footer"
                 data-kt-scroll-offset="5px">

                <!--begin::Form-->
                <form class="form" method="POST" id="kt_app_layout_builder_form" action="/metronic8/demo63/index.php">
                    <input type="hidden" id="kt_app_layout_builder_action" name="layout-builder[action]"/>

                    <!--begin::Card body-->
                    <div class="card-body p-0">

                        <!--begin::Form group-->
                        <div class="form-group">
                            <!--begin::Heading-->
                            <div class="mb-6">
                                <h4 class="fw-bold text-gray-900">Theme Mode</h4>
                                <div class="fw-semibold text-muted fs-7 d-block lh-1">
                                    Enjoy Dark & Light modes.

                                    <a class="fw-semibold"
                                       href="https://preview.keenthemes.com/html/metronic/docs/getting-started/dark-mode"
                                       target="_blank">See docs</a>
                                </div>
                            </div>
                            <!--end::Heading-->

                            <!--begin::Options-->
                            <div class="row " data-kt-buttons="true"
                                 data-kt-buttons-target=".form-check-image,.form-check-input">
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Option-->
                                    <label class="form-check-image form-check-success">
                                        <!--begin::Image-->
                                        <div class="form-check-wrapper border-gray-200 border-2">
                                            <img src="/manage/media/preview/demos/demo63/light-ltr.png"
                                                 class="form-check-rounded mw-100" alt=""/>
                                        </div>
                                        <!--end::Image-->

                                        <!--begin::Check-->
                                        <div
                                            class="form-check form-check-custom form-check-solid form-check-sm form-check-success">
                                            <input class="form-check-input" type="radio" value="light" name="theme_mode"
                                                   id="kt_layout_builder_theme_mode_light"/>

                                            <!--begin::Label-->
                                            <div class="form-check-label text-gray-700">
                                                Light
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Check-->
                                    </label>
                                    <!--end::Option-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <!--begin::Option-->
                                    <label class="form-check-image form-check-success">
                                        <!--begin::Image-->
                                        <div class="form-check-wrapper border-gray-200 border-2">
                                            <img src="/manage/media/preview/demos/demo63/dark-ltr.png"
                                                 class="form-check-rounded mw-100" alt=""/>
                                        </div>
                                        <!--end::Image-->

                                        <!--begin::Check-->
                                        <div
                                            class="form-check form-check-custom form-check-solid form-check-sm form-check-success">
                                            <input class="form-check-input" type="radio" value="dark" name="theme_mode"
                                                   id="kt_layout_builder_theme_mode_dark"/>

                                            <!--begin::Label-->
                                            <div class="form-check-label text-gray-700">
                                                Dark
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Check-->
                                    </label>
                                    <!--end::Option-->
                                </div>
                                <!--end::Col-->

                            </div>
                            <!--end::Options-->
                        </div>
                        <!--end::Form group-->
                        <div class="separator separator-dashed my-5"></div>

                        <!--begin::Form group-->
                        <div class="form-group d-flex flex-stack">
                            <!--begin::Heading-->
                            <div class="d-flex flex-column">
                                <h4 class="fw-bold text-gray-900">RTL Mode</h4>
                                <div class="fs-7 fw-semibold text-muted">
                                    Change Language Direction.

                                    <a class="fw-semibold"
                                       href="https://preview.keenthemes.com/html/metronic/docs/getting-started/rtl"
                                       target="_blank">See docs</a>
                                </div>
                            </div>
                            <!--end::Heading-->

                            <!--begin::Option-->
                            <div class="d-flex justify-content-end">
                                <!--begin::Check-->
                                <div
                                    class="form-check form-check-custom form-check-solid form-check-success form-switch">
                                    <input type="hidden" value="false"
                                           name="layout-builder[layout][app][general][rtl]"/>

                                    <input
                                        class="form-check-input w-45px h-30px"
                                        type="checkbox"
                                        value="true"
                                        name="layout-builder[layout][app][general][rtl]"
                                    />
                                </div>
                                <!--end::Check-->
                            </div>
                            <!--end::Option-->
                        </div>
                        <!--end::Form group-->
                        <div class="separator separator-dashed my-5"></div>


                        <!--begin::Form group-->
                        <div class="form-group ">
                            <!--begin::Heading-->
                            <div class="d-flex flex-column mb-4">
                                <h4 class="fw-bold text-gray-900">Width Mode</h4>
                                <div class="fs-7 fw-semibold text-muted">Page width options</div>
                            </div>
                            <!--end::Heading-->

                            <!--begin::Options-->
                            <div class="d-flex gap-7">
                                <!--begin::Check-->
                                <div
                                    class="form-check form-check-custom form-check-success form-check-solid form-check-sm">
                                    <input
                                        class="form-check-input" type="radio"


                                        value="default"
                                        id="kt_layout_builder_page_width_default"
                                        name="layout-builder[layout][app][general][page-width]"
                                    />

                                    <!--begin::Label-->
                                    <label class="form-check-label text-gray-700 fw-bold text-nowrap"
                                           for="kt_layout_builder_page_width_default">
                                        Default </label>
                                    <!--end::Label-->
                                </div>
                                <!--end::Check-->
                                <!--begin::Check-->
                                <div
                                    class="form-check form-check-custom form-check-success form-check-solid form-check-sm">
                                    <input
                                        class="form-check-input" type="radio"
                                        checked

                                        value="fluid"
                                        id="kt_layout_builder_page_width_fluid"
                                        name="layout-builder[layout][app][general][page-width]"
                                    />

                                    <!--begin::Label-->
                                    <label class="form-check-label text-gray-700 fw-bold text-nowrap"
                                           for="kt_layout_builder_page_width_fluid">
                                        Fluid </label>
                                    <!--end::Label-->
                                </div>
                                <!--end::Check-->
                                <!--begin::Check-->
                                <div
                                    class="form-check form-check-custom form-check-success form-check-solid form-check-sm">
                                    <input
                                        class="form-check-input" type="radio"


                                        value="fixed"
                                        id="kt_layout_builder_page_width_fixed"
                                        name="layout-builder[layout][app][general][page-width]"
                                    />

                                    <!--begin::Label-->
                                    <label class="form-check-label text-gray-700 fw-bold text-nowrap"
                                           for="kt_layout_builder_page_width_fixed">
                                        Fixed </label>
                                    <!--end::Label-->
                                </div>
                                <!--end::Check-->
                            </div>
                            <!--end::Options-->
                        </div>
                        <!--end::Form group-->
                        <div class="separator separator-dashed my-5"></div>


                        <!--begin::Form group-->
                        <div class="form-group ">
                            <!--begin::Heading-->
                            <div class="d-flex flex-column mb-4">
                                <h4 class="fw-bold text-gray-900">KeenIcons Style</h4>

                                <div>
                                    <span class="fs-7 fw-semibold text-muted">Select global UI icons style.</span>
                                    <a class="fw-semibold"
                                       href="https://preview.keenthemes.com/html/metronic/docs/icons/keenicons"
                                       target="_blank">Learn more</a>
                                </div>
                            </div>
                            <!--end::Heading-->

                            <!--begin::Options-->
                            <div class="d-flex flex-stack gap-3 " data-kt-buttons="true"
                                 data-kt-buttons-target=".form-check-image,.form-check-input">

                                <!--begin::Option-->
                                <label class="form-check-image form-check-success w-100 parent-active parent-hover ">
                                    <!--begin::Image-->
                                    <div
                                        class="form-check-wrapper d-flex flex-center border-gray-200 border-2 mb-0 py-3 px-4">
                                        <i class="ki-duotone ki-picture fs-1 text-gray-500 parent-active-gray-700 parent-hover-gray-700"><span
                                                class="path1"></span><span class="path2"></span></i>
                                        <span
                                            class="fs-7 fw-semibold ms-2 text-gray-500 parent-active-gray-700 parent-hover-gray-700">Duotone</span>
                                    </div>
                                    <!--end::Image-->

                                    <!--begin::Check-->
                                    <div
                                        style="visibility: hidden; height: 0 !important; width: 0 !importnat; overflow:hidden">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            value="duotone"

                                            name="layout-builder[layout][app][general][icons]"/>
                                    </div>
                                    <!--end::Check-->
                                </label>
                                <!--end::Option-->

                                <!--begin::Option-->
                                <label
                                    class="form-check-image form-check-success w-100 parent-active parent-hover active">
                                    <!--begin::Image-->
                                    <div
                                        class="form-check-wrapper d-flex flex-center border-gray-200 border-2 mb-0 py-3 px-4">
                                        <i class="ki-outline ki-picture fs-1 text-gray-500 parent-active-gray-700 parent-hover-gray-700"></i>
                                        <span
                                            class="fs-7 fw-semibold ms-2 text-gray-500 parent-active-gray-700 parent-hover-gray-700">Outline</span>
                                    </div>
                                    <!--end::Image-->

                                    <!--begin::Check-->
                                    <div
                                        style="visibility: hidden; height: 0 !important; width: 0 !importnat; overflow:hidden">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            value="outline"
                                            checked
                                            name="layout-builder[layout][app][general][icons]"/>
                                    </div>
                                    <!--end::Check-->
                                </label>
                                <!--end::Option-->

                                <!--begin::Option-->
                                <label class="form-check-image form-check-success w-100 parent-active parent-hover ">
                                    <!--begin::Image-->
                                    <div
                                        class="form-check-wrapper d-flex flex-center border-gray-200 border-2 mb-0 py-3 px-4">
                                        <i class="ki-solid ki-picture fs-1 text-gray-500 parent-active-gray-700 parent-hover-gray-700"></i>
                                        <span
                                            class="fs-7 fw-semibold ms-2 text-gray-500 parent-active-gray-700 parent-hover-gray-700">Solid</span>
                                    </div>
                                    <!--end::Image-->

                                    <!--begin::Check-->
                                    <div
                                        style="visibility: hidden; height: 0 !important; width: 0 !importnat; overflow:hidden">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            value="solid"

                                            name="layout-builder[layout][app][general][icons]"/>
                                    </div>
                                    <!--end::Check-->
                                </label>
                                <!--end::Option-->

                            </div>
                            <!--end::Options-->
                        </div>
                        <!--end::Form group-->
                        <div class="separator separator-dashed my-5"></div>


                        <!--begin::Form group-->
                        <div class="form-group d-flex flex-stack">
                            <!--begin::Heading-->
                            <div class="d-flex flex-column">
                                <h4 class="fw-bold text-gray-900">Sticky Header</h4>

                                <div class="fs-7 fw-semibold text-muted">
                                    Enable sticky header

                                    <a href="/metronic8/demo63/layout-builder.html" class="fw-semibold text-primary">
                                        More layout options
                                    </a>
                                </div>
                            </div>
                            <!--end::Heading-->

                            <!--begin::Option-->
                            <div class="d-flex justify-content-end">
                                <!--begin::Check-->
                                <div
                                    class="form-check form-check-custom form-check-solid form-check-success form-switch">
                                    <input type="hidden" value="false"
                                           name="layout-builder[layout][app][header][default][sticky][enabled]"/>
                                    <input
                                        class="form-check-input w-45px h-30px"
                                        type="checkbox"
                                        checked
                                        value="true"
                                        name="layout-builder[layout][app][header][default][sticky][enabled]"
                                        id="kt_builder_header_header_and_toolbar_sticky"/>
                                </div>
                                <!--end::Check-->
                            </div>
                            <!--end::Option-->
                        </div>
                        <!--end::Form group-->

                    </div>
                    <!--end::Card body-->                </form>
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Card body-->

        <!--begin::Card footer-->
        <div class="card-footer border-0 d-flex gap-3 pb-9 pt-0" id="kt_app_layout_builder_footer">
            <button type="button" id="kt_app_layout_builder_preview" class="btn btn-primary flex-grow-1 fw-semibold">

                <!--begin::Indicator label-->
                <span class="indicator-label">
    Preview</span>
                <!--end::Indicator label-->

                <!--begin::Indicator progress-->
                <span class="indicator-progress">
    Please wait...    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
</span>
                <!--end::Indicator progress-->    </button>

            <button type="button" id="kt_app_layout_builder_reset" class="btn btn-light flex-grow-1 fw-semibold">

                <!--begin::Indicator label-->
                <span class="indicator-label">
    Reset</span>
                <!--end::Indicator label-->

                <!--begin::Indicator progress-->
                <span class="indicator-progress">
    Please wait...    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
</span>
                <!--end::Indicator progress-->    </button>
        </div>
        <!--end::Card footer-->    </div>
    <!--end::Card-->
</div>
<!--end::App layout builder-->

{{--<!--begin::App settings toggle-->
<button
    id="kt_app_layout_builder_toggle"
    class="btn btn-dark app-layout-builder-toggle lh-1 py-4 "
    title="Metronic Builder"
    data-bs-custom-class="tooltip-inverse"
    data-bs-toggle="tooltip"
    data-bs-placement="left"
    data-bs-dismiss="click"
    data-bs-trigger="hover"
>
    <i class="ki-outline ki-setting-4 fs-4 me-1"></i> Customize
</button>
<!--end::App settings toggle-->--}}
<!--begin::Drawers-->
<!--end::Drawers-->

<!--begin::Engage modals-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <i class="ki-outline ki-arrow-up"></i></div>
<!--end::Scrolltop-->

<!--begin::Modals-->

<!--begin::Javascript-->
<script>
    var hostUrl = "/manage/";        </script>

<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="/manage/plugins/global/plugins.bundle.js"></script>
<script src="/manage/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->

<!--begin::Vendors Javascript(used for this page only)-->
<script src="/manage/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="/manage/plugins/custom/vis-timeline/vis-timeline.bundle.js"></script>
<!--end::Vendors Javascript-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.9.2/jquery.contextMenu.min.js"></script>
<!--begin::Custom Javascript(used for this page only)-->
<script src="/manage/js/widgets.bundle.js"></script>
<script src="/manage/js/custom/widgets.js"></script>
<script src="/manage/js/tables.js"></script>
<script src="/manage/js/custom/general.js"></script>
<script src="/manage/js/custom/network.js"></script>

@stack('script')

{{--<script src="/manage/js/custom/apps/chat/chat.js"></script>
<script src="/manage/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="/manage/js/custom/utilities/modals/users-search.js"></script>--}}
<!--end::Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
