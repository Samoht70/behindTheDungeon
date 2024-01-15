<?php

namespace App\Http\Controllers;

use App\Models\Race;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ResourcesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Response
    {
        return Inertia::render('Admin/ResourceCreate', [
            'resource' => $request->input('resource'),
            'races' => $request->whenHas('with_data', function () {
                return Race::all()
                    ->map(function (Race $race) {
                        return [
                            'value' => $race->getKey(),
                            'label' => $race->name
                        ];
                    });
            })
        ]);
    }
}
