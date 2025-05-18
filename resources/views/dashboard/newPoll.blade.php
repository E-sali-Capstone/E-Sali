@extends('dashboard.template.layout')
@section('content')
      <div class="body flex-grow-1">
        @include('dashboard.template.alerts')
        <div class="container-lg px-4">
        <div class="col-md-6 ">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Poll Settings</h4>
                      <form class="forms-sample" method="post" action="{{route('save-poll')}}">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputUsername1">Set Poll Topic</label>
                          <select id="pollTitle" name="pollTitle" class="form-control">
                              <option value=""></option>
                              <option value="Local Government Funding Priorities (Education, Healthcare, Infrastructure)">Local Government Funding Priorities (Education, Healthcare, Infrastructure)</option>
                              <option value="Environmental Protection Policies (Stricter carbon emission laws)">Environmental Protection Policies (Stricter carbon emission laws)</option>
                              <option value="Public Transportation Expansion (Investing in better transit options)">Public Transportation Expansion (Investing in better transit options)</option>
                              <option value="Affordable Housing Initiatives (Investment in affordable homes)">Affordable Housing Initiatives (Investment in affordable homes)</option>
                              <option value="Universal Healthcare (Providing healthcare for all citizens)">Universal Healthcare (Providing healthcare for all citizens)</option>
                              <option value="Criminal Justice Reform (Rehabilitation over incarceration)">Criminal Justice Reform (Rehabilitation over incarceration)</option>
                              <option value="Minimum Wage Increase (Raising the minimum wage to a living wage)">Minimum Wage Increase (Raising the minimum wage to a living wage)</option>
                              <option value="Government Transparency (Open access to public spending data)">Government Transparency (Open access to public spending data)</option>
                              <option value="Climate Change Legislation (Comprehensive laws to address climate change)">Climate Change Legislation (Comprehensive laws to address climate change)</option>
                              <option value="Education Curriculum Reform (Including life skills and financial literacy)">Education Curriculum Reform (Including life skills and financial literacy)</option>
                              <option value="Healthcare for Undocumented Immigrants (Providing healthcare to all citizens, regardless of status)">Healthcare for Undocumented Immigrants (Providing healthcare to all citizens, regardless of status)</option>
                              <option value="Gun Control Laws (Implementing stricter gun laws)">Gun Control Laws (Implementing stricter gun laws)</option>
                              <option value="Voting Rights & Access (Improving voter access and making voting easier)">Voting Rights & Access (Improving voter access and making voting easier)</option>
                              <option value="Police Funding and Reform (Redistributing police funding to other community services)">Police Funding and Reform (Redistributing police funding to other community services)</option>
                              <option value="Corporate Taxation (Increasing taxes on large corporations)">Corporate Taxation (Increasing taxes on large corporations)</option>
                              <option value="Legalization of Cannabis (Legalizing cannabis for recreational use)">Legalization of Cannabis (Legalizing cannabis for recreational use)</option>
                              <option value="Social Security & Retirement Programs (Reforming Social Security)">Social Security & Retirement Programs (Reforming Social Security)</option>
                              <option value="Foreign Aid Spending (Reducing foreign aid to focus on domestic issues)">Foreign Aid Spending (Reducing foreign aid to focus on domestic issues)</option>
                              <option value="Public Surveillance & Privacy (Increasing public surveillance or protecting privacy)">Public Surveillance & Privacy (Increasing public surveillance or protecting privacy)</option>
                              <option value="Taxation of Wealthy Individuals (Increasing taxes on the wealthy to address inequality)">Taxation of Wealthy Individuals (Increasing taxes on the wealthy to address inequality)</option>
                          </select>                        
                        </div>
                        <div class="form-group">
                          <label for="exampleInputUsername1">Question</label>
                          <input type="text" class="form-control" id="question" name="question" value="{{old('question')}}" >
                        </div>

                        <div class="form-group" id="choicesDiv">

                          <label for="exampleInputUsername1">Choices <a href="#" onclick="addChoices()">Add Choices</a> </label>
                          <input type="text" class="form-control mb-2" required  name="choices[]" value="{{old('choices[]')}}" >
                          <input type="text" class="form-control mb-2" required name="choices[]" value="{{old('choices[]')}}" >

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
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary btn-sm"> Submit </button>
                          <a href="{{route('polls')}}" type="submit" class="btn btn-danger btn-sm me-2 text-white"> Close </a>
                        </div>
                      </form>
                    </div>
                  </div>

              </div>
    
        </div>
      </div>

@endsection

<script>
    // var today = new Date().toISOString().slice(0, 16);
    // $("#validFrom").attr("min" , today);
    // $("#validTo").attr("min" , today);
    var num = 0;
    function addChoices(){
      num ++;
      $("#choicesDiv").append('<input type="text" class="form-control mb-2" id="choices'+num+'" name="choices[]" > <a href = "#" id="delete'+num+'" onclick = "deleteChoices('+num+')" class = "mdi mdi-delete text-danger">Remove</a> ') ;
    }
    function deleteChoices(id){
      document.getElementById("choices"+id).remove();
      document.getElementById("delete"+id).remove();
    }
</script>
