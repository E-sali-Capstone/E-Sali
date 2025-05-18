@extends('dashboard.template.layout')
@section('content')
<div class="body flex-grow-1">
        @include('dashboard.template.alerts')
        <div class="container-lg px-4">
        <div class="col-md-6 ">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Report Details</h4>
                      <form enctype="multipart/form-data" class="forms-sample" method="post" action="{{route('save-report')}}">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputUsername1">Type of Report</label>
                          <select id="type" name="type" class="form-control">
                            <option value="Financial Reports">Financial Reports</option>
                            <option value="Surveillance & Data Requests">Surveillance & Data Requests</option>
                            <option value="Government Audits">Government Audits</option>
                            <option value="Freedom of Information Act (FOIA) Disclosures">Freedom of Information Act (FOIA) Disclosures</option>
                            <option value="Public Spending Reports">Public Spending Reports</option>
                            <option value="Procurement & Contracting">Procurement & Contracting</option>
                            <option value="Environmental Impact Reports">Environmental Impact Reports</option>
                            <option value="Ethics & Compliance Reports">Ethics & Compliance Reports</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputUsername1">Title</label>
                          <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" >
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Description</label>
                          <textarea class="form-control" id="description" name="description" value="{{old('description')}}" > </textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Upload Files</label>
                          <input type="file" class="form-control" id="fileUploads[]" name="fileUploads[]" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary me-2 btn-sm mt-2"> Submit </button>
                      </form>
                    </div>
                  </div>

              </div>
    
        </div>
      </div>
@endsection