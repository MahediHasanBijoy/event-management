@extends('layouts.main')

@section('content')
    <!-- Sidebar Start -->
    @include('includes.sidebar')
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        @include('includes.navbar')
        <!-- Navbar End -->

        <!-- Table Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Edit Events</h6>
                        <form action="{{route('event.update', $event->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter your event title" value="{{$event->title}}">
                                    <div class="text-danger mt-2">{{$errors->first('title')}}</div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select mb-3" name="category" id="category">
                                        <option selected="" value="">Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="text-danger mt-2">{{$errors->first('category')}}</div>
                                </div>
                                
                                <div class="mb-3 col-md-12">
                                    <label for="description" class="form-label">Descritpion</label>
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{$event->description}}</textarea>
                                    <div class="text-danger mt-2">{{$errors->first('description')}}</div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control" name="date" id="date" value="{{$event->date}}">
                                    <div class="text-danger mt-2">{{$errors->first('date')}}</div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="time" class="form-label">Time</label>
                                    <input type="time" class="form-control" name="time" id="time" value="{{$event->time}}">
                                    <div class="text-danger mt-2">{{$errors->first('time')}}</div>
                                </div>
                                <div class="mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" name="location" id="location" value="{{$event->location}}">
                                    <div class="text-danger mt-2">{{$errors->first('title')}}</div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table End -->

        <!-- Footer Start -->
        @include('includes.footer')
        <!-- Footer End -->
    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    
@endsection