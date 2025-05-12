<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use App\Models\Knowledge;
use App\Models\KnowledgeType;
use App\Models\ProjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function profile()
    {
        $profile = Profile::firstOrNew();
        return view('admin.profile', compact('profile'));
    }

    public function project()
    {
        $projects = Project::all();
        $projectTypes = ProjectType::all();
        return view('admin.project', compact('projects', 'projectTypes'));
    }

    public function detailproject($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.detailproject', compact('project'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'profile_content' => 'required|string',
        ]);

        $profile = Profile::firstOrNew();
        $profile->content = $validated['profile_content'];
        $profile->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function createproject(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'status' => 'required|string',
            'url_demo' => 'nullable|url',
            'project_type_id' => 'nullable|exists:project_types,id',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $imageName = time() . '_' . $image->getClientOriginalName();
            
            // Lưu ảnh vào thư mục public/images
            $publicPath = public_path('images');
            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0777, true);
            }
            $image->move($publicPath, $imageName);
            $imagePath = 'images/' . $imageName;
        }

        Project::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'content' => $validated['content'],
            'status' => $validated['status'],
            'url_demo' => $validated['url_demo'],
            'project_type_id' => $validated['project_type_id'],
            'images' => $imagePath
        ]);

        return redirect()->back()->with('success', 'Project created successfully!');
    }

    private function ensureStorageDirectories()
    {
        $storagePath = storage_path('app/public/images');
        if (!file_exists($storagePath)) {
            mkdir($storagePath, 0777, true);
        }

        if (!file_exists(public_path('storage'))) {
            try {
                Artisan::call('storage:link');
            } catch (\Exception $e) {
                if (!file_exists(public_path('storage'))) {
                    mkdir(public_path('storage'), 0777, true);
                }
                if (!file_exists(public_path('storage/images'))) {
                    mkdir(public_path('storage/images'), 0777, true);
                }
            }
        }
    }

    public function editproject($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.editproject', compact('project'));
    }

    public function updateproject(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $project = Project::findOrFail($id);
        $description = $this->processBase64Images($validated['description']);

        $data = [
            'title' => $validated['title'],
            'content' => $validated['content'],
            'description' => $description
        ];

        if ($request->hasFile('images')) {
            // Delete old image if exists
            if ($project->images) {
                $oldImagePath = public_path($project->images);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image = $request->file('images');
            $imageName = time() . '_' . $image->getClientOriginalName();
            
            // Lưu ảnh vào thư mục public/images
            $publicPath = public_path('images');
            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0777, true);
            }
            $image->move($publicPath, $imageName);
            $data['images'] = 'images/' . $imageName;
        }

        $project->update($data);

        return redirect()->route('admin.project')->with('success', 'Project updated successfully!');
    }

    private function processBase64Images($description)
    {
        if (preg_match_all('/<img[^>]+src="data:image\/([^;]+);base64,([^\"]+)"/', $description, $matches)) {
            foreach ($matches[0] as $key => $imgTag) {
                $imageType = $matches[1][$key];
                $base64Image = $matches[2][$key];
                $imageDecoded = base64_decode($base64Image);
                $imageName = 'image_' . time() . '_' . $key . '.' . $imageType;
                $imagePath = 'images/' . $imageName;
                
                // Lưu ảnh vào thư mục public/images thay vì storage
                $publicPath = public_path('images');
                if (!file_exists($publicPath)) {
                    mkdir($publicPath, 0777, true);
                }
                file_put_contents($publicPath . '/' . $imageName, $imageDecoded);
                
                // Sử dụng đường dẫn tuyệt đối cho ảnh
                $imageUrl = url('images/' . $imageName);
                $description = str_replace($imgTag, '<img src="' . $imageUrl . '"', $description);
            }
        }
        return $description;
    }

    public function deleteproject($id)
    {
        Project::findOrFail($id)->delete();
        return redirect()->route('admin.project')->with('success', 'Project deleted successfully!');
    }

    public function knowledge(Request $request)
    {
        $knowledgeTypes = KnowledgeType::all();
        $selectedType = $request->input('type');

        $knowledges = Knowledge::when($selectedType, function ($query, $selectedType) {
            return $query->where('knowledge_type_id', $selectedType);
        })->get();

        return view('admin.knowledge', compact('knowledges', 'knowledgeTypes', 'selectedType'));
    }

    public function createknowledge(Request $request)
    {
        $validated = $request->validate([
            'knowledge_type_id' => 'required|exists:knowledge_types,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Knowledge::create($validated);
        return redirect()->back()->with('success', 'Knowledge created successfully!');
    }

    public function createtypeknowledge(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
        ]);

        KnowledgeType::create($validated);
        return redirect()->back()->with('success', 'Knowledge type created successfully!');
    }

    public function detailknowledge($id)
    {
        $knowledge = Knowledge::findOrFail($id);
        return view('admin.detailknowledge', compact('knowledge'));
    }

    public function editKnowledge($id)
    {
        $knowledge = Knowledge::findOrFail($id);
        $knowledgeTypes = KnowledgeType::all();
        return view('admin.editknowledge', compact('knowledge', 'knowledgeTypes'));
    }

    public function updateKnowledge(Request $request, $id)
    {
        $validated = $request->validate([
            'knowledge_type_id' => 'required|exists:knowledge_types,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Knowledge::findOrFail($id)->update($validated);
        return redirect()->route('admin.knowledge')->with('success', 'Knowledge updated successfully.');
    }

    public function deleteknowledge($id)
    {
        Knowledge::findOrFail($id)->delete();
        return redirect()->route('admin.knowledge')->with('success', 'Knowledge deleted successfully!');
    }
}
