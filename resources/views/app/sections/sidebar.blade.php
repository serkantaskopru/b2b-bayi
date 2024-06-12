<div id="kt_app_sidebar" class="app-sidebar "
     data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
     data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start"
     data-kt-drawer-toggle="#kt_app_sidebar_toggle"
>
    <div class="d-none d-lg-flex flex-center px-6 pt-10 pb-10" id="kt_app_sidebar_header">
        <a href="/metronic8/demo63/index.html">
            <img alt="Logo" src="/manage/media/logos/demo63-dark.svg" class="h-25px"/>
        </a>
    </div>
    <div class="flex-grow-1">
        <div
            id="kt_app_sidebar_menu_wrapper"
            class="hover-scroll-y"
            data-kt-scroll="false"
            data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_header, #kt_app_sidebar_footer"
            data-kt-scroll-offset="20px"
        >
            <div class="app-sidebar-navs-default px-5 mb-10">
                <div id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false"
                     class="menu menu-column menu-rounded menu-sub-indention">
                    <div class="menu-item pb-0 pt-0">
                        <div class="menu-content">
                            <span class="menu-heading">Yönetim</span>
                        </div>
                    </div>
                    <div class="separator mb-4 mx-4">
                    </div>
                    <div class="menu-item {{ Request::routeIs('tenant.dashboard') ? 'here show' : '' }}">
                        <a class="menu-link  {{ Request::routeIs('tenant.dashboard') ? 'active' : '' }}"
                           href="{{route('tenant.dashboard')}}">
								<span
                                    class="menu-bullet">
									<span class="bullet bullet-dot">
									</span>
								</span>
                            <span
                                class="menu-title">Anasayfa</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link"
                           href="#">
								<span
                                    class="menu-bullet">
									<span class="bullet bullet-dot">
									</span>
								</span>
                            <span
                                class="menu-title">Sipariş Oluştur</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link"
                           href="#">
								<span
                                    class="menu-bullet">
									<span class="bullet bullet-dot">
									</span>
								</span>
                            <span
                                class="menu-title">Ürünler</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link"
                           href="#">
								<span
                                    class="menu-bullet">
									<span class="bullet bullet-dot">
									</span>
								</span>
                            <span
                                class="menu-title">Ürün Kategorileri</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link"
                           href="#">
								<span
                                    class="menu-bullet">
									<span class="bullet bullet-dot">
									</span>
								</span>
                            <span
                                class="menu-title">Kuponlar</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link"
                           href="#">
								<span
                                    class="menu-bullet">
									<span class="bullet bullet-dot">
									</span>
								</span>
                            <span
                                class="menu-title">Bayi Listesi</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link"
                           href="#">
								<span
                                    class="menu-bullet">
									<span class="bullet bullet-dot">
									</span>
								</span>
                            <span
                                class="menu-title">Bayi Başvuruları</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link"
                           href="#">
								<span
                                    class="menu-bullet">
									<span class="bullet bullet-dot">
									</span>
								</span>
                            <span
                                class="menu-title">Bayi Grupları</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link"
                           href="#">
								<span
                                    class="menu-bullet">
									<span class="bullet bullet-dot">
									</span>
								</span>
                            <span
                                class="menu-title">Personeller</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link"
                           href="#">
								<span
                                    class="menu-bullet">
									<span class="bullet bullet-dot">
									</span>
								</span>
                            <span
                                class="menu-title">Ayarlar</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link"
                           href="#">
								<span
                                    class="menu-bullet">
									<span class="bullet bullet-dot">
									</span>
								</span>
                            <span
                                class="menu-title">Yetki Yönetimi</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link"
                           href="#">
								<span
                                    class="menu-bullet">
									<span class="bullet bullet-dot">
									</span>
								</span>
                            <span
                                class="menu-title">Cari İşlemler</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-flex flex-stack px-10 px-lg-15 pb-8" id="kt_app_sidebar_footer">
	<span class="d-flex flex-center gap-1 text-white theme-light-show fs-5 px-0">
		<i class="ki-outline ki-night-day text-gray-500 fs-2">
		</i> Dark Mode
    </span>
    <span class="d-flex flex-center gap-1 text-white theme-dark-show fs-5 px-0">
			<i class="ki-outline ki-moon text-gray-500 fs-2">
			</i> Light Mode
    </span>
    <div data-bs-theme="dark">
        <div class="form-check form-switch form-check-custom form-check-solid">
            <input class="form-check-input h-25px w-45px" type="checkbox" value="1"
                   id="kt_sidebar_theme_mode_toggle"/>
        </div>
    </div>
</div>
