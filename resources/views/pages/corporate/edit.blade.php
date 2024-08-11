@extends('layouts.layout')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Edit corporate</h2>
    </div>
    <div class="card-body">
        <form action="{{ route("corporate.update", $corporate->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- INCULDE Messages Partial --}}
            {{-- @include('partials.messages') --}}
            <div class="row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{ $corporate->name }}">
                </div>                
                <div class="form-group col-6">
                    <label for="exampleFormControlInput2">address</label>
                    {{-- <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"></textarea> --}}
                    <input type="text" name="address" class="form-control" id="exampleFormControlInput2" value="{{ $corporate->address }}">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput3">phone</label>
                    <input type="number" name="phone" class="form-control" id="exampleFormControlInput3" value="{{ $corporate->phone }}">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput4">Contact Person Name</label>
                    <input type="text" name="contact_person_name" class="form-control" id="exampleFormControlInput4" value="{{ $corporate->contact_person_name }}">
                </div>                
                <div class="form-group col-6">
                    <label for="exampleFormControlInput5">contact_person_phone</label>
                    <input type="number" name="contact_person_phone" class="form-control" id="exampleFormControlInput5" value="{{ $corporate->contact_person_phone }}">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput6">contact_person_whatsapp</label>
                    <input type="number" name="contact_person_whatsapp" class="form-control" id="exampleFormControlInput6" value="{{ $corporate->contact_person_whatsapp }}">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput7">Contact person Email</label>
                    <input type="email" name="contact_person_email" class="form-control" id="exampleFormControlInput7" value="{{ $corporate->contact_person_email }}">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput8">Alter Contact Person Name</label>
                    <input type="text" name="alter_contact_person_name" class="form-control" id="exampleFormControlInput8" value="{{ $corporate->alter_contact_person_name }}">
                </div>                
                <div class="form-group col-6">
                    <label for="exampleFormControlInput9">Alter contact_person_phone</label>
                    <input type="number" name="alter_contact_person_phone" class="form-control" id="exampleFormControlInput9" value="{{ $corporate->alter_contact_person_phone }}">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput10">Alter contact_person_whatsapp</label>
                    <input type="number" name="alter_contact_person_whatsapp" class="form-control" id="exampleFormControlInput10" value="{{ $corporate->alter_contact_person_whatsapp }}">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput11">Alter Contact person Email</label>
                    <input type="email" name="alter_contact_person_email" class="form-control" id="exampleFormControlInput11" value="{{ $corporate->alter_contact_person_email }}">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlSelect3">Industry type</label>
                    {{-- <input type="text" name="industry_type" class="form-control" id="exampleFormControlInput3" placeholder="Department name"> --}}
                    <select class="form-control" name="industry_type" id="exampleFormControlSelect3" placeholder="Department">
                        <option value=""disabled selected hidden>Industry type</option>
                        <option value="it">IT</option>
                        <option value="builder">Builder</option>                       
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput12">agreement_date</label>
                    <input type="date" class="form-control" name="agreement_date" id="exampleFormControlInput12" value="{{ $corporate->agreement_date }}">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput13">agreement_validity_date</label>
                    <input type="date" class="form-control" name="agreement_validity_date" id="exampleFormControlInput13" value="{{ $corporate->agreement_validity_date }}">
                </div>
                <div class="form-group col-6 mt-4">
                    <label class="control outlined control-checkbox checkbox-primary">privileged_service
                        <input type="checkbox" name="privileged_service"  value="1"/>
                        <div class="control-indicator"></div>
                    </label>
                </div>
                <div class="form-group col-6 mt-4">
                    <label class="control outlined control-checkbox checkbox-success">cashless_service
                        <input type="checkbox" name="cashless_service"  value="1"/>
                        <div class="control-indicator"></div>
                    </label>
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlSelect4">Name Under BDO</label>
            
                    <select class="form-control" name="name_corporate_under_bd" id="exampleFormControlSelect4">
                        <option value="{{ $corporate->name_corporate_under_bd }}"disabled selected hidden></option>
                        @foreach ($phonedirectories as $consultant)
                            
                        <option value="{{ $consultant->name }}">{{ $consultant->name }}</option>
                        @endforeach                      
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlSelect4">Froce Active</label>
                    
                    <select class="form-control" name="force_active" id="exampleFormControlSelect4" >
                        <option value=""disabled selected hidden>Force active</option>
                        <option value="NO">NO</option>
                        <option value="YES">YES</option>                       
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput14">pathology_discount</label>
                    <input type="number" class="form-control"  name="pathology_discount" id="exampleFormControlInput14" value="{{ $corporate->pathology_discount }}" min="1" max="100">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput14">radiology_imaging_discount</label>
                    <input type="number" class="form-control"  name="radiology_imaging_discount" id="exampleFormControlInput14" value="{{ $corporate->radiology_imaging_discount }}" min="1" max="100">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput14">ipd_discount</label>
                    <input type="number" class="form-control"  name="ipd_discount" id="exampleFormControlInput14" value="{{ $corporate->ipd_discount }}" min="1" max="100">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput14">covid_test_discount</label>
                    <input type="number" class="form-control"  name="covid_test_discount" id="exampleFormControlInput14" value="{{ $corporate->covid_test_discount }}" min="1" max="100">
                </div>
               
            </div>
            
            <div class="form-footer pt-4 mt-4">
                <button type="submit" class="btn btn-primary btn-default">Edit Corporate</button>
                <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection