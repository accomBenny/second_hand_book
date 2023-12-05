import { defineStore } from "pinia";
import axios from "axios";
export const userDataStore = defineStore("user", {
    state: () => {
        return {
            user: {
                account: "",
                email: "",
                id: "",
                password: "",
                password_check: "",
            },
        };
    },
    getters: {},
    actions: {
        async register() {
            const options = {
                method: "POST",
                headers: { "content-type": "multipart/form-data" },
                data: {
                    email :this.user.email,
                    account: this.user.account,
                    password: this.user.password,
                    password_check: this.user.password_check,
                },
                url: "http://localhost/second_hand_book/API/src/Controller/User/Register.php",
            };
            axios(options)
                .then((res) => {
                    console.log("yes");
                    // console.log(res);
                    return res.data;
                })
                .catch((error) => {
                    console.log(error);
                    this.clearData();
                });
        },
        async login() {
            const options = {
                method: "POST",
                headers: { "content-type": "multipart/form-data" },
                data: {
                    account: this.user.account,
                    password: this.user.password,
                },
                url: "http://localhost/second_hand_book/API/src/Controller/User/Login.php",
            };
            axios(options)
                .then((res) => {
                    console.log(res);
                    this.user.account = res.data.user.account;
                    this.user.email = res.data.user.email;
                    this.user.id = res.data.user.id;
                })
                .catch((error) => {
                    console.log(error);
                    this.clearData();
                });
        },
        async clearData() {
            this.$reset();
        },
    },
});