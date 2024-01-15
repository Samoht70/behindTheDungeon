import {router, useForm} from "@inertiajs/vue3";

export function useUtilities() {
    const form = useForm({
        name: ''
    })

    const fields = [
        {type: 'text', name: 'name', label: 'Nom de la maîtrise', required: true}
    ]

    const handleSubmit = () => {
        form.post('/resources/utilities')
    }

    return {
        form,
        fields,
        handleSubmit
    }
}
