import {useAdventures} from "@/composables/Resources/useAdventures.js";
import {useGoals} from "@/composables/Resources/useGoals.js";
import {useRaces} from "@/composables/Resources/useRaces.js";
import {useSubRaces} from "@/composables/Resources/useSubRaces.js";
import {useBackgrounds} from "@/composables/Resources/useBackgrounds.js";
import {useFeatures} from "@/composables/Resources/useFeatures.js";
import {useAttacks} from "@/composables/Resources/useAttacks.js";
import {useWeapons} from "@/composables/Resources/useWeapons.js";
import {useUtilities} from "@/composables/Resources/useUtilities.js";

export function useResources() {
    const resourceHooks = {
        adventure: useAdventures,
        goal: useGoals,
        race: useRaces,
        subRace: useSubRaces,
        background: useBackgrounds,
        feature: useFeatures,
        attack: useAttacks,
        weapon: useWeapons,
        utility: useUtilities,
    }
    const selectResource = (resource) => {
        const selectedHook = resourceHooks[resource];

        if (selectedHook) {
            const { form, fields, toggle, handleSubmit } = selectedHook();
            return { form, fields, toggle, handleSubmit };
        }
    }

    return {
        selectResource
    }
}
