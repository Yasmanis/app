<template>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex flex-wrap align-items-center mb-4">
                    <div class="me-2">
                        <h4 class="card-title">{{ id ? 'Editar' : 'Crear' }} Provincia:</h4>
                    </div>
                </div>
                <div class="card-body vh-60">
                    <InputText
                        :property="{
                            'field': 'name',
                            'label': 'Nombre:',
                            'placeholder': 'nombre',
                        }"
                        :errors="dataForm.data.errors"
                        v-model="dataForm.data.name"
                    />

                    <InputText
                        :property="{
                            'field': 'description',
                            'label': 'Descripcion:',
                            'placeholder': 'description',
                        }"
                        :errors="dataForm.data.errors"
                        v-model="dataForm.data.description"
                    />

                    <SelectChoiceComponent
                        :property="{
                            'field': 'city',
                            'label': 'Ciudad:',
                            'placeholder': 'Seleccione una ciudad...',
                            'search': {
                                  'model': 'App\\Models\\City',
                                  'id': 'id',
                                  'text': 'name'
                            }
                        }"
                        :errors="dataForm.data.errors"
                        v-model="dataForm.data.city"
                    />

                    <div class="row mt-4">
                        <button type="button" class="btn btn-soft-primary waves-effect waves-light m-auto w-25" @click="submit">{{ id ? 'Salvar' : 'Crear' }} Provincia</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SelectChoiceComponent from "../../base/forms/SelectChoiceComponent";
import InputText from "../../base/forms/InputText";
import {reactive, ref} from "vue";
import Form from "../../base/hook/Form";

export default {
    name: "ProvinceAbm",
    props: {
        id: {
            type: String,
            default: null
        },
        data: {
            type: String,
            default: null
        }
    },
    components: {SelectChoiceComponent, InputText},
    setup() {
        const dataForm = reactive({
            data: new Form({}),
        });

        const submit = () => {
        }
        return {dataForm, submit}
    }
}
</script>

<style scoped>

</style>
