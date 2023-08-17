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
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-4">Events</h6>
                            <div class="d-flex ml-2">
                                
                                <div>
                                    <a href="{{ route('event.create')}}" class="btn btn-primary btn-sm mb-2">Add Event</a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <form action="{{ route('event.index') }}" method="GET" class="d-flex mb-2">
                                <div class="form-group">
                                    <label for="category" class="d-block d-md-inline-block">Filter by Category:</label>
                                    <select name="category" id="category" class="form-control-sm">
                                        <option value="" selected>All Categories</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                                </div>
                                
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($events as $event)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $event->title}}</td>
                                        <td>{{ $event->description}}</td>
                                        <td>{{ $event->category->name}}</td>
                                        <td>{{ $event->location}}</td>
                                        <td>{{ $event->date}}</td>
                                        <td>{{ $event->time}}</td>
                                        <td class="col-md-2">
                                            <a href="{{route('event.edit', $event->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm" data-id="{{$event->id}}" data-bs-toggle="modal" data-bs-target="#deleteModalEvent">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table End -->

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModalEvent" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Item</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete the item
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Start -->
        @include('includes.footer')
        <!-- Footer End -->
    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var deleteModal = document.getElementById('deleteModalEvent');
            
            if (deleteModal) {
                deleteModal.addEventListener('show.bs.modal', function (event) {
                    var button = event.relatedTarget; // Button that triggered the modal
                    var itemId = button.getAttribute('data-id'); // Extract item ID from data-id attribute
                    var modal = this;
                    
                    modal.querySelector('#deleteForm').setAttribute('action', '/event/' + itemId); // Update form action
                });
            }
        });
    </script>
    
@endsection