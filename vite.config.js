import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

{
    /* <script src="resources/assets/js/js/jquery-3.6.0.min.js"></script>
    <script src="resources/assets/js/js/bootstrap.bundle.min.js"></script>
    <script src="resources/assets/js/js/apexcharts.min.js"></script>
    <script src="resources/assets/js/js/metisMenu.min.js"></script>
    <script src="resources/assets/js/js/meanmenu.min.js"></script>
    <script src="resources/assets/js/js/swiper-bundle.min.js"></script>
    <script src="resources/assets/js/js/slick.min.js"></script>
    <script src="resources/assets/js/js/magnific-popup.min.js"></script>
    <script src="resources/assets/js/js/backtotop.js"></script>
    <script src="resources/assets/js/js/wow.min.js"></script>
    <script src="resources/assets/js/js/smooth-scrollbar.js"></script>
    <script src="resources/assets/js/js/main.js"></script>  */
}

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/js/app.tsx",
                "resources/assets/js/jquery-3.6.0.min.js",
                "resources/assets/js/bootstrap.bundle.min.js",
                "resources/assets/js/apexcharts.min.js",
                "resources/assets/js/metisMenu.min.js",
                "resources/assets/js/meanmenu.min.js",
                "resources/assets/js/swiper-bundle.min.js",
                "resources/assets/js/slick.min.js",
                "resources/assets/js/magnific-popup.min.js",
                "resources/assets/js/backtotop.js",
                "resources/assets/js/wow.min.js",
                "resources/assets/js/smooth-scrollbar.js",
                "resources/assets/js/main.js",
            ],
            refresh: true,
        }),
    ],
});
