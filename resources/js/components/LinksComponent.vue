<template>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Lead links</h4>
                    <p class="text-muted m-b-30 font-14">
                        Paste the url for the lead you would like to research
                        below.
                    </p>
                    <div>
                        <link-input
                            v-for="(link, i) in links"
                            :key="getUniqueKey(i)"
                            :index="i"
                            :link="link"
                            :all-links="links"
                        ></link-input>
                    </div>
                    <hr />
                    <a
                        href="#"
                        class="btn btn-primary"
                        @click.prevent="findData"
                        >Submit</a
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import LinkInput from "./LinkInput.vue";
import axios from "axios";

export default {
    props: ["user", "injLinks"],
    components: { LinkInput },

    data() {
        return {
            links: JSON.parse(this.injLinks.research_sheet)
        };
    },

    methods: {
        //     submittedLink(value, currentLinkIndex) {
        //         let index = parseInt(currentLinkIndex);
        //         if (this.links.length <= index + 1) {
        //             if (value === null) {
        //                 console.log(
        //                     "Value is null, you should enter a link: error"
        //                 );
        //                 return;
        //             } else {
        //                 this.links.unshift(value);
        //                 this.findData(value);
        //             }
        //         } else {
        //             if (value === null) {
        //                 this.links.splice(index, 1);
        //             } else {
        //                 if (this.links[index] !== value) {
        //                     this.links[index] = value;
        //                     this.findData(value);
        //                 }
        //             }
        //         }
        //     },

        //     findData(value) {
        //         let link = { value };
        //         console.log(value);
        //         const vm = this;
        //         axios
        //             .post("/find-data", link)
        //             .then(response => {
        //                 console.log(response.data.prospect);
        //             })
        //             .catch(err => {
        //                 console.log(err);
        //             });
        //     },
        // addNewToList(value) {
        //     this.links.push(value);
        // },
        // TO GET UNIQUE Key
        getUniqueKey(index) {
            return index + "_" + Date.now();
        }
    }
};
</script>
