import {router, useForm} from "@inertiajs/vue3";

export function useWeapons() {
    const form = useForm({
        name: '',
        atk_bonus: '',
        damage_type: '',
        sub_info: '',
    })

    const fields = [
        {type: 'text', name: 'name', label: 'Nom', required: true},
        {type: 'number', name: 'atk_bonus', label: 'Puissance bonus', min: 0, required: true},
        {type: 'text', name: 'damage_type', label: 'Type de dommage', required: true},
        {type: 'textarea', name: 'sub_info', label: 'Informations supplémentaires', required: true},
    ]

    const handleSubmit = () => {
        form.post('/resources/weapons')
    }

    return {
        form,
        fields,
        handleSubmit
    }
}
