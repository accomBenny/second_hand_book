// import { defineStore } from "pinia";
// import axios from "axios";
// export const userDataStore = defineStore('user', {
//     state: () => {
//         return {
//             user: {
//                 account: '',
//                 email: '',
//                 password: ''
//             },
//         };
//     },
//     getters: {},
//     actions: {
//         async login() {
//             console.log("login success");
//             axios()
//             .then(() => {
//                 this.user.account = 123
//                 this.user.email = 123
//                 this.user.password = 123
//             }).catch((err) => {
//                 console.log('fail');
//                 this.clearData()
//             })
            
//         },
//         async clearData(){
//              this.$reset   
//             }
//     },
// });