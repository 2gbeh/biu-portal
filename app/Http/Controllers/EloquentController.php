<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rows = Admin::all();

        $rows = Admin::where('name', 'webmaster')->count();

        $rows = self::orderBy('id', 'desc')
            ->take($top)
            ->get();

        $rows = Admin::where('created_at', '>=', date('Y-m-d'))->get();

        $rows = Admin::all()->count();

        $rows = Admin::sum('price');

        $rows = Admin::avg('price');

        $rows = Admin::chunk(1024, function ($rows) {
            foreach ($rows as $row) {
                print_r($row);
            }
        });

        # Eloquent
        // all
        // where
        // orderBy
        // take  (limit)
        // chunk- select: users, activities, students, applicants, staff
        // lazy- update, delete
        // findorfail
        // create - insert
        // save -update
        // upsert
        // delete
        // truncate
        // Flight::destroy(1);

// Flight::destroy(1, 2, 3);

// Flight::destroy([1, 2, 3]);

// Flight::destroy(collect([1, 2, 3]));
        // SoftDeletes
        // restore
        // trashed
        // forceDelete
        // withTrashed
        // onlyTrashed
        // prune
        // event observers with closures

        $user->getOriginal('name'); // John
        $user->getOriginal(); // Array of original attributes...

        return view('index', [
            'data' => $rows,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $row = Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        return back()->withInput();
    }

    public function store_(Request $request)
    {
        //
        $row = new Admin;
        $row->name = $request->input('name');
        $row->email = $request->input('email');
        $row->password = $request->input('password');
        $row->save();

        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $row = Admin::find($id)->first();

        return view('admin.show')->with('data', $row);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $row = Admin::find($id)->first();

        return view('admin.edit')->with('data', $row);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $row = Admin::where('id', $id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $row = Admin::find($id)->first();

        $row->delete();

        return redirect('/admin');
    }

    public function destroy_(Admin $admin)
    {
        //
        $admin->delete();

        return redirect('/admin');
    }
}
