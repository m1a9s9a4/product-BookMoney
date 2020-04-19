<template>
    <v-layout class="p-2">
        <v-card class="v-card--raised w-100">
            <v-img
                class="white--text align-end"
                :src="img"
            >
            </v-img>

            <v-card-subtitle class="pb-0">{{ title }}</v-card-subtitle>

            <v-card-actions>
                <v-row no-gutters>
                    <v-col cols="12" md="6" sm="12" xs="12" v-if="is_unread == 1" class="p-1">
                        <v-btn href="/user/book/read/" color="primary" width="100%">
                            読破登録<v-icon dark right>mdi-checkbox-marked-circle</v-icon>
                        </v-btn>
                    </v-col>
                    <v-col cols="12" md="6" sm="12" xs="12" class="p-1">
                        <v-btn color="gray" :href="url" width="100%">
                            詳細<v-icon right>mdi-information-outline</v-icon>
                        </v-btn>
                    </v-col>
                </v-row>
            </v-card-actions>
        </v-card>
    </v-layout>
</template>

<script>
    export default {
        props: {
            title: String,
            url: String,
            img: String,
            is_unread: {
                type: String, // PHPの仕様上の問題, 1をstringとして渡す
                default: '1',
            }
        },
    }
</script>
