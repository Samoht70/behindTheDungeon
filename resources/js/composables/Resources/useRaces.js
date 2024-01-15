import {router, useForm} from "@inertiajs/vue3";

export function useRaces() {
    const form = useForm({
        name: '',
        description: '',
        example_surname: '',
    })

    const fields = [
        {type: 'text', name: 'name', label: 'Nom de la race', required: true},
        {type: 'editor', name: 'description', label: 'Informations sur la race', required: true},
        {type: 'editor', name: 'example_surname', label: 'Noms populaires dans cette race', required: true}
    ]

    const handleSubmit = () => {
        form.post('/resources/races')
    }

    return {
        form,
        fields,
        handleSubmit
    }
}
