import UsersTableService from "../services/user_table.service";


export const userTable = {
    namespaced: true,
    state: {
        usersData: null
    },
    actions: {
        getAllUsers({ commit }) {
            return UsersTableService.getAllUsers.then(
                () => {
                    commit("dataSuccess");
                    return Promise.resolve();
                }
            )
        },
    },
    mutations: {
        dataSuccess(state, usersData) {
            state.usersData = usersData;
        },
    },
};
