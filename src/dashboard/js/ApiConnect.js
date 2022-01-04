// const parameters={
//     API_URL:"https://127.0.0.1:8000/",
//     PHOTO_URL:"https://127.0.0.1:8000/photos/",

// }

  import axios from 'axios'

  const getApi = axios.create({
 
      API_URL: 'http://127.0.0.1:8000/',
      PHOTO_URL: "http://127.0.0.1:8000/Photos/",
      timeout: 1000,
  })
 
  export { getApi }
