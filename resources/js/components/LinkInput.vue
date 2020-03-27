<template>
    <div class="form-group row">
        <label for="example-url-input" class="col-sm-2 col-form-label"
            >URL</label
        >
        <div class="col-sm-10">
            <input
                class="form-control"
                type="url"
                :value="link"
                id="example-url-input"
                @blur="addNewLink"
                ref="email"
                @keypress.enter="addNewLink"
            />
        </div>
    </div>
</template>

<script>
export default {
    props: ["link", "index"],

    mounted() {
        this.$refs.email.focus();
    },

    methods: {
        addNewLink(e) {
            var pattern = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
            var value = e.target.value;
            var currentLinkIndex = this.index;
            // console.log(value);
            if (!value) {
                value = null;
                this.$emit("submittedLink", value, currentLinkIndex);
                return;
            }

            if (pattern.test(value)) {
                this.$emit("submittedLink", value, currentLinkIndex);
            } else {
                console.log("that is not a URL buddy.");
            }
        }
    }
};
</script>
