@extends('layouts.layout')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Add Phone Directory</h2>
    </div>
    <div class="card-body">
        <form action="{{ route("phonedirectory.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- INCULDE Messages Partial --}}
            {{-- @include('partials.messages') --}}
            <div class="row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Name">
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlInput2">Department</label>
                    <input type="text" name="department" class="form-control" id="exampleFormControlInput2" placeholder="Department">
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlInput3" >Unit Name</label>
                    <input type="text" name="unit_name" class="form-control" id="exampleFormControlInput3" placeholder="Unit Name">
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlInput4">Unit Pabx Number</label>
                    <input type="number" class="form-control"  name="unit_pabx_number" id="exampleFormControlInput4" placeholder="Unit Pabx Number" min="1" max="999999999999999">
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlInput5">Corporate Number</label>
                    <input type="number" class="form-control"  name="corporate_number" id="exampleFormControlInput5" placeholder="Corporate Number" min="1" max="999999999999999">
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlInput6">Unit Cell Number</label>
                    <input type="number" class="form-control"  name="unit_cell_number" id="exampleFormControlInput6" placeholder="Unit Cell Number" min="1" max="999999999999999">
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlInput7">Personal Number</label>
                    <input type="number" class="form-control"  name="personal_number" id="exampleFormControlInput7" placeholder="Personal Number" min="1" max="999999999999999">
                </div>
                
                <div class="form-group col-6">
                    <label for="exampleFormControlInput8">Alternative Number</label>
                    <input type="number" class="form-control"  name="alternative_number" id="exampleFormControlInput8" placeholder="Alternative Number" min="1" max="999999999999999">
                </div>
                
            </div>
            
            <div class="form-footer pt-4 mt-4">
                <button type="submit" class="btn btn-primary btn-default">Add</button>
                <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection


@section('scripts')
{{-- <script>
    $("#service_type_id").change(function(){
        $val = $("#service_type_id").val();
        // console.log($val);
        $("#service_group_id").show();
        select = document.getElementById('service_group_id');
        var opt = document.createElement('option');
        if($val == "ipd"){
        console.log('ipd value');
        // $("#service_group_id").appendChild( <option value="ipd">IPD</option>);
        // $("#service_group_id").appendChild( <option value="ipd">IPD</option>);
        
        // $("#opd_options").classList.remove("hidden");
        $("#radiology_opd_options").hide();
        $("#imaging_opd_options").hide();
        $("#nicu_ipd_options").show();
        $("#picu_ipd_options").show();
        $("#cicu_ipd_options").show();
        $("#ccu_ipd_options").show();
        $("#icu_ipd_options").show();
        $("#rcu_ipd_options").show();

        // opt.id = "ipd_options";
        // opt.value = 'IPD Options';
        // opt.innerHTML = 'IPD Options';
        // // $("#service_group_id").appendChild(opt);
        // select.appendChild(opt);
        }
        else if($val == "opd")
        {
        // $("#opd_options").classList.remove("hidden");
        $("#nicu_ipd_options").hide();
        $("#picu_ipd_options").hide();
        $("#cicu_ipd_options").hide();
        $("#ccu_ipd_options").hide();
        $("#icu_ipd_options").hide();
        $("#rcu_ipd_options").hide();
        $("#radiology_opd_options").show();
        $("#imaging_opd_options").show();
        
        console.log('opd value');
        // opt.id = "opd_options";
        // opt.value = 'opd Options';
        // opt.innerHTML = 'opd Options';
        // // $("#service_group_id").appendChild(opt);
        // select.appendChild(opt);
        }
        else{
            console.log('Nothing');
        }
    })

</script> --}}

@endsection