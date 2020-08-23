function useApplicationBase() {
    const applicationDrawer = ref(false);
    const applicationLogoutDialog = ref(false);

    function toggleApplicationDrawerVisibility() {
        applicationDrawer.value = !applicationDrawer.value;
    }

    return {
        applicationDrawer,
        applicationLogoutDialog,
        toggleApplicationDrawerVisibility,
    };
}
