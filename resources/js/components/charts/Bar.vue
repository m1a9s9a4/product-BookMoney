<script>
    import { Bar } from 'vue-chartjs';

    export default {
        name: 'BarChart',
        extends: Bar,
        props: ['monthlyBooks', 'l'],
        mounted () {
            // データを流し込むだけ
            this.renderChart({
                labels: ['読んだ','まだ読んでない'],
                datasets: [{
                    label: '月間読書量',
                    backgroundColor: ['#6cb2eb'],
                    data: this.monthlyBooks
                }]
            })
        }
    };
</script>
