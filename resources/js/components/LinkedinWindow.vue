<template>
    <div class="row">
        <div class="col">
            <div class="card m-b-30">
                <h5 class="card-header mt-0">Linkedin Details</h5>
                <div class="card-body" v-if="!signedIn">
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
                <div class="card-body" v-else>
                    <p>Logged in to linkedin as {{ linkedinEmail }}</p>
                    <a
                        href="#"
                        @click.prevent="deleteLoginDetails"
                        class="btn btn-secondary"
                        >Logout from this account</a
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    props: ["user"],

    data() {
        return {
            linkedinEmail: this.user.linkedin_email,
            linkedinPassword: this.user.linkedin_password,
            signedIn: true
        };
    },

    mounted() {
        if (this.user.linkedin_email != null) {
            this.signedIn = true;
        } else {
            this.signedIn = false;
        }
    },

    methods: {
        sendLoginDetails() {
            let obj = {
                linkedinEmail: this.linkedinEmail,
                linkedinPassword: this.linkedinPassword
            };

            const vm = this;
            if (this.linkedinEmail != null) {
                axios
                    .post("/store", obj)
                    .then(response => {
                        vm.signedIn = true;
                    })
                    .catch(err => {
                        console.log(err);
                    });
            } else {
                console.log("cant be empty");
            }
        },

        deleteLoginDetails() {
            const vm = this;

            axios
                .post("/delete")
                .then(response => {
                    vm.signedIn = false;
                })
                .catch(err => {
                    console.log(err);
                });
        }
    }
};
</script>
