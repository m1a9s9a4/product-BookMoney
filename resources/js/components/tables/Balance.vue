<template>
    <v-layout class="p-2">
        <v-data-table
            items=""
            hide-default-header
            hide-default-footer
        ></v-data-table>
    </v-layout>
</template>

<script>
    export default {
        data () {
            return {
                headers: [
                    { text: 'Type', value: 'name'},
                    { text: 'Cost', value: 'cost'},
                ],
                costs: [
                    {
                        text: '読破額',
                        value: this.read_cost,
                    },
                    {
                        text: '積読額',
                        value: this.unread_cost,
                    },
                    {
                        text: '合計',
                        value: this.total_cost,
                    },
                ],
            }
        },
        props: {
            total_cost: Number,
            read_cost: Number,
            unread_cost: Number,
        }
    }
</script>
