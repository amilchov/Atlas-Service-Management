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
    return axios.post("api/auth/register", user);
  }
}

export default new AuthService();
