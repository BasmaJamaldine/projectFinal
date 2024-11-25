<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleRequestController extends Controller
{
    /**
     * Affiche les utilisateurs ayant envoyé une demande de rôle.
     */
    public function index()
    {
        // $users = User::where('role_request_sent', true)
        //     ->where('role_request_status', 'pending')
        //     ->get();
        $users = User::all();
        return view('utilisateur', compact('users'));
    }

    /**
     * Permet à un étudiant d'envoyer une demande pour devenir coach.
     */
    public function requestRole(Request $request)
    {
        $user = Auth::user();

        if ($user->role !== 'student') {
            return back();
        }

        if ($user->role_request_sent) {
            return back();
        }

        $user->update([
            'requested_role' => true,
            'role_request_status' => 'pending',
            'role_request_sent' => true,
        ]);

        return back()->with('success', 'Votre demande pour devenir coach a été envoyée avec succès.');
    }

    /**
     * Gère l'approbation ou le rejet des demandes de rôle.
     */
    public function updateRoleRequest($userId, $status)
    {
        
        if (Auth::user()->role !== 'admin') {
            return back();
        }
    
       
        if (!in_array($status, ['approved', 'rejected'])) {
            return back();
        }
    
    
        $user = User::findOrFail($userId);
    
        if ($user->requested_role) {
         
            $user->update([
                'role' => $status === 'approved' ? 'coach' : 'student', 
                'role_request_status' => $status, 
                'requested_role' => false, 
            ]);
    
        }
    
        return back()->with('success');
    }
}
