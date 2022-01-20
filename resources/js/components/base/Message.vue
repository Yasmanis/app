<template>

</template>

<script>
import {onMounted} from 'vue';

export default {
    name: "Message",
    props: {
        message: String
    },
    setup(props){
        onMounted(() => {
            toastr.success(`${props.message}`)
        })
        return {}
    }
}
</script>

<style scoped>

</style>
