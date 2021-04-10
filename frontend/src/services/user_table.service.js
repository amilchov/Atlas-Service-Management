import axios from "../api/api";
class UsersTableService {
  getAllUsers() {
    return axios.get("api/users").then((response) => {
      return response.data;
    });
  }

  updateUser(id, data) {
    return axios
      .post("api/administrator/users/" + id + "/update", data, {
        headers: {
          Authorization:
            "ZMR9NXavD9tTYHvr4PPVIACuWxjvezPzpn0GryMYzI7wCB43d4s3gNu5gyic8oB12hxZZ7ZzSpbHnfKTdA4NoUZ4WgUUbj5Oqy7t1kk29E2fU44gxTxW5NYwP4rg7Z7gkUawbaNb6MDM98Vdp104v68z9H7P19gFkts63i3iia82rffzeDx2345SuzWCcMeXdiJmbXRxDUByGZObK2C43az5rzlpabOyhH50tsAhEH6FFavSa0QVLQCdyIMMsDe",
        },
      })
      .then((response) => {
        return response.data;
      });
  }

  deleteUser(id) {
    return axios
      .delete("api/administrator/users/" + id + "/delete", {
        headers: {
          Authorization:
            "ZMR9NXavD9tTYHvr4PPVIACuWxjvezPzpn0GryMYzI7wCB43d4s3gNu5gyic8oB12hxZZ7ZzSpbHnfKTdA4NoUZ4WgUUbj5Oqy7t1kk29E2fU44gxTxW5NYwP4rg7Z7gkUawbaNb6MDM98Vdp104v68z9H7P19gFkts63i3iia82rffzeDx2345SuzWCcMeXdiJmbXRxDUByGZObK2C43az5rzlpabOyhH50tsAhEH6FFavSa0QVLQCdyIMMsDe",
        },
      })
      .then((response) => {
        return response.data;
      });
  }
}

export default new UsersTableService();
