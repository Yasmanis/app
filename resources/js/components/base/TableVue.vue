<template>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead class="table-light">
            <tr>
                <th v-for="header in headers">
                    {{ header }}
                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="val in dataTable">
                <td v-for="(headerV,headerK) in headers">
                    {{ val[headerK] }}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import {ref} from "vue";

export default {
    name: "TableVue",
    props: {
        data: String,
        table_header: String
    },
    setup(props) {
        const headers = ref(JSON.parse(props.table_header));
        const dataTable = ref(JSON.parse(props.data));
        return {headers, dataTable};
    }
}
</script>

<style scoped>

</style>
