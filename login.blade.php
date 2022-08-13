<div class="container">
    <div class="d-flex align-items-center justify-content-center choices">
        <h2>Choose a Section</h2>
        <div class="row">
            @foreach ($section as $section)
                @if ($section->status == 1)
                    <div class="p-2">
                        <div class="card text-center" style="width: 18rem;">
                            <div class="card-body">
                                <h5>{{ $section->name }}</h5>
                                <p class="card-text">{{ $section->description }}.</p>
                                <a href="{{ url('home/' . $courses->name . '/' . $section->name) }}"
                                    class="btn btn-primary">Select</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>









<div class="container">
    <h2>Choose a Course</h2>
    <div class="d-flex align-items-center justify-content-center choices">
        <div class="row">
            @foreach ($course as $course)
                @if ($course->status == 1)
                    <div class="p-2">
                        <div class="card text-center" style="width: 18rem;">
                            <div class="card-body">
                                <h5>{{ $course->name }}</h5>
                                <p class="card-text">{{ $course->description }}.</p>
                                <a href="{{ url('home/' . $course->name) }}" class="btn btn-primary">Start</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>







<div class="form-group">
    <label for="name">Section</label>
    <select class="form-control" aria-label="Default select example" name="groupsection">
        <option selected>Select Section</option>
        @foreach($section as $section)
            <option value="{{$section->name}}">{{$section->description}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="name">Course</label>
    <select class="form-control" aria-label="Default select example" name="groupcourse">
        <option selected>Select Course</option>
        @foreach($course as $course)
            <option value="{{$course->name}}">{{$course->description}}</option>
        @endforeach
    </select>
</div>








    {{-- <div class="content">
        <div class="container">
            <div class="row">
                <!-- /.col-md-6 -->
                @forelse ($course as $course)
                    @if ($course->status == 1)
                        <div class="col-lg-4 col-6">
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <b>
                                        <h5>{{ $course->Coursename }}</h5>
                                    </b>
                                    <p class="card-text">{{ Str::upper($course->description) }}.</p>
                                    <a href="{{ url('home/' . $course->Coursename) }}" class="btn btn-primary">Select</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="col-lg-4 col-6">
                        <div class="card text-center" style="width: 18rem;">
                            <div class="card-body">
                                <b>
                                    <h1>No Course Available</h1>
                                </b>
                            </div>
                        </div>
                    </div>
                @endforelse
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div> --}}













    <li class="nav-item {{ (request()->is('place-add*')) ||  (request()->is('place-list*'))  ? 'active menu-open' : '' }}">
        <a href="#" class="nav-link {{ (request()->is('place-add*')) ||  (request()->is('place-list*'))  ? 'active' : '' }}">
           <i class="fa fa-globe"></i>
           <p>
              City
              <i class="right fas fa-angle-left"></i>
           </p>
        </a>
        <ul class="nav nav-treeview">
           <li class="nav-item">
              <a href="{{route('add.place')}}" class="nav-link {{ (request()->is('place-add*')) ? 'active' : '' }}">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add</p>
              </a>
           </li>
           <li class="nav-item">
              <a href="{{route('list.place')}}" class="nav-link {{ (request()->is('place-list*')) ? 'active' : '' }}">
                 <i class="far fa-circle nav-icon"></i>
                 <p>List</p>
              </a>
           </li>
        </ul>
     </li>