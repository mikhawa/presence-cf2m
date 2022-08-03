<template>
    <p class="identite">{{ nom }}<br />{{ prenom }}</p>
</template>

<script>
export default {
  name: 'IdentiteStagiaire',
  props: {
    nom: String,
    prenom: String
  }
}
</script>
