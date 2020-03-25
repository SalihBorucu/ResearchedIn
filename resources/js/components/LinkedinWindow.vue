<template>
    <div class="row">
        <div class="col">
            <div class="card m-b-30">
                <h5 class="card-header mt-0">Linkedin Details</h5>
                <div class="card-body" v-if="!user.linkedin_email">
                    <div class="form-group row">
                        <label
                            for="example-email-input"
                            class="col-sm-2 col-form-label"
                            >Email</label
                        >
                        <div class="col-sm-10">
                            <input
                                class="form-control"
                                type="email"
                                id="example-email-input"
                                v-model="linkedinEmail"
                                placeholder="example@example.com"
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            for="example-password-input"
                            class="col-sm-2 col-form-label"
                            >Password</label
                        >
                        <div class="col-sm-10">
                            <input
                                class="form-control"
                                type="password"
                                id="example-password-input"
                                v-model="linkedinPassword"
                                placeholder="password"
                            />
                        </div>
                    </div>
                    <a
                        href="#"
                        @click.prevent="sendLoginDetails"
                        class="btn btn-primary"
                        >Login to account</a
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["user"],

    data() {
        return {
            linkedinEmail: null,
            linkedinPassword: null
        };
    },

    methods: {
        sendLoginDetails() {
            let obj = {
                linkedinEmail: this.linkedinEmail,
                linkedinPassword: this.linkedinPassword
            };
            console.log(obj);

            const vm = this;

            // axios
            //     .post("/ajax/INSERT_LINK", obj)
            //     .then(response => {})
            //     .catch(err => {
            //         console.log(err);
            //     });
        }
    }
};
</script>
