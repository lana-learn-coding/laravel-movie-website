function useMovieFilterDatePicker(oldDate) {
    const menu = ref(false);
    const dates = ref(oldDate ? oldDate.split(' to ') : []);
    const dateRangeValue = computed(() => {
        if (dates.value.length < 2) {
            return '';
        }
        return dates.value
            .map(date => {
                return date || new Date().toISOString().substr(0, 10);
            })
            .sort((dateA, dateB) => new Date(dateA) - new Date(dateB))
            .join(' to ');
    });

    return {menu, dates, dateRangeValue};
}
