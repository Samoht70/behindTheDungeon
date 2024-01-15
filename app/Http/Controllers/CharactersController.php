<?php

namespace App\Http\Controllers;

use App\Models\Adventure;
use App\Models\Alignment;
use App\Models\Background;
use App\Models\Category;
use App\Models\Character;
use App\Models\Goal;
use App\Models\Subrace;
use Arr;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Inertia\Response;

class CharactersController extends Controller
{
    public function index(Category $category): Response
    {
        $characters = Character::where('category_id', $category->getKey())
            ->with(['subrace.race', 'alignment', 'background', 'category', 'abilities', 'adventures'])
            ->get();

        return Inertia::render('Character/CharacterIndex', [
                'characters' => $characters,
                'category' => $category->name
            ]
        );
    }

    public function create()
    {
        $categories = Category::all();
        $backgrounds = Background::all();
        $subRaces = Subrace::all()->map(function (Subrace $subRace) {
            return [
                'id' => $subRace->getKey(),
                'name' => $subRace->fullName(),
            ];
        });
        $alignments = Alignment::all();
        $goals = Goal::all()->map(function (Goal $goal) {
            return [
                'id' => $goal->getKey(),
                'name' => ucfirst($goal->name),
            ];
        });
        $adventures = Adventure::all();

        return Inertia::render('Character/CharacterCreate',
            compact('adventures', 'alignments', 'goals', 'backgrounds', 'categories', 'subRaces')
        );
    }

    public function store(StoreCharacterRequest $request)
    {
        $hero = new Character();

        $hero->fill($request->validated('hero'));
        $hero->equipment = strip_tags($request->validated('hero.equipment'), ['<p>', '<strong>', '<ul>', '<li>']);
        $hero->character_past = strip_tags($request->validated('hero.character_past'), ['<p>', '<strong>', '<ul>', '<li>']);
        $hero->save();

        foreach ($hero->getRelations() as $relation) {
            if ($request->validated($relation)) {
                $relationData = Arr::divide($request->validated('abilities'));
                $hero->$relation()->sync($relationData[1]);
            }
        }

        return redirect()->route('heroes.show', compact('hero'));
    }

    public function show(Character $character): Response
    {
        return Inertia::render('Character/CharacterShow', [
            'character' => $character->load([
                'category',
                'background',
                'subrace',
                'alignment',
                'weapons',
                'attacks',
                'coins',
                'utilities',
                'features',
                'goal',
                'abilities',
                'skills',
                'savingThrows'
            ])
        ]);
    }

    public function edit(Character $hero)
    {
        //
    }

    public function update(Request $request, Character $hero)
    {
        //
    }

    public function destroy(Character $hero)
    {
        //
    }
}
