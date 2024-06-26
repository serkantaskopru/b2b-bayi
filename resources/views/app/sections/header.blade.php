<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: true, lg: true}"
     data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
    <div class="app-container container-fluid d-flex flex-stack" id="kt_app_header_container">
        <div class="d-flex d-lg-none align-items-center me-lg-20 gap-1 gap-lg-2">
            <div class="btn btn-icon btn-color-gray-500 btn-active-color-primary w-35px h-35px d-flex d-lg-none"
                 id="kt_app_sidebar_toggle">
                <i class="ki-outline ki-abstract-14 lh-0 fs-1"></i>
            </div>

            <a href="#">
                <img alt="Logo" src="/manage/media/logos/demo63.svg" class="h-25px theme-light-show"/>
                <img alt="Logo" src="/manage/media/logos/demo63-dark.svg" class="h-25px theme-dark-show"/>
            </a>
        </div>

        <div class="d-flex flex-stack flex-lg-row-fluid" id="kt_app_header_wrapper">
            <div
                class="app-page-title d-flex flex-column gap-1 me-3 mb-5 mb-lg-0"
                data-kt-swapper="true"
                data-kt-swapper-mode="{default: 'prepend', lg: 'prepend'}"
                data-kt-swapper-parent="{default: '#kt_app_content_container', lg: '#kt_app_header_wrapper'}"
            >
                <h1 class="fs-2 text-gray-900 fw-bold m-0">
                    @yield('header_title')
                </h1>

                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 mb-2">
                    <li class="breadcrumb-item text-gray-600 fw-bold lh-1">
                        <a href="#" class="text-gray-700 text-hover-primary me-1"> <i
                                class="ki-outline ki-home text-gray-500 fs-7"></i> </a>
                    </li>

                    <li class="breadcrumb-item">
                        <i class="ki-outline ki-right fs-7 text-gray-500 mx-n1"></i>
                    </li>

                    <li class="breadcrumb-item text-gray-600 fw-bold lh-1">
                        Yönetim Paneli
                    </li>
                </ul>
            </div>

            <div class="app-navbar flex-shrink-0 gap-2 gap-lg-4">
                {{--<div class="app-navbar-item">
                    <div
                        id="kt_header_search"
                        class="header-search d-flex align-items-stretch"
                        data-kt-search-keypress="true"
                        data-kt-search-min-length="2"
                        data-kt-search-enter="enter"
                        data-kt-search-layout="menu"
                        data-kt-menu-trigger="auto"
                        data-kt-menu-overflow="false"
                        data-kt-menu-permanent="true"
                        data-kt-menu-placement="bottom-end"
                    >
                        <div class="d-flex align-items-center" data-kt-search-element="toggle"
                             id="kt_header_search_toggle">
                            <div
                                class="btn btn-icon rounded-circle w-35px h-35px bg-light-info border border-info-clarity">
                                <i class="ki-outline ki-magnifier text-info fs-3"></i>
                            </div>
                        </div>

                        <div data-kt-search-element="content"
                             class="menu menu-sub menu-sub-dropdown p-7 w-325px w-md-375px">
                            <div data-kt-search-element="wrapper">
                                <form data-kt-search-element="form" class="w-100 position-relative mb-3"
                                      autocomplete="off">
                                    <i class="ki-outline ki-magnifier fs-2 text-gray-500 position-absolute top-50 translate-middle-y ms-0"></i>

                                    <input type="text" class="search-input form-control form-control-flush ps-10"
                                           name="search" value="" placeholder="Search..."
                                           data-kt-search-element="input"/>

                                    <span
                                        class="search-spinner position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-1"
                                        data-kt-search-element="spinner">
                                        <span class="spinner-border h-15px w-15px align-middle text-gray-500"></span>
                                    </span>

                                    <span
                                        class="search-reset btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none"
                                        data-kt-search-element="clear">
                                        <i class="ki-outline ki-cross fs-2 fs-lg-1 me-0"></i>
                                    </span>

                                    <div class="position-absolute top-50 end-0 translate-middle-y"
                                         data-kt-search-element="toolbar">
                                        <div data-kt-search-element="preferences-show"
                                             class="btn btn-icon w-20px btn-sm btn-active-color-primary me-1"
                                             data-bs-toggle="tooltip" title="Show search preferences">
                                            <i class="ki-outline ki-setting-2 fs-2"></i>
                                        </div>

                                        <div data-kt-search-element="advanced-options-form-show"
                                             class="btn btn-icon w-20px btn-sm btn-active-color-primary"
                                             data-bs-toggle="tooltip" title="Show more search options">
                                            <i class="ki-outline ki-down fs-2"></i>
                                        </div>
                                    </div>
                                </form>

                                <div class="separator border-gray-200 mb-6"></div>

                                <div data-kt-search-element="results" class="d-none">
                                    <div class="scroll-y mh-200px mh-lg-350px">
                                        <h3 class="fs-5 text-muted m-0 pb-5" data-kt-search-element="category-title">
                                            Users
                                        </h3>

                                        <a href="#"
                                           class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                            <div class="symbol symbol-40px me-4">
                                                <img src="/manage/media/avatars/300-6.jpg" alt=""/>
                                            </div>

                                            <div class="d-flex flex-column justify-content-start fw-semibold">
                                                <span class="fs-6 fw-semibold">Karina Clark</span>
                                                <span class="fs-7 fw-semibold text-muted">Marketing Manager</span>
                                            </div>
                                        </a>

                                        <a href="#"
                                           class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                            <div class="symbol symbol-40px me-4">
                                                <img src="/manage/media/avatars/300-2.jpg" alt=""/>
                                            </div>

                                            <div class="d-flex flex-column justify-content-start fw-semibold">
                                                <span class="fs-6 fw-semibold">Olivia Bold</span>
                                                <span class="fs-7 fw-semibold text-muted">Software Engineer</span>
                                            </div>
                                        </a>

                                        <a href="#"
                                           class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                            <div class="symbol symbol-40px me-4">
                                                <img src="/manage/media/avatars/300-9.jpg" alt=""/>
                                            </div>

                                            <div class="d-flex flex-column justify-content-start fw-semibold">
                                                <span class="fs-6 fw-semibold">Ana Clark</span>
                                                <span class="fs-7 fw-semibold text-muted">UI/UX Designer</span>
                                            </div>
                                        </a>

                                        <a href="#"
                                           class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                            <div class="symbol symbol-40px me-4">
                                                <img src="/manage/media/avatars/300-14.jpg" alt=""/>
                                            </div>

                                            <div class="d-flex flex-column justify-content-start fw-semibold">
                                                <span class="fs-6 fw-semibold">Nick Pitola</span>
                                                <span class="fs-7 fw-semibold text-muted">Art Director</span>
                                            </div>
                                        </a>

                                        <a href="#"
                                           class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                            <div class="symbol symbol-40px me-4">
                                                <img src="/manage/media/avatars/300-11.jpg" alt=""/>
                                            </div>

                                            <div class="d-flex flex-column justify-content-start fw-semibold">
                                                <span class="fs-6 fw-semibold">Edward Kulnic</span>
                                                <span class="fs-7 fw-semibold text-muted">System Administrator</span>
                                            </div>
                                        </a>

                                        <h3 class="fs-5 text-muted m-0 pt-5 pb-5"
                                            data-kt-search-element="category-title">
                                            Customers
                                        </h3>

                                        <a href="#"
                                           class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                            <div class="symbol symbol-40px me-4">
                                                <span class="symbol-label bg-light">
                                                    <img class="w-20px h-20px"
                                                         src="/manage/media/svg/brand-logos/volicity-9.svg" alt=""/>
                                                </span>
                                            </div>

                                            <div class="d-flex flex-column justify-content-start fw-semibold">
                                                <span class="fs-6 fw-semibold">Company Rbranding</span>
                                                <span class="fs-7 fw-semibold text-muted">UI Design</span>
                                            </div>
                                        </a>

                                        <a href="#"
                                           class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                            <div class="symbol symbol-40px me-4">
                                                <span class="symbol-label bg-light">
                                                    <img class="w-20px h-20px"
                                                         src="/manage/media/svg/brand-logos/tvit.svg" alt=""/>
                                                </span>
                                            </div>

                                            <div class="d-flex flex-column justify-content-start fw-semibold">
                                                <span class="fs-6 fw-semibold">Company Re-branding</span>
                                                <span class="fs-7 fw-semibold text-muted">Web Development</span>
                                            </div>
                                        </a>

                                        <a href="#"
                                           class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                            <div class="symbol symbol-40px me-4">
                                                <span class="symbol-label bg-light">
                                                    <img class="w-20px h-20px"
                                                         src="/manage/media/svg/misc/infography.svg" alt=""/>
                                                </span>
                                            </div>

                                            <div class="d-flex flex-column justify-content-start fw-semibold">
                                                <span class="fs-6 fw-semibold">Business Analytics App</span>
                                                <span class="fs-7 fw-semibold text-muted">Administration</span>
                                            </div>
                                        </a>

                                        <a href="#"
                                           class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                            <div class="symbol symbol-40px me-4">
                                                <span class="symbol-label bg-light">
                                                    <img class="w-20px h-20px"
                                                         src="/manage/media/svg/brand-logos/leaf.svg" alt=""/>
                                                </span>
                                            </div>

                                            <div class="d-flex flex-column justify-content-start fw-semibold">
                                                <span class="fs-6 fw-semibold">EcoLeaf App Launch</span>
                                                <span class="fs-7 fw-semibold text-muted">Marketing</span>
                                            </div>
                                        </a>

                                        <a href="#"
                                           class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                            <div class="symbol symbol-40px me-4">
                                                <span class="symbol-label bg-light">
                                                    <img class="w-20px h-20px"
                                                         src="/manage/media/svg/brand-logos/tower.svg" alt=""/>
                                                </span>
                                            </div>

                                            <div class="d-flex flex-column justify-content-start fw-semibold">
                                                <span class="fs-6 fw-semibold">Tower Group Website</span>
                                                <span class="fs-7 fw-semibold text-muted">Google Adwords</span>
                                            </div>
                                        </a>

                                        <h3 class="fs-5 text-muted m-0 pt-5 pb-5"
                                            data-kt-search-element="category-title">
                                            Projects
                                        </h3>

                                        <a href="#"
                                           class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                            <div class="symbol symbol-40px me-4">
                                                <span class="symbol-label bg-light">
                                                    <i class="ki-outline ki-notepad fs-2 text-primary"></i>
                                                </span>
                                            </div>

                                            <div class="d-flex flex-column">
                                                <span class="fs-6 fw-semibold">Si-Fi Project by AU Themes</span>
                                                <span class="fs-7 fw-semibold text-muted">#45670</span>
                                            </div>
                                        </a>

                                        <a href="#"
                                           class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                            <div class="symbol symbol-40px me-4">
                                                <span class="symbol-label bg-light">
                                                    <i class="ki-outline ki-frame fs-2 text-primary"></i>
                                                </span>
                                            </div>

                                            <div class="d-flex flex-column">
                                                <span class="fs-6 fw-semibold">Shopix Mobile App Planning</span>
                                                <span class="fs-7 fw-semibold text-muted">#45690</span>
                                            </div>
                                        </a>

                                        <a href="#"
                                           class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                            <div class="symbol symbol-40px me-4">
                                                <span class="symbol-label bg-light">
                                                    <i class="ki-outline ki-message-text-2 fs-2 text-primary"></i>
                                                </span>
                                            </div>

                                            <div class="d-flex flex-column">
                                                <span class="fs-6 fw-semibold">Finance Monitoring SAAS Discussion</span>
                                                <span class="fs-7 fw-semibold text-muted">#21090</span>
                                            </div>
                                        </a>

                                        <a href="#"
                                           class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
                                            <div class="symbol symbol-40px me-4">
                                                <span class="symbol-label bg-light">
                                                    <i class="ki-outline ki-profile-circle fs-2 text-primary"></i>
                                                </span>
                                            </div>

                                            <div class="d-flex flex-column">
                                                <span class="fs-6 fw-semibold">Dashboard Analitics Launch</span>
                                                <span class="fs-7 fw-semibold text-muted">#34560</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="mb-5" data-kt-search-element="main">
                                    <div class="d-flex flex-stack fw-semibold mb-4">
                                        <span class="text-muted fs-6 me-2">Recently Searched:</span>
                                    </div>

                                    <div class="scroll-y mh-200px mh-lg-325px">
                                        <div class="d-flex align-items-center mb-5">
                                            <div class="symbol symbol-40px me-4">
                                                <span class="symbol-label bg-light">
                                                    <i class="ki-outline ki-laptop fs-2 text-primary"></i>
                                                </span>
                                            </div>

                                            <div class="d-flex flex-column">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">BoomApp
                                                    by Keenthemes</a>
                                                <span class="fs-7 text-muted fw-semibold">#45789</span>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center mb-5">
                                            <div class="symbol symbol-40px me-4">
                                                <span class="symbol-label bg-light">
                                                    <i class="ki-outline ki-chart-simple fs-2 text-primary"></i>
                                                </span>
                                            </div>

                                            <div class="d-flex flex-column">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">"Kept
                                                    API Project Meeting</a>
                                                <span class="fs-7 text-muted fw-semibold">#84050</span>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center mb-5">
                                            <div class="symbol symbol-40px me-4">
                                                <span class="symbol-label bg-light">
                                                    <i class="ki-outline ki-chart fs-2 text-primary"></i>
                                                </span>
                                            </div>

                                            <div class="d-flex flex-column">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">"KPI
                                                    Monitoring App Launch</a>
                                                <span class="fs-7 text-muted fw-semibold">#84250</span>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center mb-5">
                                            <div class="symbol symbol-40px me-4">
                                                <span class="symbol-label bg-light">
                                                    <i class="ki-outline ki-chart-line-down fs-2 text-primary"></i>
                                                </span>
                                            </div>

                                            <div class="d-flex flex-column">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">Project
                                                    Reference FAQ</a>
                                                <span class="fs-7 text-muted fw-semibold">#67945</span>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center mb-5">
                                            <div class="symbol symbol-40px me-4">
                                                <span class="symbol-label bg-light">
                                                    <i class="ki-outline ki-sms fs-2 text-primary"></i>
                                                </span>
                                            </div>

                                            <div class="d-flex flex-column">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">"FitPro
                                                    App Development</a>
                                                <span class="fs-7 text-muted fw-semibold">#84250</span>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center mb-5">
                                            <div class="symbol symbol-40px me-4">
                                                <span class="symbol-label bg-light">
                                                    <i class="ki-outline ki-bank fs-2 text-primary"></i>
                                                </span>
                                            </div>

                                            <div class="d-flex flex-column">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">Shopix
                                                    Mobile App</a>
                                                <span class="fs-7 text-muted fw-semibold">#45690</span>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center mb-5">
                                            <div class="symbol symbol-40px me-4">
                                                <span class="symbol-label bg-light">
                                                    <i class="ki-outline ki-chart-line-down fs-2 text-primary"></i>
                                                </span>
                                            </div>

                                            <div class="d-flex flex-column">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">"Landing
                                                    UI Design" Launch</a>
                                                <span class="fs-7 text-muted fw-semibold">#24005</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div data-kt-search-element="empty" class="text-center d-none">
                                    <div class="pt-10 pb-10">
                                        <i class="ki-outline ki-search-list fs-4x opacity-50"></i>
                                    </div>

                                    <div class="pb-15 fw-semibold">
                                        <h3 class="text-gray-600 fs-5 mb-2">No result found</h3>
                                        <div class="text-muted fs-7">Please try again with a different query</div>
                                    </div>
                                </div>
                            </div>

                            <form data-kt-search-element="advanced-options-form" class="pt-1 d-none">
                                <h3 class="fw-semibold text-gray-900 mb-7">Advanced Search</h3>

                                <div class="mb-5">
                                    <input type="text" class="form-control form-control-sm form-control-solid"
                                           placeholder="Contains the word" name="query"/>
                                </div>

                                <div class="mb-5">
                                    <div class="nav-group nav-group-fluid">
                                        <label>
                                            <input type="radio" class="btn-check" name="type" value="has"
                                                   checked="checked"/>
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary">
                                                All
                                            </span>
                                        </label>

                                        <label>
                                            <input type="radio" class="btn-check" name="type" value="users"/>
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">
                                                Users
                                            </span>
                                        </label>

                                        <label>
                                            <input type="radio" class="btn-check" name="type" value="orders"/>
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">
                                                Orders
                                            </span>
                                        </label>

                                        <label>
                                            <input type="radio" class="btn-check" name="type" value="projects"/>
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">
                                                Projects
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-5">
                                    <input type="text" name="assignedto"
                                           class="form-control form-control-sm form-control-solid"
                                           placeholder="Assigned to" value=""/>
                                </div>

                                <div class="mb-5">
                                    <input type="text" name="collaborators"
                                           class="form-control form-control-sm form-control-solid"
                                           placeholder="Collaborators" value=""/>
                                </div>

                                <div class="mb-5">
                                    <div class="nav-group nav-group-fluid">
                                        <label>
                                            <input type="radio" class="btn-check" name="attachment" value="has"
                                                   checked="checked"/>
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary">
                                                Has attachment
                                            </span>
                                        </label>

                                        <label>
                                            <input type="radio" class="btn-check" name="attachment" value="any"/>
                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">
                                                Any
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-5">
                                    <select name="timezone" aria-label="Select a Timezone" data-control="select2"
                                            data-dropdown-parent="#kt_header_search" data-placeholder="date_period"
                                            class="form-select form-select-sm form-select-solid">
                                        <option value="next">Within the next</option>
                                        <option value="last">Within the last</option>
                                        <option value="between">Between</option>
                                        <option value="on">On</option>
                                    </select>
                                </div>

                                <div class="row mb-8">
                                    <div class="col-6">
                                        <input type="number" name="date_number"
                                               class="form-control form-control-sm form-control-solid"
                                               placeholder="Lenght" value=""/>
                                    </div>

                                    <div class="col-6">
                                        <select name="date_typer" aria-label="Select a Timezone" data-control="select2"
                                                data-dropdown-parent="#kt_header_search" data-placeholder="Period"
                                                class="form-select form-select-sm form-select-solid">
                                            <option value="days">Days</option>
                                            <option value="weeks">Weeks</option>
                                            <option value="months">Months</option>
                                            <option value="years">Years</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="reset"
                                            class="btn btn-sm btn-light fw-bold btn-active-light-primary me-2"
                                            data-kt-search-element="advanced-options-form-cancel">Cancel
                                    </button>

                                    <a href="/metronic8/demo63/utilities/search/horizontal.html"
                                       class="btn btn-sm fw-bold btn-primary"
                                       data-kt-search-element="advanced-options-form-search">Search</a>
                                </div>
                            </form>

                            <form data-kt-search-element="preferences" class="pt-1 d-none">
                                <h3 class="fw-semibold text-gray-900 mb-7">Search Preferences</h3>

                                <div class="pb-4 border-bottom">
                                    <label
                                        class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                        <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">
                                            Projects
                                        </span>

                                        <input class="form-check-input" type="checkbox" value="1" checked="checked"/>
                                    </label>
                                </div>

                                <div class="py-4 border-bottom">
                                    <label
                                        class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                        <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">
                                            Targets
                                        </span>
                                        <input class="form-check-input" type="checkbox" value="1" checked="checked"/>
                                    </label>
                                </div>

                                <div class="py-4 border-bottom">
                                    <label
                                        class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                        <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">
                                            Affiliate Programs
                                        </span>
                                        <input class="form-check-input" type="checkbox" value="1"/>
                                    </label>
                                </div>

                                <div class="py-4 border-bottom">
                                    <label
                                        class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                        <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">
                                            Referrals
                                        </span>
                                        <input class="form-check-input" type="checkbox" value="1" checked="checked"/>
                                    </label>
                                </div>

                                <div class="py-4 border-bottom">
                                    <label
                                        class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                        <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">
                                            Users
                                        </span>
                                        <input class="form-check-input" type="checkbox" value="1"/>
                                    </label>
                                </div>

                                <div class="d-flex justify-content-end pt-7">
                                    <button type="reset"
                                            class="btn btn-sm btn-light fw-bold btn-active-light-primary me-2"
                                            data-kt-search-element="preferences-dismiss">Cancel
                                    </button>
                                    <button type="submit" class="btn btn-sm fw-bold btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>--}}

                <div class="app-navbar-item">
                    @php
                        $notifications = get_all_notifications();
                    @endphp
                    <div
                        class="btn btn-icon rounded-circle w-35px h-35px bg-light-warning position-relative border border-warning-clarity @if(count($notifications['unread']) > 0) pulse green-pulse @endif"
                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                        data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end"
                        id="kt_menu_item_wow"
                    >
                        <i class="ki-outline ki-notification-on text-warning fs-3"></i>
                        @if(count($notifications['unread']) > 0)
                            <span
                                class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink">
                            </span>
                        @endif
                    </div>

                    <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true"
                         id="kt_menu_notifications">
                        <div class="d-flex flex-column bgi-no-repeat rounded-top"
                             style="background-image: url('/manage/media/misc/menu-header-bg.jpg');">
                            <h3 class="text-white fw-semibold px-6 mt-6 mb-6">Bildirimler
                                @if(count($notifications['unread']) > 0)
                                    <span
                                        class="fs-8 opacity-75 ps-3">{{ count($notifications['unread']) }} okunmamış mesaj var</span>
                                @endif
                            </h3>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_topbar_notifications_1" role="tabpanel">
                                <div class="scroll-y mh-325px my-5 px-4">
                                    @forelse ($notifications['unread'] as $notification)
                                        <!--begin::Item-->
                                        <div class="d-flex justify-content-between bg-light rounded rounded-lg p-4 mb-2">
                                            <div>
                                                <!--begin::Section-->
                                                <div class="d-flex align-items-center me-2">
                                                    <!--begin::Title-->
                                                    <a href="{{route('tenant.order.show',$notification->data['order_id'] ?? '#')}}"
                                                       class="text-gray-800 text-hover-primary fw-semibold">{{ $notification->data['message'] }}</a>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Section-->

                                                <!--begin::Label-->
                                                <span class="fs-8">{{ $notification->created_at->format('d.m.Y H:i') }}</span>
                                                <!--end::Label-->
                                            </div>
                                            <div>
                                                <a href="#" title="Okundu olarak işaretle" class="btn btn-secondary btn-icon notification-item" data-id="{{ $notification->id }}"><i class="ki-outline ki-check-circle text-success fs-3">
                                                    </i></a>
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                    @empty
                                        <a href="#">Hiç okunmamış bildiriminiz yok</a>
                                    @endforelse
                                    @forelse ($notifications['read'] as $notification)
                                            <!--begin::Item-->
                                            <div class="bg-light rounded rounded-lg p-4 mb-2">
                                                <!--begin::Section-->
                                                <div class="d-flex align-items-center me-2">
                                                    <!--begin::Title-->
                                                    <a href="{{route('tenant.order.show',$notification->data['order_id'] ?? '#')}}"
                                                       class="notification-item text-gray-800 text-hover-primary fw-semibold" data-id="{{ $notification->id }}">{{ $notification->data['message'] }}</a>

                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Section-->

                                                <!--begin::Label-->
                                                <span class="fs-8">{{ $notification->created_at->format('d.m.Y H:i') }}</span>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Item-->
                                    @empty
                                        <a href="#">Hiç okunmuş bildiriminiz yok</a>
                                    @endforelse
                                </div>

                                <div class="py-3 text-center border-top">
                                    <a href="#"
                                       class="btn btn-color-gray-600 btn-active-color-primary">
                                        Tümünü Görüntüle
                                        <i class="ki-outline ki-arrow-right fs-5"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="app-navbar-item">
                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                         data-kt-menu-attach="parent"
                         data-kt-menu-placement="bottom-end"
                         id="kt_menu_item_cart">
                        <button
                            class="btn btn-icon rounded-circle w-35px h-35px bg-light-primary border border-primary-clarity">
                            <i class="ki-outline ki-basket text-primary fs-3"></i>
                            {{--@if(!empty(Auth::user()->sepet))
                                ({{Auth::user()->sepet->urun_sayisi() ?? "0"}} Ürün)
                            @endif--}}
                        </button>
                        <!--begin::My apps-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column w-100 w-sm-350px" data-kt-menu="true">
                            <!--begin::Card-->
                            <div class="card">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">Sepetiniz</div>
                                    <div class="card-toolbar">
                                        {{--<a href="{{route('admin.siparisler.sepet')}}"
                                                class="btn btn-sm btn-active-light-primary align-items-center me-n3">
                                            <i class="bi bi-bag-check"></i>
                                            Sipariş Oluştur
                                        </a>--}}
                                    </div>
                                </div>
                                <div class="card-body py-5 px-5">
                                    <!--begin::Scroll-->
                                    <div class="mh-450px scroll-y me-n5 pe-5">
                                        @if(!empty(Auth::user()->basket))
                                            @if(count(Auth::user()->basket->products) < 1)
                                                <div class="alert alert-primary d-flex align-items-center p-5">
                                                    <div class="d-flex flex-column">
                                                        <h4 class="mb-1 text-dark">Sepetinizde ürün yok</h4>
                                                        <span>Henüz sepetinize ürün eklemediniz. Sipariş oluştur menüsünden yeni ürün satın alabilirsiniz.</span>
                                                    </div>
                                                </div>
                                            @else
                                                @foreach(Auth::user()->basket->products as $basketProduct)
                                                    <div class="card">
                                                        <div class="card-body p-2">
                                                            <div class="row">
                                                                <div class="col-10 mt-5 mb-5">
                                                                    <a href="{{route('tenant.basket.view')}}">
                                                                        <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                                            {{Str::limit($basketProduct->product->name, 24)}}
                                                                        </p>
                                                                    </a>
                                                                </div>
                                                                <div class="col-2 mt-5 mb-5">
                                                                    <btn type="button"
                                                                         onclick="approveAjax('{{route('tenant.basket.destroy',$basketProduct->id)}}', 'get', true)"
                                                                         class="btn btn-icon btn-danger h-30px w-30px">
                                                                        <i class="ki-outline ki-trash fs-6"></i>
                                                                        {{--<i class="bi bi-x-lg"></i>--}}
                                                                    </btn>
                                                                </div>
                                                                <div class="col-4">
                                                                    <a href="{{route('tenant.basket.view')}}">
                                                                        <img
                                                                            src="{{ $basketProduct->product->getImage() ?? ""}}"
                                                                            class="w-50px ms-n1" alt="user">
                                                                    </a>
                                                                </div>
                                                                <div class="col-8">
                                                                    <div class="small text-muted d-flex flex-column">
                                                                        <span class="me-2">Adet:({{$basketProduct->piece}})</span>
                                                                        <span class="me-2">Bayi Komisyon: {{$basketProduct->dealerCommission()}} ₺</span>
                                                                        <span class="me-2">Firma Komisyon: {{$basketProduct->firmCommission()}} ₺</span>
                                                                        <span class="me-2">Toplam Fiyat: {{$basketProduct->getSubTotal()}} ₺</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <a onclick="window.location.href='{{route('tenant.basket.view')}}'" href="{{route('tenant.basket.view')}}"
                                                   class="btn btn-sm btn-primary align-items-center w-100 mt-5">
                                                    <i class="ki-outline ki-basket text-white fs-6"></i>
                                                    Sipariş Oluştur
                                                </a>
                                            @endif
                                        @else
                                            <div class="alert alert-primary d-flex align-items-center p-5">
                                                <div class="d-flex flex-column">
                                                    <h4 class="mb-1 text-dark">Sepetinizde ürün yok</h4>
                                                    <span>Henüz sepetinize ürün eklemediniz. Sipariş oluştur menüsünden yeni ürün satın alabilirsiniz.</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Scroll-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                    </div>

                    {{--<div class="btn btn-icon rounded-circle w-35px h-35px bg-light-primary border border-primary-clarity" id="kt_drawer_chat_toggle">
                        <i class="ki-outline ki-message-text-2 text-primary fs-3"></i>
                    </div>--}}
                </div>


                {{--
                <div class="app-navbar-item">
                    <div
                        class="btn btn-icon rounded-circle w-35px h-35px bg-light-success border border-success-clarity"
                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                        data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end"
                    >
                        <i class="ki-outline ki-element-11 text-success fs-3"></i>
                    </div>

                    <div class="menu menu-sub menu-sub-dropdown menu-column w-100 w-sm-350px" data-kt-menu="true">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">My Apps</div>

                                <div class="card-toolbar">
                                    <button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n3" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-end">
                                        <i class="ki-outline ki-setting-3 fs-2"></i>
                                    </button>

                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                Payments
                                            </div>
                                        </div>

                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                Create Invoice
                                            </a>
                                        </div>

                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link flex-stack px-3">
                                                Create Payment

                                                <span class="ms-2" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"> <i class="ki-outline ki-information fs-6"></i> </span>
                                            </a>
                                        </div>

                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                Generate Bill
                                            </a>
                                        </div>

                                        <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                                            <a href="#" class="menu-link px-3">
                                                <span class="menu-title">Subscription</span>
                                                <span class="menu-arrow"></span>
                                            </a>

                                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        Plans
                                                    </a>
                                                </div>

                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        Billing
                                                    </a>
                                                </div>

                                                --}}{{--
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        Statements
                                                    </a>
                                                </div>
                                                --}}{{--

                                                <div class="separator my-2"></div>

                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3">
                                                        <label class="form-check form-switch form-check-custom form-check-solid">
                                                            <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />

                                                            <span class="form-check-label text-muted fs-6">
                                                                Recuring
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="menu-item px-3 my-1">
                                            <a href="#" class="menu-link px-3">
                                                Settings
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body py-5">
                                <div class="mh-450px scroll-y me-n5 pe-5">
                                    <div class="row g-2">
                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="/manage/media/svg/brand-logos/amazon.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">AWS</span>
                                            </a>
                                        </div>

                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="/manage/media/svg/brand-logos/angular-icon-1.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">AngularJS</span>
                                            </a>
                                        </div>

                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="/manage/media/svg/brand-logos/atica.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Atica</span>
                                            </a>
                                        </div>

                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="/manage/media/svg/brand-logos/beats-electronics.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Music</span>
                                            </a>
                                        </div>

                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="/manage/media/svg/brand-logos/codeigniter.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Codeigniter</span>
                                            </a>
                                        </div>

                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="/manage/media/svg/brand-logos/bootstrap-4.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Bootstrap</span>
                                            </a>
                                        </div>

                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="/manage/media/svg/brand-logos/google-tag-manager.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">GTM</span>
                                            </a>
                                        </div>

                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="/manage/media/svg/brand-logos/disqus.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Disqus</span>
                                            </a>
                                        </div>

                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="/manage/media/svg/brand-logos/dribbble-icon-1.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Dribble</span>
                                            </a>
                                        </div>

                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="/manage/media/svg/brand-logos/google-play-store.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Play Store</span>
                                            </a>
                                        </div>

                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="/manage/media/svg/brand-logos/google-podcasts.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Podcasts</span>
                                            </a>
                                        </div>

                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="/manage/media/svg/brand-logos/figma-1.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Figma</span>
                                            </a>
                                        </div>

                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="/manage/media/svg/brand-logos/github.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Github</span>
                                            </a>
                                        </div>

                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="/manage/media/svg/brand-logos/gitlab.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Gitlab</span>
                                            </a>
                                        </div>

                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="/manage/media/svg/brand-logos/instagram-2-1.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Instagram</span>
                                            </a>
                                        </div>

                                        <div class="col-4">
                                            <a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                                                <img src="/manage/media/svg/brand-logos/pinterest-p.svg" class="w-25px h-25px mb-2" alt="" />
                                                <span class="fw-semibold">Pinterest</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                --}}

                <div class="app-navbar-item ms-lg-5" id="kt_header_user_menu_toggle">
                    <div class="d-flex align-items-center" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                         data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <div class="text-end d-none d-sm-flex flex-column justify-content-center me-3">
                            <span class="#"
                                  class="text-gray-500 fs-8 fw-bold">{!! auth()->user()->printDealerStatusBadge() !!}</span>
                            <a href="#"
                               class="text-gray-800 text-hover-primary fs-7 fw-bold d-block">{{Str::limit(auth()->user()->name ?? '#',12)}}</a>
                        </div>

                        <div class="cursor-pointer symbol symbol symbol-circle symbol-35px symbol-md-40px">
                            <img class src="/manage/media/avatars/300-3.jpg" alt="user"/>
                            <div
                                class="position-absolute translate-middle bottom-0 mb-1 start-100 ms-n1 bg-success rounded-circle h-8px w-8px"></div>
                        </div>
                    </div>

                    <div
                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                        data-kt-menu="true">
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <div class="symbol symbol-50px me-5">
                                    <img alt="Logo" src="/manage/media/avatars/300-3.jpg"/>
                                </div>

                                <div class="d-flex flex-column">
                                    <div
                                        class="fw-bold d-flex align-items-center fs-5">{{Str::limit(auth()->user()->name ?? '#',16)}}
                                        <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span>
                                    </div>

                                    <a href="#"
                                       class="fw-semibold text-muted text-hover-primary fs-7"> {{Str::limit(auth()->user()->email ?? '#',20)}} </a>
                                </div>
                            </div>
                        </div>

                        <div class="separator my-2"></div>

                        {{--
                        <div class="menu-item px-5">
                            <a href="/metronic8/demo63/account/overview.html" class="menu-link px-5">
                                My Profile
                            </a>
                        </div>
                        --}}

                        <div class="menu-item px-5">
                            <a href="/metronic8/demo63/apps/projects/list.html" class="menu-link px-5">
                                <span class="menu-text">Siparişlerim</span>
                                <span class="menu-badge">
                                    <span class="badge badge-light-danger badge-circle fw-bold fs-7">99+</span>
                                </span>
                            </a>
                        </div>

                        <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                             data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                            <a href="#" class="menu-link px-5">
                                <span class="menu-title">Abonelik Bilgilerim</span>
                                <span class="menu-arrow"></span>
                            </a>

                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                <div class="menu-item px-3">
                                    <a href="/metronic8/demo63/account/referrals.html" class="menu-link px-5">
                                        Ödemelerim
                                    </a>
                                </div>

                                <div class="menu-item px-3">
                                    <a href="/metronic8/demo63/account/billing.html" class="menu-link px-5">
                                        Faturalarım
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{--
                        <div class="menu-item px-5">
                            <a href="/metronic8/demo63/account/statements.html" class="menu-link px-5">
                                My Statements
                            </a>
                        </div>
                        --}}

                        <div class="separator my-2"></div>

                        <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                             data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                            <a href="#" class="menu-link px-5">
                                <span class="menu-title position-relative">
                                    Mode

                                    <span class="ms-5 position-absolute translate-middle-y top-50 end-0"> <i
                                            class="ki-outline ki-night-day theme-light-show fs-2"></i> <i
                                            class="ki-outline ki-moon theme-dark-show fs-2"></i> </span>
                                </span>
                            </a>

                            <div
                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                                data-kt-menu="true"
                                data-kt-element="theme-mode-menu"
                            >
                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                       data-kt-value="light">
                                        <span class="menu-icon" data-kt-element="icon"> <i
                                                class="ki-outline ki-night-day fs-2"></i> </span>
                                        <span class="menu-title">
                                            Açık
                                        </span>
                                    </a>
                                </div>

                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                                        <span class="menu-icon" data-kt-element="icon"> <i
                                                class="ki-outline ki-moon fs-2"></i> </span>
                                        <span class="menu-title">
                                            Koyu
                                        </span>
                                    </a>
                                </div>

                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                       data-kt-value="system">
                                        <span class="menu-icon" data-kt-element="icon"> <i
                                                class="ki-outline ki-screen fs-2"></i> </span>
                                        <span class="menu-title">
                                            Sistem Teması
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{--
                        <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                            <a href="#" class="menu-link px-5">
                                <span class="menu-title position-relative">
                                    Language

                                    <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">
                                        English <img class="w-15px h-15px rounded-1 ms-2" src="/manage/media/flags/united-states.svg" alt="" />
                                    </span>
                                </span>
                            </a>

                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                <div class="menu-item px-3">
                                    <a href="/metronic8/demo63/account/settings.html" class="menu-link d-flex px-5 active">
                                        <span class="symbol symbol-20px me-4">
                                            <img class="rounded-1" src="/manage/media/flags/united-states.svg" alt="" />
                                        </span>
                                        English
                                    </a>
                                </div>

                                <div class="menu-item px-3">
                                    <a href="/metronic8/demo63/account/settings.html" class="menu-link d-flex px-5">
                                        <span class="symbol symbol-20px me-4">
                                            <img class="rounded-1" src="/manage/media/flags/spain.svg" alt="" />
                                        </span>
                                        Spanish
                                    </a>
                                </div>

                                <div class="menu-item px-3">
                                    <a href="/metronic8/demo63/account/settings.html" class="menu-link d-flex px-5">
                                        <span class="symbol symbol-20px me-4">
                                            <img class="rounded-1" src="/manage/media/flags/germany.svg" alt="" />
                                        </span>
                                        German
                                    </a>
                                </div>

                                <div class="menu-item px-3">
                                    <a href="/metronic8/demo63/account/settings.html" class="menu-link d-flex px-5">
                                        <span class="symbol symbol-20px me-4">
                                            <img class="rounded-1" src="/manage/media/flags/japan.svg" alt="" />
                                        </span>
                                        Japanese
                                    </a>
                                </div>

                                <div class="menu-item px-3">
                                    <a href="/metronic8/demo63/account/settings.html" class="menu-link d-flex px-5">
                                        <span class="symbol symbol-20px me-4">
                                            <img class="rounded-1" src="/manage/media/flags/france.svg" alt="" />
                                        </span>
                                        French
                                    </a>
                                </div>
                            </div>
                        </div>
                        --}}

                        <div class="menu-item px-5 my-1">
                            <a href="#" class="menu-link px-5">
                                Hesap Bilgileri
                            </a>
                        </div>

                        <div class="menu-item px-5">
                            <a href="#" class="menu-link px-5">
                                Çıkış Yap
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $('.notification-item').on('click', function(e) {
                e.preventDefault();
                blockPage();
                var notificationId = $(this).data('id');

                $.ajax({
                    url: '{{ route('tenant.notifications.read') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: notificationId
                    },
                    success: function(response) {
                        console.log('Bildirim içeriği', response);
                        unblockPage();
                        if (response.code === 88) {
                            Notification('success', response.message, 4000, true, false);
                            setTimeout(function () {
                                location.reload();
                            }, 500);
                            return;
                        }
                        response.code === 1 || response.code === 88 ? Notification('success', response.message, 4000, true, false) : Notification('error', response.message, 4000, true, false);
                    },
                    error: function(response) {
                        unblockPage();
                        console.error('Bildirim okunamadı', response);
                        if (response.status === 403) {
                            Notification('error', "Bu işlem için yetkiniz bulunmamaktadır.", 4000, true, false);
                            return false;
                        }
                        if (response.responseJSON) {
                            if (response.responseJSON.msg) {
                                Notification('error', response.responseJSON.msg, 4000, true, false);
                            } else if (response.responseJSON.errors) {
                                var errors = response.responseJSON.errors;
                                $.each(errors, function(key, value) {
                                    Notification('error', value[0], 4000, true, false);
                                });
                            } else {
                                Notification('error', response.responseJSON.message, 4000, true, false);
                            }
                        } else {
                            Notification('error', "Bilinmeyen bir hata oluştu.", 4000, true, false);
                        }

                    }
                });
            });
        });
    </script>
@endpush
