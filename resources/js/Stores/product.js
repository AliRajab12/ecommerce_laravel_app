import { defineStore } from 'pinia';
import axios from 'axios';

export const useProductStore = defineStore("products",{
    state: () =>({ products: []}),
    getters:{
        // products: (state) => state.products,
    },
    actions: {
        async loadProducts(){
            await axios.get("/fetchProducts").then(response => this.products = response.data.products).catch(error => console.log(error));
        }

    }
});
