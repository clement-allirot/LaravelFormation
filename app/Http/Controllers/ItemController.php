<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item as ModelsItem;
use App\Notifications\Item as NotificationsItem;
use App\Notifications\OffersNotification;
use Illuminate\Foundation\Auth\User;


class ItemController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new ModelsItem([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
        ]);
        $item->save();
        return response()->json('Successfully added');
    }
}
