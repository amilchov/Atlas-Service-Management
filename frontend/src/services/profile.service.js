import axios from "../api/api";
class ProfileServices {
  getUser(id) {
    return axios.get("api/users/" + id).then((response) => {
      return response.data;
    });
  }

  showRoles(roles) {
    var rolesData = "";
    try {
      for (var i = 0; i < roles.length; i++) {
        console.log(roles.length);
        rolesData += roles[i].name + ", ";
      }
      console.log(rolesData);
      return rolesData.slice(0, -2);
    } finally {
      console.log(rolesData);
      rolesData = null;
    }
  }
}

export default new ProfileServices();
