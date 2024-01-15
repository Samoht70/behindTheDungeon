import {router, useForm} from "@inertiajs/vue3";

export function useGoals() {
    const form = useForm({
        name: '',
        description: ''
    })

    const fields = [
        {type: 'text', name: 'name', label: 'Nom de l\'objectif', required: true},
        {type: 'editor', name: 'description', label: 'Informations sur l\'objectif', required: true}
    ]

    const handleSubmit = () => {
        form.post('/resources/goals')
    }

    return {
        form,
        fields,
        handleSubmit
    }
}
