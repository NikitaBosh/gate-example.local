<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        if ($user->can('viewAny', User::class)) {
            $items = User::paginate(7);
            return view('admin.users.index', compact('items'));
        } else {
            return redirect()->route('home')
                    ->withErrors(['msg' => 'Ошибка доступа']);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = Auth::user();
        if ($user->can('create', User::class)) {
            return view('admin.users.create');
        } else {
            return redirect()->route('admin.users.index')
                    ->withErrors(['msg' => 'Ошибка доступа']);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
        ]);
        $user->save;

        return redirect()->route('admin.users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $item = User::findOrFail($id);
        if ($user->can('view', $item)) {
            return view('admin.users.show', compact('item'));
        } else {
            return redirect()->route('admin.users.index')
                    ->withErrors(['msg' => 'Ошибка доступа']);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $item = User::findOrFail($id);
        if ($user->can('apdate', $item)) {
            return view('admin.users.edit', compact('item'));
        } else {
            return redirect()->route('admin.users.index')
                    ->withErrors(['msg' => 'Ошибка доступа']);
        }
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
        $item = User::findOrFail($id);
        $item->name = $request->name;
        $item->email = $request->email;
        $item->role = $request->role;
        if ($request->password == null) {
        $item->password = bcrypt($request->password);
        }
        $item->save();

        return redirect()->route('admin.users.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                $item = User::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.users.index');

    }
}
