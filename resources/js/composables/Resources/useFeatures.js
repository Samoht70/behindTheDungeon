import {router, useForm} from "@inertiajs/vue3";

export function useFeatures() {
    const form = useForm({
        name: '',
        description: ''
    })

    const fields = [
        {type: 'text', name: 'name', label: 'Nom de l\'aptitude', required: true},
        {type: 'editor', name: 'description', label: 'Informations sur l\'aptitude', required: true}
    ]

    const handleSubmit = () => {
        form.post('/resources/features')
    }

    return {
        form,
        fields,
        handleSubmit
    }
}
