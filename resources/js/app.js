/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

import { dom, library } from "@fortawesome/fontawesome-svg-core";
import {
    faUser,
    faTshirt,
    faUserPlus,
    faSignOutAlt,
    faChartLine,
    faCartPlus,
    faTrash,
    faArrowLeft,
    faSync,
    faShoppingCart,
    faBars,
    faThList,
    faCog,
    faClipboardList,
    faUsers,
    faPlus,
    faPencilAlt,
    faEye
} from "@fortawesome/free-solid-svg-icons";
import { faGithub } from "@fortawesome/free-brands-svg-icons";
library.add(
    faUser,
    faTshirt,
    faUserPlus,
    faSignOutAlt,
    faChartLine,
    faCartPlus,
    faGithub,
    faTrash,
    faArrowLeft,
    faSync,
    faShoppingCart,
    faBars,
    faThList,
    faCog,
    faClipboardList,
    faUsers,
    faPlus,
    faPencilAlt,
    faEye
);
dom.watch();

//Dashboard sidebar toggle
$(document).ready(function() {
    $("#sidebarCollapse").on("click", function() {
        $("#sidebar").toggleClass("active");
    });
});
