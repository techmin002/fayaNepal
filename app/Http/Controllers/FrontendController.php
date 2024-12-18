<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Donation;
use Illuminate\Http\Request;
use Modules\Advertisement\Entities\Story;
use Modules\Blog\Entities\Blog;
use Modules\Blog\Entities\Event;
use Modules\Gallery\Entities\Gallery;
use Modules\Gallery\Entities\GalleryCategory;
use Modules\Notice\Entities\Notice;
use Modules\Partner\Entities\Partner;
use Modules\Service\Entities\Program;
use Modules\Service\Entities\ProgramCategory;
use Modules\Setting\Entities\CompanyProfile;
use Modules\Slider\Entities\Slider;
use Modules\Team\Entities\ExecutiveBoard;
use Modules\Team\Entities\Leadership;
use Modules\Team\Entities\Publication;
use Modules\Team\Entities\Report;
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
    public function currentPrograms()
    {
        $data['programs'] = Program::where('status', 'on')->where('program_type','current')->orderby('created_at', 'DESC')->get();
        $data['testimonials'] = Testimonial::where('status', 'on')->orderby('created_at', 'DESC')->get();
        $data['stories'] = Story::where('status', 'on')->orderby('created_at', 'DESC')->get();

        return view('frontend.pages.program-list', compact('data'));
    }
    public function pastPrograms()
    {
        $data['programs'] = Program::where('status', 'on')->where('program_type','past')->orderby('created_at', 'DESC')->get();
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
        $image_url = asset('upload/images/notice/' . $notice->image);
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
    public function partnersDonors()
    {
        $data['currentpartners'] = Partner::where('status', 'on')->where('type', 'current')->get();
        $data['pastpartners'] = Partner::where('status', 'on')->get();
        return view('frontend.pages.partners-donors', compact('data'));
    }

    public function coverage()
    {
        return view('frontend.pages.coverage');
    }

    public function noticeboard()
    {
        $notices = Notice::orderBy('created_at', 'DESC')->get();
        return view('frontend.pages.noticeboard', compact('notices'));
    }

    public function vollunter()
    {
        $data['teams'] = Team::where('status', 'on')->get();
        $data['profile'] = CompanyProfile::select('mission', 'vision', 'introduction')->first();
        return view('frontend.pages.vollunter', compact('data'));
    }

    // public function currentproject(){
    // $data['programs'] = Program::where('status', 'on')->orderby('created_at', 'DESC')->get();
    // $data['testimonials'] = Testimonial::where('status', 'on')->orderby('created_at', 'DESC')->get();
    // $data['stories'] = Story::where('status', 'on')->orderby('created_at', 'DESC')->get();
    //     return view('frontend.pages.currentproject');
    // }


    public function stories()
    {
        $data['stories'] = Story::where('status', 'on')->orderby('created_at', 'DESC')->get();
        return view('frontend.pages.storage', compact('data'));
    }

    public function works($slug)
    {
        $data['category'] = ProgramCategory::where('slug', $slug)->first();
        $data['programs'] = Program::where('category_id', $data['category']->id)->get();
        return view('frontend.pages.works', compact('data'));
    }

    public function leadership()
    {
        $leaderships = Leadership::where('status', 'on')->get();
        return view('frontend.pages.leadership', compact('leaderships'));
    }

    public function publication()
    {
        $publications = Publication::where('status', 'on')->get();
        return view('frontend.pages.publication', compact('publications'));
    }
    public function annualReport()
    {
        $reports = Report::where('report_type', 'annual')->get();
        return view('frontend.pages.annual-report', compact('reports'));
    }
    public function projectReport()
    {
        $reports = Report::where('report_type', 'project')->get();
        return view('frontend.pages.project-report', compact('reports'));
    }
    public function executiveBoard(){
        $executives = ExecutiveBoard::where('status','on')->orderBy('position','ASC')->get();
        return view('frontend.pages.executive-board', compact('executives'));
         
    }
    public function donate(){
        $bank = BankAccount::where('status','on')->first();
        return view('frontend.pages.donate-now', compact('bank'));
         
    }
    public function donateStore(Request $request)
    {
        
        if ($request->receipt)
        {
            $imageName = time().'.'.$request->receipt->extension();

            $request->receipt->move(public_path('upload/images/donations'), $imageName);

        }else{
            $imageName = 'n/a';
        }
        $donation = Donation::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'amount' => $request['amount'],
        'message' => $request['message'],
        'status' => 'unpaid',
        'receipt' => $imageName
        ]);
        
        return redirect()->route('frontend.index')->with('success','Thank You for the Donation. Will Verify and Back to You.');

    }
}
