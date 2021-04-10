import IncidentsService from "@/services/incidents.service";


export const incidentTable = {
    namespaced: true,
    state: {
        incidentData: null,
        myIncidents: null,
        id: 1
    },
    actions: {
        getAllIncidents({ commit }) {
            return IncidentsService.getAllIncidents().then(
                (response) => {
                    commit("dataSuccess", response.incidents);
                    return Promise.resolve(response.incidents);
                }
            )
        },

        getMyIncidents({ commit }, token) {
            return IncidentsService.getMyIncidents(token).then(
                (response) => {
                    commit("dataSuccessMy", response.incidents);
                    return Promise.resolve(response.incidents);
                }
            )
        },
    },
    mutations: {
        dataSuccess(state, incidentData) {
            state.incidentData = incidentData;
        },

        dataSuccessMy(state, incidentData) {
            state.myIncidents = incidentData;
        }
    },
};
