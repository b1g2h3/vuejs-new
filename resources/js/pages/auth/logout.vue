<template>
    <div></div>
</template>

<script>
export default {
    created() {
        this.$store.dispatch("logout").then(response => {
            this.$router.push({ name: "Home" });
        });
    }
};
</script>
