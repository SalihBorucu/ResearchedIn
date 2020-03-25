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
                            :key="i"
                            :index="i"
                            :link="link"
                            @submittedLink="submittedLink"
                        ></link-input>
                    </div>
                    <hr />
                    <a href="#" class="btn btn-primary">Submit</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import LinkInput from "./LinkInput.vue";

export default {
    components: { LinkInput },

    data() {
        return {
            links: [null]
        };
    },

    methods: {
        submittedLink(value, currentLinkIndex) {
            if (this.links.length <= parseInt(currentLinkIndex) + 1)
                this.links.unshift(value);
        }
    }
};
</script>
