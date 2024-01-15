import {router, useForm} from "@inertiajs/vue3";
import axios from "axios";
import {ref} from "vue";

export function useSubRaces() {
    const form = useForm({
        name: '',
        description: '',
        is_after: false,
        race_id: ''
    })

    const fields = [
        {type: 'text', name: 'name', label: 'Nom de la sous-race'},
        {type: 'editor', name: 'description', label: 'Informations sur la sous-race', required: true},
        {type: 'toggle', name: 'is_after', label: 'Nom avant la race ?', required: true},
        {type: 'select', name: 'race_id', label: 'Race', placeholder: 'Sélectionnez la race', required: true},
    ]

    const toggle = () => {
        form.is_after = !form.is_after
    }
    const handleSubmit = () => {
        form.post('/resources/subraces')
    }

    return {
        form,
        fields,
        toggle,
        handleSubmit
    }
}
