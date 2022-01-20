<template>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex flex-wrap align-items-center mb-4">
                    <div class="me-2">
                        <h4 class="card-title">{{ data ? 'Editar' : 'Crear' }} Provincia:</h4>
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
                        @update-field="updateThisField"
                        @click="clearError('name')"
                    />

                    <InputText
                        :property="{
                            'field': 'description',
                            'label': 'Descripción:',
                            'placeholder': 'descripción',
                        }"
                        :errors="dataForm.data.errors"
                        v-model="dataForm.data.description"
                        @update-field="updateThisField"
                        @click="clearError('description')"
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
                        @update-field="updateThisField"
                        @click="clearError('city')"
                    />

                    <div class="row mt-4">
                        <button type="button" class="btn btn-soft-primary waves-effect waves-light m-auto w-25"
                                :disabled="dataForm.data.errors.any()"
                                @click="submit">{{ data ? 'Salvar' : 'Crear' }} Provincia
                        </button>
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
        data: {
            type: String,
            default: null
        }
    },
    components: {SelectChoiceComponent, InputText},
    setup(props) {
        const objData = JSON.parse(props.data);
        let object = {city: {value: ''}, name: {value: ''}, description: {value: ''}};
        let url = '/provincias';
        let requestType = 'post';
        if (props.data) {
            url = `${url}/${objData.id}`;
            requestType = 'put';
            object.city.value = objData.city ? objData.city.id : '';
            object.name.value = objData.name;
            object.description.value = objData.description;
        }

        const dataForm = reactive({
            data: new Form(object),
        });

        const submit = () => {
            dataForm.data.submit(requestType, url).then(((response) => location.href = response));
        }

        const updateThisField = ({field, value}) => {
            dataForm.data[field] = value;
        };

        const clearError = (field) => {
            dataForm.data.errors.clear(field);
        };
        return {objData, dataForm, updateThisField, clearError, submit}
    }
}
</script>

<style scoped>

</style>
