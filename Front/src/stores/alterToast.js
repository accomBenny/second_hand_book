import { defineStore } from "pinia";
import { Toast } from "bootstrap/dist/js/bootstrap.esm.min.js";

export const useToastStore = defineStore("toastData", {
    state: () => {
        return {
            toastData: {
                event: "",
                status: "",
                content: "",
            },
        };
    },
    getters: {},
    actions: {
        async alter() {
            var toastLiveExample = document.getElementById("liveToast");
            var toast = new Toast(toastLiveExample);
            toast.show();
        },
        setToast(data) {
            console.log("alterToast");
            console.log(data);
            this.toastData = data;
            this.alter();
        },
    },
});
