@extends('app')
@section('title', 'Home Page')
@section('mainbody')
    <div class="container">
        <div class="container">
            <div class="custom_form_section">
                <div class="custom_page_heading">
                    <h4>Add Beneficiary</h4>
                </div>
                <form method="POST" action="{{ url('/beneficiary/add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for=" ">Beneficiary Name<span class="text-danger"><b>*</b></span></label>
                            <input type="text" pattern="[A-Za-z0-9\s]+" title="Only alphanumeric characters are allowed" class="form-control" name="bene_name" placeholder="" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for=" ">Beneficiary Surname<span class="text-danger"><b>*</b></span></label>
                            <input type="text" pattern="[A-Za-z0-9\s]+" title="Only alphanumeric characters are allowed" class="form-control" name="bene_surname" placeholder="" required="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for=" ">Beneficiary South African Identity Document Number<span class="text-danger"><b>*</b></span></label>
                            <input type="text" id="user-idn-ben" data-type="identity_document_number" data-source="beneficiary" pattern="\d*" maxlength="13" minlength="13" title="Only dgits are allowed | Length should be 13." class="form-control" name="bene_document_number" placeholder="" required="">
                            <span id="reg-idn-error"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for=" ">Beneficiary Cell Phone Number<span class="text-danger"><b>*</b></span></label>
                            <input type="text" data-type="mobile" id="reg-contact-no-ben" data-source="beneficiary" pattern="\d*" maxlength="10" minlength="10" title="Length should be 10 digits | Only positive digits are allowed" class="form-control" name="bene_cell_number" placeholder="" required="">
                            <span id="reg-contact-error"></span>
                        </div>
                    </div>

                    <div class="form-row justify-content-center">
                        <div class="form-group">
                            <a class="btn btn-lg custom_btn_delete" href="{{ url('/policyHolder/') }}">Back</a>
                            <input type="submit"id="reg-sub-btn" class="btn custom_btn_form" value="Save" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

