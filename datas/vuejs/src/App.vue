<template>
  <div>
    <feuille-signature></feuille-signature>
    <fenetre-modale v-if='showModal' @close='showModal = false'></fenetre-modale>
  </div>
</template>

<script>
import FeuilleSignature from './components/FeuilleSignature.vue'
import FenetreModale from './components/FenetreModale.vue'
export default {
  name: 'App',
  components: { FeuilleSignature, FenetreModale }
}
</script>
