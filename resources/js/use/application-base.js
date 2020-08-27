function useApplicationBase() {
    const applicationDrawer = ref(false);
    const applicationLogoutDialog = ref(false);
    const applicationLoginRequiredDialog = ref(false);

    if (!window.__userIsLoggedIn) {
        Vue.nextTick(() => {
            document.querySelectorAll('[data-require-login]').forEach((el) => {
                el.addEventListener('click', function (e) {
                    e.preventDefault();
                    applicationLoginRequiredDialog.value = true;
                });
            });
        });
    }

    function toggleApplicationDrawerVisibility() {
        applicationDrawer.value = !applicationDrawer.value;
    }

    return {
        applicationDrawer,
        applicationLogoutDialog,
        applicationLoginRequiredDialog,
        toggleApplicationDrawerVisibility,
    };
}
