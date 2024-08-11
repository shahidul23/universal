@extends('layouts.layout')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom" style="background: #f1f7f7;">
        <h2>Add Corporate</h2>
    </div>
    <div class="card-body" style="background: #f1f7f7;">
        <form action="{{ route("corporate.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- INCULDE Messages Partial --}}
            {{-- @include('partials.messages') --}}
            <div class="row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="corporate name">
                </div>                
                <div class="form-group col-6">
                    <label for="exampleFormControlInput2">Address</label>
                    {{-- <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"></textarea> --}}
                    <input type="text" name="address" class="form-control" id="exampleFormControlInput2" placeholder="address">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput3">Phone</label>
                    <input type="number" name="phone" class="form-control" id="exampleFormControlInput3" placeholder="phone">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput4">Contact Person Name</label>
                    <input type="text" name="contact_person_name" class="form-control" id="exampleFormControlInput4" placeholder="Name">
                </div>                
                <div class="form-group col-6">
                    <label for="exampleFormControlInput5">Contact Person Phone</label>
                    <input type="number" name="contact_person_phone" class="form-control" id="exampleFormControlInput5" placeholder="Phone">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput6">Contact Person Whatsapp</label>
                    <input type="number" name="contact_person_whatsapp" class="form-control" id="exampleFormControlInput6" placeholder="Whatsapp Number">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput7">Contact person Email</label>
                    <input type="email" name="contact_person_email" class="form-control" id="exampleFormControlInput7" placeholder="Email">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput8">Alter Contact Person Name</label>
                    <input type="text" name="alter_contact_person_name" class="form-control" id="exampleFormControlInput8" placeholder="Name">
                </div>                
                <div class="form-group col-6">
                    <label for="exampleFormControlInput9">Alter Contact Person Phone</label>
                    <input type="number" name="alter_contact_person_phone" class="form-control" id="exampleFormControlInput9" placeholder="Phone">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput10">Alter Contact Person Whatsapp</label>
                    <input type="number" name="alter_contact_person_whatsapp" class="form-control" id="exampleFormControlInput10" placeholder="Whatsapp Number">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput11">Alter Contact Person Email</label>
                    <input type="email" name="alter_contact_person_email" class="form-control" id="exampleFormControlInput11" placeholder="Corporate Person">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlSelect3">Industry type</label>
                    {{-- <input type="text" name="industry_type" class="form-control" id="exampleFormControlInput3" placeholder="Department name"> --}}
                    <select class="form-control" name="industry_type" id="exampleFormControlSelect3" placeholder="Department">
                        <option value=""disabled selected hidden>Industry type</option>
                        <option value="IT">IT</option>
                        <option value="Builder">Builder</option>                       
                        <option value="Sports">Sports</option>                       
                        <option value="Travel Agency">Travel Agency</option>                       
                        <option value="Software Firm">Software Firm</option>                       
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput12">Agreement Date</label>
                    <input type="date" class="form-control" name="agreement_date" id="exampleFormControlInput12" placeholder="Agreement date">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput13">Agreement  Validity Date</label>
                    <input type="date" class="form-control" name="agreement_validity_date" id="exampleFormControlInput13" placeholder="Agreement validity date">
                </div>
                {{-- <div class="form-group col-6 mt-4">
                    <label class="control  radio-success" for="exampleFormControlInput14">Privileged Service</label>
                    
                    <input type="radio" name="privileged_service" id="one" value="NO" checked>No
                    <div class="control-indicator"></div>
                    <input type="radio" name="privileged_service" id="two" value="YES">Yes
                    <div class="control-indicator"></div>
                </div> --}}
                {{-- <label class="control control-radio radio-success">Success Radio
                    <input type="radio" checked="checked">
                    <div class="control-indicator"></div>
                </label> --}}
                {{-- <label class="control control-checkbox checkbox-success">Success Checkbox
                    <input type="checkbox"  name="privileged_service" value="NO">
                    <input type="checkbox"  name="privileged_service" value="YES">
                    <div class="control-indicator"></div>
                </label>
                <div class="form-group col-6 mt-4">
                    <label class="screen-reader-only" for="privileged_service">Yes or No?</label>
                    <span aria-hidden="true">No</span>
                    <input type="range" max="1" id="privileged_service" name="privileged_service">
                    <span aria-hidden="true">Yes</span>
                </div> --}}
                <div class="form-group col-4 mt-4">
                    <label class="control control-checkbox checkbox-success">Privileged Service
                        <input type="checkbox" name="privileged_service"  value="YES"/>
                        <div class="control-indicator"></div>
                    </label>                  
                </div>
                <div class="form-group col-4 mt-4">
                    <label class="control outlined control-checkbox checkbox-success">Cashless Service
                        <input type="checkbox" name="cashless_service"  value="YES"/>
                        <div class="control-indicator"></div>
                    </label>
                </div>
                <div class="form-group col-4">
                    <label for="exampleFormControlSelect3">Status</label>
                    <select class="form-control" name="status" id="exampleFormControlSelect3" >
                        <option value=""disabled selected hidden>Status</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>                       
                    </select>
                </div>
                {{-- <div class="form-group col-6">
                    <label for="exampleFormControlSelect4">Name Under BD</label>
                    <select class="form-control" name="name_corporate_under_bd" id="exampleFormControlSelect4" placeholder="name_corporate_under_bd">
                        <option value=""disabled selected hidden>name_corporate_under_bd</option>
                        <option value="it">IT</option>
                        <option value="builder">Builder</option>                       
                    </select>
                </div> --}}
                <div class="form-group col-12">
                    <label for="exampleFormControlSelect3">BD Officers</label>
                    <select class="form-control" name="name_corporate_under_bd" id="exampleFormControlSelect3">
                        <option value=""disabled selected hidden>BD Officers</option>
                        @foreach ($phonedirectories as $consultant)
                            
                        <option value="{{ $consultant->name }}">{{ $consultant->name }}</option>
                        @endforeach
                        
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput14">Pathology Discount</label>
                    <input type="number" class="form-control"  name="pathology_discount" id="exampleFormControlInput14" placeholder="pathology discount" min="1" max="100">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput14">Radiology Imaging Discount</label>
                    <input type="number" class="form-control"  name="radiology_imaging_discount" id="exampleFormControlInput14" placeholder="radiology imaging discount" min="1" max="100">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput14">Ipd Discount</label>
                    <input type="number" class="form-control"  name="ipd_discount" id="exampleFormControlInput14" placeholder="ipd discount" min="1" max="100">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput14">Covid Test Discount</label>
                    <input type="number" class="form-control"  name="covid_test_discount" id="exampleFormControlInput14" placeholder="covid test discount" min="1" max="100">
                </div>
               
            </div>
            
            <div class="form-footer pt-4 mt-4">
                <button type="submit" class="btn btn-primary btn-default">Add corporate</button>
                <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection