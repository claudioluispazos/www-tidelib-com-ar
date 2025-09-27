import { defineStore } from "pinia";
import GenderServiceApi from "../services/genderServices";

const useGenderStore = defineStore("gender", {
    state: () => ({
        genderList: [],
        genderData: {
            status: "",
            message: "",
            data: {
                items: [],
                pagination: {
                    total: "",
                    perPage: "",
                    currentPage: "",
                    lastPage: "",
                },
            },
        },
        genderCache: {},
        loadingStatus: false
    }),

    getters: {
        getIsLoadingStatus: (state) => state.loadingStatus,
        getGenders: (state) => state.genderList,
        getSelectedGender: (state) => state.genderData,
        getSelectedGenderCache: (state) => state.genderCache
    },

    actions: {
        async fetchAllGender() {
            this.setIsLoadingStatus(true);
            try {
                const genderService = new GenderServiceApi();
                const data = await genderService.allGender();
                this.genderList = data;
            } catch (error) {
                console.error("Error al obtener libros:", error);
            } finally {
                this.setIsLoadingStatus(false);
            }
        },
        setSelectedGender(gender) {
            this.genderData = gender;
        },
        setIsLoadingStatus(value) {
            this.loadingStatus = value;
        },
    }
});

export default useGenderStore;