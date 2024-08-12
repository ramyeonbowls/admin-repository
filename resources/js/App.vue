<template>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- <PerfectScrollbar> -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <SidePanel></SidePanel>
            </aside>
            <!-- </PerfectScrollbar> -->
            <div class="layout-page">
                <Navbar></Navbar>
                <div class="content-wrapper">
                    <div id="page-container">
                        <router-view></router-view>
                    </div>
                </div>
                <Footer></Footer>
                <div class="content-backdrop fade"></div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
</template>

<script>
import SidePanel from './layouts/SidePanel.vue'
import Navbar from './layouts/Navbar.vue'
import Footer from './layouts/Footer.vue'
import PerfectScrollbar from 'perfect-scrollbar'
import 'perfect-scrollbar/css/perfect-scrollbar.css'
import { Helpers } from './libs/js/helpers.js'
import { Menu } from './libs/js/menu.js'
import 'boxicons/css/boxicons.min.css'
import hljs from 'highlight.js'
import 'highlight.js/styles/default.css'

var menu, animate

export default {
    components: {
        SidePanel,
        Navbar,
        Footer,
        PerfectScrollbar,
    },

    data() {
        return {
            form: {
                data: '',
            },
        }
    },

    mounted() {
        // Initialize menu
        let layoutMenuEl = document.querySelectorAll('#layout-menu')
        layoutMenuEl.forEach(function (element) {
            menu = new Menu(element, {
                orientation: 'vertical',
                closeChildren: false,
            })
            // Change parameter to true if you want scroll animation
            window.Helpers.scrollToActive((animate = false))
            window.Helpers.mainMenu = menu
        })

        // Initialize menu togglers and bind click on each
        let menuToggler = document.querySelectorAll('.layout-menu-toggle')
        menuToggler.forEach((item) => {
            item.addEventListener('click', (event) => {
                event.preventDefault()
                window.Helpers.toggleCollapsed()
            })
        })

        // Display menu toggle (layout-menu-toggle) on hover with delay
        let delay = function (elem, callback) {
            let timeout = null
            elem.onmouseenter = function () {
                // Set timeout to be a timer which will invoke callback after 300ms (not for small screen)
                if (!Helpers.isSmallScreen()) {
                    timeout = setTimeout(callback, 300)
                } else {
                    timeout = setTimeout(callback, 0)
                }
            }

            elem.onmouseleave = function () {
                // Clear any timers set to timeout
                document.querySelector('.layout-menu-toggle').classList.remove('d-block')
                clearTimeout(timeout)
            }
        }
        if (document.getElementById('layout-menu')) {
            delay(document.getElementById('layout-menu'), function () {
                // not for small screen
                if (!Helpers.isSmallScreen()) {
                    document.querySelector('.layout-menu-toggle').classList.add('d-block')
                }
            })
        }

        // Display in main menu when menu scrolls
        let menuInnerContainer = document.getElementsByClassName('menu-inner'),
            menuInnerShadow = document.getElementsByClassName('menu-inner-shadow')[0]
        if (menuInnerContainer.length > 0 && menuInnerShadow) {
            menuInnerContainer[0].addEventListener('ps-scroll-y', function () {
                if (this.querySelector('.ps__thumb-y').offsetTop) {
                    menuInnerShadow.style.display = 'block'
                } else {
                    menuInnerShadow.style.display = 'none'
                }
            })
        }

        // Init helpers & misc
        // Init BS Tooltip
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        // Accordion active class
        const accordionActiveFunction = function (e) {
            if (e.type == 'show.bs.collapse' || e.type == 'show.bs.collapse') {
                e.target.closest('.accordion-item').classList.add('active')
            } else {
                e.target.closest('.accordion-item').classList.remove('active')
            }
        }

        const accordionTriggerList = [].slice.call(document.querySelectorAll('.accordion'))
        const accordionList = accordionTriggerList.map(function (accordionTriggerEl) {
            accordionTriggerEl.addEventListener('show.bs.collapse', accordionActiveFunction)
            accordionTriggerEl.addEventListener('hide.bs.collapse', accordionActiveFunction)
        })

        // Auto update layout based on screen size
        window.Helpers.setAutoUpdate(true)

        // Toggle Password Visibility
        window.Helpers.initPasswordToggle()

        // Speech To Text
        window.Helpers.initSpeechToText()

        // Manage menu expanded/collapsed with templateCustomizer & local storage
        // If current layout is horizontal OR current window screen is small (overlay menu) than return from here
        if (window.Helpers.isSmallScreen()) {
            return
        }

        // If current layout is vertical and current window screen is > small
        // Auto update menu collapsed/expanded based on the themeConfig
        window.Helpers.setCollapsed(true, false)

        const verticalExample = document.getElementById('vertical-example')
        const horizontalExample = document.getElementById('horizontal-example')
        const horizVertExample = document.getElementById('both-scrollbars-example')

        // Vertical Example
        if (verticalExample) {
            new PerfectScrollbar(verticalExample, {
                wheelPropagation: false,
            })
        }

        // Horizontal Example
        if (horizontalExample) {
            new PerfectScrollbar(horizontalExample, {
                wheelPropagation: false,
                suppressScrollY: true,
            })
        }

        // Both Vertical and Horizontal Example
        if (horizVertExample) {
            new PerfectScrollbar(horizVertExample, {
                wheelPropagation: false,
            })
        }
    },

    methods: {},

    computed: {},
}
</script>
