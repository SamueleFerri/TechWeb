<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Mostra gli articoli preferiti (album, corsi, gadgets).
     *
     * @return \Illuminate\View\View
     */
    public function showLikes()
    {
        $preferiti_list = DB::select('SELECT id FROM preferiti WHERE user_id = ?', [Auth::id()]);
        $preferiti_id = $preferiti_list[0]->id ?? null;

        // Album preferiti
        $albums = DB::table('albums')
            ->join('albums_in_preferiti', 'albums.id', '=', 'albums_in_preferiti.albums_id')
            ->where('albums_in_preferiti.preferiti_id', $preferiti_id)
            ->get();

        // Corsi preferiti
        $corsi = DB::table('corsi')
            ->join('corsi_in_preferiti', 'corsi.id', '=', 'corsi_in_preferiti.corsi_id')
            ->where('corsi_in_preferiti.preferiti_id', $preferiti_id)
            ->get();

        // Gadgets preferiti
        $gadgets = DB::table('gadgets')
            ->join('gadgets_in_preferiti', 'gadgets.id', '=', 'gadgets_in_preferiti.gadgets_id')
            ->where('gadgets_in_preferiti.preferiti_id', $preferiti_id)
            ->get();

        // Passa i dati alla vista
        return view('likes', compact('albums', 'corsi', 'gadgets'));
    }

    /**
     * Rimuove un elemento dai preferiti.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeFromLikes(Request $request)
    {
        try {
            $preferiti_list = DB::select('SELECT id FROM preferiti WHERE user_id = ?', [Auth::id()]);
            $preferiti_id = $preferiti_list[0]->id ?? null;
            $itemId = $request->input('item_id');
            $itemType = $request->input('item_type'); // album, corso, gadget

            if (!$itemId || !$itemType) {
                return response()->json(['error' => 'Dati mancanti'], 400);
            }

            $deleted = 0;

            switch ($itemType) {
                case 'albums':
                    $deleted = DB::table('albums_in_preferiti')
                        ->where('albums_id', $itemId)
                        ->where('preferiti_id', $preferiti_id)
                        ->delete();
                    break;

                case 'courses':
                    $deleted = DB::table('corsi_in_preferiti')
                        ->where('corsi_id', $itemId)
                        ->where('preferiti_id', $preferiti_id)
                        ->delete();
                    break;

                case 'gadgets':
                    $deleted = DB::table('gadgets_in_preferiti')
                        ->where('gadgets_id', $itemId)
                        ->where('preferiti_id', $preferiti_id)
                        ->delete();
                    break;

                default:
                    return response()->json(['error' => 'Tipo di elemento non valido'], 400);
            }

            if ($deleted) {
                return response()->json(['success' => true]); // 👈 Risposta valida JSON
            } else {
                return response()->json(['error' => 'Elemento non trovato o non eliminato'], 404); // 👈 Risposta 404 valida
            }

        }catch (\Exception $e) {
            return response()->json(['error' => 'Errore di sistema: ' . $e->getMessage()], 500);
        }
    }
}