import { defineStore } from 'pinia';
import axios from 'axios';

export const useCategoryStore = defineStore("categories",{
    state: () =>({ categories: [], name: "Ali"}),
    getters:{
    },
    actions: {
       async loadCategories(){
            await axios.get("/categories").then(response => this.categories = response.data.categories).catch(error => console.log(error));
       }
    }
});
