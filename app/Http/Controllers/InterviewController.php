<?php

namespace App\Http\Controllers;

use App\Interview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class InterviewController extends Controller
{
    public function index()
    {
        $f = fopen("../interview.csv", "r");
        while($line = fgetcsv($f)) {
            $interview = new Interview();
            $interview->question = $line[1];
            $interview->answer = $line[2];
            $interview->reason = $line[3];
            $interview->episode = $line[4];
            $interview->save();
            $interviews[] = $interview;
        }
        $count = DB::table('interviews')->count();
        $randomInterview = DB::table('interviews')->inRandomOrder()->first();
        // var_dump($interviews);
        return view('interviews.index', compact('count', 'randomInterview'));
        fclose($f);
    }

    public function create()
    {
        DB::table('interviews')->delete();
        $f = fopen("../interview.csv", "r");
        while($line = fgetcsv($f)) {
            $interview = new Interview();
            $interview->question = $line[1];
            $interview->answer = $line[2];
            $interview->reason = $line[3];
            $interview->episode = $line[4];
            $interview->save();
            $interviews[] = $interview;
        }
        $count = DB::table('interviews')->count();
        $randomInterview = DB::table('interviews')->inRandomOrder()->first();
        // var_dump($interviews);
        return view('interviews.index', compact('count', 'randomInterview'));
        fclose($f);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $randomInterview = DB::table('interviews')->inRandomOrder()->first();
        $count = DB::table('interviews')->count();
        return view('interviews.index', compact('count', 'randomInterview'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function show(Interview $interview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function edit(Interview $interview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interview $interview)
    {
        //
    }

    public function destroy(Interview $interview)
    {
        $interview->delete();
        $randomInterview = DB::table('interviews')->inRandomOrder()->first();
        $count = DB::table('interviews')->count();
        return view('interviews.index', compact('count', 'randomInterview'));
    }
}
