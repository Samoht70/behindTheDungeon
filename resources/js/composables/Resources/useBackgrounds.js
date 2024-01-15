import {router, useForm} from "@inertiajs/vue3";

export function useBackgrounds() {
    const form = useForm({
        name: '',
        description: ''
    })

    const fields = [
        {type: 'text', name: 'name', label: 'Nom de l\'historique', required: true},
        {type: 'editor', name: 'description', label: 'Informations sur l\'historique', required: true}
    ]

    const handleSubmit = () => {
        form.post('/resources/backgrounds')
    }

    return {
        form,
        fields,
        handleSubmit
    }
}
