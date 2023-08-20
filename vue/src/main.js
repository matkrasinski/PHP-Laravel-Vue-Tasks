import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import Axios from 'axios'

const app = createApp(App)

app.config.globalProperties.API_URL = 'http://localhost:8000/api'
app.config.globalProperties.$http = Axios;

app.use(router);
app.mount('#app')


