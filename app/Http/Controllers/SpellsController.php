<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Level;
use App\Models\School;
use App\Models\Spell;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SpellsController extends Controller
{
    public function index(Request $request): Response
    {
        $spells = Spell::with('level', 'school')
            ->distinct()
            ->select('spells.*')
            ->when($request->input('search'), function (Builder $builder, string $search) {
                $builder->where('name', 'like', "%$search%");
            })
            ->when($request->input('categories'), function (Builder $builder, array $categories) {
                $builder->join('category_spell', 'category_spell.spell_id', 'spells.id')
                    ->whereIn('category_id', $categories);
            })
            ->when($request->input('schools'), function (Builder $builder, array $schools) {
                $builder->whereIn('school_id', $schools);
            })
            ->when($request->input('tags'), function (Builder $builder, array $tags) {
                $builder->join('spell_tag', 'spell_tag.spell_id', 'spells.id')
                    ->whereIn('spell_tag.tag_id', $tags);
            })
            ->when($request->input('level'), function (Builder $builder, array $level) {
                $builder->join('levels', 'levels.id', 'spells.level_id')
                    ->whereBetween('levels.level_name', $level);
            })
            ->when($request->input('is_rituel'), function (Builder $builder, string $isRituel) {
                if ($isRituel !== 'both') {
                    $builder->where('is_rituel', (boolean) $isRituel);
                }
            })
            ->orderBy('name')
            ->paginate(20)
            ->withQueryString();

        return Inertia::render('Spell/SpellIndex', [
            'spells' => $spells,
            'schools' => School::all()->map(function (School $school) {
                return ['value' => $school->getKey(), 'label' => $school->name];
            }),
            'categories' => Category::all()->map(function (Category $category) {
                return ['value' => $category->getKey(), 'label' => $category->name];
            }),
            'tags' => Tag::all()->map(function (Tag $tag) {
                return ['value' => $tag->getKey(), 'label' => $tag->name];
            }),
            'filters' => $request->input()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }


    public function show(Spell $spell)
    {
        return Inertia::render('Spell/SpellShow', [
            'spell' => $spell->load('level', 'school', 'categories', 'tags')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Spell $spell
     * @return void
     */
    public function edit(Spell $spell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Spell $spell
     * @return void
     */
    public function update(Request $request, Spell $spell)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Spell $spell
     * @return void
     */
    public function destroy(Spell $spell)
    {
        //
    }
}
