<template>
    <pie-chart :read-price="readPrice" :unread-price="unreadPrice"></pie-chart>
</template>
<script>
    import PieChart from './charts/Pie';

    export default {
        components: {
            PieChart
        },
        props: ['readBook', ''],
    }
</script>
