import axios from "../api/api";
class IncidentsService {
  async getAllIncidents() {
    const response = await axios.get("api/incidents", {
      headers: {
        Authorization:
          "ZMR9NXavD9tTYHvr4PPVIACuWxjvezPzpn0GryMYzI7wCB43d4s3gNu5gyic8oB12hxZZ7ZzSpbHnfKTdA4NoUZ4WgUUbj5Oqy7t1kk29E2fU44gxTxW5NYwP4rg7Z7gkUawbaNb6MDM98Vdp104v68z9H7P19gFkts63i3iia82rffzeDx2345SuzWCcMeXdiJmbXRxDUByGZObK2C43az5rzlpabOyhH50tsAhEH6FFavSa0QVLQCdyIMMsDe",
      },
    });
    return response.data;
  }

  deleteIncident(id) {
    return axios
      .delete("api/incidents/" + id + "/delete", {
        headers: {
          Authorization:
            "ZMR9NXavD9tTYHvr4PPVIACuWxjvezPzpn0GryMYzI7wCB43d4s3gNu5gyic8oB12hxZZ7ZzSpbHnfKTdA4NoUZ4WgUUbj5Oqy7t1kk29E2fU44gxTxW5NYwP4rg7Z7gkUawbaNb6MDM98Vdp104v68z9H7P19gFkts63i3iia82rffzeDx2345SuzWCcMeXdiJmbXRxDUByGZObK2C43az5rzlpabOyhH50tsAhEH6FFavSa0QVLQCdyIMMsDe",
        },
      })
      .then((response) => {
        return response.data;
      });
  }

  createIncident(data) {
    return axios.post("api/incidents/create", data).then((response) => {
      return response.data;
    });
  }

  updateIncident(token, id, data) {
    return axios
      .post("api/incidents/" + id + "/update", data, {
        headers: {
          Authorization: token,
        },
      })
      .then((response) => {
        return response.data;
      });
  }

  getMyIncidents(token) {
    return axios
      .get("api/incidents/user", {
        headers: {
          Authorization: token,
        },
      })
      .then((response) => {
        return response.data;
      });
  }
}

export default new IncidentsService();
