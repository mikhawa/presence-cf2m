import {createApp} from 'vue'
import appPierre from './App.vue'
import {store} from './store'

createApp(appPierre).use(store).mount('#appPierre')