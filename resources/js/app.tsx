import React from "react";
import { createRoot } from "react-dom/client";
import { createInertiaApp } from "@inertiajs/react";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { InertiaProgress } from "@inertiajs/progress";
import "react-toastify/dist/ReactToastify.css";
import "../assets/js/bootstrap.bundle.min.js";
import "../assets/js/jquery-3.6.0.min.js";
import "../assets/js/apexcharts.min.js";
import "../assets/js/metisMenu.min.js";
import "../assets/js/meanmenu.min.js";
import "../assets/js/swiper-bundle.min.js";
import "../assets/js/slick.min.js";
import "../assets/js/magnific-popup.min.js";
import "../assets/js/main.js";
import "../sass/app.scss";

createInertiaApp({
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.tsx`,
            import.meta.glob("./Pages/**/*.tsx")
        ),
    setup({ el, App, props }) {
        createRoot(el).render(<App {...props} />);
    },
});
InertiaProgress.init({ color: "#d96354" });
