<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $provinces = [
            'Banteay Meanchey',
            'Battambang',
            'Kampong Cham',
            'Kampong Chhnang',
            'Kampong Speu',
            'Kampong Thom',
            'Kandal',
            'Kep',
            'Koh Kong',
            'Kratie',
            'Mondulkiri',
            'Oddar Meanchey',
            'Pailin',
            'Phnom Penh',
            'Preah Sihanouk',
            'Preah Vihear',
            'Prey Veng',
            'Pursat',
            'Ratanakiri',
            'Siem Reap',
            'Sihanoukville',
            'Stung Treng',
            'Takeo',
            'Tboung Khmum',
        ];

        return view('dashboard', ['provinces' => $provinces]);
    }
}
