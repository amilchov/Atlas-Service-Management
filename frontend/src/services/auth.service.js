import axios from "../api/api";

class AuthService {
  login(user) {
    return axios
      .post("api/auth/login", {
        email: user.email,
        password: user.password,
      })
      .then((response) => {
        if (response.data.token) {
          console.log(response.data.token);
          localStorage.setItem("user", JSON.stringify(response.data));
        }
        return response.data;
      });
  }

  logout() {
    localStorage.removeItem("user");
  }

  register(user) {
    return axios.post("api/auth/register", {
      first_name: user.first_name,
      middle_name: user.middle_name,
      last_name: user.last_name,
      email: user.email,
      password: user.password,
    });
  }
}

export default new AuthService();
