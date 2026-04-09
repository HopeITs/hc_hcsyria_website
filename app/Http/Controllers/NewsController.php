<?php

namespace App\Http\Controllers;

use App\Edition;
use App\News;
use App\NewsEnglish;
use App\NewsImage;
use App\WhatCategory;
use App\WhoCategory;
use App\Place;
use App\Project;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Models\Subscribers;
use App\Mail\UserEmail;
use Illuminate\Support\Facades\Mail;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $newsArticles = NEWS::with('english', 'edition', 'whatCategory')->where('type', '0')->where('online', '1')->get();
        $newsProducts = NEWS::with('english', 'edition', 'whatCategory')->where('type', '1')->where('online', '1')->get();
        $newsShortParagraphs = NEWS::with('english', 'edition', 'whatCategory')->where('type', '2')->where('online', '1')->get();
        $newsVideos = NEWS::with('english', 'edition', 'whatCategory')->where('type', '3')->where('online', '1')->get();
        $newsPending = NEWS::with('english', 'edition', 'whatCategory')->where('type', '0')->where('online', '0')->get();
        $newsSubscribers = Subscriber::all();
        return view('new.admin.news.index', ['newsArticles' => $newsArticles, 'newsSubscribers' => $newsSubscribers, 'newsProducts' => $newsProducts, 'newsShortParagraphs' => $newsShortParagraphs, 'newsVideos' => $newsVideos, 'newsPending' => $newsPending]);
    }

    public function create()
    {
        $microProjects = Project::with('english')->where('MPE_Done', '1')->where('MPE_Published', '1')->get();
        $what_categories = WhatCategory::whereIn('id', [11, 12, 13, 14, 15, 16])->get();
        $who_categories = WhoCategory::all();
        $editions = Edition::all();
        $places = Place::all();
        return view('new.admin.news.create', ['microProjects' => $microProjects, 'what_categories' => $what_categories, 'who_categories' => $who_categories, 'places' => $places, 'editions' => $editions,]);
    }

    public function store(Request $request)
    {
        $request->validate(['type' => 'required|numeric', 'what_category_id' => 'required|numeric', 'who_category_id' => 'required|numeric', 'place_id' => 'required', 'edition_id' => 'required|numeric', 'rank' => 'required|numeric', 'title' => 'required|max:100', 'description' => 'max:900', 'content' => 'required', 'video' => 'max:100',

        ]);

        if ($request->input('what_category_id') == '13') //products
        {
            $request->validate(['project_id' => 'required']);
        }

        $news = new News;

        $news->type = $request->input('type');
        $news->what_category_id = $request->input('what_category_id');
        $news->who_category_id = $request->input('who_category_id');
        $news->place_id = $request->input('place_id');
        $news->edition_id = $request->input('edition_id');
        $news->rank = $request->input('rank');
        $news->video = $request->filled('video') ? $request->input('video') : '0';
        if ($file = $request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $path = '/files/news/';
            $file->move($path, $fileName);
            $news->file = $path . $fileName;
        } else $news->file = '0';

        if ($request->input('what_category_id') == '13') //products
        {
            $news->project_id = $request->filled('project') ? $request->input('project') : '0';
        }

        $news->save();

        $engnews = new NewsEnglish;

        $engnews->news_id = $news->id;
        $engnews->title = $request->input('title');

        $sub_description = substr($request->input('description'), strpos($request->input('description'), '://') + 3, 5);

        $engnews->description = $request->filled('description') ? $request->input('description') : '0';
        $engnews->content = $request->input('content');
        $engnews->save();

        $this->saveToLog(self::NEWS, $news->id, 'one of News Created');
        return redirect()->back()->with('success', 'News ' . $news->id . ' has been created');
    }

    /////////////////////////////////////////////////////////////////////////////////
    public function show($id)
    {
        if (!is_numeric($id)) {
            return view('new.errors.404');
        }
        $news = News::with('english', 'edition')->where('id', $id)->first();
        if (!isset($news)) {
            return view('new.errors.404');
        }
        $selectedEdition = Edition::where('id', $news->edition_id)->first();
        $images = NewsImage::where('news_id', $id)->orderby('image_order')->get();

        return view('new.admin.news.view', ['news' => $news, 'images' => $images,'selectedEdition'=>$selectedEdition]);
    }

    public function edit($id)
    {
        $microProjects = Project::with('english')->where('MPE_Done', '1')->where('MPE_Published', '1')->get();
        $what_categories = WhatCategory::whereIn('id', [11, 12, 13, 14, 15, 16])->get();
        $who_categories = WhoCategory::all();
        $places = Place::all();
        $editions = Edition::all();

        $newsData = News::with('english')->where('id', $id)->first();

        return view('new.admin.news.edit', ['newsData' => $newsData, 'what_categories' => $what_categories, 'who_categories' => $who_categories, 'places' => $places, 'editions' => $editions, 'microProjects' => $microProjects,

        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(['type' => 'required|numeric', 'what_category_id' => 'required|numeric', 'who_category_id' => 'required|numeric', 'place_id' => 'required', 'title' => 'required|max:100', 'description' => 'max:900', 'content' => 'required', 'edition_id' => 'required|numeric', 'rank' => 'required|numeric', 'video' => 'max:100',]);

        if ($request->input('what_category_id') == '13') //products
        {
            $request->validate(['project_id' => 'required']);
        }

        $news = News::find($id);
        $newsPrev = News::find($id);

        $news->video = $request->filled('video') ? $request->input('video') : '0';
        if ($news->isDirty('video')) {
            $this->saveToLogWithData(self::NEWS, $id, 'Video Edited', $newsPrev->video, $news->video);
        }
//        $news->file = $request->filled('file') ? $request->input('file') : '0';
        if ($file = $request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $path = '/files/news/';
            $file->move($path, $fileName);
            $news->file = $path . $fileName;
        } else $news->file = '0';
//        if ($news->isDirty('file')) {
//            $this->saveToLogWithData(self::NEWS, $id,'File Edited', $newsPrev->file, $news->file);
//        }

        $news->type = $request->input('type');
        $news->rank = $request->input('rank');
        $news->what_category_id = $request->input('what_category_id');
        $news->who_category_id = $request->input('who_category_id');
        $news->place_id = $request->input('place_id');
        $news->edition_id = $request->input('edition_id');

//        if ($request->input('what_category_id') == '13') {
//            $news->project_id = $request->input('project_id');
//            if ($news->isDirty('project_id')) {
//                $microName = Project::where('MicroProject_ID', $request->input('project_id'))->first()['MIE_BeneficiaryName'];
//                $microNamePrev = Project::where('MicroProject_ID', $newsPrev->project_id)->first()['MIE_BeneficiaryName'];
//                $this->saveToLogWithData(self::NEWS, $news->id, 'Link to micro project changed', $microNamePrev, $microName);
//            }
//        }

        $news->save();

        $engNews = NewsEnglish::where('news_id', $id)->first();
        $engNewsPrev = NewsEnglish::where('news_id', $id)->first();
        $engNews->title = $request->input('title');
        if ($engNews->isDirty('title')) {
            $this->saveToLogWithData(self::NEWS, $id, 'Title edited', $engNewsPrev->title, $engNews->title);
        }

        $engNews->description = $request->filled('description') ? $request->input('description') : '0';
        if ($engNews->isDirty('description')) {
            $this->saveToLogWithData(self::NEWS, $id, 'description edited', $engNewsPrev->description, $engNews->description);
        }
        $engNews->content = $request->input('content');
        if ($engNews->isDirty('content')) {
            $this->saveToLogWithData(self::NEWS, $id, 'Content edited', $engNewsPrev->content, $engNews->content);
        }

//        $engNews->edition = $request->input('edition');
//        if ($engNews->isDirty('edition')) {
//            $this->saveToLogWithData(self::NEWS, $id,'Edition edited', $engNewsPrev->edition, $engNews->edition);
//        }

        $engNews->save();

        return redirect('admin\home')->with('success', 'News ' . $news->id . ' has been updated');

    }

    public function destroy($id)
    {
        $news = NEWS::find($id);
        NEWS::destroy($id);
        NewsEnglish::where('news_id', $news->id)->delete();
//        NewsFrench::where('news_id', $news->id)->delete();
        $images = NewsImage::where('news_id', $news->id)->get();
        NewsImage::where('news_id', $news->id)->delete();
        foreach ($images as $image) {
            File::delete($image->path, substr($image->path, 0, -4) . 'b.jpg');
        }
        $this->saveToLog(self::NEWS, $news->id, 'News deleted');
        return redirect()->back()->with('success', 'News ' . $news->id . ' deleted successfully');
    }

    public function online(Request $request)
    {
        $news = NEWS::find($request->input('id'));
        $news->online = '1';
        $news->save();
        return redirect()->back()->with('success', 'News ' . $request->input('id') . ' is online');
    }

    public function offline(Request $request)
    {
        $news = NEWS::find($request->input('id'));
        $news->online = '0';
        $news->save();
        return redirect()->back()->with('success', 'News ' . $request->input('id') . ' is offline');
    }

    public function edition()
    {
        $editions = Edition::all();
        return view('new.admin.news.edition', ['editions' => $editions,]);
    }

    public function edition_store(Request $request)
    {
//        $request->validate(['name' => 'required', 'name_french' => 'required',]);
        $request->validate(['name' => 'required']);

        $edition = new Edition;
        $edition->name = $request->input('name');
//        $edition->name_french = $request->input('name_french');
        $edition->name_french = '';
        $edition->save();

        $this->saveToLog(self::EDITIONS, $edition->id, 'one of edition Created');
        return redirect()->back()->with('success', 'Edition ' . $edition->id . ' has been created');
    }

    public function edition_destroy($id)
    {
        Edition::destroy($id);
        $this->saveToLog(self::EDITIONS, $id, 'Edition deleted');
        return redirect()->back()->with('success', 'Edition ' . $id . ' deleted successfully');
    }

    public function subscriber_destroy($id)
    {
        Subscriber::destroy($id);
        $this->saveToLog(self::SUBSCRIBERS, $id, 'Subscriber deleted');
        return redirect()->back()->with('success', 'Subscriber ' . $id . ' deleted successfully');
    }

    public function file_destroy($path)
    {
        $news = NEWS::find($path);
        File::delete($news->file);
        $news->file = '0';
        $news->save();
        return redirect()->back();
    }

    public function mark_online(Request $request)
    {
        $edition = Edition::where('id', $request->input('ID'))->first();
        $edition->online = '1';
        $edition->save();
        return redirect()->back()->with('success', 'Edition ' . $request->input('ID') . ' is online');
    }

    public function mark_offline(Request $request)
    {
        $edition = Edition::where('id', $request->input('ID'))->first();
        $edition->online = '0';
        $edition->save();
        return redirect()->back()->with('success', 'Edition ' . $request->input('ID') . ' is offline');
    }

    public function Englishchecked(Request $request)
    {
        $news = NEWS::find($request->input('id'));
        $news->english_check = '1';
        $news->timestamps = false;
        $news->save();
//      $news->saveToLog(self::NEWS, $request->input('id'),'English Checked');
        return redirect()->back()->with('success', 'NEWS ' . $request->input('id') . ' English Checked');
    }

    public function sendEmail(Request $request)
    {
        //list of mails
        $mails = $request->ids;
        foreach ($mails as $key => $mail) {
            // find token
            $sub = Subscriber::where('mail',$mail)->first();
            $unsubscribeToken = $sub->token;

            // Generate unsubscribe link
            $unsubscribeLink = route('unsubscribe.confirm', ['token' => $unsubscribeToken]);
            Mail::to($mail)->send(new UserEmail($unsubscribeLink));
        }
        return response()->json(['success' => 'Email Sent Successfully.']);
    }
    public function sendEmailAll()
    {
        $subscribers = Subscriber::all();
        $failedEmails = [];
        foreach ($subscribers as $key => $subscriber) {
            try {
                // Generate token
                $sub = Subscriber::where('mail', $subscriber->mail)->first();
                $unsubscribeToken = $sub->token;

                // Generate unsubscribe link
                $unsubscribeLink = route('unsubscribe.confirm', ['token' => $unsubscribeToken]);
                Mail::to($subscriber->mail)->send(new UserEmail($unsubscribeLink));
            }catch (\Exception $e) {
                $failedEmails[] = $subscriber->mail;
            }
        }
        return response()->json(['success' => 'Email Sent Successfully.' ,'failed' => $failedEmails,]);
    }

    public function unsubscribe($token)
    {
        $edition = Edition::all()->select('id')->last();
        $subscriber = $this->findByToken($token);

        if ($subscriber) {
            Subscriber::find($subscriber->id)->delete();
            return view('new.public.unsubscribe',['edition' => $edition]);
        }
//        Log::error('Subscriber not found by token: ' . $token);

        return response()->view('new.errors.404', [], 404);
    }
    public static function findByToken($token)
    {
        $sub = Subscriber::where('token', $token)->first();
        return $sub;
    }
}
