<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsImage;
use App\NewsFrench;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsFrenchController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','french']);
    }

    public function create($id)
    {
        $newsData = News::with('english')->where('id', $id)->first();
        return view('admin.news.french.create')->with('newsData', $newsData);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'title' => 'required',
            'description' => 'required|max:1100',
            'content' => 'required',
        ]);
        $frenchNews = new NewsFrench();
        $frenchNews->news_id = $request->input('id');
        $frenchNews->title = $request->input('title');
        $frenchNews->description = $request->filled('description') ? $request->input('description') : '.';
        $frenchNews->content = $request->filled('content') ? $request->input('content') : '.';

        $frenchNews->translation_paid = '0';
        $frenchNews->save();
        DB::table('news')->where('id',$request->input('id'))->update(['french_translation' => '1']);
        $this->saveToLog(self::NEWS, $request->input('id'),'Translated');
        return redirect()->route('projects_french_index')->with('news','News has been added to translated ones');
    }

    public function show($id)
    {
        if (!is_numeric($id)) {
            return view('errors.404');
        }
        $news = News::with('french','edition')->where('id', $id)->first();
        if (!isset($news)) {
            return view('errors.404');
        }
        $images = NewsImage::where('news_id',$id)->get();

        return view('admin.news.french.view', [
            'news' => $news,
            'language' => 'french',
            'images' => $images,

        ]);
    }

    public function edit($id)
    {
        $news = News::with('english', 'french')->where('id',$id)->first();
        return view('admin.news.french.edit', ['newsData' => $news]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required|max:1100',
            'content' => 'required',
        ]);
        $frenchNews = NewsFrench::where('news_id',$id)->first();
        $frenchNewsPrev = NewsFrench::where('news_id',$id)->first();
        $frenchNews->title = $request->input('title');
        if ($frenchNews->isDirty('title')) {
            $this->saveToLogWithData(self::NEWS, $id, 'Title edited (French)', $frenchNewsPrev->title, $frenchNews->title);
        }

        $frenchNews->description = $request->input('description');
        if ($frenchNews->isDirty('description')) {
            $this->saveToLogWithData(self::NEWS, $id, 'Description edited (French)', $frenchNewsPrev->description, $frenchNews->description);
        }
        $frenchNews->content= $request->input('content');
        if ($frenchNews->isDirty('content')) {
            $this->saveToLogWithData(self::NEWS, $id, 'Content edited (French)', $frenchNewsPrev->content, $frenchNews->content);
        }
        $frenchNews->save();
        return redirect()->route('projects_french_index')->with('news', 'News '.$id.' has been updated');
    }

    public function paid($id){
        $news = NewsFrench::where('news_id' ,$id)->first();
        $news->translation_paid = '1';
        $news->save();
        $this->saveToLog(self::NEWS, $id, 'Translation Paid');
    }

}
