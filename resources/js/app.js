import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import Vueform from '@vueform/vueform'
import VueformConfig from "@/../../vueform.config.js";
import {
    faFistRaised,
    faDice,
    faMale,
    faBrain,
    faBook,
    faBolt,
    faShieldAlt,
    faLightbulb,
    faPersonRunning,
    faHeart,
    faBookOpen,
    faDiceSix,
    faChevronLeft,
    faChevronRight,
    faMagnifyingGlass,
    faFilter,
    faXmark,
    faAddressCard,
    faChartSimple,
    faWandSparkles,
    faScroll,
    faCoins, faCheck, faFire, faCirclePlus, faCircleCheck,
    faCircleXmark as faCircleMark, faArrowLeft
} from '@fortawesome/free-solid-svg-icons'
import {faCircleXmark} from "@fortawesome/free-regular-svg-icons";

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

library.add(
    faFistRaised, faDice, faMale, faBrain, faBook, faBolt, faShieldAlt, faLightbulb, faPersonRunning, faHeart, faBookOpen,
    faDiceSix, faChevronLeft, faChevronRight, faMagnifyingGlass, faFilter, faXmark, faCircleXmark, faAddressCard, faChartSimple,
    faWandSparkles, faScroll, faCoins, faCheck, faFire, faCirclePlus, faCircleCheck, faCircleMark, faArrowLeft
)

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: false });
        return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        el.removeAttribute("data-page")
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(Vueform, VueformConfig)
            .component('font-awesome-icon', FontAwesomeIcon)
            .mount(el)
    },
    progress: {
        color: '#4B5563',
    },
});
