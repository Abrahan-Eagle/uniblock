const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */


// Front
mix.styles(
    [   "node_modules/@uniblock/css/bootstrap.min.css",
        "node_modules/@uniblock/css/slick.css",
        "node_modules/@uniblock/css/style.css",
    ],
    "public/css/app_f.css")

    .scripts([

        <!-- JS here -->
        "node_modules/@uniblock/js/vendor/modernizr-3.5.0.min.js",
        <!-- Jquery, Popper, Bootstrap -->
        "node_modules/@uniblock/js/vendor/jquery-1.12.4.min.js",
        "node_modules/@uniblock/js/popper.min.js",
        "node_modules/@uniblock/js/bootstrap.min.js",
        <!-- Jquery Mobile Menu -->
        "node_modules/@uniblock/js/jquery.slicknav.min.js",
        <!-- Jquery Slick , Owl-Carousel Plugins -->
        "node_modules/@uniblock/js/owl.carousel.min.js",
        "node_modules/@uniblock/js/slick.min.js",
        <!-- One Page, Animated-HeadLin -->
        "node_modules/@uniblock/js/wow.min.js",
        "node_modules/@uniblock/js/animated.headline.js",
        "node_modules/@uniblock/js/jquery.magnific-popup.js",
        <!-- Date Picker -->
        "node_modules/@uniblock/js/gijgo.min.js",
        <!-- Nice-select, sticky -->
        "node_modules/@uniblock/js/jquery.nice-select.min.js",
        "node_modules/@uniblock/js/jquery.sticky.js",

        <!-- counter , waypoint -->
        "node_modules/@uniblock/js/jquery.counterup.min.js",
        "node_modules/@uniblock/js/waypoints.min.js",
        "node_modules/@uniblock/js/jquery.countdown.min.js",
        <!-- contact js -->
        "node_modules/@uniblock/js/contact.js",
        "node_modules/@uniblock/js/jquery.form.js",
        "node_modules/@uniblock/js/jquery.validate.min.js",
        "node_modules/@uniblock/js/mail-script.js",
        "node_modules/@uniblock/js/jquery.ajaxchimp.min.js",
        <!-- Jquery Plugins, main Jquery -->
        "node_modules/@uniblock/js/plugins.js",
        "node_modules/@uniblock/js/main.js",

    ], "public/js/app_f.js");

mix.copy(
    "node_modules/@uniblock/img/",
    "public/uniblock/img"
);
mix.copy(
    "node_modules/@uniblock/fonts",
    "public/uniblock/fonts"
);

mix.copy(
    "node_modules/@uniblock/css/fontawesome-all.min.css",
    "public/uniblock/css"
);

mix.copy(
    "node_modules/@uniblock/css",
    "public/uniblock/css"
);
