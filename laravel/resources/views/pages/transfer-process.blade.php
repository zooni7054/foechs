@extends('layouts.default')

@section('meta-title', $page->meta_title)

@section('meta-description', $page->meta_description)

@section('content')


    <div class="title-area">
        <div class="container">
            <div class="content">
                <h1>Transfer Process</h1>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section transfer-process">
        <div class="container">
            <h2>Standard Operating Procedure for Transfer of Plot</h2>

            <h3>Normal case</h3>
            <p>The following actions are required:</p>

            <ol>
                <li>NDC (No Dues Certificate) Charges for NDC Rs. 5,000</li>
                <li>Application for transfer of plot from transferor</li>
                <li>Submission of transfer form (available in FOECHS office) duly signed with thumb impressions by transferor & transferee</li>
                <li>Affidavit (value 100) on stamp paper as per specimen from transferor & transferee attested by Notary Public</li>
                <li>2 CNIC copies of Seller, Purchaser & witnesses (Separate two witnesses are required from transferor & transferee).</li>
                <li>Original allotment letter issued to transferor</li>
                <li>Pay Order/Demand Draft in favor of FOECHS on account of Membership fee, Transfer fee and Share capital. (Rs. 65,000 for 600 sq.yds, Rs.33,000 for 300 sq.yds and Rs.17, 000 for 150 sq.yds</li>
                <li>Gift deed (family transfer only) Sale Agreement duly attested by Notary Public.</li>
                <li>Three photographs of transferee and two photographs of transferor.</li>
                <li>CPR of tax from purchaser and seller (if applicable of seller)</li>
            </ol>

            <div class="button-area" style="margin: 30px 0px;">
                <a href="https://foechs.com/uploads/documents/61c42a098b7dc.pdf" target="_blank" class="btn btn-download">Download Application</a>
            </div>

            <hr />

            <h3>In case of Death</h3>
            <p>In addition to above, following are also required:</p>

            <ol>
                <li>Attested copy of Death Certificate</li>
                <li>Decree from Court, declaring particulars of legal heirs i.e. succession certificate</li>
                <li>Affidavit (value 100) on stamp paper from other legal heirs in case the plot is intended to be transferred in the name of any legal heir included in the list.</li>
                <li>Affidavit (value 100) on stamp paper from all legal heirs in case the plot is intended to be sold or transferred to any person other than legal heirs.</li>
                <li>Family Registration Certificate from NADRA</li>
            </ol>

            <div class="button-area" style="margin: 30px 0px;">
                <a href="https://foechs.com/uploads/documents/61c42a098b7dc.pdf" target="_blank" class="btn btn-download">Download Application</a>
            </div>

        </div>
    </div>

    <div class="clearfix"></div>

    <div class="section"></div>

    <div class="clearfix"></div>

@endsection
