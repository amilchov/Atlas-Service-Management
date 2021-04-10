import api from "../api/api";
import axios from "axios";
class ChartsServices {
  getCharts() {
    return api.get("api/charts").then((response) => {
      return response.data;
    });
  }

  getChart(id) {
    return api.get("api/charts/" + id).then((response) => {
      return response.data;
    });
  }

  getChartDataApi(id) {
    var loading = true;
    return api
      .get("api/charts/" + id + "/data")
      .then((response) => {
        return response.data;
      })
      .finally(() => {
        this.loading = false;
      });
    // return sss.get(url).then((response) => {
    //   return response.data;
    // });
  }
}

export default new ChartsServices();
