<template>
    <pie-chart :read="read" :unread="unread"></pie-chart>
</template>
<script>
    import BarChart from './charts/Bar';

    export default {
        components: {
            BarChart
        },
        props: ['read', 'unread'],
    }
</script>
