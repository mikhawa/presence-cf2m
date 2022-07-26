<template>
   <div>
       <p>This is an example of a new components in VueJs</p>
       <button @click="counter++">Clic me {{counter}}</button>
   </div>
</template>

<script>
   export default {
       name: "example"
   }
</script>

<style scoped>

</style>