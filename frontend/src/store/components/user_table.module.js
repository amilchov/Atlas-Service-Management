import UsersTableService from "@/services/user_table.service";


export const userTable = {
    namespaced: true,
    state: {
        usersData: null,
        id: 1
    },
    actions: {
        getAllUsers({ commit }) {
            return UsersTableService.getAllUsers().then(
                (response) => {
                    commit("dataSuccess", response.users);
                    return Promise.resolve(response.users);
                }
            )
        },

        setId({ commit }, id) {
            commit("dataSuccess", id);
            return Promise.resolve(id);
        }
    },
    mutations: {
        dataSuccess(state, usersData) {
            state.usersData = usersData;
        },

        setDataId(state, id) {
            state.id = id;
        }
    },
};
