import axios from "../api/api";
class RolesService {
  async getAllRoles() {
    const response = await axios.get("api/roles");
    return response.data;
  }
}

export default new RolesService();
