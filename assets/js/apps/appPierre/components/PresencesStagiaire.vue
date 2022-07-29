<template>
  <article class="stagiaire">
    <identite-stagiaire v-bind:nom="nom" v-bind:prenom="prenom"></identite-stagiaire>
    <div v-for="i in 5" class="d-flex">
      <case-horaire signature="P"></case-horaire>
      <case-horaire signature="P"></case-horaire>
    </div>

  </article>
</template>

<script>
import CaseHoraire from './CaseHoraire.vue'
import IdentiteStagiaire from './IdentiteStagiaire.vue'

export default {
  props     : ["nom", "prenom", "events"],
  components: {IdentiteStagiaire, CaseHoraire}
}

</script>

<style scoped>

</style>
