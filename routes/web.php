<?php
//NEW ROUTES
use App\Http\Controllers\NewsController;
use App\Livewire\NewsPage;


Route::post('/admin/tags/store', [NewsController::class, 'tag_store'])->name('tags.store');
Route::put('/admin/tags/update/{id}', [NewsController::class, 'tag_update'])->name('tags.update');
Route::delete('/admin/tags/destroy/{id}', [NewsController::class, 'tag_destroy'])->name('tags.destroy');

Route::get('/projects/school-to-school', 'PublicController@school_to_school')->name('new.public.school2school');
Route::get('/projects/childrenuni', 'PublicController@childrenUni');
Route::get('/projects/leap', 'PublicController@leap')->name('public.leap');
//Route::get('/projects/school-to-school/{type}', 'PublicController@oneTypeOfproject')->name('public.school2school.type');
Route::get('/projects/micro-projects', 'PublicController@micro_project_new_test')->name('new.public.micro_project_test');
//Route::get('/projects/micro-projects-test', 'PublicController@micro_project_new_test')->name('new.public.micro_project_test');
Route::get('/projects/family-to-family', 'PublicController@family_to_family')->name('new.public.family2family');
Route::get('/projects/disc', 'PublicController@family_to_family')->name('new.public.disc');
Route::get('/projects/study-zone', 'PublicController@study_zone')->name('new.public.study-zone');
Route::get('/projects/{type}/{id}-{slug}', 'PublicController@initiative')->name('new.public.initiative');
//Route::get('/projects/school-to-school/{type}/{id}-{slug}', 'PublicController@initiativeOfProject')->name('new.public.school2school.project');
Route::get('/projects/disc/{type}/{id}-{slug}', 'PublicController@initiativeOfProject')->name('new.public.disc.project');
Route::get('/projects/study-zone/{type}/{id}-{slug}', 'PublicController@initiativeOfProject')->name('new.public.studyzone.project');
Route::get('/projects/{type}', 'PublicController@initiatives_by_type')->name('public.initiatives.type');

Route::get('/our-news', 'PublicController@newsletter')->name('new.public.newsletter');
Route::get('/our-news/{id}-{city}-{date}', 'PublicController@show_article')->name('new.public.article');
Route::post('our-news/subscribe','PublicController@subscribe')->name('newsletter.subscribe');
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/news/preview/{id}', [App\Http\Controllers\NewsController::class, 'preview'])
        ->name('news.preview');
});

Route::get('/who-we-are','PublicController@about_us')->name('new.public.who-we-are');

Route::get('/qr/disc', 'PublicController@info_disc')->name('public.info-disc');
Route::get('/team', 'PublicController@our_team')->name('public.team-private');
Route::view('/team/marcin.iżycki', 'public.marcin');
Route::view('/team/Sylwia.hazboun4466825', 'public.sylwia');
Route::view('/team/jaroslaw/179426083', 'public.jaroslaw');
Route::view('/team/marianna/681268635', 'public.marianna');
Route::get('/team/{id}', 'PublicController@show_team');
Route::get('/homs/hope/team/{id}', 'PublicController@show_homs_hope_team');
Route::get('/projects/study-zone/team/{id}', 'PublicController@studyzone_team')->name('public.studyzone.team');
Route::get('/projects/disc/team/{id}', 'PublicController@disc_team')->name('public.disc.team') ;
Route::get('/projects/childrenuni/team/{id}', 'PublicController@children_team')->name('public.children.team') ;
Route::get('/projects/leap/team/{id}', 'PublicController@leap_team')->name('public.leap.team') ;
Route::get('/damascus/hope/team/{id}', 'PublicController@show_damascus_hope_team');
Route::get('/latakia/hope/team/{id}', 'PublicController@show_latakia_hope_team');
Route::get('/christianyouth', 'PublicController@christian_youth')->name('public.youth');
Route::get('/christianyouth/{id}', 'PublicController@christian_youth_member')->name('public.youth-member');

////////////////////////////////////////////////////////////////////////////////////
///
///
///
///
///
Route::get('login', ['as' => 'login','uses' => 'Auth\LoginController@showLoginForm']);
//Route::post('login', ['as' => '','uses' => 'Auth\LoginController@login']);
Route::post('login', [
    'uses' => 'Auth\LoginController@login',
    'middleware' => 'throttle:3,1'
]);
Route::post('logout', ['as' => 'logout','uses' => 'Auth\LoginController@logout']);
Route::get('/admin/unauthorized', function () {return 'Unauthorized';});

//////////////////////////////// PUBLIC ////////////////////////////////
Route::get('/locale/{locale}', 'PublicController@set_locale');
Route::get('/rootsofhope', 'PublicController@roots')->name('roots');
Route::get('/tt', 'PublicController@tt');
Route::get('/home', 'PublicController@homepage')->name('new.public.home');
Route::get('/', 'PublicController@homepage_lb');

//Route::get('/newsletter/{edition}', 'PublicController@news_by_edition')->name('public.newsletter.edition');
//Route::get('/newsletter/{edition}/{id}-{slug}', 'PublicController@show_article')->name('public.article');

Route::get('/who-we-are/partners', 'PublicController@about_us')->name('public.who-we-are-partners');
Route::get('/who-we-are', 'PublicController@about_us')->name('public.who-we-are');

//Route::get('/projects/micro-projects', 'PublicController@micro_project_new')->name('public.micro_project2');

//Route::get('/projects/family-to-family', 'PublicController@family_to_family')->name('public.family2family');
//Route::view('/projects/school-to-school', 'public.school-to-school2')->name('public.school2school');
//
//Route::get('/projects/school-to-school/{type}', 'PublicController@oneTypeOfproject')->name('public.school2school.type');

//Route::get('/projects/school-to-school/{type}/{id}-{slug}', 'PublicController@initiativeOfProject')->name('public.school2school.project');

Route::get('/projects/study-zone', 'PublicController@studyzone')->name('public.studyzone2');
//Route::get('/projects/study-zone/all', 'PublicController@studyzone_all')->name('public.studyzone.all');

Route::get('/projects/study-zone/{type}', 'PublicController@oneTypeOfproject')->name('public.studyzone.type');
//Route::get('/projects/study-zone/{type}/{id}-{slug}', 'PublicController@initiativeOfProject')->name('public.studyzone.project');

Route::get('/projects/disc', 'PublicController@disc')->name('public.disc_home');
Route::get('/projects/disc/{place}', 'PublicController@discByPlace')->name('public.disc.place');
//Route::get('/projects/disc/{type}/{id}-{slug}', 'PublicController@initiativeOfProject')->name('public.disc.project');

Route::get('/projects/homework-room', 'PublicController@homeworkRoom')->name('public.homework');
//Route::get('/projects/childrenuni', 'PublicController@childrenUni')->name('public.children');

//Route::get('/projects/{type}', 'PublicController@initiatives_by_type')->name('public.initiatives.type');
//Route::get('/projects/{type}/{id}-{slug}', 'PublicController@initiative')->name('public.initiative');

Route::view('/hope', 'public.main-successes')->name('public.main_successes');
Route::get('/hope/{slug}', 'PublicController@successes_by_category')->name('public.successes.category');

Route::get('/about', 'PublicController@about')->name('public.about');
Route::get('/contact', 'PublicController@contact')->name('public.contact');
Route::get('/test', 'PublicController@test')->name('public.test');
//Route::get('/team', 'PublicController@our_team')->name('public.team-private');

//Route::get('/christianyouth', 'PublicController@christian_youth')->name('public.youth');
//Route::get('/christianyouth/{id}', 'PublicController@christian_youth_member')->name('public.youth-member');

//Route::view('/team/marcin.iżycki', 'public.marcin');
//Route::view('/team/Sylwia.hazboun4466825', 'public.sylwia');
//Route::view('/team/jaroslaw/179426083', 'public.jaroslaw');
//Route::view('/team/marianna/681268635', 'public.marianna');
//Route::get('/team/{id}', 'PublicController@show_team');
//Route::get('/homs/hope/team/{id}', 'PublicController@show_homs_hope_team');
//Route::get('/projects/study-zone/team/{id}', 'PublicController@studyzone_team')->name('public.studyzone.team');
//Route::get('/projects/disc/team/{id}', 'PublicController@disc_team')->name('public.disc.team') ;
//Route::get('/projects/childrenuni/team/{id}', 'PublicController@children_team')->name('public.children.team') ;
//Route::get('/damascus/hope/team/{id}', 'PublicController@show_damascus_hope_team');

//Route::get('/projects/disc/team/{slug}-{id}', 'PublicController@disc_team2')->name('public.disc.team');

Route::get('/donate', 'PublicController@show_donate')->name('donate_rt');
Route::get('/donate/projects/micro-projects/{id}', 'PublicController@show_donate_project')->name('donate_project_rt');

///////////////////////////// ADMIN HOME /////////////////////////////
Route::get('/admin/home', 'HomeController@home')->name('home');
///////////////////////////// COVER /////////////////////////////
Route::get('/admin/covers', 'CoverController@create')->name('covers');
Route::get('/admin/covers/view/{id}', 'CoverController@show')->name('covers.show');
Route::delete('/admin/covers/delete/{id}', 'CoverController@destroy')->name('covers.delete');
Route::post('/admin/covers/store', 'CoverController@store')->name('covers.store');
Route::post('/admin/covers/order/{id}', 'CoverController@order')->name('covers.order');
///////////////////////////// CONTENT /////////////////////////////
Route::get('/admin/content', 'ContentController@index')->name('content');
Route::get('/admin/content/{id}/ajax-form', 'ContentController@ajaxForm')->name('content.ajaxForm');
Route::put('/admin/content/brief/{id}', 'ContentController@update')->name('project-content.update');
Route::get('/admin/content/brief/images/{id}', 'ContentController@create_images')->name('projectBrief.images.create');
Route::post('/admin/content/brief/images', 'ContentController@store_image')->name('projectBrief.images.store');
Route::get('/admin/content/brief/show/{id}', 'ContentController@show')->name('projectBrief.show');
Route::get('/admin/content/partners/showpartners/{id}', 'ContentController@show_partners')->name('project.show_partners');
Route::delete('/admin/content/brief/images/destroy/{id}', 'ContentController@destroy')->name('projectBrief.images.destroy');
Route::post('/admin/content/brief/images/order', 'ContentController@order_images')->name('projectBrief.images.order');
Route::post('/admin/content/partners/{id}', 'ContentController@save_partners')->name('project.save_partners');


Route::get('/admin/log', 'LogController@index')->name('log');
Route::get('/admin/logjson', 'LogController@indexjson')->name('logjson');
Route::get('/notificationsData', 'LogController@get_notifications');
Route::get('/notificationsCount', 'LogController@get_notifications_count');
Route::get('/clearNotificationsData', 'LogController@clear_notifications');
Route::get('/makeFundedRequest/{id}', 'projectsController@mark_NeedConversion');
Route::get('/cancelMakeFundedRequest/{id}', 'projectsController@unmark_NeedConversion');

////////////////////////////// PROJECTS //////////////////////////////
Route::get('/admin/projects/index', 'projectsController@index')->name('projects_index');

Route::get('/admin/projects', 'projectsController@index')->name('projects_index');
Route::get('/admin/projectsjson', 'projectsController@indexjson')->name('projectsjson');
Route::get('/admin/projects/create', 'projectsController@create')->name('projects_create');
Route::get('/admin/project/{id}', 'projectsController@show')->name('admin_project');
Route::delete('/admin/projects/delete', 'projectsController@delete')->name('delete.project');
Route::get('/admin/projects/edit/{id}', 'projectsController@edit')->name('edit.project');
Route::put('/admin/projects/update/{id}', 'projectsController@update')->name('update.project');

Route::post('admin/projects/store', ['as' => 'store.project', 'uses' => 'projectsController@store']);
Route::post('admin/projects/publish', ['as' => 'publish.project', 'uses' => 'projectsController@publish']);
Route::post('admin/projects/unpublish/{id}', ['as' => 'unpublish.project', 'uses' => 'projectsController@unpublish']);
Route::post('admin/projects/Englishchecked', 'projectsController@Englishchecked')->name('project.Englishchecked');

////////////////////////////// PROJECTS Images //////////////////////////////
Route::post('/admin/projects/images', 'projectsController@store_image')->name('store.image');
Route::get('/admin/projects/images/{id}', 'projectsController@add_image')->name('add.image');
Route::delete('/admin/projects/images/{id}', 'projectsController@delete_images')->name('delete.images');
Route::post('/admin/projects/images/order', 'projectsController@order_images')->name('order.images');

////////////////////////////// PROJECTS French //////////////////////////////
Route::get('/admin/projects/french-index', 'frenchController@index')->name('projects_french_index');
Route::get('/admin/project/french/{id}', 'frenchController@show')->name('admin_french_project');
Route::post('admin/projects/french/store', ['as' => 'store.french.project', 'uses' => 'frenchController@store']);
Route::get('admin/projects/french/edit/{id}', ['as' => 'edit.french.project', 'uses' => 'frenchController@edit']);
Route::post('admin/projects/french/update', ['as' => 'update.french.project', 'uses' => 'frenchController@update']);
Route::get('/admin/project/french/paid/{id}', 'frenchController@make_paid');
Route::get('admin/projects/french/translate/{id}', ['as' => 'french.translate.project', 'uses' => 'frenchController@translate']);
Route::get('admin/project/french/paid/all', ['as' => 'french.paid.all', 'uses' => 'frenchController@make_paid_all']);

//Route::get('/admin/project/french/paid/all', 'frenchController@make_paid_all')->name('make.all.paid');


////////////////////////////// SCHOOL //////////////////////////////
Route::get('/admin/school/index', 'SchoolController@index')->name('school_index');

Route::get('/admin/school', 'SchoolController@index')->name('school_index');

Route::get('/admin/school/create', 'SchoolController@create')->name('school_create');
Route::get('/admin/school/{id}', 'SchoolController@show')->name('admin_school');
Route::delete('/admin/school/delete/{id}', 'SchoolController@delete')->name('delete.school');
Route::get('/admin/school/edit/{id}', 'SchoolController@edit')->name('edit.school');
Route::put('/admin/school/update/{id}', 'SchoolController@update')->name('update.school');

Route::post('admin/school/store', ['as' => 'store.school', 'uses' => 'SchoolController@store']);
Route::post('admin/school/publish', ['as' => 'publish.school', 'uses' => 'SchoolController@publish']);
Route::post('admin/school/unpublish', ['as' => 'unpublish.school', 'uses' => 'SchoolController@unpublish']);
Route::post('admin/school/Englishchecked', 'SchoolController@Englishchecked')->name('school.Englishchecked');

////////////////////////////// SCHOOL Images //////////////////////////////

Route::get('/admin/school/images/{id}', 'SchoolController@add_image')->name('school.add.image');
Route::post('/admin/school/images', 'SchoolController@store_image')->name('school.store.image');
Route::delete('/admin/school/images/{id}', 'SchoolController@delete_images')->name('school.delete.images');
Route::post('admin/school/images/order', 'SchoolController@order_images')->name('schoolorder.images');


////////////////////////////// CHILDREN //////////////////////////////
Route::get('/admin/children/index', 'ChildrenController@index')->name('children_index');

Route::get('/admin/children', 'ChildrenController@index')->name('children_index');

Route::get('/admin/children/create', 'ChildrenController@create')->name('children_create');
Route::get('/admin/children/{id}', 'ChildrenController@show')->name('admin_children');
Route::delete('/admin/children/delete/{id}', 'ChildrenController@delete')->name('delete.children');
Route::get('/admin/children/edit/{id}', 'ChildrenController@edit')->name('edit.children');
Route::put('/admin/children/update/{id}', 'ChildrenController@update')->name('update.children');

Route::post('admin/children/store', ['as' => 'store.children', 'uses' => 'ChildrenController@store']);
Route::post('admin/children/publish', ['as' => 'publish.children', 'uses' => 'ChildrenController@publish']);
Route::post('admin/children/unpublish', ['as' => 'unpublish.children', 'uses' => 'ChildrenController@unpublish']);
Route::post('admin/children/Englishchecked', 'ChildrenController@Englishchecked')->name('children.Englishchecked');
Route::post('admin/children/images/order', 'ChildrenController@order_images')->name('childrenorder.images');

////////////////////////////// DISC //////////////////////////////
Route::get('/admin/disc/index', 'DiscController@index')->name('disc_index');

Route::get('/admin/disc', 'DiscController@index')->name('disc_index');

Route::get('/admin/disc/create', 'DiscController@create')->name('disc_create');
Route::get('/admin/disc/{id}', 'DiscController@show')->name('admin_disc');
Route::delete('/admin/disc/delete/{id}', 'DiscController@delete')->name('delete.disc');
Route::get('/admin/disc/edit/{id}', 'DiscController@edit')->name('edit.disc');
Route::put('/admin/disc/update/{id}', 'DiscController@update')->name('update.disc');

Route::post('admin/disc/store', ['as' => 'store.disc', 'uses' => 'DiscController@store']);
Route::post('admin/disc/publish', ['as' => 'publish.disc', 'uses' => 'DiscController@publish']);
Route::post('admin/disc/unpublish', ['as' => 'unpublish.disc', 'uses' => 'DiscController@unpublish']);
Route::post('admin/disc/Englishchecked', 'DiscController@Englishchecked')->name('disc.Englishchecked');

////////////////////////////// DISC Images //////////////////////////////

Route::get('/admin/disc/images/{id}', 'DiscController@add_image')->name('disc.add.image');
Route::post('/admin/disc/images', 'DiscController@store_image')->name('disc.store.image');
Route::delete('/admin/disc/images/{id}', 'DiscController@delete_images')->name('disc.delete.images');
Route::post('admin/disc/images/order', 'DiscController@order_images')->name('discorder.images');

////////////////////////////// LEAP //////////////////////////////
Route::get('/admin/leap/index', 'LeapController@index')->name('leap_index');

Route::get('/admin/leap', 'LeapController@index')->name('leap_index');

Route::get('/admin/leap/create', 'LeapController@create')->name('leap_create');
Route::get('/admin/leap/{id}', 'LeapController@show')->name('admin_leap');
Route::delete('/admin/leap/delete/{id}', 'LeapController@delete')->name('delete.leap');
Route::get('/admin/leap/edit/{id}', 'LeapController@edit')->name('edit.leap');
Route::put('/admin/leap/update/{id}', 'LeapController@update')->name('update.leap');

Route::post('admin/leap/store', ['as' => 'store.leap', 'uses' => 'LeapController@store']);
Route::post('admin/leap/publish', ['as' => 'publish.leap', 'uses' => 'LeapController@publish']);
Route::post('admin/leap/unpublish', ['as' => 'unpublish.leap', 'uses' => 'LeapController@unpublish']);
Route::post('admin/leap/Englishchecked', 'LeapController@Englishchecked')->name('Leap.Englishchecked');

////////////////////////////// DISC Images //////////////////////////////

Route::get('/admin/leap/images/{id}', 'LeapController@add_image')->name('leap.add.image');
Route::post('/admin/leap/images', 'LeapController@store_image')->name('leap.store.image');
Route::delete('/admin/leap/images/{id}', 'LeapController@delete_images')->name('leap.delete.images');
Route::post('admin/leap/images/order', 'LeapController@order_images')->name('leaporder.images');

////////////////////////////// STUDY ZONE //////////////////////////////
Route::get('/admin/study/studentsjson', 'StudyController@studentsJSon')->name('new.studentsjson');
Route::get('/admin/study/studentsentryjson', 'StudyController@studentsEntriesJSon')->name('new.studentsentryjson');
Route::get('/admin/study/index', 'StudyController@index')->name('study_index');

Route::get('/admin/study', 'StudyController@index')->name('study_index');

Route::get('/admin/study/create', 'StudyController@create')->name('study_create');

Route::get('/admin/study/{id}', 'StudyController@show')->name('admin_study');
Route::delete('/admin/study/delete/{id}', 'StudyController@delete')->name('delete.study');

Route::get('/admin/study/edit/{id}', 'StudyController@edit')->name('edit.study');
Route::put('/admin/study/update/{id}', 'StudyController@update')->name('update.study');

Route::post('admin/study/store', ['as' => 'store.study', 'uses' => 'StudyController@store']);
Route::post('admin/study/publish', ['as' => 'publish.study', 'uses' => 'StudyController@publish']);
Route::post('admin/study/unpublish', ['as' => 'unpublish.study', 'uses' => 'StudyController@unpublish']);
Route::post('admin/study/Englishchecked', 'StudyController@Englishchecked')->name('study.Englishchecked');


Route::get('/admin/student/index', 'StudyController@students_index')->name('students.index');
Route::get('/admin/student/create', 'StudyController@students_create')->name('students.create');
Route::get('/admin/student/entries', 'StudyController@students_entries')->name('students.entries');
Route::post('/admin/student/store', 'StudyController@students_store')->name('students.store');
//Route::get('/admin/student/{id}', 'StudyController@students_show')->name('students.show');
Route::get('/admin/student/edit/{id}', 'StudyController@students_edit')->name('students.edit');
Route::put('/admin/student', 'StudyController@students_update')->name('students.update');
//Route::delete('/admin/student/{id}', 'StudyController@students_destroy')->name('students.destroy');
Route::delete('/admin/student/delete', 'StudyController@students_destroy')->name('students.destroy');
Route::delete('/admin/studententry/delete', 'StudyController@studentsentry_destroy')->name('studentsentry.destroy');

//Route::post('/admin/student/visit/{id}', 'StudyController@students_visit')->name('students.visit');
Route::post('/admin/student/visit', 'StudyController@students_visit')->name('students.visit');

Route::get('student-filter-education/{id}', 'StudyController@filterEducation')->name('student.filter.education');
Route::get('student-filter-educationdegree/{id}', 'StudyController@filterEducationDegree')->name('student.filter.educationdegree');
Route::get('student-check-national/{value}', 'StudyController@checkNational')->name('student.check.national');
Route::get('student-check-email/{value}', 'StudyController@checkEmail')->name('student.check.email');

////////////////////////////// STUDY ZONE Images //////////////////////////////

Route::get('/admin/study/images/{id}', 'StudyController@add_image')->name('study.add.image');
Route::get('/admin/success/{id}', 'StudyController@add_image_success')->name('success.add.image');
Route::post('/admin/study/images', 'StudyController@store_image')->name('study.store.image');
Route::post('/admin/success/images', 'StudyController@store_image_success')->name('success.store.image');
Route::delete('/admin/study/images/{id}', 'StudyController@delete_images')->name('study.delete.images');
Route::delete('/admin/success/images/{id}', 'StudyController@delete_images_success')->name('success.delete.images');
Route::post('admin/study/images/order', 'StudyController@order_images')->name('studyorder.images');


////////////////////////////// CHILDREN Images //////////////////////////////

Route::get('/admin/children/images/{id}', 'ChildrenController@add_image')->name('children.add.image');
Route::post('/admin/children/images', 'ChildrenController@store_image')->name('children.store.image');
Route::delete('/admin/children/images/{id}', 'ChildrenController@delete_images')->name('children.delete.images');










///////////////////////////////// USERS /////////////////////////////////

Route::get('/admin/users', 'UserController@index')->name('users_index');
Route::post('/admin/users/store', 'UserController@store')->name('store.user');
Route::put('/admin/users/update/{id}', 'UserController@update')->name('update.user');
Route::delete('/admin/user/{id}', 'UserController@delete')->name('delete.user');
Route::post('/admin/user/activate', 'UserController@activate')->name('activate.user');
Route::post('/admin/user/deactivate', 'UserController@deactivate')->name('deactivate.user');
Route::get('/admin/users/create', 'UserController@create')->name('users.create');
Route::get('/admin/users/edit/{id}', 'UserController@edit')->name('edit.user');
////////////////////////////// INITIATIVES //////////////////////////////

Route::get('/admin/initiatives/index', 'InitiativesController@index')->name('initiatives.index');
Route::get('/admin/initiatives/create', 'InitiativesController@create')->name('initiatives.create');
Route::post('/admin/initiatives', 'InitiativesController@store')->name('initiatives.store');
Route::get('/admin/initiatives/{id}', 'InitiativesController@show')->name('initiatives.show');
Route::get('/admin/initiatives/edit/{id}', 'InitiativesController@edit')->name('initiatives.edit');
Route::put('/admin/initiatives/{id}', 'InitiativesController@update')->name('initiatives.update');
Route::delete('/admin/initiatives/{id}', 'InitiativesController@destroy')->name('initiatives.destroy');

Route::post('/admin/initiatives/offline', 'InitiativesController@offline')->name('initiatives.offline');
Route::post('/admin/initiatives/online', 'InitiativesController@online')->name('initiatives.online');
Route::post('/admin/initiatives/Englishchecked', 'InitiativesController@Englishchecked')->name('initiatives.Englishchecked');

/////////////////////////// INITIATIVES FRENCH ///////////////////////////

Route::get('/admin/initiatives/french/create/{id}', 'InitiativesFrenchController@create')->name('initiatives.french.create');
Route::get('/admin/initiatives/french/{id}', 'InitiativesFrenchController@show')->name('initiatives.french.show');
Route::get('/admin/initiatives/french/edit/{id}', 'InitiativesFrenchController@edit')->name('initiatives.french.edit');
Route::post('/admin/initiatives/french', 'InitiativesFrenchController@store')->name('initiatives.french.store');
Route::put('/admin/initiatives/french/{id}', 'InitiativesFrenchController@update')->name('initiatives.french.update');
Route::get('/admin/initiatives/french/paid/{id}', 'InitiativesFrenchController@paid')->name('initiatives.french.paid');

/////////////////////////// INITIATIVES IMAGES ///////////////////////////

Route::get('/admin/initiatives/images/{id}', 'InitiativeImagesController@create')->name('initiatives.images.create');
Route::post('/admin/initiatives/images', 'InitiativeImagesController@store')->name('initiatives.images.store');
Route::delete('/admin/initiatives/images/{id}', 'InitiativeImagesController@destroy')->name('initiatives.images.destroy');
Route::post('/admin/initiatives/images/order', 'InitiativeImagesController@order_images')->name('initiativesorder.images');
///////////////////////// Rehabilitation IMAGES /////////////////////////

Route::get('/admin/initiatives/images/rehabilitation/{id}', 'initiativeImagesRehabilitationController@create')
    ->name('initiatives.images.rehabilitation.create');

Route::post('/admin/initiatives/images/rehabilitation', 'initiativeImagesRehabilitationController@store')
    ->name('initiatives.images.rehabilitation.store');

Route::delete('/admin/initiatives/images/rehabilitation/{id}', 'initiativeImagesRehabilitationController@destroy')
    ->name('initiatives.images.rehabilitation.destroy');

////////////////////////////// TESTIMONIES //////////////////////////////

Route::get('/admin/initiatives/{id}/testimonies', 'TestimoniesController@index')->name('initiatives.testimonies.index');
Route::post('/admin/initiatives/testimonies', 'TestimoniesController@store')->name('initiatives.testimonies.store');
Route::put('/admin/initiatives/testimonies/{id}', 'TestimoniesController@update')->name('initiatives.testimonies.update');
Route::delete('/admin/initiatives/testimonies/{id}', 'TestimoniesController@destroy')->name('initiatives.testimonies.destroy');

/////////////////////////// TESTIMONIES FRENCH ///////////////////////////

Route::get('/admin/initiatives/testimonies/french/create/{id}', 'TestimoniesFrenchController@create')->name('initiatives.testimonies.french.create');
Route::post('/admin/initiatives/testimonies/french', 'TestimoniesFrenchController@store')->name('initiatives.testimonies.french.store');
Route::get('/admin/initiatives/testimonies/french/{id}', 'TestimoniesFrenchController@show')->name('initiatives.testimonies.french.show');
Route::get('/admin/initiatives/testimonies/french/edit/{id}', 'TestimoniesFrenchController@edit')->name('initiatives.testimonies.french.edit');
Route::put('/admin/initiatives/testimonies/french/{id}', 'TestimoniesFrenchController@update')->name('initiatives.testimonies.french.update');
Route::get('/admin/initiatives/testimonies/french/paid/{id}', 'TestimoniesFrenchController@paid')->name('initiatives.testimonies.french.paid');

//////////////////////////////// SUCCESSES Study////////////////////////////////

Route::get('/admin/study/successes/index', 'StudyController@success_index')->name('successes.index');
Route::get('/admin/study/successes/create', 'StudyController@success_create')->name('successes.create');
Route::post('/admin/study/successes', 'StudyController@success_store')->name('successes.store');
Route::get('/admin/study/successes/{id}', 'StudyController@success_show')->name('successes.show');
Route::get('/admin/study/successes/edit/{id}', 'StudyController@success_edit')->name('successes.edit');
Route::put('/admin/study/successes/{id}', 'StudyController@success_update')->name('successes.update');
Route::delete('/admin/study/successes/{id}', 'StudyController@success_destroy')->name('successes.destroy');
Route::post('/admin/study/successes/online', 'StudyController@success_online')->name('successes.online');
Route::post('/admin/study/successes/offline', 'StudyController@success_offline')->name('successes.offline');
Route::post('/admin/study/successes/Englishchecked', 'StudyController@success_Englishchecked')->name('successes.Englishchecked');


//////////////////////////////// SUCCESSES DISC////////////////////////////////

Route::get('/admin/disc/successes/index', 'DiscController@success_index')->name('disc.successes.index');
Route::get('/admin/disc/successes/create', 'DiscController@success_create')->name('disc.successes.create');
Route::post('/admin/disc/successes', 'DiscController@success_store')->name('disc.successes.store');
Route::get('/admin/disc/successes/{id}', 'DiscController@success_show')->name('disc.successes.show');
Route::get('/admin/disc/successes/edit/{id}', 'DiscController@success_edit')->name('disc.successes.edit');
Route::put('/admin/disc/successes/{id}', 'DiscController@success_update')->name('disc.successes.update');
Route::delete('/admin/disc/successes/{id}', 'DiscController@success_destroy')->name('disc.successes.destroy');
Route::post('/admin/disc/successes/online', 'DiscController@success_online')->name('disc.successes.online');
Route::post('/admin/disc/successes/offline', 'DiscController@success_offline')->name('disc.successes.offline');
Route::post('/admin/disc/successes/Englishchecked', 'DiscController@success_Englishchecked')->name('disc.successes.Englishchecked');





///////////////////////////// SUCCESSES FRENCH /////////////////////////////

Route::get('/admin/successes/french/create/{id}', 'SuccessFrenchController@create')->name('successes.french.create');
Route::post('/admin/successes/french', 'SuccessFrenchController@store')->name('successes.french.store');
Route::get('/admin/successes/french/{id}', 'SuccessFrenchController@show')->name('successes.french.show');
Route::get('/admin/successes/french/edit/{id}', 'SuccessFrenchController@edit')->name('successes.french.edit');
Route::put('/admin/successes/french/{id}', 'SuccessFrenchController@update')->name('successes.french.update');
Route::get('/admin/successes/french/paid/{id}', 'SuccessFrenchController@paid')->name('successes.french.paid');

//////////////////////////////// Roots Of Hope ////////////////////////////////
Route::get('/admin/roots/index', 'RootsController@index')->name('roots.index');
Route::get('/admin/roots/create', 'RootsController@create')->name('roots.create');
Route::post('/admin/roots', 'RootsController@store')->name('roots.store');
Route::get('/admin/roots/edit/{id}', 'RootsController@edit')->name('roots.edit');
Route::put('/admin/roots/{id}', 'RootsController@update')->name('roots.update');
Route::delete('/admin/roots/destroy/{id}', 'RootsController@destroy')->name('roots.destroy');
Route::post('/admin/roots/online', 'RootsController@online')->name('roots.online');
Route::post('/admin/roots/offline', 'RootsController@offline')->name('roots.offline');

//////////////////////////////// NEWS ////////////////////////////////

Route::get('/admin/news/index', 'NewsController@index')->name('news.index');
Route::get('/admin/news/create', 'NewsController@create')->name('news.create');
Route::post('/admin/news', 'NewsController@store')->name('news.store');
Route::get('/admin/news/{id}', 'NewsController@show')->name('news.show');
Route::get('/admin/news/edit/{id}', 'NewsController@edit')->name('news.edit');
Route::put('/admin/news/{id}', 'NewsController@update')->name('news.update');
Route::delete('/admin/news/file/{path}', 'NewsController@file_destroy')->name('news.file.destroy');
Route::delete('/admin/news/subscribe/{id}', 'NewsController@subscriber_destroy')->name('news.subscriber.destroy');
Route::delete('/admin/news/{id}', 'NewsController@destroy')->name('news.destroy');
Route::post('/admin/news/online', 'NewsController@online')->name('news.online');
Route::post('/admin/news/offline', 'NewsController@offline')->name('news.offline');
Route::post('/admin/news/Englishchecked', 'NewsController@Englishchecked')->name('news.Englishchecked');
Route::post('users-send-email', 'NewsController@sendEmail')->name('ajax.send.email');
Route::post('users-send-email-all', 'NewsController@sendEmailAll')->name('ajax.send.email.all');
Route::get('/unsubscribe-confirm/{token}', 'NewsController@unsubscribe')->name('unsubscribe.confirm');
///////////////////////////// NEWS FRENCH /////////////////////////////

Route::get('/admin/news/french/create/{id}', 'NewsFrenchController@create')->name('news.french.create');
Route::post('/admin/news/french', 'NewsFrenchController@store')->name('news.french.store');
Route::get('/admin/news/french/{id}', 'NewsFrenchController@show')->name('news.french.show');
Route::get('/admin/news/french/edit/{id}', 'NewsFrenchController@edit')->name('news.french.edit');
Route::put('/admin/news/french/{id}', 'NewsFrenchController@update')->name('news.french.update');
Route::get('/admin/news/french/paid/{id}', 'NewsFrenchController@paid')->name('news.french.paid');

///////////////////////////// NEWS IMAGES /////////////////////////////

Route::get('/admin/news/images/{id}', 'NewsImagesController@create')->name('news.images.create');
Route::post('/admin/news/images', 'NewsImagesController@store')->name('news.images.store');
Route::delete('/admin/news/images/{id}', 'NewsImagesController@destroy')->name('news.images.destroy');
Route::post('admin/news/images/order', 'NewsImagesController@order_images')->name('newsorder.images');
///////////////////////////// NEWS Editions /////////////////////////////

Route::post('/admin/news/edition', 'NewsController@edition_store')->name('news.edition.store');
Route::get('/admin/news/edition/index', 'NewsController@edition')->name('news.edition');
Route::delete('/admin/news/edition/{id}', 'NewsController@edition_destroy')->name('news.edition.destroy');
Route::post('/admin/news/edition/Online', 'NewsController@mark_online')->name('news.edition.online');
Route::post('/admin/news/edition/Offline', 'NewsController@mark_offline')->name('news.edition.offline');

//////////////////////////////// Our Team ////////////////////////////////

Route::get('/admin/team/index', 'TeamController@index')->name('team.index');
Route::get('/admin/team/create', 'TeamController@create')->name('team.create');
Route::post('/admin/team', 'TeamController@store')->name('team.store');
Route::get('/admin/team/{id}', 'TeamController@show')->name('team.show');
Route::get('/admin/team/edit/{id}', 'TeamController@edit')->name('team.edit');
Route::put('/admin/team/{id}', 'TeamController@update')->name('team.update');
Route::delete('/admin/team/{id}', 'TeamController@destroy')->name('team.destroy');

//Route::group(['middleware' => ['auth']], function() {
//    Route::get('/admin/micro', 'projectsController@show_projects')->name('admin.projects-private');
//});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

/////////////////////////////////////////////////////////////////////////////////

Route::get('/training/home', 'TrainingController@home')->name('training.home');
Route::get('/training/add', 'TrainingController@show_chat')->name('training.chat.add');
Route::post('/training/store/{type}', 'TrainingController@store_chat')->name('training.chat.store');
Route::delete('/training/{id}', 'TrainingController@destroy_chat')->name('training.chat.destroy');


//Route::domain('{angular}.hcsyria.org')->group(function () {
//    Route::get('/home', [App\Http\Controllers\PublicController::class, 'hometest'])->name('angular.home');
//});
//
//Route::group(array('domain' => '{angular}.hcsyria.org'), function()
//{
Route::get('/homeangular', 'PublicController@hometest');
//});

Route::get('/search', 'PublicController@search')->name('search');

Route::fallback(function () {
    return response()->view('new.errors.404', [], 404);
});