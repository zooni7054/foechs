@extends('layouts.default')

@section('meta-title', $page->meta_title)

@section('meta-description', $page->meta_description)

@section('content')

    <div class="title-area">
        <div class="container">
            <div class="content">
                <h1>Possession Process</h1>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section possession-process">
        <div class="container">
            <h2>Requirement for Application for Possession / Demarcation of Plot</h2>

            <p>Following actions are required to be completed</p>

            <ol>
                <li>Provide 2 x possession forms duly filled.</li>
                <li>Provide photocopies of CNIC and Allotment Letter.</li>
                <li>Provide 2 passport size photographs.</li>
                <li>Deposit possession fee as applicable (Pay order in the name of FOECHS) (Rs. 20,000/- for 150 sq.yds, Rs. 25,000/- for 300 sq.yds and Rs. 30,000 for  600 sq.yds).</li>
                <li>Deposit/claim adjustment of dues as per actual measurement on ground.</li>
                <li>Accept terms & conditions of the society.</li>
            </ol>

            <div class="button-area" style="margin: 30px 0px;">
                <a href="https://foechs.com/uploads/documents/61c429705476c.pdf" target="_blank" class="btn btn-download">Download Application</a>
            </div>

            <h2>PROCEDURE FOR HANDING/TAKING OVER POSSESSION OF PLOT</h2>

            <p>Members are required to complete the following actions</p>

            <ul>
                <li>Clear all outstanding dues.</li>
                <li>Submit application for taking possession on prescribed form.</li>
                <li>On approval of request, visit site of Society along with Surveyor deputed by the Society for physical measurement of the plot area.</li>
                <li>The final accounts for clearance before handing over possession of plot will be prepared by accounts department of the Society based on actual measurements and taking care of shortfalls/additional lands and corner/non corner plots etc. if any.</li>
                <li>Clear the final accounts.</li>
            </ul>

            <p>The Society is required to complete the following actions:</p>

            <ul>
                <li>Accept application for handing/taking over possession of plot on clearance of dues.</li>
                <li>Depute surveyor for physical measurements of plots on any working day in consultation with the applicant. </li>
                <li>Prepare final accounts based on measurement sheet provided by surveyor (to cover additional/shortfall of land and corner/non corner plot etc.)</li>
                <li>Hand over possession of plot on clearance of final accounts.</li>
            </ul>

            <h2>Possession Charges</h2>
            

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="50%">Plot Size </th>
                            <th width="50%">Charges</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>600 square yards</td>
                            <td>30,000</td>
                        </tr>
                        <tr>
                            <td>300 square yards</td>
                            <td>25,000</td>
                        </tr>
                        <tr>
                            <td>150 square yards</td>
                            <td>20,000</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h3>Extra Land Charges</h3>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="50%">Size </th>
                            <th width="50%">Charges</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1 square feet </td>
                            <td>Rs.650</td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section"></div>

    <div class="clearfix"></div>

@endsection
