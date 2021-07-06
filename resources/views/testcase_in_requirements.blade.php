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
            <th scope="col">Title</th>
            <th scope="col">Status</th>

            {{-- <th scope="col">Status</th> --}}
            </tr>
        </thead>
        <tbody>
            @if (empty($testcases))
                
            @else
                @foreach ($testcases as $testcase)
                <tr>
                    <td>{{ $testcase->testcase_cd }}</td>
                    <td>{{ $testcase->title }}</td>
                    <td>{{ $testcase->status }}</td>

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
