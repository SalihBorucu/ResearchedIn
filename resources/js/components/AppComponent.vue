<template>
    <div class="container">
        <linkedin-window :user="user"></linkedin-window>
        <links-component :user="user" :injLinks="links"></links-component>
    </div>
</template>

<script>
import LinkedinWindow from "./LinkedinWindow.vue";
import LinksComponent from "./LinksComponent.vue";
export default {
    props: ["user", "links"],

    components: { LinkedinWindow, LinksComponent },

    mounted() {
        console.log("Component mounted.");
    }
};
</script>
