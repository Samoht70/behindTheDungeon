import {router, useForm} from "@inertiajs/vue3";

export function useAttacks() {
    const form = useForm({
        name: '',
        description: ''
    })

    const fields = [
        {type: 'text', name: 'name', label: 'Nom de l\'attaque', required: true},
        {type: 'editor', name: 'description', label: 'Informations sur l\'attaque', required: true},
    ]

    const handleSubmit = () => {
        form.post('resources/attacks')
    }

    return {
        form,
        fields,
        handleSubmit
    }
}
