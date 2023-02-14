<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />

    {{-- Title Section --}}
    <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>

    {{-- Meta Data --}}
    <meta name="description" content="@yield('page_description', $page_description ?? '')" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    {{-- Toaster RAZAAAAAAN --}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <link rel="stylesheet" href="{{ asset('css/pages/login/login-1.css') }}">
    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />

    {{-- Fonts --}}
    {{ Metronic::getGoogleFontsInclude() }}

    {{-- Global Theme Styles (used by all pages) --}}
    @foreach(config('layout.resources.css') as $style)
    <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}" rel="stylesheet"
        type="text/css" />
    @endforeach

    {{-- Layout Themes (used by all pages) --}}
    @foreach (Metronic::initThemes() as $theme)
    <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($theme)) : asset($theme) }}" rel="stylesheet"
        type="text/css" />
    @endforeach

    {{-- Includable CSS --}}
    @yield('styles')
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white"
            id="kt_login">
            <!--begin::Aside-->
            <div class="login-aside d-flex flex-row-auto bgi-size-cover bgi-no-repeat p-10 p-lg-10"
                style="background-image: url({{ asset('media/bg/bg-4.jpg') }});">
                <!--begin: Aside Container-->
                <div class="d-flex flex-row-fluid flex-column justify-content-between">
                    <!--begin: Aside header-->
                    <a href="#" class="flex-column-auto mt-5 pb-lg-0 pb-10">
                        <img src="/metronic/theme/html/demo1/dist/assets/media/logos/logo-letter-1.png"
                            class="max-h-70px" alt="" />
                    </a>
                    <!--end: Aside header-->

                    <!--begin: Aside content-->
                    <div class="flex-column-fluid d-flex flex-column justify-content-center">
                        <h3 class="font-size-h1 mb-5 text-white">Welcome to Metronic!</h3>
                        <p class="font-weight-lighter text-white opacity-80">
                            The ultimate Bootstrap, Angular 8, React & VueJS admin theme framework for next generation
                            web apps.
                        </p>
                    </div>
                    <!--end: Aside content-->

                    <!--begin: Aside footer for desktop-->
                    <div class="d-none flex-column-auto d-lg-flex justify-content-between mt-10">
                        <div class="opacity-70 font-weight-bold	text-white">
                            &copy; 2023 Metronic
                        </div>
                        <div class="d-flex">
                            <a href="#" class="text-white">Privacy</a>
                            <a href="#" class="text-white ml-10">Legal</a>
                            <a href="#" class="text-white ml-10">Contact</a>
                        </div>
                    </div>
                    <!--end: Aside footer for desktop-->
                </div>
                <!--end: Aside Container-->
            </div>
            <!--begin::Aside-->

            <!--begin::Content-->
            <div class="d-flex flex-column flex-row-fluid position-relative p-7 overflow-hidden">
                <!--begin::Content header-->
                <div
                    class="position-absolute top-0 right-0 text-right mt-5 mb-15 mb-lg-0 flex-column-auto justify-content-center py-5 px-10">
                    <span class="font-weight-bold text-dark-50">Dont have an account yet?</span>
                    <a href="{{ route('register') }}" class="font-weight-bold ml-2" id="kt_login_signup">Sign Up!</a>
                </div>
                <!--end::Content header-->

                <!--begin::Content body-->
                <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
                    <!--begin::Signin-->
                    <div class="login-form login-signin">
                        <div class="text-center mb-10 mb-lg-20">
                            <h3 class="font-size-h1">Sign In</h3>
                            <p class="text-muted font-weight-bold">Enter your username and password</p>
                        </div>


                        <!-- Session Status -->
      <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
    <form method="POST" action="{{ route('register') }}">
        @csrf
    
        <!-- Name -->
        <div class="form-group">
            <x-label for="name" :value="__('Name')" />
    
            <x-input id="name" class="block mt-1 w-full form-control form-control-solid h-auto py-5 px-6" type="text" name="name" :value="old('name')" required autofocus />
        </div>
    
        <!-- Email Address -->
        <div class="form-group mt-4">
            <x-label for="email" :value="__('Email')" />
    
            <x-input id="email" class="block mt-1 w-full form-control form-control-solid h-auto py-5 px-6" type="email" name="email" :value="old('email')" required />
        </div>
    
        <!-- Password -->
        <div class="form-group mt-4">
            <x-label for="password" :value="__('Password')" />
    
            <x-input id="password" class="block mt-1 w-full form-control form-control-solid h-auto py-5 px-6" type="password" name="password" required
                autocomplete="new-password" />
        </div>
    
        <!-- Confirm Password -->
        <div class="mt-4 form-group">
            <x-label for="password_confirmation" :value="__('Confirm Password')" />
    
            <x-input id="password_confirmation" class="block mt-1 w-full form-control form-control-solid h-auto py-5 px-6" type="password" name="password_confirmation"
                required />
        </div>
    
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <div class="form-group d-flex flex-wrap flex-center">

                <x-button class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-4 ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </div>
    </form>

            
                    </div>
                    <!--end::Signin-->

              

                    <!--begin::Forgot-->
                    <div class="login-form login-forgot">
                        <div class="text-center mb-10 mb-lg-20">
                            <h3 class="font-size-h1">Forgotten Password ?</h3>
                            <p class="text-muted font-weight-bold">Enter your email to reset your password</p>
                        </div>




                        <!--begin::Form-->
                        {{-- <form class="form" novalidate="novalidate" id="kt_login_forgot_form">
                            <div class="form-group">
                                <input class="form-control form-control-solid h-auto py-5 px-6" type="email"
                                    placeholder="Email" name="email" autocomplete="off" />
                            </div>
                            <div class="form-group d-flex flex-wrap flex-center">
                                <button type="button" id="kt_login_forgot_submit"
                                    class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Submit</button>
                                <button type="button" id="kt_login_forgot_cancel"
                                    class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-4">Cancel</button>
                            </div>
                        </form> --}}
                        <!--end::Form-->
                    </div>
                    <!--end::Forgot-->
                </div>
                <!--end::Content body-->

                <!--begin::Content footer for mobile-->
                <div
                    class="d-flex d-lg-none flex-column-auto flex-column flex-sm-row justify-content-between align-items-center mt-5 p-5">
                    <div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">
                        &copy; 2023 Metronic
                    </div>
                    <div class="d-flex order-1 order-sm-2 my-2">
                        <a href="#" class="text-dark-75 text-hover-primary">Privacy</a>
                        <a href="#" class="text-dark-75 text-hover-primary ml-4">Legal</a>
                        <a href="#" class="text-dark-75 text-hover-primary ml-4">Contact</a>
                    </div>
                </div>
                <!--end::Content footer for mobile-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->


    <script>
        var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};
    </script>

    {{-- Global Theme JS Bundle (used by all pages) --}}
    @foreach(config('layout.resources.js') as $script)
    <script src="{{ asset($script) }}" type="text/javascript"></script>
    @endforeach
    <script src="{{ asset('js/pages/custom/login/login-general.js') }}"></script>

    {{-- Includable JS --}}
    @yield('scripts')
    <!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>
