import {router, useForm} from "@inertiajs/vue3";
import {watch} from "vue";

export function useAdventures() {
    const form = useForm({
        name: '',
        abbreviation: '',
        text_color: '',
        bg_color: ''
    })

    const fields = [
        {type: 'text', name: 'name', label: 'Nom de l\'aventure', required: true},
        {type: 'text', name: 'abbreviation', label: 'Abbréviation', required: true},
        {type: 'color', name: 'text_color', label: 'Texte du badge', required: true},
        {type: 'color', name: 'bg_color', label: 'Fond du badge', required: true},
    ]

    const handleSubmit = () => {
        form.post('/resources/adventures')
    }

    return {
        form,
        fields,
        handleSubmit
    }
}
