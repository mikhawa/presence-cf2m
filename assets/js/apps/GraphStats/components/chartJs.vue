<template v-if="chartData">
{{ chartData }}
  <Bar
    :chart-options="chartOptions"
    :chart-data="chartData"
    :chart-id="chartId"
    :dataset-id-key="datasetIdKey"
    :plugins="plugins"
    :css-classes="cssClasses"
    :styles="styles"
    :width="width"
    :height="height"
  />
</template>

<script>
import { Bar } from 'vue-chartjs'

import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
  name: 'chartJs',
  components: { Bar },

  data() {
    return {
      chartData: {
        labels: [],
        datasets: [ { 
          data: [40,20,12],
          backgroundColor: '#f87979',
        } ]
      },
      chartOptions: {
        responsive: true
      }
    }
  },
  mounted() {
    fetch('https://127.0.0.1:8000/api/users')
      .then(res=> res.json())
      .then(data => this.chartData = data)
      .catch(err => console.log(err.message))
  }
}
</script>

