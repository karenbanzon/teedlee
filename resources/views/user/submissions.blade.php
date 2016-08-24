@extends('master')
@section('content')
    <section class="row">
        <div class="small-12 medium-8 medium-offset-2">
            <hr>
            <h4 class="text-center">My Account</h4>
            <hr>
        </div>
        <div class="small-12">
            @include('user/sidebar')
            <div class="card small-12 medium-10 padding-20">
                <h6>(Option 1)</h6>
                <div class="card small-12 medium-6">
                    <div class="card-container">
                        <div>
                            <img src="http://placehold.it/400x300" alt="">
                        </div>
                        <div class="card-body item">
                            <h6>Waterfalls</h6>
                            <div>
                                <span class="label-pill">Under Review</span>
                            </div>
                            <div>
                                <small>Design ID: <strong>23564</strong></small>
                                <br>
                                <small>Date Submitted: <strong>7 August 2016</strong></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card small-12 medium-6">
                    <div class="card-container">
                        <div>
                            <img src="http://placehold.it/400x300" alt="">
                        </div>
                        <div class="card-body item">
                            <h6>Mountains</h6>
                            <div>
                                <span class="label-pill">Internal Voting</span>
                            </div>
                            <div>
                                <small>Design ID: <strong>23565</strong></small>
                                <br>
                                <small>Date Submitted: <strong>9 August 2016</strong></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card small-12 medium-6">
                    <div class="card-container">
                        <div>
                            <img src="http://placehold.it/400x300" alt="">
                        </div>
                        <div class="card-body item">
                            <h6>Cities and the Metropolis</h6>
                            <div>
                                <span class="label-pill">Public Voting</span>
                            </div>
                            <div>
                                <small>Design ID: <strong>23565</strong></small>
                                <br>
                                <small>Date Submitted: <strong>11 August 2016</strong></small>
                            </div>
                            <div class="card-actions text-center">
                                <hr>
                                <a href="" class="button white">Share to get more votes!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card small-12 medium-6">
                    <div class="card-container">
                        <div>
                            <img src="http://placehold.it/400x300" alt="">
                        </div>
                        <div class="card-body item">
                            <h6>Waves</h6>
                            <div>
                                <span class="label-pill warning">Pending original artwork</span>
                            </div>
                            <div>
                                <small>Design ID: <strong>23565</strong></small>
                                <br>
                                <small>Date Submitted: <strong>11 August 2016</strong></small>
                            </div>
                            <div class="card-actions text-center">
                                <hr>
                                <a href="" class="button white">Submit original artwork</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card small-12 medium-6">
                    <div class="card-container">
                        <div>
                            <img src="http://placehold.it/400x300" alt="">
                        </div>
                        <div class="card-body item">
                            <h6>Desert</h6>
                            <div>
                                <span class="label-pill success">In shop</span>
                            </div>
                            <div>
                                <small>Design ID: <strong>23565</strong></small>
                                <br>
                                <small>Date Submitted: <strong>11 August 2016</strong></small>
                            </div>
                            <div class="card-actions text-center">
                                <hr>
                                <a href="" class="button white">View in shop</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card small-12 medium-6">
                    <div class="card-container">
                        <div>
                            <img src="http://placehold.it/400x300" alt="">
                        </div>
                        <div class="card-body item">
                            <h6>Desert</h6>
                            <div>
                                <span class="label-pill error">Declined</span>
                            </div>
                            <div>
                                <small>Design ID: <strong>23565</strong></small>
                                <br>
                                <small>Date Submitted: <strong>11 August 2016</strong></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card small-12">
                    <hr>
                    <h6>(Option 2)</h6>
                    <table style="width: 100%;">
                        <thead>
                        <tr>
                            <th>Design ID</th>
                            <th>Name</th>
                            <th>Date Submitted</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>11062</td>
                            <td>Waterfalls</td>
                            <td>7 August 2016</td>
                            <td class="text-left"><span class="label-pill">Under Review</span></td>
                            <td class="text-right"></td>
                        </tr>
                        <tr>
                            <td>11063</td>
                            <td>Mountains</td>
                            <td>7 August 2016</td>
                            <td class="text-left"><span class="label-pill">Internal Voting</span></td>
                            <td class="text-right"></td>
                        </tr>
                        <tr>
                            <td>11064</td>
                            <td>Cities</td>
                            <td>7 August 2016</td>
                            <td class="text-left"><span class="label-pill">Public Voting</span></td>
                            <td class="text-right"><a href="" class="button tiny white">Share</a>
                        </tr>
                        <tr>
                            <td>11065</td>
                            <td>Waves</td>
                            <td>7 August 2016</td>
                            <td class="text-left"><span class="label-pill warning">Pending original artwork</span></td>
                            <td class="text-right"><a href="" class="button tiny white">Submit</a>
                        </tr>
                        <tr>
                            <td>11066</td>
                            <td>Desert</td>
                            <td>7 August 2016</td>
                            <td class="text-left"><span class="label-pill success">In shop</span></td>
                            <td class="text-right"><a href="" class="button tiny white">View in shop</a>
                        </tr>
                        <tr>
                            <td>11066</td>
                            <td>Desert</td>
                            <td>7 August 2016</td>
                            <td class="text-left"><span class="label-pill error">Declined</span></td>
                            <td></a>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection