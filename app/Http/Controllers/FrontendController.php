<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Advertisement\Entities\Story;
use Modules\Blog\Entities\Blog;
use Modules\Blog\Entities\Event;
use Modules\Gallery\Entities\Gallery;
use Modules\Gallery\Entities\GalleryCategory;
use Modules\Notice\Entities\Notice;
use Modules\Partner\Entities\Partner;
use Modules\Service\Entities\Program;
use Modules\Setting\Entities\CompanyProfile;
use Modules\Slider\Entities\Slider;
use Modules\Team\Entities\Team;
use Modules\Testimonial\Entities\Testimonial;

class FrontendController extends Controller
{
    public function index()
    {
        $data['sliders'] = Slider::where('status', 'on')->orderBy('created_at', 'DESC')->get();
        $data['currentProgram'] = Program::where('program_type', 'current')->orderBy('created_at', 'DESC')->get();
        $data['pastProgram'] = Program::where('program_type', 'past')->orderBy('created_at', 'DESC')->get();
        $data['testimonials'] = Testimonial::where('status', 'on')->orderBy('created_at', 'DESC')->get();
        $data['stories'] = Story::where('status', 'on')->orderBy('created_at', 'DESC')->get();
        return view('welcome', compact('data'));
    }
    public function about()
    {
        $data['currentpartners'] = Partner::where('status', 'on')->where('type', 'current')->get();
        $data['pastpartners'] = Partner::where('status', 'on')->get();
        $data['teams'] = Team::where('status', 'on')->get();
        $data['profile'] = CompanyProfile::select('mission', 'vision', 'introduction')->first();
        return view('frontend.pages.about', compact('data'));
    }
    public function programs()
    {
        $data['programs'] = Program::where('status', 'on')->orderby('created_at', 'DESC')->get();
        $data['testimonials'] = Testimonial::where('status', 'on')->orderby('created_at', 'DESC')->get();
        $data['stories'] = Story::where('status', 'on')->orderby('created_at', 'DESC')->get();

        return view('frontend.pages.program-list', compact('data'));
    }
    public function events()
    {
        $data['events'] = Event::where('status', 'on')->get();
        $data['stories'] = Story::where('status', 'on')->orderby('created_at', 'DESC')->get();

        return view('frontend.pages.event-list', compact('data'));
    }
    public function blogs()
    {
        $data['blogs'] = Blog::where('status', 'on')->get();
        $data['stories'] = Story::where('status', 'on')->orderby('created_at', 'DESC')->get();

        return view('frontend.pages.blog-list', compact('data'));
    }
    public function blogDetail($slug)
    {
        $data['blog'] = Blog::where('status', 'on')->where('slug', $slug)->first();
        $data['blogs'] = Blog::where('status', 'on')->whereNot('slug', $slug)->get();
        return view('frontend.pages.blog-details', compact('data'));
    }
    public function programDetail($slug)
    {
        $data['blog'] = Program::where('status', 'on')->where('slug', $slug)->first();
        $data['blogs'] = Program::where('status', 'on')->whereNot('slug', $slug)->get();
        return view('frontend.pages.program-details', compact('data'));
    }
    public function eventDetail($slug)
    {
        $data['blog'] = Event::where('status', 'on')->where('id', $slug)->first();
        $data['blogs'] = Event::where('status', 'on')->whereNot('id', $slug)->get();
        return view('frontend.pages.event-details', compact('data'));
    }
    public function storyDetail($slug)
    {
        $data['blog'] = Story::where('status', 'on')->where('id', $slug)->first();
        $data['blogs'] = Story::where('status', 'on')->whereNot('id', $slug)->get();
        return view('frontend.pages.story-detail', compact('data'));
    }
    public function contact()
    {
        $data['profile'] = CompanyProfile::first();
        $data['stories'] = Story::where('status', 'on')->orderby('created_at', 'DESC')->get();

        return view('frontend.pages.contact', compact('data'));
    }
    public function gallery()
    {
        $data['profile'] = CompanyProfile::first();
        $data['categories'] = GalleryCategory::where('status', 'on')->with('galleries')->orderby('created_at', 'DESC')->get();
        $data['galleries'] = Gallery::where('status', 'on')->get();
        return view('frontend.pages.gallery', compact('data'));
    }
    public function fetchNotice()
    {
        $notice = Notice::where('status', 'on')->orderBy('created_at', 'desc')->first();
        $image_url= asset('upload/images/notice/'.$notice->image);
        if ($notice) {
            return response()->json([
                'title' => $notice->title,
                'content' => $notice->description,
                'image_url' => $image_url,
            ]);
        }
        // Return an empty response if no active notice exists
        return response()->json(null);
    }
    public function partnersDonors(){
        $data['currentpartners'] = Partner::where('status', 'on')->where('type', 'current')->get();
        $data['pastpartners'] = Partner::where('status', 'on')->get();
        return view('frontend.pages.partners-donors', compact('data'));
    }
    
       public function coverage(){
        return view('frontend.pages.coverage');
       }

        public function noticeboard(){
            $notices = Notice::orderBy('created_at','DESC')->get();
            return view('frontend.pages.noticeboard', compact('notices'));
        }
         
        public function vollunter(){
            $data['teams'] = Team::where('status', 'on')->get();
            $data['profile'] = CompanyProfile::select('mission', 'vision', 'introduction')->first();
            return view ('frontend.pages.vollunter', compact('data'));

        }

        // public function currentproject(){
        // $data['programs'] = Program::where('status', 'on')->orderby('created_at', 'DESC')->get();
        // $data['testimonials'] = Testimonial::where('status', 'on')->orderby('created_at', 'DESC')->get();
        // $data['stories'] = Story::where('status', 'on')->orderby('created_at', 'DESC')->get();
        //     return view('frontend.pages.currentproject');
        // }

        
            public function storege(){
                $data['stories'] = Story::where('status', 'on')->orderby('created_at', 'DESC')->get();
                return view('frontend.pages.storage',compact('data'));

            }

            public function works(){
                return view('frontend.pages.works');
            }
        
} 
