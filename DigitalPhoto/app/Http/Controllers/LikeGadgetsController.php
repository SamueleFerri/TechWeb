<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikeGadgetsController extends Controller
{
    public function toggleLike(Request $request)
    {
        $preferiti_list = DB::select('SELECT id FROM preferiti WHERE user_id = ?', [Auth::id()]);
        $preferiti_id = $preferiti_list[0]->id ?? null;
        $gadgetsId = $request->input('item_id');

        // Controlla se il like esiste
        $likeExists = DB::table('gadgets_in_preferiti')
            ->where('gadgets_id', $gadgetsId)
            ->where('preferiti_id', $preferiti_id)
            ->exists();

        if ($likeExists) {
            // Se il like esiste, rimuovilo
            DB::table('gadgets_in_preferiti')
                ->where('gadgets_id', $gadgetsId)
                ->where('preferiti_id', $preferiti_id)
                ->delete();
        } else {
            // Altrimenti, aggiungilo
            DB::table('gadgets_in_preferiti')->insert([
                'gadgets_id' => $gadgetsId,
                'preferiti_id' => $preferiti_id
            ]);
        }

        return response()->json(['success' => true, 'liked' => !$likeExists]);
    }
}