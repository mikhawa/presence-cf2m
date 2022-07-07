<template>
  <article class="stagiaire">
    <identite-stagiaire nom="Sandron" prenom="Pierre"></identite-stagiaire>
    <case-horaire signature="P"></case-horaire>
    <case-horaire signature="P"></case-horaire>
    <case-horaire signature="R" retard="09:20"></case-horaire>
    <case-horaire signature="P"></case-horaire>
    <case-horaire signature="P"></case-horaire>
    <case-horaire signature="D" depart="15:45"></case-horaire>
    <case-horaire signature="P"></case-horaire>
    <case-horaire signature="P"></case-horaire>
    <case-horaire signature="A"></case-horaire>
    <case-horaire signature="RD" retard="13:45" depart="16:15"></case-horaire>
  </article>
</template>

<script>
import CaseHoraire from './CaseHoraire.vue'
import IdentiteStagiaire from './IdentiteStagiaire.vue'

export default {
  components: { IdentiteStagiaire, CaseHoraire }
}

</script>

<style scoped>

</style>
