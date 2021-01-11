<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\News;
use App\Models\User;
use Doctrine\DBAL\Schema\AbstractAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();



        // если админ или супер админ
        if($user->hasRole('admin', 'superadmin')) {

            $news = News::orderBy('created_at', 'desc')->get();
            return view('admin.index', compact('news'));

        // иначе если подтвержденый юзер
        } else if($user->status === User::STATUS_ACTIVE) {

            $news = News::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
            return view('admin.index', compact('news'));

        }

        return redirect('home');


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function users()
    {
        $user = Auth::user();

        $users = User::all();

        if($user->hasRole(['admin', 'superadmin'])) {
            return view('adminPanel.users', ['users' => $users]);
        }
    }


}
