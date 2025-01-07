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
        $carrelli_list = DB::select('SELECT id FROM carrelli WHERE user_id = ?', [Auth::id()]);
        $carrelli_id = $carrelli_list[0]->id ?? null; 

        // Album carrelli
        $albums = DB::table('albums')
            ->join('albums_in_carrelli', 'albums.id', '=', 'albums_in_carrelli.albums_id')
            ->where('albums_in_carrelli.carrelli_id', $carrelli_id)
            ->get();

        // Corsi carrelli
        $corsi = DB::table('corsi')
            ->join('corsi_in_carrelli', 'corsi.id', '=', 'corsi_in_carrelli.corsi_id')
            ->where('corsi_in_carrelli.carrelli_id', $carrelli_id)
            ->get();

        // Gadgets carrelli
        $gadgets = DB::table('gadgets')
            ->join('gadgets_in_carrelli', 'gadgets.id', '=', 'gadgets_in_carrelli.gadgets_id')
            ->where('gadgets_in_carrelli.carrelli_id', $carrelli_id)
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
            $carrelli_list = DB::select('SELECT id FROM carrelli WHERE user_id = ?', [Auth::id()]);
            $carrelli_id = $carrelli_list[0]->id ?? null; 
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
                        ->where('carrelli_id', $carrelli_id)
                        ->delete();
                    break;

                case 'courses':
                    $deleted = DB::table('corsi_in_carrelli')
                        ->where('corsi_id', $itemId)
                        ->where('carrelli_id', $carrelli_id)
                        ->delete();
                    break;

                case 'gadgets':
                    $deleted = DB::table('gadgets_in_carrelli')
                        ->where('gadgets_id', $itemId)
                        ->where('carrelli_id', $carrelli_id)
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