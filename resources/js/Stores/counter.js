// import { defineStore } from 'pinia';
// // Syntax 1
// export const useProductStore = defineStore("products",{
//     state: () =>({ count: 0, name: "Ali"}),
//     getters:{
//         doubleCount: (state) => state.count * 2
//     },
//     actions: {
//         increase(){
//             this.count++;
//         }
//     }
// });
//     // Syntax 2 like vue composition API
// export const useCategoryStore = defineStore("categories",()=>{
//     // state variables
//     const count = ref(0);
//     const name = ref("Ali");

//     const doubleCount = computed(()=> count.value * 2);
//     function increase(){
//         count.value++;
//     }
//     return {count, name, doubleCount, increase}

// });
