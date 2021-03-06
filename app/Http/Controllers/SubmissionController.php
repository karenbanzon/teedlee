<?php

namespace Teedlee\Http\Controllers;

use Illuminate\Http\Request;
use Teedlee\Http\Requests;
use \Teedlee\Models\Submission;
use \Teedlee\Models\Contest;
use Carbon\Carbon;
use Teedlee\Http\Requests\UpdateSubmission;
use Teedlee\Providers\ShopifyServiceProvider as Shopify;

class SubmissionController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        (new Contest())->searchAndUpdate();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('submission.index')
            ->with('contests', (new Contest())->active())
            ->with('carbon', new Carbon())
            ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $submission = new Submission();
        return $this->edit($submission->create([
//            'contest_id' => $request->contest,
            'user_id' => \Auth::user()->id,
            'title' => ' ',
            'description' => ' ',
            'status' => 'draft',
            'tags' => ' ',
            'price' => 0,
            'created_at' => Carbon::now()->toDateTimeString()
        ]));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($submission)
    {
        return view('submission.create')->with('submission', $submission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubmission $request, $submission)
    {
        if( count($submission->images) < 1 ) {
            return redirect('submissions/'.$submission->id.'/edit')->with('error', 'Upload at least 1 design image.')->withInput();
        }

        $new = $submission->status == 'draft';
        $submission->title = $request->title;
        $submission->status = 'submitted';
        $submission->save();

        if( $new  )
        {
            $submission->link = secure_url('user/submissions');
            $user = \Auth::user();
            \Mail::send('submission.email.submit', ['submission' => $submission, 'user' => $user], function ($m) use ($submission, $user) {
                $m->from(env('MAIL_FROM'), env('MAIL_FROM_NAME'));
                $m->to($user->email, $user->username);
                $m->subject("We've received your design!");
            });
        }

        return redirect('user/submissions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('destroy');
    }

    public function products()
    {
        $shopify = new Shopify(new \Oseintow\Shopify\Facades\Shopify());
        dd($shopify->sales());
    }

    public function _vendors()
    {
        $vendors = [];
        foreach ( $this->_products() as $product)
        {
            $vendors[$product->vendor][] = $product;
        }
    }

    private function initShopify()
    {
        return Shopify::setShopUrl(config('shopify.domain'))
            ->setAccessToken(config('shopify.token'));
    }
}