<template>
    <div :class="`row mb-2 ${errors.has(property.field) && 'has-danger'}`" :key="opts">
        <label
            :for="property.field"
            :class="`col-sm-12 col-md-2 col-form-label text-md-end pr-2 text-sm-center`"
        >
            {{ property.label }}
        </label>
        <div class="col-sm-12 col-md-9">
            <select
                :class="{'form-control': true}"
                :name="property.field"
                :id="property.field"
                v-model="val"
            >
            </select>
            <div v-if="errors.has(property.field)" class="pristine-error text-help">
                {{ errors.get(property.field) }}
            </div>
        </div>
    </div>
</template>

<script>
import { reactive, ref, watch, onMounted } from "vue";
import {convertToSelectChoice, getOptions, selectTransform} from "../../helpers/Transform";

export default {
    name: "SelectChoiceComponent",
    props: {
        errors: {
            type: Object,
            default: {},
        },
        property: Object,
        modelValue: Number|String,
    },
    setup(props, { emit }) {
        const val = ref(props.modelValue || null);
        const options = ref([]);
        const opts = reactive(options);
        const choice = ref();

        watch(val, () => {
            emit("update-field", { value: val, field: props.property.field });
        });

        watch(
            () => props.modelValue,
            (actual, actionBefore) => {
                if (actual){
                    choice.value.setChoiceByValue(actual)
                }
            }
        );

        onMounted(async () => {
            options.value = props.property.options
                ? selectTransform(props.property.options)
                : await getOptions(props.property.search);

            $(document).ready(async () => {
                choice.value = await convertToSelectChoice(props.property.field, options, val.value, props.property.placeholder);
            });
        });

        return {
            val,
            opts,
        };
    },
};
</script>

<style scoped></style>
