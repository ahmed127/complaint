<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="" />
    <title>@lang('lang.sign_in') | {{ env('APP_NAME') }}</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ \App\Models\Setting::first()->fav_icon_original_path }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{asset('admin_assets')}}/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets')}}/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
    </script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <!--begin::Form-->
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10">
                        <div>
                            <div class="login-signins">

                                <div class="mb-20">
                                    <h3>
                                        @lang('lang.welcome_to', ['app_name' => env('APP_NAME')])
                                    </h3>
                                    <div class="text-muted font-weight-bold">
                                        @lang('lang.enter_your_details_to_login')
                                    </div>
                                </div>



                                <form class="forms" action="{{ route('adminPanel.authenticate') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-5">
                                        <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                                            placeholder="{{ __('admins.email') }}" name="email"/>
                                        @error('email') <b class="text-danger">{{ $message }}</b> @enderror
                                    </div>
                                    <div class="form-group mb-5">
                                        <input class="form-control h-auto form-control-solid py-4 px-8" type="password"
                                            placeholder="{{ __('admins.password') }}" name="password" />
                                        @error('password') <b class="text-danger">{{ $message }}</b> @enderror
                                    </div>
                                    <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="login_remember" id="flexCheckDefault" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                @lang('lang.remember_me')
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">
                                        @lang('lang.sign_in')
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Form-->
                <!--begin::Footer-->
                <div class="w-lg-500px d-flex flex-stack px-10 mx-auto">
                    <!--begin::Languages-->
                    {{-- @livewire('update-locale') --}}
                    <!--end::Languages-->
                    <!--begin::Links-->
                    <div class="d-flex fw-semibold text-primary fs-base gap-5">
                        <a href="../../demo23/dist/pages/team.html" target="_blank">Terms</a>
                        <a href="../../demo23/dist/pages/pricing/column.html" target="_blank">Plans</a>
                        <a href="../../demo23/dist/pages/contact.html" target="_blank">Contact Us</a>
                    </div>
                    <!--end::Links-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "{{asset('admin_assets')}}/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{asset('admin_assets')}}/plugins/global/plugins.bundle.js"></script>
    <script src="{{asset('admin_assets')}}/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{asset('admin_assets')}}/js/custom/authentication/sign-in/general.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
