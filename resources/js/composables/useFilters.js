import {useForm} from "@inertiajs/vue3";
import {watch} from "vue";
import {debounce} from "lodash";

export function useFilters (filters) {
    const formFilter = useForm({
        search: filters.search ?? '',
        schools: filters.schools ?? [],
        tags: filters.tags ?? [],
        categories: filters.categories ?? [],
        level: filters.level ?? [0, 9],
        is_rituel: filters.is_rituel ?? 'both'
    })

    const handleFilters = () => {
        formFilter.get('/spells', {preserveState: true, replace: true})
    }

    const resetFilters = () => {
        formFilter.reset('search', 'schools', 'tags', 'categories', 'level', 'is_rituel')
        handleFilters()
    }

    const filtersCount = () => {
        return Object.entries(formFilter.data()).filter((filter) => {
            if (filter[0] === 'search') {
                return filter[1].length > 0
            }
            else if (filter[0] === 'is_rituel') {
                return filter[1] !== 'both'
            }
            else if (filter[0] === 'level') {
                return parseInt(filter[1][0]) !== 0 || parseInt(filter[1][1]) !== 9
            }
            else if (['schools', 'tags', 'categories'].includes(filter[0])) {
                return filter[1].length > 0
            }
        }).length
    }

    watch(() => formFilter.search, debounce(function () {
        handleFilters()
    }, 300))

    watch(
        () => [
            formFilter.categories,
            formFilter.schools,
            formFilter.tags,
            formFilter.level,
            formFilter.is_rituel
        ],
        () => {
            handleFilters()
        }
    )

    return {
        formFilter,
        filtersCount,
        resetFilters
    }
}
