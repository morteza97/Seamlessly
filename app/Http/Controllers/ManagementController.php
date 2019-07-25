<?php

namespace App\Http\Controllers;

use App\ActivityType;
use App\College_education_history;
use App\Country;
use App\FieldOfStudy;
use App\Gender;
use App\Grade;
use App\Imports\LessonsImport;
use App\LessonGender;
use App\LessonMethod;
use App\LessonType;
use App\MaarefLessons;
use App\MaritalStatus;
use App\Orientation;
use App\ProfessorNotifications;
use App\Professors;
use App\ProfessorTermLessons;
use App\PublicConscriptionStatus;
use App\Resumes;
use App\ScientificGroup;
use App\ScientificLevel;
use App\Term;
use App\University;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Verta;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class ManagementController extends Controller
{
    public function ProfessorsList() {

        $professors = User::whereHas('roles', function($q){
            $q->where('name', 'professor');
        })->get();

        $user = Auth::user();
        return view('members.ProfessorsListManagement', compact('user','professors'));
    }

    public function ProfessorDetailsEditForm($id) {

        $professor = User::find($id);
        $user = Auth::user();
        $professor_info = $professor->professor;
        $groups = ScientificGroup::all();
        $levels = ScientificLevel::all();
        $genders = Gender::all();
        $marital_statuses = MaritalStatus::all();
        $pc_statuses = PublicConscriptionStatus::all();
        $group_id = $professor_info->group->id;
        $level_id = $professor_info->level->id;
        $v = new Verta($professor->BirthDate);
        $BirthDate = $v->formatDate();

        return view('members.ProfessorDetailsUpdate', compact('user','professor', 'professor_info','groups', 'levels',
                         'genders', 'marital_statuses', 'pc_statuses', 'group_id', 'level_id', 'BirthDate'));
    }

    public function ProfessorDetailsUpdate(Request $request, $id) {

        $professor = User::find($id);

        $professor->FirstName = $request->FirstName;
        $professor->LastName = $request->LastName;
        $professor->NationalCode = $request->NationalCode;
        $professor->IdentityNumber = $request->IdentityNumber;
        $professor->IdentityPlace = $request->IdentityPlace;
        $professor->FatherName = $request->FatherName;
        $professor->BirthDate = $request->BirthDate_date;
        $professor->BirthPlace = $request->BirthPlace;
        $professor->phone = $request->phone;
        $professor->mobile = $request->mobile;
        $professor->email = $request->email;
        $professor->gender_id = $request->gender;
        $professor->marital_status_id = $request->marital_status;
        $professor->public_conscription_status_id = $request->pc_status;

        $professor->save();

        $professor_info = $professor->professor;

        $professor_info->group_id = $request->group;
        $professor_info->level_id = $request->level;
        $professor_info->nickname = $request->nickname;
        $professor_info->ProfessorNumber = $request->ProfessorNumber;

        $professor_info->save();

        if (isset($request->pic)) {

            request()->validate([

                'pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);

            $imageName = $professor->id.'.'.request()->pic->getClientOriginalExtension();

            request()->pic->move(public_path('images/UsersPic'), $imageName);

            $professor->pic = $imageName;
            $professor->save();
        }

        return redirect(route('management.ProfessorsList'));

    }

    public function ManagementProfessorResume($id) {
        $user = Auth::user();

        $professor = User::find($id);
        $professor_info = $professor->professor;
        $resumes = $professor->resumes;

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

        $level = $professor_info->getLevel($professor_info->level_id);

        $term = Term::latest()->first();
        $professor_term_lessons = ProfessorTermLessons::where('user_id', $id)
            ->where('term_id', $term->id)->get();

        return view('members.ManagementProfessorResume',compact('user','professor', 'resume_count1', 'resume_count2','resume_count3','resume_count4',
            'group_title', 'group_url', 'level','term' , 'professor_term_lessons'));
    }

    public function ImportProfessorsInfoForm() {
        $user = Auth::user();
        return view('members.ImportProfessorsInfoForm', compact('user'));
    }

    public function ImportProfessorsInfo(Request $request)
    {
        $request->validate([
            'professors_list' => 'required|mimes:xls,xlsx'
        ]);

        $users = Excel::toCollection(new UsersImport, $request->file('professors_list'));
        foreach ($users as $user_info) {
            foreach ($user_info as $user) {

                $professor = User::where('email', $user[14]);

                if ( $professor->exists() ) {

                    $gender = Gender::where('title', $user[4])->first();
                    $marital_status = MaritalStatus::where('title', $user[6])->first();
                    $group = ScientificGroup::where('title', $user[12])->first();
                    $level = ScientificLevel::where('title', $user[13])->first();

                    $b = explode('/', $user[7]);
                    $birth_date = Verta::getGregorian($b[0], $b[1], $b[2]);
                    $birth_date = $birth_date[0] . '-' . $birth_date[1] . '-' . $birth_date[2];

                    $professor->update([
                        'LastName' => $user[2],
                        'FirstName' => $user[3],
                        'FatherName' => $user[5],
                        'BirthDate' => $birth_date,
                        'BirthPlace' => $user[8],
                        'IdentityNumber' => $user[9],
                        'IdentityPlace' => $user[10],
                        'NationalCode' => $user[11],
                        'mobile' => $user[15],
                        'phone' => $user[16],
                        'gender_id' => $gender->id,
                        'marital_status_id' => $marital_status->id,
                    ]);

                    $professor = $professor->first();

                    $professor_info = Professors::where('user_id', $professor->id);

                    if ( $professor_info->exists() ) {

                        $professor_info->update([
                            'ProfessorNumber' => $user[0],
                            'nickname' => $user[1],
                            'group_id' => $group->id,
                            'level_id' => $level->id,
                        ]);
                    }
                }
            }
        }

        return back()->with('success', 'بروزرسانی با موفقیت انجام شد.');
    }

    public function LessonsImportForm() {
        $user = Auth::user();
        return view('maaref_lessons.LessonsImportForm', compact('user'));
    }

    public function LessonsImport(Request $request)
    {
        $request->validate([
            'lessons_list' => 'required|mimes:xls,xlsx'
        ]);

        $lessons = Excel::toCollection(new LessonsImport, $request->file('lessons_list'));
        //dd($lessons);
        $i = 1;
        foreach ($lessons as $lesson_info) {

            foreach ($lesson_info as $lesson) {

                $lesson_gender = LessonGender::where('title', $lesson[7])->first();
                $lesson_method = LessonMethod::where('title', $lesson[6])->first();
                $lesson_group = ScientificGroup::where('title', $lesson[3])->first();
                $lesson_type = LessonType::where('title', $lesson[5])->first();
                $lesson_grade = Grade::where('title', $lesson[4])->first();

                $active = $lesson[8] == 'فعال' ? 1 : 0;

                $MaarefLessons = MaarefLessons::where('lesson_number', $lesson[0]);

                //dd($lesson[3]);

                if ( $MaarefLessons->exists() ) {

                    $MaarefLessons->update([
                        'title' => $lesson[1],
                        'lesson_number' => $lesson[0],
                        'unit' => $lesson[2],
                        'active' => $active,
                        'grade_id' => $lesson_grade->id,
                        'lesson_type_id' => $lesson_type->id,
                        'lesson_method_id' => $lesson_method->id,
                        'lesson_gender_id' => $lesson_gender->id,
                        'scientific_groups_id' => $lesson_group->id,
                    ]);
                }
                else {
                    MaarefLessons::create([
                        'title' => $lesson[1],
                        'lesson_number' => $lesson[0],
                        'unit' => $lesson[2],
                        'active' => $active,
                        'grade_id' => $lesson_grade->id,
                        'lesson_type_id' => $lesson_type->id,
                        'lesson_method_id' => $lesson_method->id,
                        'lesson_gender_id' => $lesson_gender->id,
                        'scientific_groups_id' => $lesson_group->id,
                    ]);
                }
            }
        }

        return back()->with('success', 'درج و بروزرسانی با موفقیت انجام شد.');
    }

    public function ProfessorTermLessonsImportForm() {
        $user = Auth::user();
        $terms = Term::all();
        return view('maaref_lessons.ProfessorTermLessonsImportForm', compact('user','terms'));
    }

    public function ProfessorTermLessonsImport(Request $request) {
        $request->validate([
            'professor_term_lessons_list' => 'required|mimes:xls,xlsx'
        ]);

        $lessons = Excel::toCollection(new LessonsImport, $request->file('professor_term_lessons_list'));
        //dd($lessons);
        $i = 1;
        foreach ($lessons as $lesson_info) {

            foreach ($lesson_info as $lesson) {

                $user = Professors::where('ProfessorNumber', $lesson[0])->first();
                $term_id = $request->term;
                $lesson_term = MaarefLessons::where('lesson_number', $lesson[1])->first();
                if ($user) {

                    $ProfessorTermLessons = ProfessorTermLessons::where('lesson_id', $lesson_term->id)
                        ->where('user_id', $user->user_id)
                        ->where('term_id', $term_id)
                        ->where('lesson_group' ,$lesson[2])->first();

                    $test_date = null;

                    if ($lesson[7]) {
                        //dd($lesson);
                        $b = explode('.', $lesson[7]);
                        $test_date = Verta::getGregorian($b[0], $b[1], $b[2]);
                        $test_date = $test_date[0] . '-' . $test_date[1] . '-' . $test_date[2];
                    }

                    if ($ProfessorTermLessons) {
//                        dd($ProfessorTermLessons);
                        $ProfessorTermLessons->update([
                            'lesson_group' => $lesson[2],
                            'students_number' => $lesson[3],
                            'period' => $lesson[4],
                            'day' => $lesson[5],
                            'time' => $lesson[6],
                            'test_date' => $test_date,
                            'test_time' => $lesson[8],
                            'detail' => $lesson[9],
                        ]);

                    } else {

                        ProfessorTermLessons::create([
                            'user_id' => $user->user_id,
                            'term_id' => $term_id,
                            'lesson_id' => $lesson_term->id,
                            'lesson_group' => $lesson[2],
                            'students_number' => $lesson[3],
                            'period' => $lesson[4],
                            'day' => $lesson[5],
                            'time' => $lesson[6],
                            'test_date' => $test_date,
                            'test_time' => $lesson[8],
                            'detail' => $lesson[9],
                        ]);
                    }
                }
            }
        }

        return back()->with('success', 'بروزرسانی با موفقیت انجام شد.');
    }

    public function ProfessorNotificationStore(Request $request) {

        request()->validate([

           'attachment' => 'mimes:xls,xlsx,doc,docx,pdf',
            'expire_date' => 'required',
            'title' => 'required',

        ]);


        $attachment_name = null;
        if (isset($request->attachment)) {
            $attachment = $request->file('attachment');
            $attachment_name = $attachment->getClientOriginalName();
        }

        $pn = new ProfessorNotifications;
        $pn->title = $request->title;
        $pn->expire_date = $request->expire_date;
        $pn->attachment = $attachment_name;
        $pn->user_id = $request->pro_id;
        $pn->save();


        if (isset($request->attachment)) {
            $attachment = $request->file('attachment');
            $attachment->move(public_path('attachment'), $attachment->getClientOriginalName());
        }
        return back()->with('success','اطلاعیه با موفقیت درج شد.');
    }

    public function AddProfessorForm() {
        $user = Auth::user();
        $groups = ScientificGroup::all();
        $levels = ScientificLevel::all();
        $genders = Gender::all();
        $marital_statuses = MaritalStatus::all();
        $pc_statuses = PublicConscriptionStatus::all();

        return view('members.AddProfessor', compact('user','groups', 'levels', 'genders',
                        'marital_statuses', 'pc_statuses'));
    }

    public function AddProfessor(Request $request) {

        //dd($request);
        request()->validate([

            'FirstName' => 'required',
            'LastName' =>  'required',
            'username' =>  'required',
            'password' =>  'required',
            'NationalCode' =>  'required',
            'IdentityNumber' =>  'required',
            'IdentityPlace' =>  'required',
            'FatherName' =>  'required',
            'BirthDate_date' =>  'required',
            'BirthPlace' =>  'required',
            'mobile' =>  'required',
            'email' =>  'required',
            'gender' =>  'required',
            'marital_status' =>  'required',
            'pc_status' =>  'required',
            'group' =>  'required',
            'level' =>  'required',
            'ProfessorNumber' =>  'required',
            'pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'resume_file' => 'mimes:pdf',
        ]);

        $professor = new User;

        $professor->FirstName = $request->FirstName;
        $professor->LastName = $request->LastName;
        $professor->username = $request->username;
        $professor->password = bcrypt($request->password);
        $professor->NationalCode = $request->NationalCode;
        $professor->IdentityNumber = $request->IdentityNumber;
        $professor->IdentityPlace = $request->IdentityPlace;
        $professor->FatherName = $request->FatherName;
        $professor->BirthDate = $request->BirthDate_date;
        $professor->BirthPlace = $request->BirthPlace;
        $professor->phone = $request->phone;
        $professor->mobile = $request->mobile;
        $professor->email = $request->email;
        $professor->gender_id = $request->gender;
        $professor->marital_status_id = $request->marital_status;
        $professor->public_conscription_status_id = $request->pc_status;

        $professor->save();

        $professor_info = new Professors;

        $professor_info->group_id = $request->group;
        $professor_info->level_id = $request->level;
        $professor_info->nickname = $request->nickname;
        $professor_info->ProfessorNumber = $request->ProfessorNumber;
        $professor_info->user_id = $professor->id;

        $professor_info->save();

        $professor->assignRole('professor');

        if (isset($request->pic)) {

            $imageName = $professor->id.'.'.request()->pic->getClientOriginalExtension();

            request()->pic->move(public_path('images/UsersPic'), $imageName);

            $professor->pic = $imageName;
            $professor->save();
        }

        if (isset($request->resume_file)) {

            $resume_file = $professor->id.'.'.request()->resume_file->getClientOriginalExtension();

            request()->resume_file->move(public_path('resumes'), $resume_file);

            $professor_info->resume_file = $resume_file;
            $professor_info->save();
        }

        return redirect(route('management.ProfessorsList'));
    }

    public function ImportProfessorResumesForm($pro_id) {
        $user = Auth::user();
        return view('members.ImportProfessorResumesForm', compact('user', 'pro_id'));
    }

    public function ImportProfessorResumes(Request $request)
    {
        $request->validate([
            'professors_resume' => 'required|mimes:xls,xlsx'
        ]);

        $resumes = Excel::toCollection(new UsersImport, $request->file('professors_resume'));
        foreach ($resumes as $resume) {
            foreach ($resume as $field) {

                $professor = User::where('id', $request->pro_id);

                $activity_type = ActivityType::where('title', $field[0])->get();

                if ( $professor->exists() ) {
                    Resumes::create([
                        'year' => $field[1],
                        'title' => $field[2],
                        'resource' => $field[3],
                        'activity_type' => $activity_type->id
                    ]);
                }
            }
        }

        return back()->with('success', 'بروزرسانی با موفقیت انجام شد.');
    }
}
