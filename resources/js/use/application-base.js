function useApplicationBase() {
    const applicationDrawer = ref(false);

    function toggleApplicationDrawerVisibility() {
        applicationDrawer.value = !applicationDrawer.value;
    }

    return {
        applicationDrawer,
        toggleApplicationDrawerVisibility,
    };
}
