<script>
    import { Pie } from 'vue-chartjs';

    export default {
        name: 'PieChart',
        extends: Pie,
        props: ['read', 'unread'],
        mounted () {
            // データを流し込むだけ
            this.renderChart({
                labels: ['読んだ','まだ読んでない'],
                datasets: [{
                    label: '読書量',
                    backgroundColor: ['#6cb2eb', '#e3342f'],
                    data: [this.read, this.unread],
                }]
            })
        }
    };
</script>
