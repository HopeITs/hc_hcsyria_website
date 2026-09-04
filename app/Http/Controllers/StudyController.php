<?php

namespace App\Http\Controllers;

use function Livewire\toString;

use Carbon\Carbon;
use App\Models\EducationField;
use App\Models\StudentEntry;
use Validator;
use App\Student;
use App\Gender;
use App\Religion;
use App\Success;
use App\SuccessEnglish;
use App\SuccessFrench;
use Illuminate\Support\Facades\Cache;
use App\Donor;
use App\Project;
use App\Initiative;
use App\InitiativeEnglish;
use App\InitiativeFrench;
use App\InitiativeImage;
use App\InitiativeImageRehabilitation;
use App\Place;
use App\StudyzoneCenter;
use App\SubWhatCategory;
use App\Testimony;
use App\WhatCategory;
use App\WhoCategory;
use App\User;
use File;
use App\Models\EducationDegree;
use App\Models\EducationLevel;
use App\Models\Street;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::with('roles', 'places', 'centers')->where('id', Auth::id())->get()[0];

        $statis_count = $statis_count_nouzha = $statis_count_babtouma = $statis_count_babsharqi = $statis_count_ziraa1 = $statis_count_arman = $statis_count_villat = $statis_count_mahatta = $statis_count_mashrouh = $statis_count_mouzeina = $statis_count_khrab = $statis_count_ziraa2 = $statis_count_azar = $statis_count_adawia = $statis_count_hamidiye = null;
        $places = Place::all();
        $user_places = [];
        $allplaces = [];
        foreach ($user['places'] as $i) {
            array_push($user_places, $i->id);
        }

        foreach ($places as $i) {
            array_push($allplaces, $i->id);
        }
        if ($user_places == null) {
            $user_places = $allplaces;
        }

        $user_places_string = implode(",", $user_places);
//        $all_places_string = implode(",", $allplaces);
        $centers = StudyzoneCenter::where('active', '1')->get();
        $user_centers = [];
        $allcenters = [];
        $centernames = [];
        $allcenternames = [];
        foreach ($user['centers'] as $i) {
            array_push($user_centers, $i->id);
            array_push($centernames, $i->name);
        }

        foreach ($centers as $i) {
            array_push($allcenters, $i->id);
            array_push($allcenternames, $i->name);
        }
        if ($user_centers == null) {
            $user_centers = $allcenters;
            $centernames = $allcenternames;
        }
        if($user_centers){
            $user_centers_string = implode(",", $user_centers);
        }
//        $all_places_string = implode(",", $allplaces);

        $places = Place::All();
        $students = DB::select("
SELECT DISTINCT(students.`id`)  as 'ID',
studyzonecenters.name as 'Center',
students.firstname as 'firstname',
students.fathername as 'fathername' ,
students.lastname as 'lastname' ,
places.id as 'place_id',
IF(places.name = 'Idleb', 'Idlib', places.name) as 'City',
students.DOB as 'DOB',
genders.name as 'Gender',
religions.name as 'Religion',
students.nationalnumber,
students.email ,
students.mobile ,
students.whatsapp,
students.is_employed,
students.is_student,
street.name as 'Address',
educationfield.name as 'Edu_Field',
educationlevel.name as 'Edu_Level',
students.note ,
GROUP_CONCAT(users.name) as 'Enterd_by'
from students
LEFT JOIN genders
on genders.id = students.gender_id
LEFT JOIN religions
on religions.id = students.religion_id
LEFT JOIN educationlevel
on educationlevel.id = students.educationlevel_id
LEFT JOIN educationfield
on educationfield.id = students.educationfield_id
LEFT JOIN student_entries
on student_entries.student_id = students.id
LEFT JOIN studyzonecenters
on studyzonecenters.id = student_entries.center_id
LEFT JOIN street
on street.id = students.street_id
LEFT JOIN places
on places.id = street.place_id
LEFT JOIN users
on student_entries.user_id = users.id
where street.place_id in (" . $user_places_string . ") and 1
GROUP BY students.id
");
//        if ($user->roles[0]->name === 'Admin') {
//            $studentsentry = DB::select("SELECT student_entries.id as 'ID', students.`id` as 'Student_id', student_entries.`created_at` as 'created_at', studyzonecenters.name as 'Center',
//concat(students.firstname,' ',students.fathername,' ',students.lastname) as 'Name' ,
//places.id as 'place_id',
//places.name as 'City',
//students.DOB as 'DOB',
//(YEAR(CURDATE()) - students.DOB) AS 'Age',
//genders.name as 'Gender',
//religions.name as 'Religion',
//students.nationalnumber as 'National Number',
//students.email ,
//students.mobile ,
//students.whatsapp,
//if(students.is_employed=1,'yes','no') as 'Employed',
//if(students.is_student=1,'yes','no') as 'Student',
//street.name as 'Address',
//educationfield.name as 'Edu_Field',
//educationlevel.name as 'Edu_Level',
//students.note ,
//users.name as 'Enterd_by'
//from student_entries
//LEFT JOIN students
//on students.id = student_entries.student_id
//LEFT JOIN genders
//on genders.id = students.gender_id
//LEFT JOIN religions
//on religions.id = students.religion_id
//LEFT JOIN street
//on street.id = students.street_id
//LEFT JOIN places
//on places.id = street.place_id
//LEFT JOIN educationlevel
//on educationlevel.id = students.educationlevel_id
//LEFT JOIN educationfield
//on educationfield.id = students.educationfield_id
//LEFT JOIN studyzonecenters
//on studyzonecenters.id = student_entries.center_id
//LEFT JOIN users
//on student_entries.user_id = users.id
//where street.place_id in (" . $user_places_string . ") and 1 ");
//        } else {
//            $studentsentry = DB::select("SELECT students.`id` as 'Student_id', student_entries.`created_at` as 'created_at', studyzonecenters.name as 'Center',
//concat(students.firstname,' ',students.fathername,' ',students.lastname) as 'Name' ,
//places.id as 'place_id',
//places.name as 'City',
//students.DOB as 'DOB',
//(YEAR(CURDATE()) - students.DOB) AS 'Age',
//genders.name as 'Gender',
//religions.name as 'Religion',
//students.nationalnumber as 'National Number',
//students.email ,
//students.mobile ,
//students.whatsapp,
//if(students.is_employed=1,'yes','no') as 'Employed',
//if(students.is_student=1,'yes','no') as 'Student',
//street.name as 'Address',
//educationfield.name as 'Edu_Field',
//educationlevel.name as 'Edu_Level',
//students.note ,
//users.name as 'Enterd_by'
//from student_entries
//LEFT JOIN students
//on students.id = student_entries.student_id
//LEFT JOIN genders
//on genders.id = students.gender_id
//LEFT JOIN religions
//on religions.id = students.religion_id
//LEFT JOIN street
//on street.id = students.street_id
//LEFT JOIN places
//on places.id = street.place_id
//LEFT JOIN educationlevel
//on educationlevel.id = students.educationlevel_id
//LEFT JOIN educationfield
//on educationfield.id = students.educationfield_id
//LEFT JOIN studyzonecenters
//on studyzonecenters.id = student_entries.center_id
//LEFT JOIN users
//on student_entries.user_id = users.id
//where street.place_id in (" . $user_places_string . ") and 1 ");
//        }

//        $studentsentry = DB::select("SELECT students.`id` as 'Student_id', student_entries.`created_at` as 'created_at', studyzonecenters.name as 'Center',
//concat(students.firstname,' ',students.fathername,' ',students.lastname) as 'Name' ,
//places.id as 'place_id',
//places.name as 'City',
//students.DOB as 'DOB',
//genders.name as 'Gender',
//religions.name as 'Religion',
//students.nationalnumber as 'National Number',
//students.email ,
//students.mobile ,
//students.whatsapp,
//students.is_employed as 'Employed',
//students.is_student as 'Student',
//street.name as 'Address',
//educationfield.name as 'Edu_Field',
//educationlevel.name as 'Edu_Level',
//students.note ,
//users.name as 'Enterd_by'
//from student_entries
//LEFT JOIN students
//on students.id = student_entries.student_id
//LEFT JOIN genders
//on genders.id = students.gender_id
//LEFT JOIN religions
//on religions.id = students.religion_id
//LEFT JOIN street
//on street.id = students.street_id
//LEFT JOIN places
//on places.id = street.place_id
//LEFT JOIN educationlevel
//on educationlevel.id = students.educationlevel_id
//LEFT JOIN educationfield
//on educationfield.id = students.educationfield_id
//LEFT JOIN studyzonecenters
//on studyzonecenters.id = student_entries.center_id
//LEFT JOIN users
//on student_entries.user_id = users.id
//where street.place_id in (" . $user_places_string . ") and 1 ");



        $students_count = DB::select(" select count(students.id) as 'students_count' from students LEFT JOIN street on street.id = students.street_id where street.place_id in (" . $user_places_string . ") and 1");
        $studentsentry_count = DB::select(" select count(student_id) as 'studentsentry_count' from student_entries LEFT JOIN students on students.id = student_entries.student_id LEFT JOIN street on street.id = students.street_id where street.place_id in (" . $user_places_string . ") and 1");
        $centers = StudyzoneCenter::all();

//        if($user['roles'][0]['name'] != 'Admin'){
//            if($centernames != $allcenternames){
//                if($user['places'][0]['name'] == 'Homs') {
//                    $statis_count_nouzha = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
//, COUNT(*) AS entry_count
//FROM student_entries
//JOIN students ON student_entries.student_id = students.id
//where center_id in (2)
//GROUP BY entry_date, center_id
//ORDER BY student_entries.center_id ASC;");
//
//                    $statis_count_arman = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
//, COUNT(*) AS entry_count
//FROM student_entries
//JOIN students ON student_entries.student_id = students.id
//where center_id in (3)
//GROUP BY entry_date, center_id
//ORDER BY student_entries.center_id ASC;");
//
//                    $statis_count_mahatta = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
//, COUNT(*) AS entry_count
//FROM student_entries
//JOIN students ON student_entries.student_id = students.id
//where center_id in (6)
//GROUP BY entry_date, center_id
//ORDER BY student_entries.center_id ASC;");
//
//                    $statis_count_mouzeina = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
//, COUNT(*) AS entry_count
//FROM student_entries
//JOIN students ON student_entries.student_id = students.id
//where center_id in (7)
//GROUP BY entry_date, center_id
//ORDER BY student_entries.center_id ASC;");
//
//                    $statis_count_adawia = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
//, COUNT(*) AS entry_count
//FROM student_entries
//JOIN students ON student_entries.student_id = students.id
//where center_id in (15)
//GROUP BY entry_date, center_id
//ORDER BY student_entries.center_id ASC;");
//
//                    $statis_count_hamidiye = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
//, COUNT(*) AS entry_count
//FROM student_entries
//JOIN students ON student_entries.student_id = students.id
//where center_id in (16)
//GROUP BY entry_date, center_id
//ORDER BY student_entries.center_id ASC;");
//                }
//                if($user['places'][0]['name'] == 'Damascus') {
//                    $statis_count_babtouma = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
//, COUNT(*) AS entry_count
//FROM student_entries
//JOIN students ON student_entries.student_id = students.id
//where center_id in (5)
//GROUP BY entry_date, center_id
//ORDER BY student_entries.center_id ASC;");
//
//                    $statis_count_babsharqi = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
//, COUNT(*) AS entry_count
//FROM student_entries
//JOIN students ON student_entries.student_id = students.id
//where center_id in (19)
//GROUP BY entry_date, center_id
//ORDER BY student_entries.center_id ASC;");
//                }
//                if($user['places'][0]['name'] == 'Latakia') {
//                    $statis_count_ziraa2 = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
//, COUNT(*) AS entry_count
//FROM student_entries
//JOIN students ON student_entries.student_id = students.id
//where center_id in (8)
//GROUP BY entry_date, center_id
//ORDER BY student_entries.center_id ASC;");
//
//                    $statis_count_azar = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
//, COUNT(*) AS entry_count
//FROM student_entries
//JOIN students ON student_entries.student_id = students.id
//where center_id in (12)
//GROUP BY entry_date, center_id
//ORDER BY student_entries.center_id ASC;");
//
//                    $statis_count_mashrouh = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
//, COUNT(*) AS entry_count
//FROM student_entries
//JOIN students ON student_entries.student_id = students.id
//where center_id in (13)
//GROUP BY entry_date, center_id
//ORDER BY student_entries.center_id ASC;");
//
//                    $statis_count_ziraa1 = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
//, COUNT(*) AS entry_count
//FROM student_entries
//JOIN students ON student_entries.student_id = students.id
//where center_id in (4)
//GROUP BY entry_date, center_id
//ORDER BY student_entries.center_id ASC;");
//
//                }
//                if($user['places'][0]['name'] == 'Aleppo') {
//                    $statis_count_villat = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
//, COUNT(*) AS entry_count
//FROM student_entries
//JOIN students ON student_entries.student_id = students.id
//where center_id in (14)
//GROUP BY entry_date, center_id
//ORDER BY student_entries.center_id ASC;");
//                }
//                if($user['places'][0]['name'] == 'Tartus') {
//                    $statis_count_khrab = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
//, COUNT(*) AS entry_count
//FROM student_entries
//JOIN students ON student_entries.student_id = students.id
//where center_id in (17)
//GROUP BY entry_date, center_id
//ORDER BY student_entries.center_id ASC;");
//                }
//            }
//        }
//        else {
//
//
//        }

//        if($centernames !== $allcenternames){
//            $statis_count = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
//                                              , COUNT(*) AS entry_count
//                                              FROM student_entries
//                                              JOIN students ON student_entries.student_id = students.id
//                                              where center_id in (" . $user_centers_string . ") and 1
//                                              GROUP BY entry_date, center_id
//                                              ORDER BY student_entries.center_id ASC;");
//        }

            $statis_count_babtouma = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
, COUNT(*) AS entry_count
FROM student_entries
JOIN students ON student_entries.student_id = students.id
where center_id in (5)
GROUP BY entry_date, center_id
ORDER BY student_entries.center_id ASC;");

            $statis_count_babsharqi = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
, COUNT(*) AS entry_count
FROM student_entries
JOIN students ON student_entries.student_id = students.id
where center_id in (19)
GROUP BY entry_date, center_id
ORDER BY student_entries.center_id ASC;");

            $statis_count_nouzha = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
, COUNT(*) AS entry_count
FROM student_entries
JOIN students ON student_entries.student_id = students.id
where center_id in (2)
GROUP BY entry_date, center_id
ORDER BY student_entries.center_id ASC;");

            $statis_count_arman = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
, COUNT(*) AS entry_count
FROM student_entries
JOIN students ON student_entries.student_id = students.id
where center_id in (3)
GROUP BY entry_date, center_id
ORDER BY student_entries.center_id ASC;");

            $statis_count_mahatta = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
, COUNT(*) AS entry_count
FROM student_entries
JOIN students ON student_entries.student_id = students.id
where center_id in (6)
GROUP BY entry_date, center_id
ORDER BY student_entries.center_id ASC;");

            $statis_count_mouzeina = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
, COUNT(*) AS entry_count
FROM student_entries
JOIN students ON student_entries.student_id = students.id
where center_id in (7)
GROUP BY entry_date, center_id
ORDER BY student_entries.center_id ASC;");

            $statis_count_adawia = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
, COUNT(*) AS entry_count
FROM student_entries
JOIN students ON student_entries.student_id = students.id
where center_id in (15)
GROUP BY entry_date, center_id
ORDER BY student_entries.center_id ASC;");

            $statis_count_hamidiye = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
, COUNT(*) AS entry_count
FROM student_entries
JOIN students ON student_entries.student_id = students.id
where center_id in (16)
GROUP BY entry_date, center_id
ORDER BY student_entries.center_id ASC;");

            $statis_count_villat = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
, COUNT(*) AS entry_count
FROM student_entries
JOIN students ON student_entries.student_id = students.id
where center_id in (14)
GROUP BY entry_date, center_id
ORDER BY student_entries.center_id ASC;");

            $statis_count_ziraa1 = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
, COUNT(*) AS entry_count
FROM student_entries
JOIN students ON student_entries.student_id = students.id
where center_id in (4)
GROUP BY entry_date, center_id
ORDER BY student_entries.center_id ASC;");

            $statis_count_ziraa2 = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
, COUNT(*) AS entry_count
FROM student_entries
JOIN students ON student_entries.student_id = students.id
where center_id in (8)
GROUP BY entry_date, center_id
ORDER BY student_entries.center_id ASC;");

            $statis_count_azar = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
, COUNT(*) AS entry_count
FROM student_entries
JOIN students ON student_entries.student_id = students.id
where center_id in (12)
GROUP BY entry_date, center_id
ORDER BY student_entries.center_id ASC;");

            $statis_count_mashrouh = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
, COUNT(*) AS entry_count
FROM student_entries
JOIN students ON student_entries.student_id = students.id
where center_id in (13)
GROUP BY entry_date, center_id
ORDER BY student_entries.center_id ASC;");

            $statis_count_khrab = DB::select("SELECT DATE(student_entries.created_at) AS entry_date
, COUNT(*) AS entry_count
FROM student_entries
JOIN students ON student_entries.student_id = students.id
where center_id in (17)
GROUP BY entry_date, center_id
ORDER BY student_entries.center_id ASC;");

        $statis_avg = DB::select("SELECT entry_date
, AVG(entry_count) AS avg_entry_count
FROM ( SELECT DATE(student_entries.created_at) AS entry_date
      , center_id
      , studyzonecenters.name as center
      , COUNT(*) AS entry_count
    FROM student_entries JOIN students ON student_entries.student_id = students.id
    LEFT JOIN studyzonecenters on studyzonecenters.id = student_entries.center_id
    GROUP BY entry_date, center_id ) AS subquery
GROUP BY entry_date
ORDER BY entry_date;");

        $iniStudy = Initiative::with('english', 'place')->where('what_category_id', '7')->where('online', '1')->get();
        $iniPending = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->where('what_category_id', '7')->pending()->get();
        $iniHidden = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->where('what_category_id', '7')->hiddenOnly()->get();
        $places = Place::All();
        $sucstudy = Success::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center')->where('what_category_id', '7')->where('online', '1')->get();
        $sucpending = Success::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center')->where('what_category_id', '7')->where('online', '0')->get();

        return view('new.admin.study.index', ['allplaces'=>$allplaces,'user_places'=>$user_places,'iniStudy' => $iniStudy, 'students_count' => $students_count, 'studentsentry_count' => $studentsentry_count, 'iniPending' => $iniPending, 'iniHidden' => $iniHidden, 'sucpending' => $sucpending, 'places' => $places, 'sucstudy' => $sucstudy, 'students' => $students,
//            'studentsentry' => $studentsentry,
            'centers' => $centers, 'statis_count' => $statis_count, 'statis_count_adawia' => $statis_count_adawia, 'statis_count_arman' => $statis_count_arman, 'statis_count_azar' => $statis_count_azar, 'statis_count_babtouma' => $statis_count_babtouma, 'statis_count_hamidiye' => $statis_count_hamidiye, 'statis_count_khrab' => $statis_count_khrab, 'statis_count_mahatta' => $statis_count_mahatta, 'statis_count_mashrouh' => $statis_count_mashrouh, 'statis_count_mouzeina' => $statis_count_mouzeina, 'statis_count_nouzha' => $statis_count_nouzha, 'statis_count_villat' => $statis_count_villat, 'statis_count_ziraa1' => $statis_count_ziraa1, 'statis_count_ziraa2' => $statis_count_ziraa2,'statis_count_babsharqi'=>$statis_count_babsharqi, 'centernames' => $centernames, 'statis_avg' => $statis_avg,'user_centers'=>$user_centers]);
    }

    public function students_entries()
    {
        $user = User::with('roles', 'places', 'centers')->where('id', Auth::id())->get()[0];
        $places = Place::all();
        $user_places = [];
        $allplaces = [];
        foreach ($user['places'] as $i) {
            array_push($user_places, $i->id);
        }

        foreach ($places as $i) {
            array_push($allplaces, $i->id);
        }
        if ($user_places == null) {
            $user_places = $allplaces;
        }

        $user_places_string = implode(",", $user_places);
        $centers = StudyzoneCenter::where('active', '1')->get();
        $user_centers = [];
        $allcenters = [];
        $centernames = [];
        $allcenternames = [];
        foreach ($user['centers'] as $i) {
            array_push($user_centers, $i->id);
            array_push($centernames, $i->name);
        }

        foreach ($centers as $i) {
            array_push($allcenters, $i->id);
            array_push($allcenternames, $i->name);
        }
        if ($user_centers == null) {
            $user_centers = $allcenters;
            $centernames = $allcenternames;
        }
        if($user_centers){
            $user_centers_string = implode(",", $user_centers);
        }

        if ($user->roles[0]->name === 'Admin') {
            $studentsentry = DB::select("SELECT student_entries.id as 'ID', students.`id` as 'Student_id', student_entries.`created_at` as 'created_at', studyzonecenters.name as 'Center',
concat(students.firstname,' ',students.fathername,' ',students.lastname) as 'Name' ,
places.id as 'place_id',
IF(places.name = 'Idleb', 'Idlib', places.name) as 'City',
students.DOB as 'DOB',
(YEAR(CURDATE()) - students.DOB) AS 'Age',
genders.name as 'Gender',
religions.name as 'Religion',
students.nationalnumber as 'National Number',
students.email ,
students.mobile ,
students.whatsapp,
if(students.is_employed=1,'yes','no') as 'Employed',
if(students.is_student=1,'yes','no') as 'Student',
street.name as 'Address',
educationfield.name as 'Edu_Field',
educationlevel.name as 'Edu_Level',
students.note ,
users.name as 'Enterd_by'
from student_entries
LEFT JOIN students
on students.id = student_entries.student_id
LEFT JOIN genders
on genders.id = students.gender_id
LEFT JOIN religions
on religions.id = students.religion_id
LEFT JOIN street
on street.id = students.street_id
LEFT JOIN places
on places.id = street.place_id
LEFT JOIN educationlevel
on educationlevel.id = students.educationlevel_id
LEFT JOIN educationfield
on educationfield.id = students.educationfield_id
LEFT JOIN studyzonecenters
on studyzonecenters.id = student_entries.center_id
LEFT JOIN users
on student_entries.user_id = users.id
where street.place_id in (" . $user_places_string . ") and 1 ");
        } else {
            $studentsentry = DB::select("SELECT students.`id` as 'Student_id', student_entries.`created_at` as 'created_at', studyzonecenters.name as 'Center',
concat(students.firstname,' ',students.fathername,' ',students.lastname) as 'Name' ,
places.id as 'place_id',
IF(places.name = 'Idleb', 'Idlib', places.name) as 'City',
students.DOB as 'DOB',
(YEAR(CURDATE()) - students.DOB) AS 'Age',
genders.name as 'Gender',
religions.name as 'Religion',
students.nationalnumber as 'National Number',
students.email ,
students.mobile ,
students.whatsapp,
if(students.is_employed=1,'yes','no') as 'Employed',
if(students.is_student=1,'yes','no') as 'Student',
street.name as 'Address',
educationfield.name as 'Edu_Field',
educationlevel.name as 'Edu_Level',
students.note ,
users.name as 'Enterd_by'
from student_entries
LEFT JOIN students
on students.id = student_entries.student_id
LEFT JOIN genders
on genders.id = students.gender_id
LEFT JOIN religions
on religions.id = students.religion_id
LEFT JOIN street
on street.id = students.street_id
LEFT JOIN places
on places.id = street.place_id
LEFT JOIN educationlevel
on educationlevel.id = students.educationlevel_id
LEFT JOIN educationfield
on educationfield.id = students.educationfield_id
LEFT JOIN studyzonecenters
on studyzonecenters.id = student_entries.center_id
LEFT JOIN users
on student_entries.user_id = users.id
where street.place_id in (" . $user_places_string . ") and 1 ");
        }
        $studentsentry_count = DB::select(" select count(student_id) as 'studentsentry_count' from student_entries LEFT JOIN students on students.id = student_entries.student_id LEFT JOIN street on street.id = students.street_id where street.place_id in (" . $user_places_string . ") and 1");
        $centers = StudyzoneCenter::all();

        return view('new.admin.student.entry', [
            'allplaces'=>$allplaces,
            'user_places'=>$user_places,
            'studentsentry_count' => $studentsentry_count,
            'places' => $places,
            'studentsentry' => $studentsentry,
            'centers' => $centers,
            'centernames' => $centernames,
            'user_centers'=>$user_centers
        ]);
    }

    public function studentsJSon()
    {
        $user = User::with('roles', 'places', 'centers')->where('id', Auth::id())->get()[0];
        $places = Place::all();
        $user_places = [];
        $allplaces = [];

        foreach ($user['places'] as $i) {
            array_push($user_places, $i->id);
        }

        foreach ($places as $i) {
            array_push($allplaces, $i->id);
        }
        if ($user_places == null) {
            $user_places = $allplaces;
        }

        $user_places_string = implode(",", $user_places);
        $centers = StudyzoneCenter::where('active', '1')->get();
        $user_centers = [];
        $allcenters = [];
        $centernames = [];
        $allcenternames = [];
        foreach ($user['centers'] as $i) {
            array_push($user_centers, $i->id);
            array_push($centernames, $i->name);
        }

        foreach ($centers as $i) {
            array_push($allcenters, $i->id);
            array_push($allcenternames, $i->name);
        }
        if ($user_centers == null) {
            $user_centers = $allcenters;
            $centernames = $allcenternames;
        }
        $students = DB::select("
SELECT DISTINCT(students.`id`)  as 'ID',
studyzonecenters.name as 'Center',
students.firstname as 'firstname',
students.fathername as 'fathername' ,
students.lastname as 'lastname' ,
places.id as 'place_id',
IF(places.name = 'Idleb', 'Idlib', places.name) as 'City',
students.DOB as 'DOB',
(YEAR(CURDATE()) - students.DOB) AS 'Age',
genders.name as 'Gender',
religions.name as 'Religion',
students.nationalnumber,
students.email ,
students.mobile ,
students.whatsapp,
if(students.is_employed=1,'yes','no') as 'is_employed',
if(students.is_student=1,'yes','no') as 'is_student',
street.name as 'Address',
educationfield.name as 'Edu_Field',
educationlevel.name as 'Edu_Level',
students.note ,
GROUP_CONCAT(users.name) as 'Enterd_by'
from students
LEFT JOIN genders
on genders.id = students.gender_id
LEFT JOIN religions
on religions.id = students.religion_id
LEFT JOIN educationlevel
on educationlevel.id = students.educationlevel_id
LEFT JOIN educationfield
on educationfield.id = students.educationfield_id
LEFT JOIN student_entries
on student_entries.student_id = students.id
LEFT JOIN studyzonecenters
on studyzonecenters.id = student_entries.center_id
LEFT JOIN street
on street.id = students.street_id
LEFT JOIN places
on places.id = street.place_id
LEFT JOIN users
on student_entries.user_id = users.id
where street.place_id in (" . $user_places_string . ") and 1 and student_entries.user_id = users.id
GROUP BY students.id
");

        return response()->json(['students' => $students,
            'centernames' => $centernames, 'user_centers' =>$user_centers]);
    }


    public function studentsEntriesJSon()
    {
        $user = User::with('roles', 'places', 'centers')->where('id', Auth::id())->get()[0];
        $places = Place::all();
        $user_places = [];
        $allplaces = [];

        foreach ($user['places'] as $i) {
            array_push($user_places, $i->id);
        }

        foreach ($places as $i) {
            array_push($allplaces, $i->id);
        }
        if ($user_places == null) {
            $user_places = $allplaces;
        }

        $user_places_string = implode(",", $user_places);
        $centers = StudyzoneCenter::where('active', '1')->get();
        $user_centers = [];
        $allcenters = [];
        $centernames = [];
        $allcenternames = [];
        foreach ($user['centers'] as $i) {
            array_push($user_centers, $i->id);
            array_push($centernames, $i->name);
        }

        foreach ($centers as $i) {
            array_push($allcenters, $i->id);
            array_push($allcenternames, $i->name);
        }
        if ($user_centers == null) {
            $user_centers = $allcenters;
            $centernames = $allcenternames;
        }
        if ($user->roles[0]->name === 'Admin') {
            $studentsentry = DB::select("SELECT student_entries.id as 'ID', students.`id` as 'Student_id', student_entries.`created_at` as 'created_at', studyzonecenters.name as 'Center',
concat(students.firstname,' ',students.fathername,' ',students.lastname) as 'Name' ,
places.id as 'place_id',
IF(places.name = 'Idleb', 'Idlib', places.name) as 'City',
students.DOB as 'DOB',
(YEAR(CURDATE()) - students.DOB) AS 'Age',
genders.name as 'Gender',
religions.name as 'Religion',
students.nationalnumber as 'National Number',
students.email ,
students.mobile ,
students.whatsapp,
if(students.is_employed=1,'yes','no') as 'Employed',
if(students.is_student=1,'yes','no') as 'Student',
street.name as 'Address',
educationfield.name as 'Edu_Field',
educationlevel.name as 'Edu_Level',
students.note ,
users.name as 'Enterd_by'
from student_entries
LEFT JOIN students
on students.id = student_entries.student_id
LEFT JOIN genders
on genders.id = students.gender_id
LEFT JOIN religions
on religions.id = students.religion_id
LEFT JOIN street
on street.id = students.street_id
LEFT JOIN places
on places.id = street.place_id
LEFT JOIN educationlevel
on educationlevel.id = students.educationlevel_id
LEFT JOIN educationfield
on educationfield.id = students.educationfield_id
LEFT JOIN studyzonecenters
on studyzonecenters.id = student_entries.center_id
LEFT JOIN users
on student_entries.user_id = users.id
where street.place_id in (" . $user_places_string . ") and 1 ");
        } else {
            $studentsentry = DB::select("SELECT students.`id` as 'Student_id', student_entries.`created_at` as 'created_at', studyzonecenters.name as 'Center',
concat(students.firstname,' ',students.fathername,' ',students.lastname) as 'Name' ,
places.id as 'place_id',
IF(places.name = 'Idleb', 'Idlib', places.name) as 'City',
students.DOB as 'DOB',
(YEAR(CURDATE()) - students.DOB) AS 'Age',
genders.name as 'Gender',
religions.name as 'Religion',
students.nationalnumber as 'National Number',
students.email ,
students.mobile ,
students.whatsapp,
if(students.is_employed=1,'yes','no') as 'Employed',
if(students.is_student=1,'yes','no') as 'Student',
street.name as 'Address',
educationfield.name as 'Edu_Field',
educationlevel.name as 'Edu_Level',
students.note ,
users.name as 'Enterd_by'
from student_entries
LEFT JOIN students
on students.id = student_entries.student_id
LEFT JOIN genders
on genders.id = students.gender_id
LEFT JOIN religions
on religions.id = students.religion_id
LEFT JOIN street
on street.id = students.street_id
LEFT JOIN places
on places.id = street.place_id
LEFT JOIN educationlevel
on educationlevel.id = students.educationlevel_id
LEFT JOIN educationfield
on educationfield.id = students.educationfield_id
LEFT JOIN studyzonecenters
on studyzonecenters.id = student_entries.center_id
LEFT JOIN users
on student_entries.user_id = users.id
where street.place_id in (" . $user_places_string . ") and 1 ");
        }
        return response()->json([
            'studentsentry' => $studentsentry,
            'centernames' => $centernames, 'user_centers' =>$user_centers]);
    }

    public function show($id)
    {
        if (!is_numeric($id)) {
            return view('new.errors.404');
        }
        $initiative = Initiative::with('english')->where('id', $id)->first();
        if (!isset($initiative)) {
            return view('new.errors.404');
        }
        $images = InitiativeImage::where('initiative_id', $id)->orderby('image_order')->get();
        $imagesRehabilitation = InitiativeImageRehabilitation::where('initiative_id', $id)->get();
        $testimonies = Testimony::with('english', 'french')->where('initiative_id', $id)->get();
        return view('new.admin.study.view', ['initiative' => $initiative, 'images' => $images, 'imagesRehabilitation' => $imagesRehabilitation, 'testimonies' => $testimonies,]);
    }

    public function edit($id)
    {
        $initiative = Initiative::with('english', 'donors')->where('id', $id)->first();
        $what_categories = WhatCategory::all();
        $who_categories = WhoCategory::all();
//        $study_sub_categories = SubWhatCategory::where('what_category_id', 7)->get();
        $donors = Donor::all();
        $places = Place::all();
        $centers = StudyzoneCenter::all();
        $ini_donors = [];
        foreach ($initiative['donors'] as $i) {
            array_push($ini_donors, $i->id);
        }

        return view('new.admin.study.edit', ['initiative' => $initiative, 'what_categories' => $what_categories, 'who_categories' => $who_categories, 'donors' => $donors, 'centers' => $centers, 'places' => $places,
//            'study_sub_categories' => $study_sub_categories,
            'ini_donors' => $ini_donors]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(['donors' => 'required', 'title' => 'required|max:70', 'organization' => 'max:70', 'date_string' => 'max:100', 'video' => 'max:100', 'logo' => 'max:150', 'description' => 'max:400', 'content' => 'required', 'place' => 'required', 'center' => 'required', 'who_category_id' => 'required|numeric',
//            'study_sub_category' => 'required'
        ]);

        $initiative = Initiative::find($id);
        $initiativePrev = Initiative::find($id);
        if ($request->hasFile('logo')) {
            if ($initiative->logo != '0') {
                File::delete($initiative->logo);
            }
            $imgName = (string)time();
            $iniCategory = DB::table('what_categories')->where('id', 7)->get()->pluck('name')[0];
            $path = '/images/initiatives/' . $iniCategory . '/';
            $imgExt = $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move($path, $imgName . '.' . $imgExt);
            $initiative->logo = $path . $imgName . '.' . $imgExt;
            $this->saveToLog(self::INITIATIVES, $id, 'Logo changed');
        }
        $initiative->video = $request->filled('video') ? $request->input('video') : '0';
        if ($initiative->isDirty('video')) {
            $this->saveToLogWithData(self::INITIATIVES, $id, 'Video Edited', $initiativePrev->video, $initiative->video);
        }
        if ($initiative->isDirty('donor_id')) {
            $previousDonor = Donor::find($initiativePrev->donor_id)->name;
            $newDonor = Donor::find($request->input('donor'))->name;
            $this->saveToLogWithData(self::INITIATIVES, $id, 'Donor Edited', $previousDonor, $newDonor);
        }

        $initiative->who_category_id = $request->input('who_category_id');
        if ($initiative->isDirty('who_category_id')) {
            $iniCategory = DB::table('who_categories')->where('id', $request->input('who_category_id'))->get()->pluck('name')[0];
            $iniCategoryPrev = DB::table('who_categories')->where('id', $initiativePrev->who_category_id)->get()->pluck('name')[0];
            $this->saveToLogWithData(self::INITIATIVES, $id, 'Serve category changed', $iniCategoryPrev, $iniCategory);
        }

        $initiative->place_id = $request->input('place');
        $initiative->sz_center_id = $request->input('center');
        $initiative->sub_what_category_id = 12;

        $initiative->save();
        $engInitiative = InitiativeEnglish::where('initiative_id', $id)->first();
        $engInitiativePrev = InitiativeEnglish::where('initiative_id', $id)->first();
        $engInitiative->title = $request->input('title');
        if ($engInitiative->isDirty('title')) {
            $this->saveToLogWithData(self::INITIATIVES, $id, 'Title edited', $engInitiativePrev->title, $engInitiative->title);
        }
        $engInitiative->organization = $request->filled('organization') ? $request->input('organization') : '0';
        if ($engInitiative->isDirty('organization')) {
            $this->saveToLogWithData(self::INITIATIVES, $id, 'Organization edited', $engInitiativePrev->organization, $engInitiative->organization);
        }
        $engInitiative->date_string = $request->filled('date_string') ? $request->input('date_string') : '0';
        if ($engInitiative->isDirty('date_string')) {
            $this->saveToLogWithData(self::INITIATIVES, $id, 'date edited', $engInitiativePrev->date_string, $engInitiative->date_string);
        }
        $engInitiative->description = $request->filled('description') ? $request->input('description') : '0';
        if ($engInitiative->isDirty('description')) {
            $this->saveToLogWithData(self::INITIATIVES, $id, 'description edited', $engInitiativePrev->description, $engInitiative->description);
        }
        $engInitiative->content = $request->input('content');
        if ($engInitiative->isDirty('content')) {
            $this->saveToLogWithData(self::INITIATIVES, $id, 'Content edited', $engInitiativePrev->content, $engInitiative->content);
        }
        $engInitiative->save();
        $donorsSync = $initiative->donors()->sync(array_map('intval', $request->input('donors')));
        foreach ($donorsSync['attached'] as $donor_id) {
            $this->saveToLog(self::INITIATIVES, $id, 'Donor ' . Donor::find($donor_id)->name . ' attached');
        }
        foreach ($donorsSync['detached'] as $donor_id) {
            $this->saveToLog(self::INITIATIVES, $id, 'Donor ' . Donor::find($donor_id)->name . ' detached');
        }

        return redirect('admin\home')->with('success', 'Initiative ' . $initiative->id . ' has been updated');
    }

    public function create()
    {
        $who_categories = WhoCategory::all();
        $donors = Donor::all();
        $places = Place::all();
        $centers = StudyzoneCenter::all();
        $study_sub_categories = SubWhatCategory::where('what_category_id', 7)->get();
        return view('new.admin.study.create', ['who_categories' => $who_categories, 'donors' => $donors, 'places' => $places, 'centers' => $centers, 'study_sub_categories' => $study_sub_categories]);

    }

    public function store(Request $request)
    {
        $request->validate(['donors' => 'required', 'title' => 'required|max:70', 'organization' => 'max:70', 'date_string' => 'max:100', 'video' => 'max:100', 'logo' => 'max:150', 'description' => 'max:400', 'content' => 'required', 'who_category_id' => 'required|numeric', 'place' => 'required', 'center' => 'required']);

        $initiative = new Initiative;
        if ($request->hasFile('logo')) {
            $imgName = (string)time();
            $iniCategory = DB::table('what_categories')->where('id', 7)->get()->pluck('name')[0];
            $path = '/images/initiatives/' . $iniCategory . '/' . $request->input('title') . '/';
            $imgExt = $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move($path, $imgName . '.' . $imgExt);
            $initiative->logo = $path . $imgName . '.' . $imgExt;
        }
        $initiative->video = $request->filled('video') ? $request->input('video') : '0';
        $initiative->what_category_id = 7;
        $initiative->who_category_id = $request->input('who_category_id');

        $initiative->sz_center_id = $request->input('center');
        $initiative->sub_what_category_id = 12;

        $initiative->place_id = $request->input('place');
        $initiative->save();
        $engInitiative = new InitiativeEnglish;
        $engInitiative->initiative_id = $initiative->id;
        $engInitiative->title = $request->input('title');
        $engInitiative->organization = $request->filled('organization') ? $request->input('organization') : '0';
        $engInitiative->date_string = $request->filled('date_string') ? $request->input('date_string') : '0';
        $engInitiative->description = $request->filled('description') ? $request->input('description') : '0';
        $engInitiative->content = $request->input('content');


        $engInitiative->save();
        $initiative->donors()->attach(array_map('intval', $request->input('donors')));
        $this->saveToLog(self::INITIATIVES, $initiative->id, 'Initiative Created');
        return redirect()->back()->with('success', 'Initiative ' . $initiative->id . ' has been created');
    }

    public function delete($id)
    {
        $initiative = Initiative::find($id);
        Initiative::destroy($id);
        InitiativeEnglish::where('initiative_id', $id)->delete();
        InitiativeFrench::where('initiative_id', $id)->delete();
        File::delete($initiative->logo);
        $images = InitiativeImage::where('initiative_id', $id)->get();
        InitiativeImage::where('initiative_id', $id)->delete();
        foreach ($images as $image) {
            File::delete($image->path, substr($image->path, 0, -4) . 'b.jpg');
        }
        $this->saveToLog(self::INITIATIVES, $id, 'Initiative deleted');
        return redirect()->back()->with('success', 'Initiative ' . $id . ' deleted successfully');
    }

    public function publish(Request $request)
    {
        $initiative = Initiative::find($request->input('id'));
        $initiative->online = '1';
        $initiative->hidden = 0;    // publishing always clears the hidden flag
        $initiative->save();
        return redirect('admin/home')->with('success', 'Initiative ' . $request->input('id') . ' is online');
    }

    public function unpublish(Request $request)
    {
        $initiative = Initiative::find($request->input('id'));
        $initiative->online = '0';
        $initiative->save();
        return redirect()->back()->with('success', 'Initiative ' . $request->input('id') . ' is offline');
    }

    ////////////////// Image Section /////////////////
    public function add_image($id)
    {
        $initiative = Initiative::with('whatCategory')->where('id', $id)->first();
        $images = InitiativeImage::where('initiative_id', $id)->orderby('image_order')->get();
        return view('new.admin.study.images.create', ['initiative' => $initiative, 'images' => $images]);
    }

    public function add_image_success($id)
    {
        $success = Success::with('english')->where('id', $id)->first();
        $images = Success::where('id', $id)->get();
        return view('new.admin.study.successes.images.create', ['successData' => $success, 'images' => $images]);
    }

    public function store_image(Request $request)
    {
        $request->validate(['initiative_id' => 'required|numeric', 'title' => 'required',//            'what_category_id' => 'required',
        ]);
        $validator = Validator::make($request->all(), ['small_image' => 'max:' . count($request->file('big_image')),]);
        if ($validator->fails()) {
            return redirect('/admin/initiatives/images/create/' . $request->input('initiative_id'))->withErrors('the number of small images must be the same as the number of big images')->withInput();
        }
        foreach (range(0, count($request->file('small_image')) - 1) as $i) {
            $request->validate(['small_image.' . $i => 'mimes:jpeg|max:200']);
        }
        foreach (range(0, count($request->file('big_image')) - 1) as $i) {
            $request->validate(['big_image.' . $i => 'mimes:jpeg|max:600|min:250']);
        }
        $categoryName = 7;
        $images = new \MultipleIterator();
        $images->attachIterator(new \ArrayIterator($request->file('small_image')));
        $images->attachIterator(new \ArrayIterator($request->file('big_image')));
        foreach ($images as $i => $image) {
            $imgName = (string)time() . $i[0];
            $path = 'images/initiatives/' . $categoryName . '/' . $request->input('title') . '/';
            $image[0]->move($path, $imgName . '.jpg');
            $image[1]->move($path, $imgName . 'b.jpg');
            $initiativeImage = new InitiativeImage();
            $initiativeImage->initiative_id = $request->input('initiative_id');
            $initiativeImage->path = '/'.$path. $imgName . '.jpg';
            $initiativeImage->save();
        }
        $this->saveToLog(self::INITIATIVES, $request->input('initiative_id'), count($request->file('small_image')) . ' Images stored');
        return redirect()->back()->with('success', count($request->file('small_image')) . ' Images stored');
    }

    public function store_image_success(Request $request){
        $request->validate(['image_path' => 'max:70']);

        $success = Success::find($request->input('success_id'));
        $successPrev = Success::find($request->input('success_id'));
        if ($request->hasFile('image_path')) {
            File::delete($success->image_path);
            $imgName = (string)time();
            $whoCategory = DB::table('who_categories')->where('id', $request->input('who_category_id'))->get()->pluck('name')[0];
            $path = 'images/successes/' . $whoCategory . '/';
            $request->file('image_path')->move($path, $imgName . '.jpg');
            $success->image_path = '/'.$path . $imgName . '.jpg';
            $this->saveToLog(self::SUCCESSES, $success->id, 'Image changed');
        }
        $success->save();
        return redirect()->back()->with('success', 'Success ' . $success->id . ' has been updated');
    }

    Public function delete_images(Request $request, $id)
    {
        $images = InitiativeImage::where('initiative_id', $id)->get();
        $deletedImagesCount = 0;
        foreach ($images as $img) {
            if ($request->input($img->id) == '1') {
                $deletedImagesCount++;
                $img->delete();
                File::delete($img->path);
                File::delete(substr($img->path, 0, -4) . 'b.jpg');
            }
        }
        $this->saveToLog(self::INITIATIVES, $id, $deletedImagesCount . ' Images deleted');
        return redirect('admin/study/images/' . $id)->with('success', $deletedImagesCount . ' Images deleted');
    }

    Public function delete_images_success(Request $request, $id)
    {
        $images = Success::where('id', $id)->get();
        $deletedImagesCount = 0;
        foreach ($images as $img) {
            if ($request->input($img->id) == '1') {
                $deletedImagesCount++;
                $img->delete();
                File::delete($img->path);
                File::delete(substr($img->path, 0, -4) . 'b.jpg');
            }
        }
        $this->saveToLog(self::INITIATIVES, $id, $deletedImagesCount . ' Images deleted');
        return redirect('admin/study/images/' . $id)->with('success', $deletedImagesCount . ' Images deleted');
    }


    ////////////////// Success ///////////////////////
    public function success_index()
    {
        $sucstudy = Success::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center')->where('what_category_id', '7')->where('online', '1')->get();
        $sucpending = Success::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center')->where('what_category_id', '7')->where('online', '0')->get();

        return view('new.admin.study.successes.index', ['sucstudy' => $sucstudy, 'sucpending' => $sucpending,


        ]);
    }

    public function success_create()
    {
        $microProjects = Project::with('english')->where('MPE_Done', '1')->where('MPE_Published', '1')->get();
        $what_categories = WhatCategory::all();
        $who_categories = WhoCategory::all();
        $disc_sub_categories = SubWhatCategory::where('what_category_id', 100)->get();
        $places = Place::all();
        $centers = StudyzoneCenter::all();

        return view('new.admin.study.successes.create', ['microProjects' => $microProjects, 'what_categories' => $what_categories, 'who_categories' => $who_categories, 'disc_sub_categories' => $disc_sub_categories, 'places' => $places, 'centers' => $centers,]);
    }

    public function success_store(Request $request)
    {
        $request->validate(['who_category_id' => 'required|numeric', 'image_path' => 'required|max:70', 'title' => 'required|max:100', 'text' => 'required', 'place_id' => 'required', 'center' => 'required']);

        $success = new Success();
        $imgName = (string)time();
        $whoCategory = DB::table('who_categories')->where('id', $request->input('who_category_id'))->get()->pluck('name')[0];
        $path = '/images/successes/' . $whoCategory . '/';
        $request->file('image_path')->move($path, $imgName . '.jpg');
        $success->image_path = $path . $imgName . '.jpg';

        $success->inner_image_path = '0';
        $success->inner_big_image_path = '0';

        $success->video = $request->filled('video') ? $request->input('video') : '0';
        $success->who_category_id = $request->input('who_category_id');
        $success->what_category_id = 7;


        $success->place_id = $request->input('place_id');
        $success->sz_center_id = $request->input('center');


        $success->online = 0;
        $success->save();
        $englishSuccess = new SuccessEnglish();
        $englishSuccess->success_id = $success->id;
        $englishSuccess->title = $request->input('title');
        $englishSuccess->text = $request->input('text');
        $englishSuccess->save();
        $this->saveToLog(self::SUCCESSES, $success->id, 'Success Created');
        return redirect()->back()->with('success', 'Success ' . $success->id . ' has been created');
    }

    public function success_show($id)
    {
        if (!is_numeric($id)) {
            return view('new.errors.404');
        }
        $success = Success::with('english')->where('id', $id)->first();
        if (!isset($success)) {
            return view('new.errors.404');
        }
        return view('new.admin.study.successes.view', ['success' => $success, 'language' => 'english']);
    }

    public function success_edit($id)
    {
        $success = Success::with('english')->where('id', $id)->first();
//        $microProjects = Project::with('english')
//            ->where('MPE_Done', '1')
//            ->where('MPE_Published', '1')
//            ->get();
        $who_categories = WhoCategory::all();

        $places = Place::all();
        $centers = StudyzoneCenter::all();

        return view('new.admin.study.successes.edit', ['successData' => $success, //            'microProjects' => $microProjects,
            'who_categories' => $who_categories, 'places' => $places, 'centers' => $centers,

        ]);
    }

    public function success_update(Request $request, $id)
    {
        $request->validate(['who_category_id' => 'required|numeric', 'image_path' => 'max:70', 'title' => 'required|max:100', 'text' => 'required', //            'video' => 'max:100',
            'place_id' => 'required', 'center' => 'required']);

        $success = Success::find($id);
        $successPrev = Success::find($id);
        if ($request->hasFile('image_path')) {
            File::delete($success->image_path);
            $imgName = (string)time();
            $whoCategory = DB::table('who_categories')->where('id', $request->input('who_category_id'))->get()->pluck('name')[0];
            $path = '/images/successes/' . $whoCategory . '/';
            $request->file('image_path')->move($path, $imgName . '.jpg');
            $success->image_path = $path . $imgName . '.jpg';
            $this->saveToLog(self::SUCCESSES, $success->id, 'Image changed');
        }

//        $success->video = $request->filled('video') ? $request->input('video') : '0';
//        if ($success->isDirty('video')) {
//            $this->saveToLogWithData(self::SUCCESSES, $id,'Video Edited', $successPrev->video, $success->video);
//        }
        $success->who_category_id = $request->input('who_category_id');
        if ($success->isDirty('who_category_id')) {
            $whoCategory = DB::table('who_categories')->where('id', $request->input('who_category_id'))->get()->pluck('name')[0];
            $whoCategoryPrev = DB::table('who_categories')->where('id', $successPrev->who_category_id)->get()->pluck('name')[0];
            $this->saveToLogWithData(self::SUCCESSES, $success->id, 'Who we serve category changed', $whoCategoryPrev, $whoCategory);
        }
        $success->what_category_id = 7;

        $success->place_id = $request->input('place_id');
        if ($success->isDirty('place_id')) {
            $place = DB::table('places')->where('id', $request->input('place_id'))->get()->pluck('name')[0];
            $placePrev = DB::table('places')->where('id', $successPrev->place_id)->get()->pluck('name')[0];
            $this->saveToLogWithData(self::SUCCESSES, $success->id, 'Place changed', $placePrev, $place);
        }

        $success->sz_center_id = $request->input('center');

        $success->save();
        $englishSuccess = SuccessEnglish::find($id);
        $englishSuccessPrev = SuccessEnglish::find($id);
        $englishSuccess->title = $request->input('title');
        if ($englishSuccess->isDirty('title')) {
            $this->saveToLogWithData(self::SUCCESSES, $success->id, 'Title edited', $englishSuccessPrev->title, $englishSuccess->title);
        }
        $englishSuccess->text = $request->input('text');
        if ($englishSuccess->isDirty('text')) {
            $this->saveToLogWithData(self::SUCCESSES, $success->id, 'Text edited', $englishSuccessPrev->text, $englishSuccess->text);
        }
        $englishSuccess->save();
        return redirect()->back()->with('success', 'Success ' . $success->id . ' has been updated');
    }

    public function success_destroy($id)
    {
        $success = Success::find($id);
        Success::destroy($id);
        SuccessEnglish::where('success_id', $id)->delete();
        SuccessFrench::where('success_id', $id)->delete();
        File::delete($success->image_path);
        File::delete($success->inner_image_path);
        File::delete($success->inner_big_image_path);
        $this->saveToLog(self::SUCCESSES, $success->id, 'Success deleted');
        return redirect()->back()->with('success', 'Success deleted');
    }

    public function success_online(Request $request)
    {
        $success = Success::find($request->input('id'));
        $success->online = '1';
        $success->save();
        $this->saveToLog(self::SUCCESSES, $request->input('id'), 'Made online');
        return redirect()->route('home')->with('success', 'Success ' . $request->input('id') . ' is online');
    }

    public function success_offline(Request $request)
    {
        $success = Success::find($request->input('id'));
        $success->online = '0';
        $success->save();
        $this->saveToLog(self::SUCCESSES, $request->input('id'), 'Made offline');
        return redirect()->back()->with('success', 'Success ' . $request->input('id') . ' is offline');
    }

    public function success_Englishchecked(Request $request)
    {
        $success = Success::find($request->input('id'));
        $success->english_check = '1';
        $success->timestamps = false;
        $success->save();
        $this->saveToLog(self::SUCCESSES, $request->input('id'), 'English Checked');
        return redirect()->back()->with('success', 'Success ' . $request->input('id') . ' English Checked');
    }


    /////////////////// Students //////////////////////////
    public function students_create()
    {
        $user = User::with('roles', 'places', 'centers')->where('id', Auth::id())->get()[0];
        $user_id = Auth::id();
//        $user_center = $user['centers'][0]->id;
//        return $user_center;
        $user_places = [];
        foreach ($user['places'] as $i) {
            array_push($user_places, $i->id);
        }
        $places = Place::all();
        $centers = StudyzoneCenter::all();
        if ($user_places != null) {
            $streets = Street::whereIn('place_id', $user_places)->get();
        } else $streets = Street::all();
        $genders = Gender::all();
        $religions = Religion::all();
        $educationfield = EducationField::orderby('name', 'asc')->get();
        $educationlevel = EducationLevel::all();
        $educationdegree = EducationDegree::all();
        $students = Student::all();
        return view('new.admin.student.create', ['places' => $places, 'centers' => $centers, 'genders' => $genders, 'religions' => $religions, 'educationfield' => $educationfield, 'educationlevel' => $educationlevel, 'educationdegree' => $educationdegree, 'streets' => $streets, 'user_id' => $user_id,'user' => $user, //            'user_center' => $user_center,
            'students' => $students]);
    }

    public function students_edit($id)
    {
        $user = User::with('roles', 'permissions', 'places')->where('id', Auth::id())->get()[0];
        $user_places = [];
        foreach ($user['places'] as $i) {
            array_push($user_places, $i->id);
        }
        $places = Place::all();
        $centers = StudyzoneCenter::all();
        if ($user_places != null) {
            $streets = Street::whereIn('place_id', $user_places)->get();
        } else $streets = Street::all();
        $genders = Gender::all();
        $religions = Religion::all();
        $educationfield = EducationField::orderby('name', 'asc')->get();
        $educationlevel = EducationLevel::all();
        $educationdegree = EducationDegree::all();

        $student = Student::where('id', $id)->first();
        $students = Student::all();

        return view('new.admin.student.edit', ['students' => $students, 'places' => $places, 'centers' => $centers, 'genders' => $genders, 'religions' => $religions, 'educationfield' => $educationfield, 'educationlevel' => $educationlevel, 'educationdegree' => $educationdegree, 'streets' => $streets, 'student' => $student]);
    }


    public function students_update(Request $request)
    {
        $data = $request->form;
        $validator = Validator::make($request->all(), ['row.*.firstname' => 'required','row.*.fathername' => 'required', 'row.*.mobile' => 'required', 'row.*.lastname' => 'required', 'row.*genders' => 'required|numeric','row.*religions' => 'required|numeric', 'row.*street' => 'required|numeric', 'row.*employed' => 'required|numeric', 'row.*student' => 'required|numeric', 'row.*educationfield' => 'numeric', 'row.*educationdegree' => 'numeric']);
        if ($validator->fails()) {
//            return redirect('/admin/student/edit/')->withErrors('Validation Failed')->withInput();
            return response()->json('Validation Failed !!');
        }
        foreach ($data as $key => $d) {
            $student = Student::find($d['id']);
            $studentPrev = Student::find($d['id']);
            $student->firstname = $d['firstname'];
            $student->lastname = $d['lastname'];
            $student->fathername = $d['fathername'];
            $student->nationalnumber = $d['nationalnumber'];
            $student->DOB = $d['DOB'];
            $student->gender_id = $d['gender_id'];
            $student->religion_id = $d['religion_id'];
            $student->email = $d['email'];
            $student->mobile = $d['mobile'];
            $student->whatsapp = $d['whatsapp'];
            $student->is_employed = $d['is_employed'];
            $student->street_id = $d['street_id'];
            $student->educationfield_id = $d['educationfield_id'] ? $d['educationfield_id'] : NULL;
            $student->educationlevel_id = $d['educationlevel_id'] ? $d['educationlevel_id'] : NULL;
            $student->is_student = $d['is_student'];
            $student->note = $d['note'];
            $student->created_at = $d['created_at'];


//            $this->saveToLog(self::STUDENT, $student->id, 'Student Updated');
            if ($student->isDirty('firstname')) {
                $this->saveToLogWithData(self::STUDENT, $student->id,'First Name Edited', $studentPrev->firstname, $student->firstname);
            }
            if ($student->isDirty('lastname')) {
                $this->saveToLogWithData(self::STUDENT, $student->id,'Last Name Edited', $studentPrev->lastname, $student->lastname);
            }
            if ($student->isDirty('fathername')) {
                $this->saveToLogWithData(self::STUDENT, $student->id,'Father Name Edited', $studentPrev->fathername, $student->fathername);
            }
            if ($student->isDirty('nationalnumber')) {
                $this->saveToLogWithData(self::STUDENT, $student->id,'National Edited', $studentPrev->nationalnumber, $student->nationalnumber);
            }
            if ($student->isDirty('DOB')) {
                $this->saveToLogWithData(self::STUDENT, $student->id,'DOB Edited', $studentPrev->DOB, $student->DOB);
            }
            if ($student->isDirty('email')) {
                $this->saveToLogWithData(self::STUDENT, $student->id,'Email Edited', $studentPrev->email, $student->email);
            }
            if ($student->isDirty('mobile')) {
                $this->saveToLogWithData(self::STUDENT, $student->id,'Mobile Edited', $studentPrev->mobile, $student->mobile);
            }
            if ($student->isDirty('whatsapp')) {
                $this->saveToLogWithData(self::STUDENT, $student->id,'Whatsapp Edited', $studentPrev->whatsapp, $student->whatsapp);
            }
            if ($student->isDirty('gender_id')) {
                $this->saveToLogWithData(self::STUDENT, $student->id,'Gender Edited', $studentPrev->gender_id, $student->gender_id);
            }
            if ($student->isDirty('street_id')) {
                $this->saveToLogWithData(self::STUDENT, $student->id,'Street Edited', $studentPrev->street_id, $student->street_id);
            }
            if ($student->isDirty('is_employed')) {
                $this->saveToLogWithData(self::STUDENT, $student->id,'isEmployed Edited', $studentPrev->is_employed, $student->is_employed);
            }
            if ($student->isDirty('is_student')) {
                $this->saveToLogWithData(self::STUDENT, $student->id,'isStudent Edited', $studentPrev->is_student, $student->is_student);
            }
            if ($student->isDirty('religion_id')) {
                $this->saveToLogWithData(self::STUDENT, $student->id,'Religion Edited', $studentPrev->religion_id, $student->religion_id);
            }
            if ($student->isDirty('educationfield_id')) {
                $this->saveToLogWithData(self::STUDENT, $student->id,'Education Field Edited', $studentPrev->educationfield_id, $student->educationfield_id);
            }
            if ($student->isDirty('educationlevel_id')) {
                $this->saveToLogWithData(self::STUDENT, $student->id,'Education Level Edited', $studentPrev->educationlevel_id, $student->educationlevel_id);
            }
            $student->save();
        }
//        return redirect()->back()->json('Student has been updated !! !');
        return response()->json('Student has been updated !!');


//        $request->validate(['firstname' => 'required', 'lastname' => 'required', 'email' => 'required', 'genders' => 'required|numeric', 'street' => 'required|numeric', 'employed' => 'required|numeric', 'student' => 'required|numeric', //            'educationlevel' => 'required|numeric',
//            'educationfield' => 'numeric', 'educationdegree' => 'numeric',]);

//        $student = Student::find($id);
//        $studentPrev = Student::find($id);

//        $student->firstname = $request->input('firstname');
//        $student->lastname = $request->input('lastname');
//        $student->nationalnumber = $request->input('nationalnumber');
//        $student->DOB = $request->input('DOB');
//        $student->email = $request->input('email');
//        $student->mobile = $request->input('mobile');
//        $student->whatsapp = $request->input('whatsapp');
//        $student->is_employed = $request->input('employed');
//        $student->is_student = $request->input('student');
//        $student->note = $request->input('note');


//        $student->gender_id = $request->input('genders');
//        if ($student->isDirty('genders')) {
//            $gender = DB::table('genders')->where('id', $request->input('genders'))->get()->pluck('name')[0];
//            $genderPrev = DB::table('genders')->where('id', $studentPrev->gender_id)->get()->pluck('name')[0];
//            $this->saveToLogWithData(self::STUDENT, $student->id, 'Gender changed', $genderPrev, $gender);
//        }

//        $student->street_id = $request->input('street');
//        if ($student->isDirty('street')) {
//            $street = DB::table('street')->where('id', $request->input('street'))->get()->pluck('name')[0];
//            $streetPrev = DB::table('street')->where('id', $studentPrev->street_id)->get()->pluck('name')[0];
//            $this->saveToLogWithData(self::STUDENT, $student->id, 'Street changed', $streetPrev, $street);
//        }

//        $student->educationfield_id = $request->input('educationfield');
//        if ($student->isDirty('educationfield')) {
//            $educationfield = DB::table('educationfield')->where('id', $request->input('educationfield'))->get()->pluck('name')[0];
//            $educationfieldPrev = DB::table('educationfield')->where('id', $studentPrev->educationfield_id)->get()->pluck('name')[0];
//            $this->saveToLogWithData(self::STUDENT, $student->id, 'Education Field changed', $educationfieldPrev, $educationfield);
//        }
//
//        $student->educationlevel_id = $request->input('educationlevel');
//        if ($student->isDirty('educationlevel')) {
//            $educationlevel = DB::table('educationlevel')->where('id', $request->input('educationlevel'))->get()->pluck('name')[0];
//            $educationlevelPrev = DB::table('educationlevel')->where('id', $studentPrev->educationlevel_id)->get()->pluck('name')[0];
//            $this->saveToLogWithData(self::STUDENT, $student->id, 'Education Level changed', $educationlevelPrev, $educationlevel);
//        }
//        $student->save();
//        return redirect()->back()->with('student', 'Student ' . $student->id . ' has been updated');
    }

    public function filterEducation(Request $request)
    {
        $degree = $request->id;
        $fields = EducationField::where('educationdegree_id', $degree)->orderby('name', 'asc')->get();
        return response()->json(['success' => $fields]);
    }

    public function filterEducationDegree(Request $request)
    {
        $field = $request->id;
        $degree = EducationField::select('educationdegree_id')->where('id', $field)->first();
        return response()->json(['success' => $degree]);
    }

    public function checkNational(Request $request)
    {
        $number = $request->value;
        $student = Student::select('firstname')->where('nationalnumber', $number)->first();
        if ($student) {
            return response()->json(['success' => $student->firstname]);
        }
    }

    public function checkEmail(Request $request)
    {
        $email = $request->value;
        $student = Student::select('firstname')->where('email', $email)->first();
        if ($student) {
            return response()->json(['success' => $student->firstname]);
        }
    }

    public function students_store(Request $request)
    {
        $data = $request->form;
        $validator = Validator::make($request->all(), ['row.*.firstname' => 'required','row.*.fathername' => 'required', 'row.*.mobile' => 'required', 'row.*.lastname' => 'required', 'row.*genders' => 'required|numeric','row.*religions' => 'required|numeric', 'row.*street' => 'required|numeric', 'row.*employed' => 'required|numeric', 'row.*student' => 'required|numeric', 'row.*educationfield' => 'numeric', 'row.*educationdegree' => 'numeric']);
        if ($validator->fails()) {
//            return redirect('/admin/student/create/')->withErrors('Validation Failed')->withInput();
            return response()->json('Validation Failed !!');
        }
        foreach ($data as $key => $d) {
            $student = new Student();
            $student->firstname = $d['firstname'];
            $student->lastname = $d['lastname'];
            $student->fathername = $d['fathername'];
            $student->nationalnumber = $d['nationalnumber'];
            $student->DOB = $d['DOB'];
            $student->gender_id = $d['gender_id'];
            $student->religion_id = $d['religion_id'];
            $student->email = $d['email'];
            $student->mobile = $d['mobile'];
            $student->whatsapp = $d['whatsapp'];
            $student->is_employed = $d['is_employed'];
            $student->street_id = $d['street_id'];
            $student->educationfield_id = $d['educationfield_id'] ? $d['educationfield_id'] : NULL;
            $student->educationlevel_id = $d['educationlevel_id'] ? $d['educationlevel_id'] : NULL;
            $student->is_student = $d['std'];
            $student->note = $d['note'];
            $student->created_at = $d['created_at'];

            $student->save();
            $this->saveToLog(self::STUDENT, $student->id, 'Student Created');

            $this->students_visit_create($student->id, $student->created_at, $student->updated_at,$d['center'] );
        }
        return response()->json('Student has been created');
    }

//    public function students_destroy($id)
//    {
//        $student = Student::find($id);
//        Student::destroy($id);
//        StudentEntry::where('student_id', $id)->delete();
//        $this->saveToLog(self::STUDENT, $student->id, 'Student deleted');
//        return redirect()->back()->with('success', 'Student deleted');
////        return response()->json('success');
//    }
    public function students_destroy(Request $request)
    {
        $id = $request->form;
        $student = Student::find($id);
        Student::destroy($id);
        StudentEntry::where('student_id', $id)->delete();
        $this->saveToLog(self::STUDENT, $student->id, 'Student deleted');
//        return redirect()->back()->with('success', 'Student deleted');
        return response()->json('Student has been deleted');
//        return response()->json('success');
    }

    public function studentsentry_destroy(Request $request)
    {
        $id = $request->form;
        $studententry = StudentEntry::find($id);
        StudentEntry::destroy($id);
        $this->saveToLog(self::STUDENTENTRY, $studententry->id, 'Student Entry deleted');
//        return redirect()->back()->with('success', 'Student Entry deleted');
        return response()->json('Student Entry has been deleted');
//        return response()->json('success');
    }

    public function students_visit(Request $request)
    {
        $data = $request->form;
        $user = User::with('roles', 'permissions', 'places', 'centers')->where('id', Auth::id())->get()[0];
        foreach ($data as $key => $d) {
            $studententry = new StudentEntry();
            $studententry->user_id = Auth::id();
            if($user->roles[0]->name === 'Admin'){
                $query = StudentEntry::select('center_id')->where('student_id', $d['student_id'])->first();
                $studententry->center_id = $query->center_id;
            }
            else{
                $studententry->center_id = $user->centers[0]->id;
            }
            $studententry->student_id = $d['student_id'];
            $studententry->created_at = $d['created_at'];
            $studententry->note = '';
            $studententry->save();

            $this->saveToLog(self::STUDENTENTRY, $studententry->id, 'Student Entry Created');
        }
        return response()->json('Student Entry has been created');
//      return redirect()->back()->with('success', 'Student Entry ' . $studententry->id . ' has been created');
    }

    public function students_visit_create($id, $created_at, $updated_at,$center)
    {
        $user = User::with('roles', 'permissions', 'places', 'centers')->where('id', Auth::id())->get()[0];
        $studententry = new StudentEntry();
        $studententry->user_id = Auth::id();

        if($user->roles[0]->name === 'Admin') {
            $studententry->center_id = $center;
        }
        else{
            $studententry->center_id = $user->centers[0]->id;
        }
        $studententry->student_id = $id;
        $studententry->created_at = $created_at;
        $studententry->updated_at = $updated_at;

        $studententry->note = '';
        $studententry->save();

        $this->saveToLog(self::STUDENTENTRY, $studententry->id, 'Student Entry Created');
        return redirect()->back()->with('success', 'Student Entry ' . $studententry->id . ' has been created');
    }

    public function order_images(Request $request){
        $imageIdsArray = $request->input('imageIds');
        $count = 1;
        foreach ($imageIdsArray as $id) {
            $image = InitiativeImage::find($id);
            $image->image_order = $count;
            $image->save();
            $count ++;
        }
        return 'Images has been reordered !!';
    }
}
