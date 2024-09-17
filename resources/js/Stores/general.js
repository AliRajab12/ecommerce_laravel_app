import { defineStore } from 'pinia';

export const useGeneralStore = defineStore("general",{
    state: () =>({ canLogin: false, canRegister: false}),
    getters:{
    },
    actions: {
        setCanLogin(value){
            this.canLogin = value;
        },
        setCanRegister(value){
            this.canRegister = value;
        }
    }
});

