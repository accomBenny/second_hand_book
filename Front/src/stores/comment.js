import { defineStore } from "pinia";
import axios from "axios";
import { useToastStore } from "@/stores/alterToast";

export const useCommentStore = defineStore("commentData", {
    state: () => {
        return {
            willAdd: {
                content: "",
                title: "",
            },
            comments: [],
            search: {
                first_time: "",
                last_time: "",
                search_content: "",
            },
        };
    },
    getters: {},
    actions: {
        async createComment() {
            const options = {
                method: "POST",
                headers: { "content-type": "multipart/form-data" },
                withCredentials: true,
                data: {
                    title: this.willAdd.title,
                    content: this.willAdd.content,
                },
                url: "http://localhost/2023_11_VueJS-PHP/board-api/src/Controller/Comment/CreateComment.php",
            };
            axios(options)
                .then((res) => {
                    console.log("create ok");
                    console.log(res);
                    this.comments = [];
                    this.getItems();
                    this.willAdd.title = "";
                    this.willAdd.content = "";
                    let toast = useToastStore();
                    toast.setToast(res.data);
                })
                .catch((error) => {
                    console.log("create error");
                    console.log(error);
                });
        },
    },
});
