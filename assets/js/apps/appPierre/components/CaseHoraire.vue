<template>
  <div class="case" v-on:click="popup()">
    <p class="signature">{{ signature }}</p>
    <p v-if="signature=='R'" class="retard">R: {{ retard }}</p>
    <p v-else-if="signature=='D'" class="depart">D: {{ depart }}</p>
    <p v-else-if="signature=='RD'" class="retarddepart">{{ retard }} - {{ depart }}</p>
    <p v-else-if="signature=='A'" class="absent"></p>
    <p v-else-if="signature==''" class="vide"></p>
    <p v-else class="present"></p>
  </div>
</template>

<script>
export default {
  name   : 'CaseHoraire',
  props  : {
    signature: {type: String, required: true},
    retard   : {type: String, required: false},
    depart   : {type: String, required: false}
  },
  methods: {
    popup() {
      alert('Popup sur case')
    }
  }
}

</script>

<style scoped>
.case {
  width  : 30mm;
  height : 20mm;
  border : 1px solid black;
}

.signature {
  width       : 30mm;
  height      : 15mm;
  text-align  : center;
  line-height : 15mm;
  margin      : 0;
}

.retard, .depart, .present, .absent, .retarddepart, .vide {
  width      : 30mm;
  height     : 5mm;
  border-top : 1px dashed black;
  margin     : 0;
}

.depart {
  text-align : right;
}

.retarddepart {
  text-align : center;
}

</style>
