<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Affiche une liste paginée des utilisateurs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id', 'DESC')->paginate(5);
        return view('users.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Affiche le formulaire pour créer un nouvel utilisateur.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
    }

    /**
     * Enregistre un nouvel utilisateur dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'phone' => 'required',
            'address' => 'required',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    /**
     * Affiche les détails d'un utilisateur spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Affiche le formulaire pour modifier les informations d'un utilisateur.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Met à jour les informations d'un utilisateur dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|confirmed',
            'phone' => 'required',
            'address' => 'required',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            unset($input['password']);
        }

        $user = User::find($id);
        $user->update($input);
        $user->syncRoles($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Supprime un utilisateur spécifique de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

    public function listUsers()
    {
        $users = User::all();

        return view('admin.userliste', ['users' => $users]);
    }

    public function createUserForm()
    {
        return view('admin.create_user'); // Vue pour afficher le formulaire de création
    }

    public function storeUsers(Request $request)
{
    $user = new User();

    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->phone = $request->input('phone');
    $user->address = $request->input('address');
    $user->usertype = 'editor';

    // Hash the password before inserting
    $user->password = Hash::make($request->input('password'));

    try {
        $user->save();
        return redirect()->route('admin.userliste')->with('success', 'Utilisateur créé avec succès.');
    } catch (\Illuminate\Database\QueryException $e) {
        if ($e->errorInfo[1] == 1062) { // Error code for duplicate entry
            return redirect()->back()->withInput()->withErrors(['email' => 'L\'adresse e-mail est déjà enregistrée.']);
        }
        return redirect()->back()->withInput()->withErrors(['error' => 'Une erreur est survenue lors de la création de l\'utilisateur.']);
    }
    }

    public function countUsers()
    {
        $userCount = User::count();

        return view('layouts.dashboard', ['userCount' => $userCount]);
    }

}
