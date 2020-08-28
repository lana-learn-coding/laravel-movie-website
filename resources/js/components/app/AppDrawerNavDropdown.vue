<template>
    <v-list-group
        :prepend-icon="icon"
        append-icon=""
        :ripple="true"
        :value="false"
        class="my-3"
    >
        <template v-slot:activator>
            <v-list-item-title>{{ name }}</v-list-item-title>
        </template>
        <v-list-item
            v-for="item in items"
            :key="item.id"
            :href="item.href"
            :class="active && item.id == queryId ? 'v-list-item--active' : ''"
            link
        >
            <v-list-item-action>
                <v-list-item-title v-text="item.name"></v-list-item-title>
            </v-list-item-action>
        </v-list-item>
    </v-list-group>
</template>

<script>
    export default {
        name: 'AppDrawerNavDropdown',
        props: {
            icon: String,
            name: String,
            items: Array,
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
