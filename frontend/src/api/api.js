import axios from 'axios'

export default axios.create({
  baseURL: 'https://atlas.noit.eu/',
  headers: {
    'Accept': 'application/json',
    'Application': 'd59ba6a4-1b9a-4ded-a8fa-f6ed24eed579'
  },
});

