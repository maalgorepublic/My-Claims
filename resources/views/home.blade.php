@extends('app')
@section('title', 'Home Page')
@section('mainbody')
    <header class="masthead">
        <div class="container">
            <div>

            </div>
            <div class="intro-text">

                <a class="btn nav-link custom_nav_btn custom-nav-log"
                   style="width: fit-content; float: right; padding: 100px;" href="https://sacoronavirus.co.za/"
                   target="_blank">SA Covid-19 info</a>
                <div class="intro-lead-in">Helping you claim what is due to you</div>
                <div class="intro-heading">Don’t let your beneficiaries struggle while you have worked all your life to
                    take care of them. Make sure they claim from all the policies they are beneficiaries to.
                </div>
                <div class="intro-lead-in">Business Insider article revealed that there is currently more than R17
                    billion in unclaimed or forgotten unit trusts and policies in South Africa.
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="custom_header_btn">
                            <a class="custom_btn_header" href="{{ url('policyHolder/') }}">Policyholder</a>
                            <a class="custom_btn_header" href="{{ url('beneficiary/') }}">Beneficiary</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

