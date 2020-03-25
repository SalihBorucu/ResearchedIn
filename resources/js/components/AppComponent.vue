<template>
    <div class="container">
        <linkedin-window :user="user"></linkedin-window>
        <links-component></links-component>
    </div>
</template>

<script>
import LinkedinWindow from "./LinkedinWindow.vue";
import LinksComponent from "./LinksComponent.vue";
export default {
    props: ["user"],

    components: { LinkedinWindow, LinksComponent },

    mounted() {
        console.log("Component mounted.");
    }
};
</script>
