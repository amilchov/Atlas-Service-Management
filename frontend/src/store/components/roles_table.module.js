import RolesService from "@/services/roles.service";


export const rolesTable = {
    namespaced: true,
    state: {
        rolesData: null,
    },
    actions: {
        getAllRoles({ commit }) {
            return RolesService.getAllRoles().then(
                (response) => {
                    commit("dataSuccess", response);
                    return Promise.resolve(response);
                }
            )
        },

    },
    mutations: {
        dataSuccess(state, rolesData) {
            state.rolesData = rolesData;
        },
    },
};
