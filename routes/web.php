<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', 'PageController@index');
Route::get('/ProfessorsList', 'PageController@ProfessorsList')->name('ProfessorsList');
Route::get('/ProfessorResume/{id}', 'PageController@ProfessorResume');
Route::get('/show_users', 'PageController@show_users');

Auth::routes([
    'reset' => false,
    'verify' => false,
    'register' => false,
]);

Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware('auth');

Route::get('/verify', 'PhoneVerifyController@verify');
Route::post('/verify', 'PhoneVerifyController@verifySubmit')->name('verify.submit');

/*==============================================
        Resumes Routes
==============================================*/

Route::get('/resumes/{id}', 'ResumesController@index')->name('resumes.show')->middleware('role:admin|professor');
Route::get('/resumes/fetch_data/{pro_id}/{id}', 'ResumesController@fetch_data')->middleware('role:admin|professor');
Route::get('/resumes/getOrientation/{id}', 'ResumesController@getOrientation')->middleware('role:admin|professor');
Route::post('/resumes/StoreEducationHistory', 'ResumesController@StoreEducationHistory')->name('resumes.StoreEducationHistory')->middleware('role:admin|professor');
Route::post('/resumes/StoreEducationHistory', 'ResumesController@StoreProfessorEducationHistory')->name('resumes.StoreProfessorEducationHistory')->middleware('role:admin');
Route::get('/fetch_eh_data/{pro_id}', 'ResumesController@fetch_eh_data')->name('resumes.fetch_eh_data')->middleware('role:admin|professor');
Route::get('/GetProfessorHistoryRecord/{id}', 'ResumesController@GetProfessorHistoryRecord')->name('resumes.GetProfessorHistoryRecord')->middleware('role:admin');
Route::post('/resumes/delete_eh_data', 'ResumesController@delete_eh_data')->name('resumes.delete_eh_data')->middleware('role:admin');
Route::post('/resumes/add_data/{pro_id}', 'ResumesController@add_data')->name('resumes.add_data')->middleware('role:admin|professor');
Route::post('/resumes/update_data', 'ResumesController@update_data')->name('resumes.update_data')->middleware('role:admin|professor');
Route::post('/resumes/delete_data', 'ResumesController@delete_data')->name('resumes.delete_data')->middleware('role:admin|professor');

/*==============================================
        Management Routes
==============================================*/

Route::group(['middleware' => ['auth', 'role:admin|professor'], 'prefix' => 'management'], function () {

    Route::get('members/ProfessorsList', 'ManagementController@ProfessorsList')->name('management.ProfessorsList');
    Route::get('members/ImportProfessorsInfoForm', 'ManagementController@ImportProfessorsInfoForm')->name('management.ImportProfessorsInfoForm');
    Route::post('members/ImportProfessorsInfo', 'ManagementController@ImportProfessorsInfo')->name('management.ImportProfessorsInfo');
    Route::get('ProfessorDetailsEditForm/{id}', 'ManagementController@ProfessorDetailsEditForm')->name('management.professor_edit_form');
    Route::get('ManagementProfessorResume/{user_id}/{id}', 'ManagementController@ManagementProfessorResume')->name('management.professor_edit_resumes');
    Route::put('ProfessorDetailsUpdate/{id}', 'ManagementController@ProfessorDetailsUpdate')->name('management.professor_update');

    Route::get('AddProfessorForm', 'ManagementController@AddProfessorForm')->name('management.Add_Professor_Form');
    Route::post('AddProfessor', 'ManagementController@AddProfessor')->name('management.Add_Professor');

    Route::get('ImportProfessorResumesForm/{pro_id}', 'ManagementController@ImportProfessorResumesForm')->name('management.ImportProfessorResumesForm');
    Route::post('ImportProfessorResumes', 'ManagementController@ImportProfessorResumes')->name('management.ImportProfessorResumes');

    /*==============================================
        Alumni Route
    ==============================================*/

    //seminary
    Route::get('/seminary/index','SeminariesController@index')->name('seminary.index');

    //seminary_grade
    Route::get('alumni/seminary_grade','SeminaryGradesController@index')->name('seminary_grade.index');
    Route::get('alumni/seminary_grade/create','SeminaryGradesController@create')->name('seminary_grade.create');
    Route::post('ر/seminary_grade/store','SeminaryGradesController@store')->name('seminary_grade.store');
    Route::get('alumni/seminary_grade/detail/{seminaryGrade}','SeminaryGradesController@show')->name('seminary_grade.detail');
    Route::get('ر/seminary_grade/delete/{seminaryGrade}','SeminaryGradesController@destroy')->name('seminary_grade.delete');
    Route::get('alumni/seminary_grade/edit/{seminaryGrade}','SeminaryGradesController@edit')->name('seminary_grade.edit');
    Route::patch('alumni/seminary_grade/update/{seminaryGrade}','SeminaryGradesController@update')->name('seminary_grade.update');

    ///seminary_academic_degree
    Route::get('alumni/seminary_academic_degree','SeminaryAcademicDegreesController@index')->name('seminary_academic_degree.index');
    Route::get('alumni/seminary_academic_degree/create','SeminaryAcademicDegreesController@create')->name('seminary_academic_degree.create');
    Route::post('alumni/seminary_academic_degree/store','SeminaryAcademicDegreesController@store')->name('seminary_academic_degree.store');
    Route::get('alumni/seminary_academic_degree/detail/{seminaryAcademicDegree}','SeminaryAcademicDegreesController@show')->name('seminary_academic_degree.detail');
    Route::get('alumni/seminary_academic_degree/delete/{seminaryAcademicDegree}','SeminaryAcademicDegreesController@destroy')->name('seminary_academic_degree.delete');
    Route::get('alumni/seminary_academic_degree/edit/{seminaryAcademicDegree}','SeminaryAcademicDegreesController@edit')->name('seminary_academic_degree.edit');
    Route::patch('alumni/seminary_academic_degree/update/{seminaryAcademicDegree}','SeminaryAcademicDegreesController@update')->name('seminary_academic_degree.update');

    ///seminary_field_of_study
    Route::get('alumni/seminary_field_of_study','SeminaryFieldOfStudiesController@index')->name('seminary_field_of_study.index');
    Route::get('alumni/seminary_field_of_study/create','SeminaryFieldOfStudiesController@create')->name('seminary_field_of_study.create');
    Route::post('alumni/seminary_field_of_study/store','SeminaryFieldOfStudiesController@store')->name('seminary_field_of_study.store');
    Route::get('alumni/seminary_field_of_study/detail/{seminaryFieldOfStudy}','SeminaryFieldOfStudiesController@show')->name('seminary_field_of_study.detail');
    Route::get('alumni/seminary_field_of_study/delete/{seminaryFieldOfStudy}','SeminaryFieldOfStudiesController@destroy')->name('seminary_field_of_study.delete');
    Route::get('alumni/seminary_field_of_study/edit/{seminaryFieldOfStudy}','SeminaryFieldOfStudiesController@edit')->name('seminary_field_of_study.edit');
    Route::patch('alumni/seminary_field_of_study/update/{seminaryFieldOfStudy}','SeminaryFieldOfStudiesController@update')->name('seminary_field_of_study.update');

    ///lesson
    Route::get('alumni/lesson','LessonsController@index')->name('lesson.index');
    Route::get('alumni/lesson/create','LessonsController@create')->name('lesson.create');
    Route::post('alumni/lesson/store','LessonsController@store')->name('lesson.store');
    Route::get('alumni/lesson/detail/{lesson}','LessonsController@show')->name('lesson.detail');
    Route::get('alumni/lesson/delete/{lesson}','LessonsController@destroy')->name('lesson.delete');
    Route::get('alumni/lesson/edit/{lesson}','LessonsController@edit')->name('lesson.edit');
    Route::patch('alumni/lesson/update/{lesson}','LessonsController@update')->name('lesson.update');

    //country
    Route::get('alumni/country','CountriesController@index')->name('country.index');
    Route::get('alumni/country/create','CountriesController@create')->name('country.create');
    Route::post('alumni/country/store','CountriesController@store')->name('country.store');
    Route::get('alumni/country/detail/{country}','CountriesController@show')->name('country.detail');
    Route::get('alumni/country/delete/{country}','CountriesController@destroy')->name('country.delete');
    Route::get('alumni/country/edit/{country}','CountriesController@edit')->name('country.edit');
    Route::patch('alumni/country/update/{country}','CountriesController@update')->name('country.update');

    //province
    Route::get('alumni/province','ProvincesController@index')->name('province.index');
    Route::get('alumni/province/create','ProvincesController@create')->name('province.create');
    Route::post('alumni/province/store','ProvincesController@store')->name('province.store');
    Route::get('alumni/province/detail/{province}','ProvincesController@show')->name('province.detail');
    Route::get('alumni/province/delete/{province}','ProvincesController@destroy')->name('province.delete');
    Route::get('alumni/province/edit/{province}','ProvincesController@edit')->name('province.edit');
    Route::patch('alumni/province/update/{province}','ProvincesController@update')->name('province.update');

    //city
    Route::get('alumni/city','CitiesController@index')->name('city.index');
    Route::get('alumni/city/create','CitiesController@create')->name('city.create');
    Route::get('alumni/city/getProvinceList/{country}','CitiesController@getProvinceList')->name('city.getProvinceList');
    Route::post('alumni/city/store','CitiesController@store')->name('city.store');
    Route::get('alumni/city/detail/{city}','CitiesController@show')->name('city.detail');
    Route::get('alumni/city/delete/{city}','CitiesController@destroy')->name('city.delete');
    Route::get('alumni/city/edit/{city}','CitiesController@edit')->name('city.edit');
    Route::patch('alumni/city/update/{city}','CitiesController@update')->name('city.update');

    //grade
    Route::get('alumni/grade','GradesController@index')->name('grade.index');
    Route::get('alumni/grade/create','GradesController@create')->name('grade.create');
    Route::post('alumni/grade/store','GradesController@store')->name('grade.store');
    Route::get('alumni/grade/detail/{grade}','GradesController@show')->name('grade.detail');
    Route::get('alumni/grade/delete/{grade}','GradesController@destroy')->name('grade.delete');
    Route::get('alumni/grade/edit/{grade}','GradesController@edit')->name('grade.edit');
    Route::patch('alumni/grade/update/{grade}','GradesController@update')->name('grade.update');

    //field_of_study
    Route::get('alumni/field_of_study','FieldOfStudiesController@index')->name('field_of_study.index');
    Route::get('alumni/field_of_study/create','FieldOfStudiesController@create')->name('field_of_study.create');
    Route::post('alumni/field_of_study/store','FieldOfStudiesController@store')->name('field_of_study.store');
    Route::get('alumni/field_of_study/detail/{fieldOfStudy}','FieldOfStudiesController@show')->name('field_of_study.detail');
    Route::get('alumni/field_of_study/delete/{fieldOfStudy}','FieldOfStudiesController@destroy')->name('field_of_study.delete');
    Route::get('alumni/field_of_study/edit/{fieldOfStudy}','FieldOfStudiesController@edit')->name('field_of_study.edit');
    Route::patch('alumni/field_of_study/update/{fieldOfStudy}','FieldOfStudiesController@update')->name('field_of_study.update');

    //orientation
    Route::get('alumni/orientation','OrientationsController@index')->name('orientation.index');
    Route::get('alumni/orientation/create','OrientationsController@create')->name('orientation.create');
    Route::post('alumni/orientation/store','OrientationsController@store')->name('orientation.store');
    Route::get('alumni/orientation/detail/{orientation}','OrientationsController@show')->name('orientation.detail');
    Route::get('alumni/orientation/delete/{orientation}','OrientationsController@destroy')->name('orientation.delete');
    Route::get('alumni/orientation/edit/{orientation}','OrientationsController@edit')->name('orientation.edit');
    Route::patch('alumni/orientation/update/{orientation}','OrientationsController@update')->name('orientation.update');

    //religion
    Route::get('alumni/religion','ReligionsController@index')->name('religion.index');
    Route::get('alumni/religion/create','ReligionsController@create')->name('religion.create');
    Route::post('alumni/religion/store','ReligionsController@store')->name('religion.store');
    Route::get('alumni/religion/detail/{religion}','ReligionsController@show')->name('religion.detail');
    Route::get('alumni/religion/delete/{religion}','ReligionsController@destroy')->name('religion.delete');
    Route::get('alumni/religion/edit/{religion}','ReligionsController@edit')->name('religion.edit');
    Route::patch('alumni/religion/update/{religion}','ReligionsController@update')->name('religion.update');

    //marital_status
    Route::get('alumni/marital_status','MaritalStatusesController@index')->name('marital_status.index');
    Route::get('alumni/marital_status/create','MaritalStatusesController@create')->name('marital_status.create');
    Route::post('alumni/marital_status/store','MaritalStatusesController@store')->name('marital_status.store');
    Route::get('alumni/marital_status/detail/{maritalStatus}','MaritalStatusesController@show')->name('marital_status.detail');
    Route::get('alumni/marital_status/delete/{maritalStatus}','MaritalStatusesController@destroy')->name('marital_status.delete');
    Route::get('alumni/marital_status/edit/{maritalStatus}','MaritalStatusesController@edit')->name('marital_status.edit');
    Route::patch('alumni/marital_status/update/{maritalStatus}','MaritalStatusesController@update')->name('marital_status.update');

    ///training_center
    Route::get('alumni/training_center','TrainingCentersController@index')->name('training_center');
    Route::get('alumni/training_center/create','TrainingCentersController@create')->name('training_center.create');
    Route::post('alumni/training_center/store','TrainingCentersController@store')->name('training_center.store');
    Route::get('alumni/training_center/detail/{trainingCenter}','TrainingCentersController@show')->name('training_center.detail');
    Route::get('alumni/training_center/delete/{trainingCenter}','TrainingCentersController@destroy')->name('training_center.delete');
    Route::get('alumni/training_center/edit/{trainingCenter}','TrainingCentersController@edit')->name('training_center.edit');
    Route::patch('alumni/training_center/update/{trainingCenter}','TrainingCentersController@update')->name('training_center.update');

    //training_center_type
    Route::get('alumni/training_center_type','TrainingCenterTypesController@index')->name('training_center_type.index');
    Route::get('alumni/training_center_type/create','TrainingCenterTypesController@create')->name('training_center_type.create');
    Route::post('alumni/training_center_type/store','TrainingCenterTypesController@store')->name('training_center_type.store');
    Route::get('alumni/training_center_type/detail/{trainingCenterType}','TrainingCenterTypesController@show')->name('training_center_type.detail');
    Route::get('alumni/training_center_type/delete/{trainingCenterType}','TrainingCenterTypesController@destroy')->name('training_center_type.delete');
    Route::get('alumni/training_center_type/edit/{trainingCenterType}','TrainingCenterTypesController@edit')->name('training_center_type.edit');
    Route::patch('alumni/training_center_type/update/{trainingCenterType}','TrainingCenterTypesController@update')->name('training_center_type.update');

    //public_conscription_status
    Route::get('alumni/public_conscription_status','PublicConscriptionStatusesController@index')->name('public_conscription_status.index');
    Route::get('alumni/public_conscription_status/create','PublicConscriptionStatusesController@create')->name('public_conscription_status.create');
    Route::post('alumni/public_conscription_status/store','PublicConscriptionStatusesController@store')->name('public_conscription_status.store');
    Route::get('alumni/public_conscription_status/detail/{publicConscriptionStatus}','PublicConscriptionStatusesController@show')->name('public_conscription_status.detail');
    Route::get('alumni/public_conscription_status/delete/{publicConscriptionStatus}','PublicConscriptionStatusesController@destroy')->name('public_conscription_status.delete');
    Route::get('alumni/public_conscription_status/edit/{publicConscriptionStatus}','PublicConscriptionStatusesController@edit')->name('public_conscription_status.edit');
    Route::patch('alumni/public_conscription_status/update/{publicConscriptionStatus}','PublicConscriptionStatusesController@update')->name('public_conscription_status.update');

    //responsibility_type
    Route::get('alumni/responsibility_type','ResponsibilityTypesController@index')->name('responsibility_type');
    Route::get('alumni/responsibility_type/create','ResponsibilityTypesController@create')->name('responsibility_type.create');
    Route::post('alumni/responsibility_type/store','ResponsibilityTypesController@store')->name('responsibility_type.store');
    Route::get('alumni/responsibility_type/detail/{responsibilityType}','ResponsibilityTypesController@show')->name('responsibility_type.detail');
    Route::get('alumni/responsibility_type/delete/{responsibilityType}','ResponsibilityTypesController@destroy')->name('responsibility_type.delete');
    Route::get('alumni/responsibility_type/edit/{responsibilityType}','ResponsibilityTypesController@edit')->name('responsibility_type.edit');
    Route::patch('alumni/responsibility_type/update/{responsibilityType}','ResponsibilityTypesController@update')->name('responsibility_type.update');

    //advertising_record_place
    Route::get ('alumni/advertising_record_place','AdvertisingRecordPlacesController@index')->name('advertising_record_place');
    Route::get ('alumni/advertising_record_place/create','AdvertisingRecordPlacesController@create')->name('advertising_record_place.create');
    Route::post('alumni/advertising_record_place/store','AdvertisingRecordPlacesController@store')->name('advertising_record_place.store');
    Route::get ('alumni/advertising_record_place/detail/{advertisingRecordPlace}','AdvertisingRecordPlacesController@show')->name('advertising_record_place.detail');
    Route::get ('alumni/advertising_record_place/delete/{advertisingRecordPlace}','AdvertisingRecordPlacesController@destroy')->name('advertising_record_place.delete');
    Route::get ('alumni/advertising_record_place/edit/{advertisingRecordPlace}','AdvertisingRecordPlacesController@edit')->name('advertising_record_place.edit');
    Route::patch('alumni/advertising_record_place/update/{advertisingRecordPlace}','AdvertisingRecordPlacesController@update')->name('advertising_record_place.update');

    /*==============================================
                Maaref Lessons Routes
    ==============================================*/

    ///lesson_types
    Route::get('/maaref_lessons/lesson_types','LessonTypeController@index')->name('lesson_types.index');
    Route::get('/maaref_lessons/lesson_types/create','LessonTypeController@create')->name('lesson_types.create');
    Route::post('/maaref_lessons/lesson_types/store','LessonTypeController@store')->name('lesson_types.store');
    Route::get('/maaref_lessons/lesson_types/detail/{university}','LessonTypeController@show')->name('lesson_types.detail');
    Route::get('/maaref_lessons/lesson_types/delete/{university}','LessonTypeController@destroy')->name('lesson_types.delete');
    Route::get('/maaref_lessons/lesson_types/edit/{university}','LessonTypeController@edit')->name('lesson_types.edit');
    Route::patch('/maaref_lessons/lesson_types/update/{university}','LessonTypeController@update')->name('lesson_types.update');

    ///lesson_methods
    Route::get('/maaref_lessons/lesson_methods','LessonMethodController@index')->name('lesson_methods.index');
    Route::get('/maaref_lessons/lesson_methods/create','LessonMethodController@create')->name('lesson_methods.create');
    Route::post('/maaref_lessons/lesson_methods/store','LessonMethodController@store')->name('lesson_methods.store');
    Route::get('/maaref_lessons/lesson_methods/detail/{lesson_method}','LessonMethodController@show')->name('lesson_methods.detail');
    Route::get('/maaref_lessons/lesson_methods/delete/{lesson_method}','LessonMethodController@destroy')->name('lesson_methods.delete');
    Route::get('/maaref_lessons/lesson_methods/edit/{lesson_method}','LessonMethodController@edit')->name('lesson_methods.edit');
    Route::patch('/maaref_lessons/lesson_methods/update/{lesson_method}','LessonMethodController@update')->name('lesson_methods.update');

    ///lesson_genders
    Route::get('/maaref_lessons/lesson_genders','LessonGenderController@index')->name('lesson_genders.index');
    Route::get('/maaref_lessons/lesson_genders/create','LessonGenderController@create')->name('lesson_genders.create');
    Route::post('/maaref_lessons/lesson_genders/store','LessonGenderController@store')->name('lesson_genders.store');
    Route::get('/maaref_lessons/lesson_genders/detail/{lesson_gender}','LessonGenderController@show')->name('lesson_genders.detail');
    Route::get('/maaref_lessons/lesson_genders/delete/{lesson_gender}','LessonGenderController@destroy')->name('lesson_genders.delete');
    Route::get('/maaref_lessons/lesson_genders/edit/{lesson_gender}','LessonGenderController@edit')->name('lesson_genders.edit');
    Route::patch('/maaref_lessons/lesson_genders/update/{lesson_gender}','LessonGenderController@update')->name('lesson_genders.update');

    ///lessons_import
    Route::get('/maaref_lessons/LessonsImportForm','ManagementController@LessonsImportForm')->name('lessons_import.LessonsImportForm');
    Route::post('/maaref_lessons/Import','ManagementController@LessonsImport')->name('lessons_import.LessonsImport');

    ///professor_term_lessons_import
    Route::get('/professor_term_lessons/ProfessorTermLessonsImportForm','ManagementController@ProfessorTermLessonsImportForm')->name('ProfessorTermLessons.ImportForm');
    Route::post('/professor_term_lessons/Import','ManagementController@ProfessorTermLessonsImport')->name('ProfessorTermLessons.Import');

    ///professor_notification
    Route::post('/professor_notification/store','ManagementController@ProfessorNotificationStore')->name('ProfessorNotification.Store');

    ///Payments
    Route::get('/payments/paymentsCase','PaymentCaseController@index')->name('paymentsCase.index');
    Route::get('/payments/paymentsCase/create','PaymentCaseController@create')->name('paymentsCase.create');
    Route::post('/payments/paymentsCase/store','PaymentCaseController@store')->name('paymentsCase.store');
    Route::get('/payments/paymentsCase/detail/{id}','PaymentCaseController@show')->name('paymentsCase.detail');
    Route::get('/payments/paymentsCase/delete/{id}','PaymentCaseController@destroy')->name('paymentsCase.delete');
    Route::get('/payments/paymentsCase/edit/{id}','PaymentCaseController@edit')->name('paymentsCase.edit');
    Route::patch('/payments/paymentsCase/update/{id}','PaymentCaseController@update')->name('paymentsCase.update');

    Route::get('/payments/paymentsList/Report','PaymentReportsController@Report')->name('paymentsList.Report');
    Route::post('/payments/paymentsList/SearchReport','PaymentReportsController@SearchReport')->name('paymentsList.SearchReport');

});

/*==============================================
        Alumni Route
==============================================*/


//seminary_grade
/*Route::get('/seminary_grade','SeminaryGradesController@index')->name('seminary_grade.index');
Route::get('/seminary_grade/create','SeminaryGradesController@create')->name('seminary_grade.create');
Route::post('/seminary_grade/store','SeminaryGradesController@store')->name('seminary_grade.store');
Route::get('/seminary_grade/detail/{seminaryGrade}','SeminaryGradesController@show')->name('seminary_grade.detail');
Route::get('/seminary_grade/delete/{seminaryGrade}','SeminaryGradesController@destroy')->name('seminary_grade.delete');
Route::get('/seminary_grade/edit/{seminaryGrade}','SeminaryGradesController@edit')->name('seminary_grade.edit');
Route::patch('/seminary_grade/update/{seminaryGrade}','SeminaryGradesController@update')->name('seminary_grade.update');*/

///seminary_academic_degree
/*Route::get('/seminary_academic_degree','SeminaryAcademicDegreesController@index')->name('seminary_academic_degree.index');
Route::get('/seminary_academic_degree/create','SeminaryAcademicDegreesController@create')->name('seminary_academic_degree.create');
Route::post('/seminary_academic_degree/store','SeminaryAcademicDegreesController@store')->name('seminary_academic_degree.store');
Route::get('/seminary_academic_degree/detail/{seminaryAcademicDegree}','SeminaryAcademicDegreesController@show')->name('seminary_academic_degree.detail');
Route::get('/seminary_academic_degree/delete/{seminaryAcademicDegree}','SeminaryAcademicDegreesController@destroy')->name('seminary_academic_degree.delete');
Route::get('/seminary_academic_degree/edit/{seminaryAcademicDegree}','SeminaryAcademicDegreesController@edit')->name('seminary_academic_degree.edit');
Route::patch('/seminary_academic_degree/update/{seminaryAcademicDegree}','SeminaryAcademicDegreesController@update')->name('seminary_academic_degree.update');*/

///seminary_field_of_study
/*Route::get('/seminary_field_of_study','SeminaryFieldOfStudiesController@index')->name('seminary_field_of_study.index');
Route::get('/seminary_field_of_study/create','SeminaryFieldOfStudiesController@create')->name('seminary_field_of_study.create');
Route::post('/seminary_field_of_study/store','SeminaryFieldOfStudiesController@store')->name('seminary_field_of_study.store');
Route::get('/seminary_field_of_study/detail/{seminaryFieldOfStudy}','SeminaryFieldOfStudiesController@show')->name('seminary_field_of_study.detail');
Route::get('/seminary_field_of_study/delete/{seminaryFieldOfStudy}','SeminaryFieldOfStudiesController@destroy')->name('seminary_field_of_study.delete');
Route::get('/seminary_field_of_study/edit/{seminaryFieldOfStudy}','SeminaryFieldOfStudiesController@edit')->name('seminary_field_of_study.edit');
Route::patch('/seminary_field_of_study/update/{seminaryFieldOfStudy}','SeminaryFieldOfStudiesController@update')->name('seminary_field_of_study.update');*/

///training_center
/*Route::get('/training_center','TrainingCentersController@index')->name('training_center');
Route::get('/training_center/create','TrainingCentersController@create')->name('training_center.create');
Route::post('/training_center/store','TrainingCentersController@store')->name('training_center.store');
Route::get('/training_center/detail/{trainingCenter}','TrainingCentersController@show')->name('training_center.detail');
Route::get('/training_center/delete/{trainingCenter}','TrainingCentersController@destroy')->name('training_center.delete');
Route::get('/training_center/edit/{trainingCenter}','TrainingCentersController@edit')->name('training_center.edit');
Route::patch('/training_center/update/{trainingCenter}','TrainingCentersController@update')->name('training_center.update');*/

///lesson
/*Route::get('/lesson','LessonsController@index')->name('lesson.index');
Route::get('/lesson/create','LessonsController@create')->name('lesson.create');
Route::post('/lesson/store','LessonsController@store')->name('lesson.store');
Route::get('/lesson/detail/{lesson}','LessonsController@show')->name('lesson.detail');
Route::get('/lesson/delete/{lesson}','LessonsController@destroy')->name('lesson.delete');
Route::get('/lesson/edit/{lesson}','LessonsController@edit')->name('lesson.edit');
Route::patch('/lesson/update/{lesson}','LessonsController@update')->name('lesson.update');*/

//country
/*Route::get('/country','CountriesController@index')->name('country.index');
Route::get('/country/create','CountriesController@create')->name('country.create');
Route::post('/country/store','CountriesController@store')->name('country.store');
Route::get('/country/detail/{country}','CountriesController@show')->name('country.detail');
Route::get('/country/delete/{country}','CountriesController@destroy')->name('country.delete');
Route::get('/country/edit/{country}','CountriesController@edit')->name('country.edit');
Route::patch('/country/update/{country}','CountriesController@update')->name('country.update');*/

//province
/*Route::get('/province','ProvincesController@index')->name('province.index');
Route::get('/province/create','ProvincesController@create')->name('province.create');
Route::post('/province/store','ProvincesController@store')->name('province.store');
Route::get('/province/detail/{province}','ProvincesController@show')->name('province.detail');
Route::get('/province/delete/{province}','ProvincesController@destroy')->name('province.delete');
Route::get('/province/edit/{province}','ProvincesController@edit')->name('province.edit');
Route::patch('/province/update/{province}','ProvincesController@update')->name('province.update');*/

//city
/*Route::get('/city','CitiesController@index')->name('city.index');
Route::get('/city/create','CitiesController@create')->name('city.create');
Route::get('/city/getProvinceList/{country}','CitiesController@getProvinceList')->name('city.getProvinceList');
Route::post('/city/store','CitiesController@store')->name('city.store');
Route::get('/city/detail/{city}','CitiesController@show')->name('city.detail');
Route::get('/city/delete/{city}','CitiesController@destroy')->name('city.delete');
Route::get('/city/edit/{city}','CitiesController@edit')->name('city.edit');
Route::patch('/city/update/{city}','CitiesController@update')->name('city.update');*/

//grade
/*Route::get('/grade','GradesController@index')->name('grade.index');
Route::get('/grade/create','GradesController@create')->name('grade.create');
Route::post('/grade/store','GradesController@store')->name('grade.store');
Route::get('/grade/detail/{grade}','GradesController@show')->name('grade.detail');
Route::get('/grade/delete/{grade}','GradesController@destroy')->name('grade.delete');
Route::get('/grade/edit/{grade}','GradesController@edit')->name('grade.edit');
Route::patch('/grade/update/{grade}','GradesController@update')->name('grade.update');*/

//field_of_study
/*Route::get('/field_of_study','FieldOfStudiesController@index')->name('field_of_study.index');
Route::get('/field_of_study/create','FieldOfStudiesController@create')->name('field_of_study.create');
Route::post('/field_of_study/store','FieldOfStudiesController@store')->name('field_of_study.store');
Route::get('/field_of_study/detail/{fieldOfStudy}','FieldOfStudiesController@show')->name('field_of_study.detail');
Route::get('/field_of_study/delete/{fieldOfStudy}','FieldOfStudiesController@destroy')->name('field_of_study.delete');
Route::get('/field_of_study/edit/{fieldOfStudy}','FieldOfStudiesController@edit')->name('field_of_study.edit');
Route::patch('/field_of_study/update/{fieldOfStudy}','FieldOfStudiesController@update')->name('field_of_study.update');*/

//orientation
/*Route::get('/orientation','OrientationsController@index')->name('orientation.index');
Route::get('/orientation/create','OrientationsController@create')->name('orientation.create');
Route::post('/orientation/store','OrientationsController@store')->name('orientation.store');
Route::get('/orientation/detail/{orientation}','OrientationsController@show')->name('orientation.detail');
Route::get('/orientation/delete/{orientation}','OrientationsController@destroy')->name('orientation.delete');
Route::get('/orientation/edit/{orientation}','OrientationsController@edit')->name('orientation.edit');
Route::patch('/orientation/update/{orientation}','OrientationsController@update')->name('orientation.update');*/

//religion
/*Route::get('/religion','ReligionsController@index')->name('religion.index');
Route::get('/religion/create','ReligionsController@create')->name('religion.create');
Route::post('/religion/store','ReligionsController@store')->name('religion.store');
Route::get('/religion/detail/{religion}','ReligionsController@show')->name('religion.detail');
Route::get('/religion/delete/{religion}','ReligionsController@destroy')->name('religion.delete');
Route::get('/religion/edit/{religion}','ReligionsController@edit')->name('religion.edit');
Route::patch('/religion/update/{religion}','ReligionsController@update')->name('religion.update');*/

//marital_status
/*Route::get('/marital_status','MaritalStatusesController@index')->name('marital_status.index');
Route::get('/marital_status/create','MaritalStatusesController@create')->name('marital_status.create');
Route::post('/marital_status/store','MaritalStatusesController@store')->name('marital_status.store');
Route::get('/marital_status/detail/{maritalStatus}','MaritalStatusesController@show')->name('marital_status.detail');
Route::get('/marital_status/delete/{maritalStatus}','MaritalStatusesController@destroy')->name('marital_status.delete');
Route::get('/marital_status/edit/{maritalStatus}','MaritalStatusesController@edit')->name('marital_status.edit');
Route::patch('/marital_status/update/{maritalStatus}','MaritalStatusesController@update')->name('marital_status.update');*/

//training_center_type
/*Route::get('/training_center_type','TrainingCenterTypesController@index')->name('training_center_type.index');
Route::get('/training_center_type/create','TrainingCenterTypesController@create')->name('training_center_type.create');
Route::post('/training_center_type/store','TrainingCenterTypesController@store')->name('training_center_type.store');
Route::get('/training_center_type/detail/{trainingCenterType}','TrainingCenterTypesController@show')->name('training_center_type.detail');
Route::get('/training_center_type/delete/{trainingCenterType}','TrainingCenterTypesController@destroy')->name('training_center_type.delete');
Route::get('/training_center_type/edit/{trainingCenterType}','TrainingCenterTypesController@edit')->name('training_center_type.edit');
Route::patch('/training_center_type/update/{trainingCenterType}','TrainingCenterTypesController@update')->name('training_center_type.update');*/

//public_conscription_status
/*Route::get('/public_conscription_status','PublicConscriptionStatusesController@index')->name('public_conscription_status.index');
Route::get('/public_conscription_status/create','PublicConscriptionStatusesController@create')->name('public_conscription_status.create');
Route::post('/public_conscription_status/store','PublicConscriptionStatusesController@store')->name('public_conscription_status.store');
Route::get('/public_conscription_status/detail/{publicConscriptionStatus}','PublicConscriptionStatusesController@show')->name('public_conscription_status.detail');
Route::get('/public_conscription_status/delete/{publicConscriptionStatus}','PublicConscriptionStatusesController@destroy')->name('public_conscription_status.delete');
Route::get('/public_conscription_status/edit/{publicConscriptionStatus}','PublicConscriptionStatusesController@edit')->name('public_conscription_status.edit');
Route::patch('/public_conscription_status/update/{publicConscriptionStatus}','PublicConscriptionStatusesController@update')->name('public_conscription_status.update');*/

//advertising_record_place
/*Route::get('/advertising_record_place','AdvertisingRecordPlacesController@index')->name('advertising_record_place');
Route::get('/advertising_record_place/create','AdvertisingRecordPlacesController@create')->name('advertising_record_place.create');
Route::post('/advertising_record_place/store','AdvertisingRecordPlacesController@store')->name('advertising_record_place.store');
Route::get('/advertising_record_place/detail/{advertisingRecordPlace}','AdvertisingRecordPlacesController@show')->name('advertising_record_place.detail');
Route::get('/advertising_record_place/delete/{advertisingRecordPlace}','AdvertisingRecordPlacesController@destroy')->name('advertising_record_place.delete');
Route::get('/advertising_record_place/edit/{advertisingRecordPlace}','AdvertisingRecordPlacesController@edit')->name('advertising_record_place.edit');
Route::patch('/advertising_record_place/update/{advertisingRecordPlace}','AdvertisingRecordPlacesController@update')->name('advertising_record_place.update');*/

//responsibility_type
/*Route::get('/responsibility_type','ResponsibilityTypesController@index')->name('responsibility_type');
Route::get('/responsibility_type/create','ResponsibilityTypesController@create')->name('responsibility_type.create');
Route::post('/responsibility_type/store','ResponsibilityTypesController@store')->name('responsibility_type.store');
Route::get('/responsibility_type/detail/{responsibilityType}','ResponsibilityTypesController@show')->name('responsibility_type.detail');
Route::get('/responsibility_type/delete/{responsibilityType}','ResponsibilityTypesController@destroy')->name('responsibility_type.delete');
Route::get('/responsibility_type/edit/{responsibilityType}','ResponsibilityTypesController@edit')->name('responsibility_type.edit');
Route::patch('/responsibility_type/update/{responsibilityType}','ResponsibilityTypesController@update')->name('responsibility_type.update');*/

//alumni
Route::get('/alumni/index','AlumniAssociationController@index')->name('alumni_index');
Route::get('/alumni/register','AlumniAssociationController@create')->name('alumni_register');
Route::post('/alumni/store','AlumniAssociationController@store')->name('alumni_store');
Route::get('/alumni/list','AlumniAssociationController@list')->name('alumni_list');
Route::get('/alumni/detail/{alumniAssociation}','AlumniAssociationController@detail')->name('alumni_detail');

Route::get('/alumni/getCityList/{province}','AlumniAssociationController@getCityList')->name('alumni.getCityList');
Route::get('/alumni/getOrientationList/{orientation}','AlumniAssociationController@getOrientationList')->name('alumni.getOrientationList');
Route::get('/alumni/getGradeList','AlumniAssociationController@getGradeList')->name('alumni.getGradeList');
Route::get('/alumni/getTrainingCenterList/{trainingCenterTypeId}','AlumniAssociationController@getTrainingCenterList')->name('alumni.getTrainingCenterList');

Route::get('/seminary_academic_degree_history/create','SeminaryAcademicDegreeHistoriesController@create')->name('seminary_academic_degree_history.create');
Route::post('/seminary_academic_degree_history/store','SeminaryAcademicDegreeHistoriesController@store')->name('seminary_academic_degree_history.store');
Route::get('/seminary_academic_degree_history/delete/{seminaryAcademicDegreeHistory}','SeminaryAcademicDegreeHistoriesController@destroy')->name('seminary_academic_degree_history.delete');
Route::get('/seminary_academic_degree_history/edit/{seminaryAcademicDegreeHistory}','SeminaryAcademicDegreeHistoriesController@edit')->name('seminary_academic_degree_history.edit');
Route::patch('/seminary_academic_degree_history/update/{seminaryAcademicDegreeHistory}','SeminaryAcademicDegreeHistoriesController@update')->name('seminary_academic_degree_history.update');

Route::get('/college_education_history/create','CollegeEducationHistoriesController@create')->name('college_education_history.create');
Route::post('/college_education_history/store','CollegeEducationHistoriesController@store')->name('college_education_history.store');
Route::get('/college_education_history/delete/{collegeEducationHistory}','CollegeEducationHistoriesController@destroy')->name('college_education_history.delete');
Route::get('/college_education_history/edit/{collegeEducationHistory}','CollegeEducationHistoriesController@edit')->name('college_education_history.edit');
Route::patch('/college_education_history/update/{collegeEducationHistory}','CollegeEducationHistoriesController@update')->name('college_education_history.update');


Route::get('/educational_experience/create','EducationalExperiencesController@create')->name('educational_experience.create');
Route::post('/educational_experience/store','EducationalExperiencesController@store')->name('educational_experience.store');
Route::get('/educational_experience/delete/{educationalExperience}','EducationalExperiencesController@destroy')->name('educational_experience.delete');
Route::get('/educational_experience/edit/{educationalExperience}','EducationalExperiencesController@edit')->name('educational_experience.edit');
Route::patch('/educational_experience/update/{educationalExperience}','EducationalExperiencesController@update')->name('educational_experience.update');


Route::get('/research_activity_record/create','ResearchActivityRecordsController@create')->name('research_activity_record.create');
Route::post('/research_activity_record/store','ResearchActivityRecordsController@store')->name('research_activity_record.store');
Route::get('/research_activity_record/delete/{researchActivityRecord}','ResearchActivityRecordsController@destroy')->name('research_activity_record.delete');
Route::get('/research_activity_record/edit/{researchActivityRecord}','ResearchActivityRecordsController@edit')->name('research_activity_record.edit');
Route::patch('/research_activity_record/update/{researchActivityRecord}','ResearchActivityRecordsController@update')->name('research_activity_record.update');

Route::get('/advertising_record/create','AdvertisingRecordsController@create')->name('advertising_record.create');
Route::post('/advertising_record/store','AdvertisingRecordsController@store')->name('advertising_record.store');
Route::get('/advertising_record/delete/{advertisingRecord}','AdvertisingRecordsController@destroy')->name('advertising_record.delete');
Route::get('/advertising_record/edit/{advertisingRecord}','AdvertisingRecordsController@edit')->name('advertising_record.edit');
Route::patch('/advertising_record/update/{advertisingRecord}','AdvertisingRecordsController@update')->name('advertising_record.update');

Route::get('/employment_record/create','EmploymentRecordsController@create')->name('employment_record.create');
Route::post('/employment_record/store','EmploymentRecordsController@store')->name('employment_record.store');
Route::get('/employment_record/delete/{employmentRecord}','EmploymentRecordsController@destroy')->name('employment_record.delete');
Route::get('/employment_record/edit/{employmentRecord}','EmploymentRecordsController@edit')->name('employment_record.edit');
Route::patch('/employment_record/update/{employmentRecord}','EmploymentRecordsController@update')->name('employment_record.update');

Route::get('/teaching_license/create','TeachingLicensesController@create')->name('teaching_license.create');
Route::post('/teaching_license/store','TeachingLicensesController@store')->name('teaching_license.store');
Route::get('/teaching_license/delete/{teachingLicense}','TeachingLicensesController@destroy')->name('teaching_license.delete');
Route::get('/teaching_license/edit/{teachingLicense}','TeachingLicensesController@edit')->name('teaching_license.edit');
Route::patch('/teaching_license/update/{teachingLicense}','TeachingLicensesController@update')->name('teaching_license.update');

Route::get('/advertising_license/create','AdvertisingLicensesController@create')->name('advertising_license.create');
Route::post('/advertising_license/store','AdvertisingLicensesController@store')->name('advertising_license.store');
Route::get('/advertising_license/delete/{advertisingLicense}','AdvertisingLicensesController@destroy')->name('advertising_license.delete');
Route::get('/advertising_license/edit/{advertisingLicense}','AdvertisingLicensesController@edit')->name('advertising_license.edit');
Route::patch('/advertising_license/update/{advertisingLicense}','AdvertisingLicensesController@update')->name('advertising_license.update');

Route::get('/scientific_reference/create','ScientificReferencesController@create')->name('scientific_reference.create');
Route::post('/scientific_reference/store','ScientificReferencesController@store')->name('scientific_reference.store');
Route::get('/scientific_reference/delete/{scientificReference}','ScientificReferencesController@destroy')->name('scientific_reference.delete');
Route::get('/scientific_reference/edit/{scientificReference}','ScientificReferencesController@edit')->name('scientific_reference.edit');
Route::patch('/scientific_reference/update/{scientificReference}','ScientificReferencesController@update')->name('scientific_reference.update');

Route::get('/field_other_value','FieldsOtherValuesController@index')->name('field_other_value');
Route::get('/field_other_value/detail/{fieldsOtherValue}','FieldsOtherValuesController@show')->name('field_other_value.detail');
Route::get('/field_other_value/edit/{fieldsOtherValue}','FieldsOtherValuesController@edit')->name('field_other_value.edit');
Route::get('/field_other_value/reference/{fieldsOtherValue}','FieldsOtherValuesController@reference')->name('field_other_value.reference');

/*==============================================
        Admin Routes
==============================================*/

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);

});
