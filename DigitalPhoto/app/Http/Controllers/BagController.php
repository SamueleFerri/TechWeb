<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BagController extends Controller
{
    /**
     * Mostra gli articoli carrelli (album, corsi, gadgets).
     *
     * @return \Illuminate\View\View
     */
    public function showBags()
    {
        // Recupera tutti gli album, corsi e gadgets che l'utente ha nei carrelli
        $userId = Auth::id();

        // Album carrelli
        $albums = DB::table('albums')
            ->join('albums_in_carrelli', 'albums.id', '=', 'albums_in_carrelli.albums_id')
            ->where('albums_in_carrelli.carrelli_id', $userId)
            ->get();

        // Corsi carrelli
        $corsi = DB::table('corsi')
            ->join('corsi_in_carrelli', 'corsi.id', '=', 'corsi_in_carrelli.corsi_id')
            ->where('corsi_in_carrelli.carrelli_id', $userId)
            ->get();

        // Gadgets carrelli
        $gadgets = DB::table('gadgets')
            ->join('gadgets_in_carrelli', 'gadgets.id', '=', 'gadgets_in_carrelli.gadgets_id')
            ->where('gadgets_in_carrelli.carrelli_id', $userId)
            ->get();

        // Passa i dati alla vista
        return view('bag', compact('albums', 'corsi', 'gadgets'));
    }

    /**
     * Rimuove un elemento dai carrelli.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeFromBags(Request $request)
    {
        try {
            $userId = Auth::id();
            $itemId = $request->input('item_id');
            $itemType = $request->input('item_type'); // album, corso, gadget

            if (!$itemId || !$itemType) {
                return response()->json(['error' => 'Dati mancanti'], 400);
            }

            $deleted = 0;

            switch ($itemType) {
                case 'albums':
                    $deleted = DB::table('albums_in_carrelli')
                        ->where('albums_id', $itemId)
                        ->where('carrelli_id', function ($query) use ($userId) {
                            $query->select('id')
                                  ->from('carrelli')
                                  ->where('user_id', $userId)
                                  ->limit(1);
                        })
                        ->delete();
                    break;

                case 'courses':
                    $deleted = DB::table('corsi_in_carrelli')
                        ->where('corsi_id', $itemId)
                        ->where('carrelli_id', $userId)
                        ->delete();
                    break;

                case 'gadgets':
                    $deleted = DB::table('gadgets_in_carrelli')
                        ->where('gadgets_id', $itemId)
                        ->where('carrelli_id', $userId)
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