<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikeAlbumsController extends Controller
{
    public function toggleLike(Request $request)
    {
        $preferiti_list = DB::select('SELECT id FROM preferiti WHERE user_id = ?', [Auth::id()]);
        $preferiti_id = $preferiti_list[0]->id ?? null;
        $albumId = $request->input('item_id');

        if (!$preferiti_id || !$albumId) {
            return response()->json(['success' => false, 'message' => 'Dati non validi']);
        }

        // Controlla se il like esiste
        $likeExists = DB::table('albums_in_preferiti')
            ->where('albums_id', $albumId)
            ->where('preferiti_id', $preferiti_id)
            ->exists();

        if ($likeExists) {
            // Se il like esiste, rimuovilo
            DB::table('albums_in_preferiti')
                ->where('albums_id', $albumId)
                ->where('preferiti_id', $preferiti_id)
                ->delete();
        } else {
            // Altrimenti, aggiungilo
            DB::table('albums_in_preferiti')->insert([
                'albums_id' => $albumId,
                'preferiti_id' => $preferiti_id
            ]);
        }

        return response()->json(['success' => true, 'liked' => !$likeExists]);
    }
}