<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikeCoursesController extends Controller
{
    public function toggleLike(Request $request)
    {
        $preferiti_list = DB::select('SELECT id FROM preferiti WHERE user_id = ?', [Auth::id()]);
        $preferiti_id = $preferiti_list[0]->id ?? null;
        $coursesId = $request->input('item_id');

        // Controlla se il like esiste
        $likeExists = DB::table('corsi_in_preferiti')
            ->where('corsi_id', $coursesId)
            ->where('preferiti_id', $preferiti_id) // Supponiamo che il campo `preferiti_id` sia collegato all'utente
            ->exists();

        if ($likeExists) {
            // Se il like esiste, rimuovilo
            DB::table('corsi_in_preferiti')
                ->where('corsi_id', $coursesId)
                ->where('preferiti_id', $preferiti_id)
                ->delete();
        } else {
            // Altrimenti, aggiungilo
            DB::table('corsi_in_preferiti')->insert([
                'corsi_id' => $coursesId,
                'preferiti_id' => $preferiti_id
            ]);
        }

        return response()->json(['success' => true, 'liked' => !$likeExists]);
    }
}