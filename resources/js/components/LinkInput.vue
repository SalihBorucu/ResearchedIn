<template>
    <div class="form-group row">
        <label for="example-url-input" class="col-sm-2 col-form-label"
            >URL</label
        >
        <div class="col-sm-10">
            <div class="something" :class="linkState">
                <input
                    class="form-control"
                    type="url"
                    :value="link"
                    id="example-url-input"
                    @blur="addNewLink"
                    ref="link"
                    @keypress.enter="addNewLink"
                />
            </div>
        </div>
        <!-- <button @click="changeColors">AUSHD</button> -->
    </div>
</template>

<script>
import axios from "axios";
export default {
    props: ["link", "index", "allLinks"],

    mounted() {
        this.$refs.link.focus();
        console.log("mounted");
    },

    data() {
        return {
            links: this.allLinks,
            linkState: null
        };
    },

    watch: {
        links: function() {
            let links = { links: this.links };
            const vm = this;
            axios
                .post("/store-links", links)
                .then(response => {
                    vm.signedIn = true;
                })
                .catch(err => {
                    console.log(err, "couldn't store the data");
                });
        }
    },

    methods: {
        // changeColors() {
        //     this.linkState = "has-danger";
        // },
        addNewLink(e) {
            var pattern = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
            var value = e.target.value;
            if (!value) {
                value = null;
                this.submittedLink(value);
                return;
            }

            if (pattern.test(value)) {
                this.submittedLink(value);
            } else {
                console.log("that is not a URL buddy.");
            }
        },

        submittedLink(value) {
            // let index = parseInt();
            if (this.links.length <= this.index + 1) {
                if (value === null) {
                    console.log(
                        "Value is null, you should enter a link: error"
                    );
                    return;
                } else {
                    // this.$emit("addNewToList", value);
                    this.links.unshift(value);
                    this.findData(value);
                }
            } else {
                if (value === null) {
                    this.links.splice(this.index, 1);
                } else {
                    if (this.links[this.index] !== value) {
                        this.links[this.index] = value;
                        this.findData(value);
                    }
                }
            }
        },

        findData(value) {
            let link = { value };
            this.linkState = "has-danger";
            console.log(this.linkState);
            const vm = this;

            axios
                .post("/find-data", link)
                .then(response => {
                    vm.linkState = "has-success";
                    console.log(response.data.prospect);
                })
                .catch(err => {
                    vm.linkState = "has-danger";
                    console.log(err);
                });
        }
    }
};
</script>
