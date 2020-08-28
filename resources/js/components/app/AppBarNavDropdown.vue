<template>
    <v-menu offset-y open-on-hover>
        <template v-slot:activator="{ on }">
            <v-btn
                :class="activatorClass"
                v-on="on"
                :text="!active"
                :depressed="active"
                :color="active ? 'indigo darken-2': ''"
            >
                {{ name }}
                <v-icon dark right>fas fa-caret-down</v-icon>
            </v-btn>
        </template>
        <v-list>
            <v-container>
                <v-row no-gutters>
                    <v-col
                        v-for="item in items"
                        :key="item.id"
                        :cols="items.length > 12 ? 4 : items.length > 6 ? 6 : 12"
                        style="width: 40px"
                    >
                        <v-list-item
                            :href="item.href"
                            :class="active && item.id == queryId ? 'v-list-item--active' : ''"
                        >
                            <v-list-item-title>{{ item.name }}</v-list-item-title>
                        </v-list-item>
                    </v-col>
                </v-row>
            </v-container>
        </v-list>
    </v-menu>
</template>

<script>
    export default {
        name: 'AppBarDropdown',
        props: {
            activatorClass: String,
            items: Array,
            name: String,
            queryName: String,
            queryId: String,
            queryType: String,
        },
        computed: {
            active: function () {
                return this.queryType === this.queryName;
            },
        },
    };
</script>
