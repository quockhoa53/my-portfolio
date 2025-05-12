<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Project;
use Illuminate\Support\Facades\Mail;
use App\Models\KnowledgeType;
use App\Models\Knowledge;

class PagesController extends Controller
{
    public function index(){
        $profile = Profile::first() ?? new Profile();
        $projects = Project::orderBy('priority', 'asc')->take(3)->get();
        return view('index', compact('profile', 'projects'));
    }

    public function profiledetail(){
        $profile = Profile::first() ?? new Profile();
        return view('profiledetail', compact('profile'));
    }

    public function project(){
        $projects = Project::orderBy('priority', 'asc')->paginate(6);
        return view('project', compact('projects'));
    }
    
    public function projectdetail($id)
    {
        $project = Project::find($id);
        if (!$project) {
            return redirect()->route('index')->with('error', 'Project not found.');
        }
        return view('projectdetail', compact('project'));
    }

    public function contract(){
        return view('contract');
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'messageBody' => $request->input('message'),
        ];

        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->to('nguyenquockhoa5549@gmail.com')
                    ->subject($data['subject'])
                    ->from($data['email'], $data['name']);
        });

        return back()->with('success', 'Tin nhắn của bạn đã được gửi thành công!');
    }

    public function knowledge(){
        $knowledgeTypes = KnowledgeType::with('knowledges')->get();
        return view('knowledge', compact('knowledgeTypes'));
    }

    public function detailknowledge($id)
    {
        $knowledge = Knowledge::findOrFail($id);
        return view('knowledgedetail', compact('knowledge'));
    }
}
