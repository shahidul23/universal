@extends('layouts.layout')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Add service</h2>
    </div>
    <div class="card-body">
        <form action="{{ route("service.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- INCULDE Messages Partial --}}
            {{-- @include('partials.messages') --}}
            <div class="row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="service name">
                </div>
                
                <div class="form-group col-6">
                    <label for="exampleFormControlSelect3">Service type</label>
                    <select class="form-control" name="service_type" id="service_type_id">
                        <option value=""disabled selected hidden>Service type</option>
                        <option value="ipd">IPD</option>
                        <option value="opd">OPD</option>                       
                    </select>
                </div>

                <div class="form-group col-6">
                    <label for="exampleFormControlInput4">Service Group</label>
                    {{-- <input type="text" class="form-control" name="service_group" id="service_group_id" placeholder="Regular price"> --}}
                    <select class="form-control" name="service_group" id="service_group_id" >
                        {{-- <option value=""disabled selected hidden>Service Group</option> --}}
                        <option value="" >-  Select Service Group  -</option>
                        <option id="nicu_ipd_options" style="display: none" value="nicu">NICU</option>
                        <option id="picu_ipd_options" style="display: none" value="picu">PICU</option>
                        <option id="cicu_ipd_options" style="display: none" value="cicu">CICU</option>
                        <option id="ccu_ipd_options" style="display: none" value="ccu">CCU</option>
                        <option id="icu_ipd_options" style="display: none" value="icu">ICU</option>
                        <option id="rcu_ipd_options" style="display: none" value="rcu">RCU</option>
                        <option id="imaging_opd_options" style="display: none" value="imaging">Imaging</option>
                        <option id="radiology_opd_options" style="display: none" value="radiology">Radiology</option>
                                             
                    </select>
                </div>
                
                <div class="form-group col-6">
                    <label for="exampleFormControlInput7">Service price</label>
                    <input type="number" class="form-control"  name="price" id="exampleFormControlInput7" placeholder="service price" min="1" max="50000">
                </div>
                <div class="form-group col-12">
                    <label for="exampleFormControlSelect4">Note</label>
                    <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
            
            <div class="form-footer pt-4 mt-4">
                <button type="submit" class="btn btn-primary btn-default">Add service</button>
                <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection


@section('scripts')
<script>
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

</script>

@endsection