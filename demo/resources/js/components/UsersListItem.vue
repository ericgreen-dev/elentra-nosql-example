<template>
    <div>
        {{user.name}}
    </div>
</template>

<script>
    export default {
        name: 'users-list-item',
        props: {
            user: {
                type: Object,
                required: true
            }
        }
    }
</script>

<style scoped>

</style>