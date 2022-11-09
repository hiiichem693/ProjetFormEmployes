<?php

namespace App\Http\Controllers;

use App\dao\ServiceEmploye;
use App\Exceptions\MonException;
use Exception;
use Request;

class EmployeControleur extends Controller
{
    public function listerEmployes() {
        $unEmployeService = new ServiceEmploye();
        try {
            $mesEmployes = $unEmployeService->getListeEmployes();
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
        return view('vues/pageEmploye', compact('mesEmployes'));
    }

    public function postAjouterEmploye() {
        try {
            $civilite = Request::input("civi");
            $prenom = Request::input("prenom");
            $nom = Request::input("nom");
            $pwd = Request::input("passe");
            $profil = Request::input("profil");
            $interet = Request::input("interet");
            $message = Request::input("le-message");

            $unEmployeService = new ServiceEmploye();
            $unEmployeService->ajoutEmploye($civilite, $prenom, $nom, $pwd, $profil, $interet, $message);

            return view("home");
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }

    public function modifier($id) {
        try {
            $unEmployeService = new ServiceEmploye();
            $unEmploye = $unEmployeService->getEmploye($id);
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
        return view('vues/formEmployeModifier', compact('unEmploye'));
    }

    public function postmodificationEmploye($id = null) {
        $code = $id;
        $civilite = Request::input("civilite");
        $nom = Request::input("nom");
        $prenom = Request::input("prenom");
        $pwd = Request::input("passe");
        $profil = Request::input("profil");
        $interet = Request::input("interet");
        $message = Request::input("le-message");

        try {
            $unEmployeService = new ServiceEmploye();
            $unEmployeService->modificationEmploye($id,$civilite,$prenom,$nom,$pwd,$profil,$interet,$message);
            return view('home');
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }

    public function listerEmployesRecherche() {
        $unEmployeService = new ServiceEmploye();
        try {
            $mesEmployes = $unEmployeService->getListeEmployes();
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
        return view('vues/formEmployeRechercher', compact('mesEmployes'));
    }

    public function selectEmploye(){

        $id = Request::input("cbEmplyes");

        try {
            $unEmploye = new ServiceEmploye();
            $monEmploye = $unEmploye->getEmploye($id);
            return view('vues/FormEmployeResult', compact('monEmploye'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }
}
