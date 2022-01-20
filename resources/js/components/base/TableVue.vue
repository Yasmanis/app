<template>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead class="table-light">
            <tr>
                <th v-for="header in headers">
                    {{ header }}
                </th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="val in dataTable">
                <td v-for="(headerV,headerK) in headers">
                    <div v-html="getTdVal(headerK, val)"></div>
                </td>
                <td>
                    <a
                        class="mr-2"
                        :href="`${base_url}/${val.id}/edit`"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Editar"
                    ><i class="far fa-edit"></i>
                    </a>
                    <a
                        class="ms-2"
                        href="javascript:void(0)"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Borrar"
                        @click="`${deleteItem(val.id)}`"
                    ><i class="fas fa-trash"></i>
                    </a>
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
        table_header: String,
        base_url: String
    },
    setup(props) {
        const headers = ref(JSON.parse(props.table_header));
        const dataTable = ref(JSON.parse(props.data));

        const getTdVal = (headerK, val) => {
            return val[headerK];
        }

        const deleteItem = async (id) => {
            if (confirm('Esta seguro que desea eliminar este dato')){
                await axios["delete"](`${props.base_url}/${id}`,{}).then((response) => {
                    toastr.success(`Elemento eliminado correctamente`, module)
                    dataTable.value = _.filter(dataTable.value, v => (v.id != id))
                });
            }
        }

        return {headers, dataTable, getTdVal, deleteItem};
    }
}
</script>

<style scoped>

</style>
