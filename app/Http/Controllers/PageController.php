<?php

namespace App\Http\Controllers;

use Adldap\AdldapInterface;
use Adldap\Laravel\Facades\Adldap;
use App\College_education_history;
use App\ProfessorEducationHistory;
use App\ProfessorNotifications;
use App\ProfessorTermLessons;
use App\ScientificGroup;
use App\Term;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {

        return view('Pages.Members');
    }

    public function ProfessorsList() {

        $users = User::whereHas('roles', function($q){
            $q->where('name', 'professor');
        })->get();

        return view('Pages.ProfessorsList', compact('users'));
    }

    public function ProfessorResume($id)
    {
        $user = User::find($id);

        $resumes = $user->resumes;

        $resume1 = array();
        $resume2 = array();
        $resume3 = array();
        $resume4 = array();

        $resume_count1 = 0;
        $resume_count2 = 0;
        $resume_count3 = 0;
        $resume_count4 = 0;

        $group = ScientificGroup::find($user->professor->group_id);
        $group_title = $group->title;
        $group_url = $group->url;

        $level = $user->professor->getLevel($user->professor->level_id);

        foreach ($resumes as $res) {

            if ($res->activity_type_id == 1) {
                $resume1[] = $res;
                $resume_count1++;
            }
            elseif ($res->activity_type_id == 2) {
                $resume2[] = $res;
                $resume_count2++;
            }
            elseif ($res->activity_type_id == 3) {
                $resume3[] = $res;
                $resume_count3++;
            }
            elseif ($res->activity_type_id == 4) {
                $resume4[] = $res;
                $resume_count4++;
            }

        }

        $education_history = ProfessorEducationHistory::where('user_id', $id)->get();
        $term = Term::latest()->first();
        $professor_term_lessons = ProfessorTermLessons::where('user_id', $id)
            ->where('term_id', $term->id)->get();

        $today = date('Y-m-d');

        $professor_notification = ProfessorNotifications::where('user_id', $id)
            ->where('expire_date' ,'>=' , $today)->get();

        return view('Pages.ProfessorResume', compact('user','resume1', 'resume2', 'resume3', 'resume4','professor_term_lessons',
            'resume_count1', 'resume_count2', 'resume_count3', 'resume_count4', 'education_history','group_title', 'group_url', 'level', 'term', 'professor_notification'));
    }

    public function show_users(AdldapInterface $ldap)
    {
        /*$users = $ldap->search()->users()->paginate()->getResults();

        $i = 1;
        foreach ($users as $user) {
            echo "username " . $i . ": " . $user->getAttribute('samaccountname')[0]. "<br>";
            $i++;
        }*/

        /*$users = $ldap->search()->where('cn', '=', 'seyed morteza taheri')->get();

        dd($users);*/

        /*$credentials = [
            'username' => 'taheri',
            'password' => '372971601@SMT',
        ];

        $username = 'PortalAuthentication';
        $password = 'Portal!Auth@#';
        $username = 'taheri';
        $password = '372971601@SMT';

        if (Auth::attempt($credentials)) {
            return view('home');
        }
        return "error";*/

        $user = Adldap::search()->where('samaccountname', '=', 'tsite1')->get();

        $user->mail = 'tsite122@maaref.ac.ir';

        $user = \Adldap\Models\User::make()->user([
            'cn' => 'John Doe',
        ]);

        /*if ($user->update()) {
            dd($user);
        } else {
            return "user can not update";
        }*/

    }
}
