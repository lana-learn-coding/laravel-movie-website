<template>
    <v-menu offset-y open-on-hover min-width="200px">
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
            <v-list-item
                v-for="item in items"
                :key="item.id"
                :href="item.href"
                :class="active && item.id == queryId ? 'v-list-item--active' : ''"
            >
                <v-list-item-title>{{ item.name }}</v-list-item-title>
            </v-list-item>
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
            queryId: String,
            queryType: String,
        },
        computed: {
            active: function () {
                return this.queryType === this.name;
            },
        },
    };
</script>
