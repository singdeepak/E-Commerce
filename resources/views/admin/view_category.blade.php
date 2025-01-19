<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('theme/AdminTemplate/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/AdminTemplate/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('theme/AdminTemplate/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/AdminTemplate/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/AdminTemplate/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('theme/AdminTemplate/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('theme/AdminTemplate/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('theme/AdminTemplate/assets/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.navbar')
            <!-- partial -->

            <div class="container my-5">
                <h2 class="text-center my-5">Category List</h2>
                <div class="d-flex justify-content-between mb-3">
                    <a href="{{ route('create.category') }}" class="btn btn-success">Add New Category</a>
                    <input type="text" id="search" class="form-control w-25" placeholder="Search Category">
                </div>
                <table class="table table-striped table-bordered">
                    @if ($categories->isNotEmpty())
                        <thead>
                            <tr id="flash-message">
                                @if (session('message'))
                                    <td colspan="100%">
                                        <div class="alert 
                                    @if (session('message.type') === 'success') alert-success 
                                    @elseif(session('message.type') === 'error') alert-danger @endif"
                                            role="alert">
                                            {{ session('message.text') }}
                                        </div>
                                    </td>
                                @endif
                            </tr>

                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="category-table">
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>
                                        <a href="{{ route('edit.category', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('destroy.category', $category->id) }}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else
                        <tr colspan="4">
                            <td>You don't have any categroy..!</td>
                        </tr>
                    @endif
                </table>

                @if ($categories->isNotEmpty())
                <div class="d-flex justify-content-center my-5">
                  <nav>
                      <ul class="pagination justify-content-center">
                          {{-- Previous Link --}}
                          @if ($categories->onFirstPage())
                              <li class="page-item disabled">
                                  <span class="page-link">Previous</span>
                              </li>
                          @else
                              <li class="page-item">
                                  <a class="page-link" href="{{ $categories->previousPageUrl() }}" aria-label="Previous">Previous</a>
                              </li>
                          @endif
              
                          {{-- Page Number Links --}}
                          @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                              <li class="page-item {{ ($categories->currentPage() == $page) ? 'active' : '' }}">
                                  <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                              </li>
                          @endforeach
              
                          {{-- Next Link --}}
                          @if ($categories->hasMorePages())
                              <li class="page-item">
                                  <a class="page-link" href="{{ $categories->nextPageUrl() }}" aria-label="Next">Next</a>
                              </li>
                          @else
                              <li class="page-item disabled">
                                  <span class="page-link">Next</span>
                              </li>
                          @endif
                      </ul>
                  </nav>
                </div> 
                @endif
            </div>


            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="{{ asset('theme/AdminTemplate/assets/vendors/js/vendor.bundle.base.js') }} "></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{ asset('theme/AdminTemplate/assets/vendors/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('theme/AdminTemplate/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
        <script src="{{ asset('theme/AdminTemplate/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
        <script src="{{ asset('theme/AdminTemplate/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
        <script src="{{ asset('theme/AdminTemplate/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{ asset('theme/AdminTemplate/assets/js/off-canvas.js') }}"></script>
        <script src="{{ asset('theme/AdminTemplate/assets/js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('theme/AdminTemplate/assets/js/misc.js') }}"></script>
        <script src="{{ asset('theme/AdminTemplate/assets/js/settings.js') }}"></script>
        <script src="{{ asset('theme/AdminTemplate/assets/js/todolist.js') }}"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="{{ asset('theme/AdminTemplate/assets/js/dashboard.js') }}"></script>
        <!-- End custom js for this page -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const flashMessage = document.getElementById('flash-message');
                if (flashMessage) {
                    setTimeout(() => {
                        flashMessage.style.display = 'none';
                    }, 2000);
                }
            });
        </script>
</body>

</html>
