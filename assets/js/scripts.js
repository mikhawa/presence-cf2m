/*scripts*/
import './scripts/displayNoneOnClick';


/*apps*/
import {createApp} from 'vue';
/*vue*/
import Example from './apps/Exemple/Example.vue'

const app = createApp(Example)
app.mount('#exemple')
