<template>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <SidePanel></SidePanel>
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

export default {
    components: {
        SidePanel,
        Navbar,
        Footer,
    },

    data() {
        return {
            form: {
                data: '',
            },
        }
    },

    mounted() {},

    methods: {},

    computed: {},
}
</script>
