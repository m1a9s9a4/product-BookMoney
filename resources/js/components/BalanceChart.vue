<template>
    <pie-chart :read="read" :unread="unread"></pie-chart>
</template>
<script>
    import PieChart from './charts/Pie';

    export default {
        components: {
            PieChart
        },
        props: ['read', 'unread'],
    }
</script>
