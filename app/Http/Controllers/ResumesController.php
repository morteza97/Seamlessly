<?php

namespace App\Http\Controllers;

use App\College_education_history;
use App\Country;
use App\FieldOfStudy;
use App\Grade;
use App\Orientation;
use App\ProfessorEducationHistory;
use App\ProfessorNotifications;
use App\ProfessorTermLessons;
use App\Resumes;
use App\ScientificGroup;
use App\Term;
use App\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class ResumesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','CheckActivity']);
    }

    public function index()
    {
        $user = Auth::user();
        $professor_info = $user->professor;

        $resumes = $user->resumes;

        $resume_count1 = 0;
        $resume_count2 = 0;
        $resume_count3 = 0;
        $resume_count4 = 0;

        foreach ($resumes as $res) {

            if ($res->activity_type_id == 1)
                $resume_count1++;
            elseif ($res->activity_type_id == 2)
                $resume_count2++;
            elseif ($res->activity_type_id == 3)
                $resume_count3++;
            elseif ($res->activity_type_id == 4)
                $resume_count4++;
        }

        $group = ScientificGroup::find($professor_info->group_id);
        $group_title = $group->title;
        $group_url = $group->url;

        $level = $user->professor->getLevel($professor_info->level_id);

        $education_history = ProfessorEducationHistory::where('user_id', Auth::id())->get();
        $term = Term::latest()->first();
        $professor_term_lessons = ProfessorTermLessons::where('user_id', Auth::id())
            ->where('term_id', $term->id)->get();

        $professor_notification = ProfessorNotifications::where('user_id', Auth::id())->get();

        return view('members.ProfessorResumes',compact('user','resume_count1', 'resume_count2','resume_count3','resume_count4',
            'group_title', 'group_url', 'level', 'education_history', 'professor_term_lessons', 'term', 'professor_notification'));
    }

    function fetch_data(Request $request, $pro_id, $id)
    {
        if($request->ajax())
        {
            $data = DB::table('resumes')->where([
                ['user_id', $pro_id],
                ['activity_type_id', $id]
            ])->orderBy('year','desc')->get();
            echo json_encode($data);
        }
    }

    /*function fetch_eh_data($id) {

            $data = College_education_history::where('user_id', $id)->get();
            $eh_data = array();
            $i = 0;
            foreach ($data as $d) {
                $eh_data[$i]['id'] = $d->id;
                $eh_data[$i]['title'] = $d->title;
                $eh_data[$i]['grade'] = $d->getGrade($d->grade_id);
                $eh_data[$i]['field_of_study'] = $d->getFieldOfStudy($d->field_of_study_id);
                $eh_data[$i]['orientation'] = $d->getOrientation($d->orientation_id);
                $eh_data[$i]['country'] = $d->getCountry($d->Country_id);
                $eh_data[$i]['university'] = $d->getUniversity($d->university_id);
                $eh_data[$i]['start_date'] = $d->getDate($d->start_date);
                $eh_data[$i]['end_date'] = $d->getDate($d->end_date);
                $i++;
            }
            echo json_encode($eh_data);

    }*/

    function fetch_eh_data($id) {

        $data = ProfessorEducationHistory::where('user_id', $id)->get();
        $eh_data = array();
        $i = 0;
        foreach ($data as $d) {
            $eh_data[$i]['id'] = $d->id;
            $eh_data[$i]['title'] = $d->title;
            $eh_data[$i]['detail'] = $d->detail;
            $i++;
        }
        echo json_encode($eh_data);

    }

    function GetProfessorHistoryRecord($id) {

        $data = ProfessorEducationHistory::find($id);
        //dd($data);
        $eh_data = array();

        $eh_data['id'] = $data->id;
        $eh_data['title'] = $data->title;
        $eh_data['detail'] = $data->detail;

        echo json_encode($eh_data);

    }

    function add_data(Request $request, $id)
    {
        if($request->ajax())
        {
            $data = array(
                'title'    =>  $request->title,
                'resource'     =>  $request->resource,
                'year'     =>  $request->year,
                'user_id'     =>  $id,
                'activity_type_id'     =>  $request->activity_type_id,
            );

            $id = DB::table('resumes')->insert($data);
            if($id > 0)
            {
                echo '<div class="alert alert-success">فعالیت با موفقیت ثبت شد.</div>';
            }
        }
    }

    function update_data(Request $request)
    {
        if($request->ajax())
        {
            $data = array(
                $request->column_name       =>  $request->column_value
            );
            DB::table('resumes')
                ->where('id', $request->id)
                ->update($data);
            echo '<div class="alert alert-success">فعالیت با موفقیت ویرایش شد.</div>';
        }
    }

    function delete_data(Request $request)
    {
        if($request->ajax())
        {
            DB::table('resumes')
                ->where('id', $request->id)
                ->delete();
            echo '<div class="alert alert-success">فعالیت با موفقیت حذف شد.</div>';
        }
    }

    function delete_eh_data(Request $request)
    {
        if($request->ajax())
        {
            DB::table('professor_education_histories')
                ->where('id', $request->id)
                ->delete();
            echo '<div class="alert alert-success">سابقه تحصیلی با موفقیت حذف شد.</div>';
        }
    }

    public function getOrientation(Request $request,$fs_id)
    {
        if($request->ajax()) {
            $orientation = Orientation::where("field_of_study_id", $fs_id)
                ->pluck("title", "id");
            return response()->json($orientation);
        }
    }

    public function StoreEducationHistory(Request $request) {
        $education_history = new College_education_history();

        $education_history->title = $request['title'];
        $education_history->user_id = $request['pro_id'];
        $education_history->grade_id = $request['grade'];
        $education_history->field_of_study_id = $request['field_of_study'];
        $education_history->orientation_id = $request['orientation'];
        $education_history->university_id = $request['university'];
        $education_history->Country_id = $request['country'];
        $education_history->start_date = $request['start_date'];
        $education_history->end_date = $request['end_date'];
        $education_history->average = 0;

        $save = $education_history->save();

        if ($save)
            echo '<div class="alert alert-success">سابقه تحصیلی با موفقیت ثبت شد.</div>';
        else
            echo '<div class="alert alert-danger">متأسفانه مشکلی در ثبت بوجود آمد لطفا دوباره سعی کنید..</div>';

    }

    public function StoreProfessorEducationHistory(Request $request) {

        if ($request->record_id)
            $education_history = ProfessorEducationHistory::find($request->record_id);
        else
            $education_history = new ProfessorEducationHistory();

        $education_history->title = $request['title'];
        $education_history->user_id = $request['pro_id'];
        $education_history->detail = $request['detail'];


        $save = $education_history->save();

        if ($save)
            echo '<div class="alert alert-success">سابقه تحصیلی با موفقیت ثبت شد.</div>';
        else
            echo '<div class="alert alert-danger">متأسفانه مشکلی در ثبت بوجود آمد لطفا دوباره سعی کنید..</div>';
    }
}
