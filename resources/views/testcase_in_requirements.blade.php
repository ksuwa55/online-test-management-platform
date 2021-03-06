<!-- Test Case List -->
    <div class="float-start mt-3">
            @if (empty($display_requirement))
                <h4>No selected</h4>
            @else
                <h4>{{ $display_requirement->requirement_cd }}</h4>
                <p>{{ $display_requirement->description }}</p>
            @endif
            @if (empty($display_requirement))
            @else
                <a href="#" class="btn btn-info btn-sm" style="max-width: 12rem;" data-bs-toggle="modal" data-bs-target="#exampletestcase">
                    <i class="fa fa-plus-circle"></i> Add Test Case
                </a>   

                <div class="modal fade" id="exampletestcase" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="card">
                                <form action="{{ route('testcases.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <h4 class="card-header text-center">Add Test Case</h3>
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <input type="text" placeholder="Test Case Code" id="testcase_cd" class="form-control" name="testcase_cd"
                                                required autofocus>
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="text" placeholder="Title" id="title" class="form-control" name="title"
                                                required autofocus>
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="text" placeholder="Requirements" id="requirement_cd" class="form-control" name="requirement_cd"
                                            value={{ $display_requirement->requirement_cd }}    
                                            required autofocus>
                                        </div>
                                        
                                        <div class="form-group mb-3">
                                            <label for="file_testdata">testdata</label>
                                            <input type="file" id="file_testdata" name="file_testdata" class="form-control"> 
                                        </div>
            
                                        <div class="form-group mb-3">
                                            <textarea type="text"  placeholder="Description" class="form-control" id="description" name="description" rows="5"></textarea>
                                        </div>
            
                                        <div >
                                            <button type="submit" class="btn btn-info btn-sm">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
           
    </div>

    <table class="table table-striped" style="margin-top:7px;">
        <thead>
            <tr>
            <th scope="col">Testcase Code</th>
            <th scope="col">Test data</th>
            <th scope="col">Evidence</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @if (empty($testcases))
                
            @else
                @foreach ($testcases as $testcase)
                <tr>
                    <td><a href="{{ route('testcases.display_descriptions', $testcase->id) }}">
                        {{ $testcase->testcase_cd }}</a></td>

                    <td>
                        <a href="{{ route('testcases.downloadTestdataFile', $testcase->id) }}"  style="display: flex; flex-direction:column;  max-width:7rem; margin-top:0.5rem;" >
                            {{ $testcase->testdata }}   </a>
                    </td>
                    <td>
                        <a href="{{ route('testcases.downloadEvidenceFile', $testcase->id) }}"  style="display: flex; flex-direction:column;  max-width:7rem; margin-top:0.5rem;">
                            {{ $testcase->evidence }}   </a>
                    </td>
                    <td>
                        <form action="{{ route('testcases.update', $testcase->id) }}"  method='POST'>
                            @csrf
                            @method('PUT')

                            <div style="display: flex; flex-direction:column; max-width:7rem;">                                   
                                @if ($user_role==='Administrator'||$user_role==='Manager'||$user_role==='Tester')
                                    <select name="status" id="status" >
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status['value'] }}"  {{ $testcase->status === $status['value'] ? 'selected' : '' }} >{{ $status['label'] }}</option>
                                        @endforeach
                                    </select>
                                    <button  type="submit" class="btn btn-info btn-sm" style="max-width: 12rem; margin-top:0.5rem;">
                                        <i class="fa fa-check"></i> change
                                    </button> 
                                @else
                                    {{ $testcase->status }}
                                    <br>
                                @endif
                            </div>
                       </form>
                    </td>
                    <td>
                        @if ($user_role==='Administrator'||$user_role==='Manager'||$user_role==='Tester')
                            <div class="float-midle">
                                <a href="{{ route('testcases.edit', $testcase->id) }}" class="btn btn-success"  >
                                    <i class="fa fa-edit"></i> 
                                </a>  


                                <form action="{{ route('testcases.destroy', $testcase->id) }}" style="display: inline" method='POST'>
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> 
                                    </button>  
                                </form>
                            </div>
                        @endif
                    </td>
                </tr>
                @endforeach
            @endif


        </tbody>
    </table>
