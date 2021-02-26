import axios from "../api/api";
class UsersTableService {
    getAllUsers() {
        return axios.get('api/users').then(
            (response) => {
                console.log(response.data);
                return response.data;
            }
        );
    }
}

export default new UsersTableService();