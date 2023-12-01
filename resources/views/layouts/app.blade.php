<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>@yield('title')</title>

        <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="Codebase">
        <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">
        <!-- END Icons -->

        <!-- Stylesheets -->

        <!-- Fonts and Codebase framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
        <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->

        <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
        <!-- Script untuk menyelesaikan tugas -->
        @yield('additional-scripts')
    </head>
    <body>

        <!-- Page Container -->
        <!--
            Available classes for #page-container:

        GENERIC

            'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

        SIDEBAR & SIDE OVERLAY

            'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
            'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
            'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
            'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
            'sidebar-inverse'                           Dark themed sidebar

            'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
            'side-overlay-o'                            Visible Side Overlay by default

            'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

            'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

        HEADER

            ''                                          Static Header if no class is added
            'page-header-fixed'                         Fixed Header

        HEADER STYLE

            ''                                          Classic Header style if no class is added
            'page-header-modern'                        Modern Header style
            'page-header-inverse'                       Dark themed Header (works only with classic Header style)
            'page-header-glass'                         Light themed Header with transparency by default
                                                        (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
            'page-header-glass page-header-inverse'     Dark themed Header with transparency by default
                                                        (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

        MAIN CONTENT LAYOUT

            ''                                          Full width Main Content if no class is added
            'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
            'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
        -->
        <div id="page-container" class="main-content-boxed">

            <!-- Main Container -->
            <main id="main-container">
                @yield('content')
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <!-- Terms Modal -->
        <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Terms &amp; Conditions</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <h1>Syarat dan Ketentuan Pendaftaran</h1>
                            <ol>
                                <li>
                                    <strong>Persetujuan Penggunaan:</strong>
                                    <p>Dengan mendaftar di platform ini, pengguna dianggap telah membaca, memahami, dan menyetujui sepenuhnya semua syarat dan ketentuan yang tercantum di sini.</p>
                                </li>
                                <li>
                                    <strong>Kewajiban Pengguna:</strong>
                                    <p>Pengguna bertanggung jawab atas informasi yang diberikan saat pendaftaran dan berkewajiban untuk menjaga kerahasiaan data login mereka. Pengguna juga harus memberikan informasi yang akurat dan terkini.</p>
                                </li>
                                <li>
                                    <strong>Penggunaan Data:</strong>
                                    <p>Data pribadi yang disediakan oleh pengguna akan diolah sesuai dengan kebijakan privasi yang berlaku. Pengguna menyetujui penggunaan data mereka untuk keperluan administratif dan komunikasi terkait layanan.</p>
                                </li>
                                <li>
                                    <strong>Ketidakbertanggungjawaban:</strong>
                                    <p>Kami tidak bertanggung jawab atas kehilangan, kerusakan, atau konsekuensi lainnya yang mungkin timbul akibat penggunaan platform ini. Pengguna bertanggung jawab sepenuhnya atas risiko yang terkait dengan penggunaan layanan ini.</p>
                                </li>
                                <li>
                                    <strong>Pembaruan dan Perubahan:</strong>
                                    <p>Syarat dan ketentuan ini dapat diubah atau diperbarui tanpa pemberitahuan sebelumnya. Pengguna diharapkan untuk secara berkala memeriksa halaman Syarat dan Ketentuan untuk mendapatkan informasi terkini.</p>
                                </li>
                                <li>
                                    <strong>Pengakhiran Akun:</strong>
                                    <p>Kami berhak untuk mengakhiri atau menonaktifkan akun pengguna jika terdapat pelanggaran terhadap syarat dan ketentuan ini atau jika kami memandang perlu tanpa pemberitahuan sebelumnya.</p>
                                </li>
                                <li>
                                    <strong>Hukum yang Berlaku:</strong>
                                    <p>Syarat dan ketentuan ini diatur oleh hukum yang berlaku di wilayah hukum tempat kami beroperasi. Setiap sengketa yang timbul akan diselesaikan melalui prosedur hukum yang berlaku.</p>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-alt-success" data-dismiss="modal">
                            <i class="fa fa-check"></i> Perfect
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Terms Modal -->


        <!--
            Codebase JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out assets/_js/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the assets/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            assets/js/core/jquery.min.js
            assets/js/core/bootstrap.bundle.min.js
            assets/js/core/simplebar.min.js
            assets/js/core/jquery-scrollLock.min.js
            assets/js/core/jquery.appear.min.js
            assets/js/core/jquery.countTo.min.js
            assets/js/core/js.cookie.min.js
        -->
        <script src="{{ asset('assets/js/codebase.core.min.js') }}"></script>

        <!--
            Codebase JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_js/main/app.js
        -->
        <script src="{{ asset('assets/js/codebase.app.min.js') }}"></script>

        <!-- Page JS Plugins -->
        <script src="{{ asset('assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

        <!-- Page JS SignUp Code -->
        <script src="{{ asset('assets/js/pages/op_auth_signup.min.js') }}"></script>

        <!-- Page JS Signin Code -->
        <script src="{{ asset('assets/js/pages/op_auth_signin.min.js') }}"></script>
    </body>
</html>
