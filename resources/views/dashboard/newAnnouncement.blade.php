@extends('dashboard.template.layout')
@section('content')
<div class="body flex-grow-1">
        @include('dashboard.template.alerts')
        <div class="container-lg px-4">
        <div class="col-md-6 ">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Announcements Details</h4>
                      <form enctype="multipart/form-data" class="forms-sample" method="post" action="{{route('save-announcement')}}">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputUsername1">Category</label>
                          <select id="category" name="category" class="form-control">
                            <option value="">-- Please Choose a Category --</option>
                            <option value="Health and Safety">Health and Safety</option>
                            <option value="Election Updates">Election Updates</option>
                            <option value="Education and Schools">Education and Schools</option>
                            <option value="Transportation and Infrastructure">Transportation and Infrastructure</option>
                            <option value="Employment and Labor">Employment and Labor</option>
                            <option value="Public Safety and Security">Public Safety and Security</option>
                            <option value="Environment and Natural Resources">Environment and Natural Resources</option>
                            <option value="Technology and Digital Services">Technology and Digital Services</option>
                            <option value="Community Programs and Services">Community Programs and Services</option>
                            <option value="Emergency Alerts and Disaster Response">Emergency Alerts and Disaster Response</option>
                            <option value="Governance and Policy Updates">Governance and Policy Updates</option>
                            <option value="Utilities and Public Works">Utilities and Public Works</option>
                            <option value="Finance, Taxes, and Economic Affairs">Finance, Taxes, and Economic Affairs</option>
                          </select>                        
                        </div>  
                        <div class="form-group">
                          <label for="exampleInputUsername1">Title</label>
                          <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" >
                        </div>  
                        <div class="form-group">
                          <label for="exampleInputEmail1">Content</label>
                          <textarea class="form-control" id="content" name="content" value="{{old('content')}}" > </textarea>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputUsername1">Valid From</label>
                              <input min="{{date('Y-m-d\Th:i')}}" type="datetime-local" class="form-control" id="validFrom" name="validFrom" value="{{old('validFrom')}}" >
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputUsername1">Valid To</label>
                              <input min="{{date('Y-m-d\Th:i')}}" type="datetime-local" class="form-control" id="validTo" name="validTo" value="{{old('validTo')}}" >
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Upload Images</label>
                          <input accept="image/png, image/jpg, image/jpeg" type="file" class="form-control" id="fileUploads[]" name="fileUploads[]" multiple>
                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary btn-sm me-2"> Submit </button>
                          <a href="{{route('announcements')}}" type="submit" class="btn btn-danger btn-sm me-2 text-white"> Close </a>

                        </div>
                      </form>
                    </div>
                  </div>

              </div>
    
        </div>
      </div>

@endsection