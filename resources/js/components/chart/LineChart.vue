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
                backgroundColor: '#14278c',
                data: this.chartData.map(item => item.amount)
            }],
        }, {
            responsive: false,
            maintainAspectRatio: true
        })
    }
}
</script>
