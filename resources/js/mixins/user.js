export default {
    data: () => {
        return {
            userData: null
        }
    },
    async mounted() {
        try {
            await this.$store.dispatch('getMe');
            this.userData = this.$store.getters.authorizedUser;
        } catch (e) {

        }
    }
}
