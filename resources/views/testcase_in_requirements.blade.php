<!-- Test Case List -->
    <div class="float-start mt-3">
            @if (empty($display_requirement))
                <h4>No selected</h4>
            @else
                <h4>{{ $display_requirement->requirement_cd }}</h4>
                <p>{{ $display_requirement->description }}</p>
            @endif

    </div>
    {{-- <div class="float-end mt-3">
        <a href="#" class="btn btn-info">
            <i class="fa fa-plus-circle"></i> Add Test Case
        </a>    
    </div> --}}
    <table class="table table-striped" style="margin-top:7px;">
        <thead>
            <tr>
            <th scope="col">Code</th>
            <th scope="col">Test data</th>
            <th scope="col">Evidence</th>
            <th scope="col">Status</th>
            <th scope="col"></th>

            {{-- <th scope="col">Status</th> --}}
            </tr>
        </thead>
        <tbody>
            @if (empty($testcases))
                
            @else
                @foreach ($testcases as $testcase)
                <tr>
                    <td><a href="{{ route('testcases.display_descriptions', $testcase->id) }}">{{ $testcase->testcase_cd }}</a></td>
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
                    {{-- <td>
                        <select name="status" id="status" class="form-control" >    
                            <option>In progress</option>
                            <option>Completed</option>
                        </select>
                    </td> --}}
                </tr>
                @endforeach
            @endif


        </tbody>
    </table>
