<template>
    <v-btn
        :href="href"
        :text="!active"
        :depressed="active"
        :color="active ? 'indigo darken-2': ''">
        <slot></slot>
    </v-btn>
</template>

<script>
    export default {
        name: 'AppBarNavButton',
        props: {
            active: Boolean,
            href: String,
        },
    };
</script>

