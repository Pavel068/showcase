<script>
import {Line} from 'vue-chartjs';

export default {
    extends: Line,
    props: ['chartData'],
    mounted() {
        this.renderChart({
            labels: this.chartData.map(item => item.date),
            datasets: [{
                label: '',
                borderColor: '#14278c',
                fill: false,
                data: this.chartData.map(item => item.amount)
            }],
        }, {
            responsive: false,
            maintainAspectRatio: true,
            scales: {
                yAxes: [{
                    display: true,
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        })
    }
}
</script>
