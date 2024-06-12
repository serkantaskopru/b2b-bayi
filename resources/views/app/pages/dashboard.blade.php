@extends('app.layouts.app')
@section('content')
    <!--begin::Row-->
    <div class="row gx-5 gx-xl-10 mb-xl-10">
        <!--begin::Col-->
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-10">

            <!--begin::Card widget 4-->
            <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <!--begin::Currency-->
                            <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start">$</span>
                            <!--end::Currency-->

                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">69,700</span>
                            <!--end::Amount-->

                            <!--begin::Badge-->
                            <span class="badge badge-light-success fs-base">
                    <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>
                    2.2%
                </span>
                            <!--end::Badge-->
                        </div>
                        <!--end::Info-->

                        <!--begin::Subtitle-->
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">Expected Earnings</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->

                <!--begin::Card body-->
                <div class="card-body pt-2 pb-4 d-flex align-items-center">
                    <!--begin::Chart-->
                    <div class="d-flex flex-center me-5 pt-2">
                        <div
                            id="kt_card_widget_4_chart"
                            style="min-width: 70px; min-height: 70px"
                            data-kt-size="70"
                            data-kt-line="11">
                        </div>
                    </div>
                    <!--end::Chart-->

                    <!--begin::Labels-->
                    <div class="d-flex flex-column content-justify-center w-100">
                        <!--begin::Label-->
                        <div class="d-flex fs-6 fw-semibold align-items-center">
                            <!--begin::Bullet-->
                            <div class="bullet w-8px h-6px rounded-2 bg-danger me-3"></div>
                            <!--end::Bullet-->

                            <!--begin::Label-->
                            <div class="text-gray-500 flex-grow-1 me-4">Shoes</div>
                            <!--end::Label-->

                            <!--begin::Stats-->
                            <div class="fw-bolder text-gray-700 text-xxl-end">$7,660</div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Label-->

                        <!--begin::Label-->
                        <div class="d-flex fs-6 fw-semibold align-items-center my-3">
                            <!--begin::Bullet-->
                            <div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
                            <!--end::Bullet-->

                            <!--begin::Label-->
                            <div class="text-gray-500 flex-grow-1 me-4">Gaming</div>
                            <!--end::Label-->

                            <!--begin::Stats-->
                            <div class="fw-bolder text-gray-700 text-xxl-end">$2,820</div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Label-->

                        <!--begin::Label-->
                        <div class="d-flex fs-6 fw-semibold align-items-center">
                            <!--begin::Bullet-->
                            <div class="bullet w-8px h-6px rounded-2 me-3" style="background-color: #E4E6EF"></div>
                            <!--end::Bullet-->

                            <!--begin::Label-->
                            <div class="text-gray-500 flex-grow-1 me-4">Others</div>
                            <!--end::Label-->

                            <!--begin::Stats-->
                            <div class=" fw-bolder text-gray-700 text-xxl-end">$45,257</div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Label-->
                    </div>
                    <!--end::Labels-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card widget 4-->

            <!--begin::Card widget 5-->
            <div class="card card-flush h-md-50 mb-xl-10">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">1,836</span>
                            <!--end::Amount-->

                            <!--begin::Badge-->
                            <span class="badge badge-light-danger fs-base">
                    <i class="ki-outline ki-arrow-down fs-5 text-danger ms-n1"></i>
                    2.2%
                </span>
                            <!--end::Badge-->
                        </div>
                        <!--end::Info-->

                        <!--begin::Subtitle-->
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">Orders This Month</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->

                <!--begin::Card body-->
                <div class="card-body d-flex align-items-end pt-0">
                    <!--begin::Progress-->
                    <div class="d-flex align-items-center flex-column mt-3 w-100">
                        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                            <span class="fw-bolder fs-6 text-gray-900">1,048 to Goal</span>
                            <span class="fw-bold fs-6 text-gray-500">62%</span>
                        </div>

                        <div class="h-8px mx-3 w-100 bg-light-success rounded">
                            <div class="bg-success rounded h-8px" role="progressbar" style="width: 62%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <!--end::Progress-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card widget 5-->    </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-10">
            <!--begin::Card widget 6-->
            <div class="card card-flush  h-md-50 mb-5 mb-xl-10">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <!--begin::Currency-->
                            <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start">$</span>
                            <!--end::Currency-->

                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">2,420</span>
                            <!--end::Amount-->

                            <!--begin::Badge-->
                            <span class="badge badge-light-success fs-base">
                    <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>
                    2.6%
                </span>
                            <!--end::Badge-->
                        </div>
                        <!--end::Info-->

                        <!--begin::Subtitle-->
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">Average Daily Sales</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->

                <!--begin::Card body-->
                <div class="card-body d-flex align-items-end px-0 pb-0">
                    <!--begin::Chart-->
                    <div id="kt_card_widget_6_chart" class="w-100" style="height: 80px"></div>
                    <!--end::Chart-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card widget 6-->


            <!--begin::Card widget 7-->
            <div class="card card-flush h-md-50 mb-xl-10">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Amount-->
                        <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">6.3k</span>
                        <!--end::Amount-->

                        <!--begin::Subtitle-->
                        <span class="text-gray-500 pt-1 fw-semibold fs-6">New Customers This Month</span>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Header-->

                <!--begin::Card body-->
                <div class="card-body d-flex flex-column justify-content-end pe-0">
                    <!--begin::Title-->
                    <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Today’s Heroes</span>
                    <!--end::Title-->

                    <!--begin::Users group-->
                    <div class="symbol-group symbol-hover flex-nowrap">
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Alan Warden">
                            <span class="symbol-label bg-warning text-inverse-warning fw-bold">A</span>
                        </div>
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Michael Eberon">
                            <img alt="Pic" src="/manage/media/avatars/300-11.jpg" />
                        </div>
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Susan Redwood">
                            <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                        </div>
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Melody Macy">
                            <img alt="Pic" src="/manage/media/avatars/300-2.jpg" />
                        </div>
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Perry Matthew">
                            <span class="symbol-label bg-danger text-inverse-danger fw-bold">P</span>
                        </div>
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Barry Walter">
                            <img alt="Pic" src="/manage/media/avatars/300-12.jpg" />
                        </div>
                        <a href="#" class="symbol symbol-35px symbol-circle"  data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
                            <span class="symbol-label bg-light text-gray-400 fs-8 fw-bold">+42</span>
                        </a>
                    </div>
                    <!--end::Users group-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card widget 7-->    </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-lg-12 col-xl-12 col-xxl-6 mb-5 mb-xl-0">
            <!--begin::Chart widget 3-->
            <div class="card card-flush overflow-hidden h-md-100">
                <!--begin::Header-->
                <div class="card-header py-5">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-900">Sales This Months</span>
                        <span class="text-gray-500 mt-1 fw-semibold fs-6">Users from all channels</span>
                    </h3>
                    <!--end::Title-->

                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Menu-->
                        <button class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end"
                                data-kt-menu-trigger="click"
                                data-kt-menu-placement="bottom-end"
                                data-kt-menu-overflow="true">

                            <i class="ki-outline ki-dots-square fs-1"></i>
                        </button>


                        <!--begin::Menu 2-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu separator-->
                            <div class="separator mb-3 opacity-75"></div>
                            <!--end::Menu separator-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">
                                    New Ticket
                                </a>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">
                                    New Customer
                                </a>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                <!--begin::Menu item-->
                                <a href="#" class="menu-link px-3">
                                    <span class="menu-title">New Group</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <!--end::Menu item-->

                                <!--begin::Menu sub-->
                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            Admin Group
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            Staff Group
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            Member Group
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu sub-->
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">
                                    New Contact
                                </a>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu separator-->
                            <div class="separator mt-3 opacity-75"></div>
                            <!--end::Menu separator-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content px-3 py-3">
                                    <a class="btn btn-primary  btn-sm px-4" href="#">
                                        Generate Reports
                                    </a>
                                </div>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu 2-->

                        <!--end::Menu-->
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->

                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                    <!--begin::Statistics-->
                    <div class="px-9 mb-5">
                        <!--begin::Statistics-->
                        <div class="d-flex mb-2">
                            <span class="fs-4 fw-semibold text-gray-500 me-1">$</span>
                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">14,094</span>
                        </div>
                        <!--end::Statistics-->

                        <!--begin::Description-->
                        <span class="fs-6 fw-semibold text-gray-500">Another $48,346 to Goal</span>
                        <!--end::Description-->
                    </div>
                    <!--end::Statistics-->

                    <!--begin::Chart-->
                    <div id="kt_charts_widget_3" class="min-h-auto ps-4 pe-6" style="height: 300px"></div>
                    <!--end::Chart-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Chart widget 3-->    </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row gy-5 g-xl-10">
        <!--begin::Col-->
        <div class="col-xl-6 mb-xl-10">

            <!--begin::Table widget 2-->
            <div class="card h-md-100">
                <!--begin::Header-->
                <div class="card-header align-items-center border-0">
                    <!--begin::Title-->
                    <h3 class="fw-bold text-gray-900 m-0">Recent Orders</h3>
                    <!--end::Title-->

                    <!--begin::Menu-->
                    <button class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end"
                            data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end"
                            data-kt-menu-overflow="true">

                        <i class="ki-outline ki-dots-square fs-1"></i>
                    </button>

                    <!--begin::Menu 2-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu separator-->
                        <div class="separator mb-3 opacity-75"></div>
                        <!--end::Menu separator-->

                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3">
                                New Ticket
                            </a>
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3">
                                New Customer
                            </a>
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu item-->
                        <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                            <!--begin::Menu item-->
                            <a href="#" class="menu-link px-3">
                                <span class="menu-title">New Group</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <!--end::Menu item-->

                            <!--begin::Menu sub-->
                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">
                                        Admin Group
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">
                                        Staff Group
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">
                                        Member Group
                                    </a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu sub-->
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3">
                                New Contact
                            </a>
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu separator-->
                        <div class="separator mt-3 opacity-75"></div>
                        <!--end::Menu separator-->

                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content px-3 py-3">
                                <a class="btn btn-primary  btn-sm px-4" href="#">
                                    Generate Reports
                                </a>
                            </div>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu 2-->

                    <!--end::Menu-->
                </div>
                <!--end::Header-->

                <!--begin::Body-->
                <div class="card-body pt-2">
                    <!--begin::Nav-->
                    <ul class="nav nav-pills nav-pills-custom mb-3">
                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 me-lg-6">
                            <!--begin::Link-->
                            <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden active w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_2_tab_1">
                                <!--begin::Icon-->
                                <div class="nav-icon">
                                    <img alt="" src="/manage/media/svg/products-categories/t-shirt.svg" class=""/>
                                </div>
                                <!--end::Icon-->

                                <!--begin::Subtitle-->
                                <span class="nav-text text-gray-700 fw-bold fs-6 lh-1">
                        T-shirt
                    </span>
                                <!--end::Subtitle-->

                                <!--begin::Bullet-->
                                <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                <!--end::Bullet-->
                            </a>
                            <!--end::Link-->
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 me-lg-6">
                            <!--begin::Link-->
                            <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_2_tab_2">
                                <!--begin::Icon-->
                                <div class="nav-icon">
                                    <img alt="" src="/manage/media/svg/products-categories/gaming.svg" class=""/>
                                </div>
                                <!--end::Icon-->

                                <!--begin::Subtitle-->
                                <span class="nav-text text-gray-700 fw-bold fs-6 lh-1">
                        Gaming
                    </span>
                                <!--end::Subtitle-->

                                <!--begin::Bullet-->
                                <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                <!--end::Bullet-->
                            </a>
                            <!--end::Link-->
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 me-lg-6">
                            <!--begin::Link-->
                            <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_2_tab_3">
                                <!--begin::Icon-->
                                <div class="nav-icon">
                                    <img alt="" src="/manage/media/svg/products-categories/watch.svg" class=""/>
                                </div>
                                <!--end::Icon-->

                                <!--begin::Subtitle-->
                                <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">
                        Watch
                    </span>
                                <!--end::Subtitle-->

                                <!--begin::Bullet-->
                                <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                <!--end::Bullet-->
                            </a>
                            <!--end::Link-->
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 me-lg-6">
                            <!--begin::Link-->
                            <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_2_tab_4">
                                <!--begin::Icon-->
                                <div class="nav-icon">
                                    <img alt="" src="/manage/media/svg/products-categories/gloves.svg" class="nav-icon"/>
                                </div>
                                <!--end::Icon-->

                                <!--begin::Subtitle-->
                                <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">
                        Gloves
                    </span>
                                <!--end::Subtitle-->

                                <!--begin::Bullet-->
                                <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                <!--end::Bullet-->
                            </a>
                            <!--end::Link-->
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="nav-item mb-3">
                            <!--begin::Link-->
                            <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_2_tab_5">
                                <!--begin::Icon-->
                                <div class="nav-icon">
                                    <img alt="" src="/manage/media/svg/products-categories/shoes.svg" class="nav-icon"/>
                                </div>
                                <!--end::Icon-->

                                <!--begin::Subtitle-->
                                <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">
                        Shoes
                    </span>
                                <!--end::Subtitle-->

                                <!--begin::Bullet-->
                                <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                <!--end::Bullet-->
                            </a>
                            <!--end::Link-->
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Nav-->

                    <!--begin::Tab Content-->
                    <div class="tab-content">

                        <!--begin::Tap pane-->
                        <div class="tab-pane fade show active" id="kt_stats_widget_2_tab_1">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                    <!--begin::Table head-->
                                    <thead>
                                    <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                        <th class="ps-0 w-50px">ITEM</th>
                                        <th class="min-w-125px"></th>
                                        <th class="text-end min-w-100px">QTY</th>
                                        <th class="pe-0 text-end min-w-100px">PRICE</th>
                                        <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->

                                    <!--begin::Table body-->
                                    <tbody>
                                    <tr>
                                        <td>
                                            <img src="/manage/media/stock/ecommerce/210.png" class="w-50px ms-n1" alt=""/>
                                        </td>
                                        <td class="ps-0">
                                            <a href="/metronic8/demo63/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant 1802</a>
                                            <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-2347</span>
                                        </td>
                                        <td>
                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$72.00</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$126.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/manage/media/stock/ecommerce/215.png" class="w-50px ms-n1" alt=""/>
                                        </td>
                                        <td class="ps-0">
                                            <a href="/metronic8/demo63/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red Laga</a>
                                            <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-1321</span>
                                        </td>
                                        <td>
                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$45.00</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$76.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/manage/media/stock/ecommerce/209.png" class="w-50px ms-n1" alt=""/>
                                        </td>
                                        <td class="ps-0">
                                            <a href="/metronic8/demo63/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                            <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-4312</span>
                                        </td>
                                        <td>
                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$84.00</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$168.00</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--end::Tap pane-->

                        <!--begin::Tap pane-->
                        <div class="tab-pane fade " id="kt_stats_widget_2_tab_2">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                    <!--begin::Table head-->
                                    <thead>
                                    <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                        <th class="ps-0 w-50px">ITEM</th>
                                        <th class="min-w-125px"></th>
                                        <th class="text-end min-w-100px">QTY</th>
                                        <th class="pe-0 text-end min-w-100px">PRICE</th>
                                        <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->

                                    <!--begin::Table body-->
                                    <tbody>
                                    <tr>
                                        <td>
                                            <img src="/manage/media/stock/ecommerce/197.png" class="w-50px ms-n1" alt=""/>
                                        </td>
                                        <td class="ps-0">
                                            <a href="/metronic8/demo63/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant 1802</a>
                                            <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-4312</span>
                                        </td>
                                        <td>
                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$32.00</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$312.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/manage/media/stock/ecommerce/178.png" class="w-50px ms-n1" alt=""/>
                                        </td>
                                        <td class="ps-0">
                                            <a href="/metronic8/demo63/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red Laga</a>
                                            <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-3122</span>
                                        </td>
                                        <td>
                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$53.00</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$62.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/manage/media/stock/ecommerce/22.png" class="w-50px ms-n1" alt=""/>
                                        </td>
                                        <td class="ps-0">
                                            <a href="/metronic8/demo63/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                            <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-1142</span>
                                        </td>
                                        <td>
                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$74.00</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$139.00</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--end::Tap pane-->

                        <!--begin::Tap pane-->
                        <div class="tab-pane fade " id="kt_stats_widget_2_tab_3">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                    <!--begin::Table head-->
                                    <thead>
                                    <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                        <th class="ps-0 w-50px">ITEM</th>
                                        <th class="min-w-125px"></th>
                                        <th class="text-end min-w-100px">QTY</th>
                                        <th class="pe-0 text-end min-w-100px">PRICE</th>
                                        <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->

                                    <!--begin::Table body-->
                                    <tbody>
                                    <tr>
                                        <td>
                                            <img src="/manage/media/stock/ecommerce/1.png" class="w-50px ms-n1" alt=""/>
                                        </td>
                                        <td class="ps-0">
                                            <a href="/metronic8/demo63/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant 1324</a>
                                            <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-1523</span>
                                        </td>
                                        <td>
                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$43.00</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$231.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/manage/media/stock/ecommerce/24.png" class="w-50px ms-n1" alt=""/>
                                        </td>
                                        <td class="ps-0">
                                            <a href="/metronic8/demo63/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red Laga</a>
                                            <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-5314</span>
                                        </td>
                                        <td>
                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$71.00</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$53.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/manage/media/stock/ecommerce/71.png" class="w-50px ms-n1" alt=""/>
                                        </td>
                                        <td class="ps-0">
                                            <a href="/metronic8/demo63/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                            <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-4222</span>
                                        </td>
                                        <td>
                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$23.00</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$213.00</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--end::Tap pane-->

                        <!--begin::Tap pane-->
                        <div class="tab-pane fade " id="kt_stats_widget_2_tab_4">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                    <!--begin::Table head-->
                                    <thead>
                                    <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                        <th class="ps-0 w-50px">ITEM</th>
                                        <th class="min-w-125px"></th>
                                        <th class="text-end min-w-100px">QTY</th>
                                        <th class="pe-0 text-end min-w-100px">PRICE</th>
                                        <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->

                                    <!--begin::Table body-->
                                    <tbody>
                                    <tr>
                                        <td>
                                            <img src="/manage/media/stock/ecommerce/41.png" class="w-50px ms-n1" alt=""/>
                                        </td>
                                        <td class="ps-0">
                                            <a href="/metronic8/demo63/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant 2635</a>
                                            <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-1523</span>
                                        </td>
                                        <td>
                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$65.00</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$163.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/manage/media/stock/ecommerce/63.png" class="w-50px ms-n1" alt=""/>
                                        </td>
                                        <td class="ps-0">
                                            <a href="/metronic8/demo63/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red Laga</a>
                                            <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-2745</span>
                                        </td>
                                        <td>
                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$64.00</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$73.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/manage/media/stock/ecommerce/59.png" class="w-50px ms-n1" alt=""/>
                                        </td>
                                        <td class="ps-0">
                                            <a href="/metronic8/demo63/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                            <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-5173</span>
                                        </td>
                                        <td>
                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$54.00</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$173.00</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--end::Tap pane-->

                        <!--begin::Tap pane-->
                        <div class="tab-pane fade " id="kt_stats_widget_2_tab_5">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                    <!--begin::Table head-->
                                    <thead>
                                    <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                        <th class="ps-0 w-50px">ITEM</th>
                                        <th class="min-w-125px"></th>
                                        <th class="text-end min-w-100px">QTY</th>
                                        <th class="pe-0 text-end min-w-100px">PRICE</th>
                                        <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->

                                    <!--begin::Table body-->
                                    <tbody>
                                    <tr>
                                        <td>
                                            <img src="/manage/media/stock/ecommerce/10.png" class="w-50px ms-n1" alt=""/>
                                        </td>
                                        <td class="ps-0">
                                            <a href="/metronic8/demo63/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Nike</a>
                                            <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-2163</span>
                                        </td>
                                        <td>
                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$64.00</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$287.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/manage/media/stock/ecommerce/96.png" class="w-50px ms-n1" alt=""/>
                                        </td>
                                        <td class="ps-0">
                                            <a href="/metronic8/demo63/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Adidas</a>
                                            <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-2162</span>
                                        </td>
                                        <td>
                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$76.00</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$51.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/manage/media/stock/ecommerce/13.png" class="w-50px ms-n1" alt=""/>
                                        </td>
                                        <td class="ps-0">
                                            <a href="/metronic8/demo63/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Puma</a>
                                            <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-1537</span>
                                        </td>
                                        <td>
                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$27.00</span>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="text-gray-800 fw-bold d-block fs-6">$167.00</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--end::Tap pane-->
                    </div>
                    <!--end::Tab Content-->
                </div>
                <!--end: Card Body-->
            </div>
            <!--end::Table widget 2-->    </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-6 mb-5 mb-xl-10">
            <!--begin::Chart widget 4-->
            <div class="card card-flush overflow-hidden h-md-100">
                <!--begin::Header-->
                <div class="card-header py-5">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-900">Discounted Product Sales</span>
                        <span class="text-gray-500 mt-1 fw-semibold fs-6">Users from all channels</span>
                    </h3>
                    <!--end::Title-->

                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Menu-->
                        <button class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end"
                                data-kt-menu-trigger="click"
                                data-kt-menu-placement="bottom-end"
                                data-kt-menu-overflow="true">

                            <i class="ki-outline ki-dots-square fs-1"></i>
                        </button>


                        <!--begin::Menu 2-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu separator-->
                            <div class="separator mb-3 opacity-75"></div>
                            <!--end::Menu separator-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">
                                    New Ticket
                                </a>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">
                                    New Customer
                                </a>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                <!--begin::Menu item-->
                                <a href="#" class="menu-link px-3">
                                    <span class="menu-title">New Group</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <!--end::Menu item-->

                                <!--begin::Menu sub-->
                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            Admin Group
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            Staff Group
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            Member Group
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu sub-->
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">
                                    New Contact
                                </a>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu separator-->
                            <div class="separator mt-3 opacity-75"></div>
                            <!--end::Menu separator-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content px-3 py-3">
                                    <a class="btn btn-primary  btn-sm px-4" href="#">
                                        Generate Reports
                                    </a>
                                </div>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu 2-->

                        <!--end::Menu-->
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->

                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                    <!--begin::Info-->
                    <div class="px-9 mb-5">
                        <!--begin::Statistics-->
                        <div class="d-flex align-items-center mb-2">
                            <!--begin::Currency-->
                            <span class="fs-4 fw-semibold text-gray-500 align-self-start me-1">$</span>
                            <!--end::Currency-->

                            <!--begin::Value-->
                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">3,706</span>
                            <!--end::Value-->

                            <!--begin::Label-->
                            <span class="badge badge-light-success fs-base">
                    <i class="ki-outline ki-arrow-down fs-5 text-success ms-n1"></i>                    4.5%
                </span>
                            <!--end::Label-->
                        </div>
                        <!--end::Statistics-->

                        <!--begin::Description-->
                        <span class="fs-6 fw-semibold text-gray-500">Total Discounted Sales This Month</span>
                        <!--end::Description-->
                    </div>
                    <!--end::Info-->

                    <!--begin::Chart-->
                    <div id="kt_charts_widget_4" class="min-h-auto ps-4 pe-6" style="height: 300px"></div>
                    <!--end::Chart-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Chart widget 4-->    </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
@endsection