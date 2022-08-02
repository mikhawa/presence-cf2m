/*scripts*/
import './scripts/displayNoneOnClick';


/*apps*/
import {createApp} from 'vue';
/*vue*/
import Example from './apps/Exemple/Example.vue'

const app = createApp(Example)
app.mount('#exemple')

/*ChartJs Vue*/
import Stats from './apps/GraphStats/Stats.vue'
const stats = createApp(Stats)
stats.mount('#GraphStats')
