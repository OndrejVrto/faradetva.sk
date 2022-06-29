<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Pgs;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\TreeService;
use App\Http\Controllers\Controller;

class StromcekController extends Controller
{
    public function __invoke(Request $request, int $layer = null, string $color = null) {
        $validated = $request->validate([
            'color' => [
                'nullable',
                'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'
            ],
            'count' => [
                'nullable',
                'integer',
                'min:3',
                'max:11'
            ],
        ]);

        if($validated != []) {
            return redirect(url(route('psg.test') . '/' . $validated['count'] . '/' . Str::after($validated['color'], '#') ));
        }

        $count = match (true) {
            is_null($layer) => rand(3, 11),
            $layer <= 3     => 3,
            $layer >= 11    => 11,
            default         => $layer,
        };

        $color = is_null($color) ? random_hex_color() : $color;

        $tree = (new TreeService($count))->print();

        return view('web.psg.index', compact('count', 'color', 'tree'));
    }
}
