<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Website;
use App\Models\About;
use App\Models\Timeline;
use App\Models\Skill;
use App\Models\Work;
use App\Models\Experience;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class WebsiteController extends Controller
{
    public function welcome(){
        $websites = Website::all();
        $abouts = About::all();
        $timelines = Timeline::all();
        $skills = Skill::all();
        $works = Work::all();
        $experiences = Experience::all();
    
        return view('welcome', ['websites' => $websites, 'abouts' => $abouts, 'timelines' => $timelines, 'skills' => $skills, 'works' => $works, 'experiences' => $experiences]);
    }    

    public function website(){
        $websites = Website::all();
        return view('admin/website', ['websites' => $websites]);
    }
    
    public function create(){
        return view('admin/create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'instagram' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'github'=> 'required'
        ]);

        $newWebsite = Website::create($data);
        return redirect(route('WebsiteName.show'));
    }

    public function edit(Website $website){
        return view('admin/edit', ['website' => $website]);
    }

    public function update(Website $website, Request $request){
        $data = $request->validate([
            'instagram' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'github'=> 'required'
        ]);

        $website->update($data);
        return redirect(route('WebsiteName.show'))->with("success", "Website Information Updated Successfully.");
    }

    public function delete($id){
        $websites = Website::find($id);
        $websites->delete();
        return redirect(route('WebsiteName.show'))->with("danger", "Website Data deleted successfully.");
    }

    public function about()
    {
        $abouts = About::all();
        return view('admin/about', ['abouts' => $abouts]);
    }

    public function editAbout(int $id){
        $about = About::findOrFail($id);
        return view('admin/editAbout', compact('about'));
    }
    
    public function updateAbout(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'job' => 'required',
            'country' => 'required',
            'description' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
            'zip_code' => 'required',
        ]);
    
        $about = About::findOrFail($id);
    
        // Check if a new CV file has been uploaded
        if($request->hasFile('cv')){
            $file = $request->file('cv');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'uploads/files/';
            $file->move($path, $filename);
    
            // Delete old file if it exists
            if($about->cv){
                Storage::delete($about->cv);
            }
    
            $about->cv = $path.$filename;
        }
    
        $about->name = $request->name;
        $about->job = $request->job;
        $about->country = $request->country;
        $about->description = $request->description;
        $about->date_of_birth = $request->date_of_birth;
        $about->address = $request->address;
        $about->zip_code = $request->zip_code;
        $about->save();
    
        return redirect(route('about.show'));
    }
    

    public function createAbout(){
        return view('admin/createAbout');
    }

    public function storeAbout(Request $request){
        $request->validate([
            'name' => 'required',
            'job' => 'required',
            'country' => 'required',
            'description' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
            'zip_code' => 'required',
            'cv' => 'nullable'
        ]);

        if($request->has('cv')){

            $file = $request->file('cv');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/files/';
            $file->move($path, $filename);
        }

        About::create([
            'name' => $request->name,
            'job' => $request->job,
            'country' => $request->country,
            'description' => $request->description,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'zip_code' =>$request->zip_code,
            'cv' => $path.$filename, 
        ]);
        return redirect(route('about.show'));
    }

    public function deleteAbout($id){
        $abouts = About::find($id);
        $abouts->delete();
        return redirect(route('about.show'))->with("danger", "About Data deleted successfully.");
    }

    public function timeline(){
        $timelines = Timeline::all();
        return view('admin/timeline', ['timelines' => $timelines]);
    }

    public function createTimeline(){
        return view('admin/createTimeline');
    }

    public function storeTimeline(Request $request){
        $request->validate([
            'course' => 'required',
            'year' => 'required',
            'school' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg'
        ]);

        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/images/';
            $file->move($path, $filename);
        }

        Timeline::create([
            'course' => $request->course,
            'year' => $request->year,
            'school' => $request->school,
            'image' => $path.$filename, 
        ]);
        return redirect(route('timeline.show'));
    }

    public function editTimeline(int $id){
        $timeline = Timeline::findOrFail($id);
        return view('admin/editTimeline', compact('timeline'));
    }

    public function updateTimeline(int $id, Request $request){
        $request->validate([
            'course' => 'required',
            'year' => 'required',
            'school' => 'required',
            'image' => 'nullable',
        ]);

        $timeline = Timeline::findOrFail($id);
        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/images/';
            $file->move($path, $filename);
        }
        if(File::exists($timeline->image)){
            File::delete($timeline->image);
        }

        $timeline->update([
            'course' => $request->course,
            'year' => $request->year,
            'school' => $request->school,
            'image' => $path.$filename, 
        ]);
        return redirect(route('timeline.show'))->with("success", "Timeline Updated Successfully.");
    }
    public function deleteTimeline($id){
        $timelines = Timeline::find($id);
        $timelines->delete();
        return redirect(route('timeline.show'))->with("danger", "Timeline Deleted Successfully.");
    }

    public function skill(){
        $skills = Skill::all();
        return view('admin/skill', ['skills' => $skills]);
    }

    public function createSkill(){
        return view('admin/createSkill');
    }

    public function storeSkill(Request $request){
        $request->validate([
            'skill' => 'required',
            'experience' => 'nullable',
            'name' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg'
        ]);

        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/skills/';
            $file->move($path, $filename);
        }

        Skill::create([
            'skill' => $request->skill,
            'experience' => $request->experience,
            'name' => $request->name,
            'image' => $path.$filename, 
        ]);
        return redirect(route('skill.show'));
    }

    public function editSkill(int $id){
        $skill = Skill::findOrFail($id);
        return view('admin/editSkill', compact('skill'));
    }

    public function updateSkill(int $id, Request $request){
        $request->validate([
            'skill' => 'required',
            'experience' => 'nullable',
            'name' => 'required',
            'image' => 'nullable',
        ]);

        $skill = Skill::findOrFail($id);
        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/skills/';
            $file->move($path, $filename);
        }
        if(File::exists($skill->image)){
            File::delete($skill->image);
        }

        $skill->update([
            'skill' => $request->skill,
            'experience' => $request->experience,
            'name' => $request->name,
            'image' => $path.$filename, 
        ]);
        return redirect(route('skill.show'))->with("success", "Skills Updated Successfully.");
    }

    public function deleteSkill($id){
        $skills = Skill::find($id);
        $skills->delete();
        return redirect(route('skill.show'))->with("danger", "Skills Deleted Successfully.");
    }

    public function work(){
        $works = Work::all();
        return view('admin/work', ['works' => $works]);
    }

    public function createWork(){
        return view('admin/createWork');
    }

    public function storeWork(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable',
            'link' => 'nullable',
            'github' => 'nullable'
        ]);

        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/works/';
            $file->move($path, $filename);
        }

        Work::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path.$filename, 
            'link' => $request->link,
            'github' => $request->github
        ]);
        return redirect(route('work.show'));
    }

    public function editWork(int $id){
        $work = Work::findOrFail($id);
        return view('admin/editWork', compact('work'));
    }

    public function updateWork(int $id, Request $request){
        $request->validate([
            'name' => 'required',
            'image' => 'nullable',
            'description' => 'nullable',
            'link' => 'nullable',
            'github' => 'nullable',
        ]);

        $work = Work::findOrFail($id);
        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/works/';
            $file->move($path, $filename);
        }
        if(File::exists($work->image)){
            File::delete($work->image);
        }

        $work->update([
            'name' => $request->name,
            'image' => $path.$filename, 
            'description' => $request->description,
            'link' => $request->link,
            'github' => $request->github
        ]);
        return redirect(route('work.show'))->with("success", "Works Updated Successfully.");
    }

    public function deleteWork($id){
        $works = Work::find($id);
        $works->delete();
        return redirect(route('work.show'))->with("danger", "Works Deleted Successfully.");
    }

    public function experience(){
        $experiences = Experience::all();
        return view('admin/experience', ['experiences' => $experiences]);
    }

    public function createExperience(){
        return view('admin/createExperience');
    }

    public function storeExperience(Request $request){
        $request->validate([
            'project' => 'required',
            'role' => 'nullable',
            'year' => 'nullable',
            'image' => 'nullable'
        ]);

        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/experience/';
            $file->move($path, $filename);
        }

        Experience::create([
            'project' => $request->project,
            'role' => $request->role,
            'year' => $request->year,
            'image' => $path.$filename
        ]);
        return redirect(route('experience.show'));
    }

    public function editExperience(int $id){
        $experience = Experience::findOrFail($id);
        return view('admin/editExperience', compact('experience'));
    }

    public function updateExperience(int $id, Request $request){
        $request->validate([
            'project' => 'required',
            'role' => 'nullable',
            'year' => 'nullable',
            'image' => 'nullable',
        ]);

        $experience = Experience::findOrFail($id);
        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/experience/';
            $file->move($path, $filename);
        }
        if(File::exists($experience->image)){
            File::delete($experience->image);
        }

        $experience->update([
            'project' => $request->project,
            'role' => $request->role,
            'year' => $request->year,
            'image' => $path.$filename,
        ]);
        return redirect(route('experience.show'))->with("success", "Experience Updated Successfully.");
    }

    public function deleteExperience($id){
        $experiences = Experience::find($id);
        $experiences->delete();
        return redirect(route('experience.show'))->with("danger", "Experience Deleted Successfully.");
    }

    public function storeContact(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'nullable',
            'message' => 'required'
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);
    
        if($this->isOnline()){
            $mail_data = [
                'recipient' => 'mtth3w9@gmail.com',
                'fromEmail' => $request->email,
                'fromName' => $request->name,
                'subject' => $request->subject ?? 'No Subject',
                'body' => $request->message,
            ];
    
            \Mail::send('mail', $mail_data, function($message) use ($mail_data){
                $message->to($mail_data['recipient'])
                        ->from($mail_data['fromEmail'], $mail_data['fromName'])
                        ->subject($mail_data['subject']);
            });
    
            return redirect()->back()->with('success');
        } else {
            return redirect()->back()->with('error');
        }
    
        return redirect()->route('WebsiteName.index');
    }
    
    
    

    public function isOnline($site = "https://youtube.com/"){
        if(@fopen($site, "r")){
            return true;
        }else{
            return false;
        }
    }



    public function user(){
        $users = User::all();
        return view('admin/user', ['users' => $users]);
    }

    public function createUser(){
        return view('admin/createUser');
    }

    public function editUser(int $id){
        $user = User::findOrFail($id);
        return view('admin/editUser', compact('user'));
    }

    public function updateUser(int $id, Request $request){
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'image' => 'nullable',
        ]);

        $user = User::findOrFail($id);
        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/profile/';
            $file->move($path, $filename);
        }
        if(File::exists($user->image)){
            File::delete($user->image);
        }

        $user->update([
            'name' => $request->name,
            'image' => $path.$filename, 
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        return redirect(route('user.show'))->with("success", "User Updated Successfully.");
    }

}
