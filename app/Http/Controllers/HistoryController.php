<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\HistoryModule;
use Auth;

class HistoryController extends Controller
{
    protected $historymodule;

    public function __construct(HistoryModule $history)
    {
        $this->historymodule = $history;
    }

    public function index()
    {
    	$history = $this->historymodule->view();
        return view('history.index')->with(compact('history'));
    }
}
